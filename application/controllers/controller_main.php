<?php

class Controller_Main extends Controller
{

	function action_index() {

	    $page   = get_value( $_GET, 'page', 0 );

        $shift  = 10;
        $offset = $page * $shift;

        $tasks  = $this->task->get_paginate_tasks( $shift, $offset );
        $count  = $this->task->get_tasks_count();

		$this->view->generate(
		    'main_view.php',
            'template_view.php',
            array(
                'tasks' => $tasks,
                'count' => $count,
            )
        );

	}

}