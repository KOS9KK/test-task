<?php

class Model_Task extends Model
{

    private $dir = '';

    public function __construct() {

        $this->dir = $_SERVER['DOCUMENT_ROOT'] . '/tasks/tasks.json';

    }

    public function get_tasks( $sort = FALSE ) {

        $tasks = file_get_contents( $this->dir );
        $tasks = (array)json_decode( $tasks );

        /*
        if( $sort != FALSE ) {

            $asc  = 'asc_';
            $decs = 'desc_';

            if ( strpos($sort, $asc)  !== false) {

                $sort = str_replace( $asc, '', $sort );

                usort($tasks, function ($a, $b) use ($sort) {
                    return ($a->{$sort} - $b->{$sort});
                });

            }

            if ( strpos($sort, $decs)  !== false) {

                $sort = str_replace( $decs, '', $sort );

                usort($tasks, function ($a, $b) use ($sort) {
                    return ( $b->{$sort} - $a->{$sort});
                });

            }

        }
        */

        return $tasks;

    }

    public function get_paginate_tasks( $count = 10, $offset = 0, $sort = FALSE ) {

        $tasks    = $this->get_tasks( $sort );
        $paginate = array();

        foreach( $tasks as $task ) {

            if( $offset <= 0 ) {

                $paginate[] = $task;

                $count--;
            }

            $offset--;

            if( $count <= 0 ) {
                break;
            }

        }

        return $paginate;

    }

    public function get_tasks_count() {

        $tasks = $this->get_tasks();
        $count = count( $tasks );

        return $count;
    }

    public function get_task_new_id() {

        $tasks = $this->get_tasks();

        $id = 0;

        if( count( $tasks ) > 0 ) {

            foreach ($tasks as $task) {

                if ($id < $task->id) {

                    $id = $task->id;

                }

            }

        }

        $id++;

        return $id;
    }

    public function add_task( $task ) {

        $tasks = (array)$this->get_tasks();

        if( count( $tasks ) == 0 ) {
            $tasks = array();
        }

        $tasks[] = $task;

        $tasks = json_encode( $tasks );

        file_put_contents( $this->dir, $tasks );

        return TRUE;
    }

    public function change_value_by_id( $task_id, $field, $value ) {

        $tasks = $this->get_tasks();

        if( count( $tasks ) > 0 ) {

            foreach ( $tasks as $task ) {

                if( $task->id == $task_id ) {

                    $task->{$field} = $value;

                }

            }

        }

        $tasks = json_encode( $tasks );
        file_put_contents( $this->dir, $tasks );

        return TRUE;

    }

}
