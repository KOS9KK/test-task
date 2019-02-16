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

    public function action_ajax_change_value() {

        $response = array(
            'result' => FALSE,
        );

        $task_id = get_value( $_POST, 'task_id', FALSE );
        $field   = get_value( $_POST, 'field', FALSE );
        $value   = get_value( $_POST, 'value', FALSE );

        if( $task_id != FALSE && $field != FALSE && $value != FALSE ) {
            $response['result'] = $this->task->change_value_by_id( $task_id, $field, $value );
        }

        echo json_encode( $response );
    }

}