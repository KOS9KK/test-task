<?php

class Controller_Login extends Controller
{

    function action_index()
    {

        $user = ( isset( $_POST['user'] ) && strlen( $_POST['user'] ) >= 3 )
            ? strtolower( $_POST['user'] )
            : FALSE;

        $password = ( isset( $_POST['password'] ) && strlen( $_POST['password'] ) >= 3 )
            ? $_POST['password']
            : FALSE;

        if( $user != FALSE && $password != FALSE ) {

            if( $user == 'admin' && $password == '123' ) {
                $_SESSION['user_id'] = 1;
                $this->view->generate('success_login.php', 'template_view.php');
            }
            else {
                $this->view->generate('failed_login.php', 'template_view.php');
            }

        }
        else {
            $this->view->generate('wrong_data.php', 'template_view.php');
        }

    }
}