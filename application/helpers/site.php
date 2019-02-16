<?php

function get_value( $array, $key, $default = '' ) {

    $value = ( isset( $array[ $key ] ) )
        ? $array[ $key ]
        : $default;

    return $value;

}

function show( $array = array() ) {

    echo '<pre>';
    print_r( $array );
    echo '</pre>';

}

function show_error( $data, $key ) {

    $error = '';

    if( get_value( $data, $key, FALSE ) != FALSE ) :
        $error = '<span>' . get_value( $data, $key ) . '</span>';
    endif;

    return $error;
}

function redirect( $page = '/' ) {

    $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    header('Location:' . $host . $page );
    exit();

}

function url() {

    $url = 'http://' . $_SERVER['HTTP_HOST'];

    return $url;

}