<?php

class Controller_Main extends Controller
{

	function action_index() {

        $tasks = $this->task->get_paginate_tasks();

		$this->view->generate(
		    'main_view.php',
            'template_view.php',
            array(
                'tasks' => $tasks,
            )
        );

	}

}