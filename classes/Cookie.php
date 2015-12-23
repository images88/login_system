<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.09.2015
 * Time: 4:26 PM
 */
class Cookie
{
    public static function exists( $name )
    {
        return ( isset( $_COOKIE[ $name ] ) ) ? true : false;
    }

    public static function get( $name )
    {
        return $_COOKIE[ $name ];
    }

    public static function put( $name, $value, $expiry )
    {
        if( setcookie( $name, $value, time() + $expiry, '/' ) )
        {
            return true;
        }

        return false;
    }

    public static function delete( $name )
    {
        self::put( $name, '', time() - 1 );
    }
}