<?php

function classAutoloader( $className ){

    $path = '../classes/';
    $extension = '.class.php';
    $fullPath = $path . $className . $extension;

    if( !file_exists( $fullPath ) ){
        return false;
    }

    include_once $fullPath;


}

spl_autoload_register( 'classAutoloader');