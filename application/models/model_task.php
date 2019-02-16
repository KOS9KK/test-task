<?php

class Model_Task extends Model
{

    private $dir = '';

    public function __construct() {

        $this->dir = $_SERVER['DOCUMENT_ROOT'] . '/tasks/tasks.json';

    }

    public function get_tasks() {

        $tasks = file_get_contents( $this->dir );
        $tasks = json_decode( $tasks );

        return $tasks;

    }

    public function get_paginate_tasks( $count = 10, $offset = 0 ) {

        $tasks    = $this->get_tasks();
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

    public function change_status( $task_id, $status ) {

        $tasks = $this->get_tasks();

        if( count( $tasks ) > 0 ) {

            foreach ( $tasks as $task ) {

                if( $task->id == $task_id ) {

                    $task->status = $status;

                }

            }

        }

        $tasks = json_encode( $tasks );
        file_put_contents( $this->dir, $tasks );

        return TRUE;

    }

}
