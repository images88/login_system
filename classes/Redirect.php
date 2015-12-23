<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.09.2015
 * Time: 4:28 PM
 */
class Redirect
{
    public static function to( $location = null )
    {
        if( $location )
        {
            if( is_numeric( $location ) )
            {
                switch( $location )
                {
                    case 404:
                        header( 'HTTP/1.0 404 Not Found' );
                        include 'includes/errors/404.php';
                        exit();
                        break;
                }
            }

            header( 'Location: ' . $location);
            exit();
        }
    }
}