<?php

class Controller_Task extends Controller
{

    public function action_add_task()
    {

        $name  = get_value($_POST, 'name', FALSE );
        $email = get_value($_POST, 'email', FALSE );
        $text  = get_value($_POST, 'text', FALSE );

        if( $name == FALSE || $email == FALSE || $text == FALSE ) {

            $this->view->generate(
                'main_view.php',
                'template_view.php',
                array(
                    'error_task' => 'wrong_data'
                )
            );

        }
        else {

            $id = $this->task->get_task_new_id();

            $task = array(
                'id'     => $id,
                'name'   => $name,
                'email'  => $email,
                'text'   => $text,
                'status' => 0,
            );

            unset( $_POST['name'] );
            unset( $_POST['email'] );
            unset( $_POST['text'] );

            $this->task->add_task( $task );

            $this->view->generate(
                'main_view.php',
                'template_view.php'
            );

            redirect();

        }

    }

    public function ajax_change_status() {

        $response = array(
            'result' => FALSE,
        );

        $task_id = get_value( $_POST, 'task_id', FALSE );
        $status  = get_value( $_POST, 'status', FALSE );

        if( $task_id != FALSE && $status != FALSE ) {
            $response['result'] = $this->change_status($task_id, $status);
        }

        return json_encode( $response );
        exit;
    }


}