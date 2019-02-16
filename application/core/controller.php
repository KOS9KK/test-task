<?php

class Controller {

	public $view;
    public $task;
	
	function __construct()
	{
        $this->task = new Model_Task();
		$this->view = new View();
	}

	function action_index()
	{

	}
}
