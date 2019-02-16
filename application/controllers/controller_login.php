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

                redirect();

            }
            else {

                $this->view->generate(
                    'main_view.php',
                    'template_view.php',
                    array(
                        'error_login' => 'failed_login'
                    )
                );

            }

        }
        else {

            $this->view->generate(
                'main_view.php',
                'template_view.php',
                array(
                    'error_login' => 'wrong_data'
                )
            );

        }

    }

    function action_exit() {

        unset( $_SESSION['user_id'] );
        redirect();

    }

}