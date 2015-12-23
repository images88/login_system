<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.09.2015
 * Time: 4:26 PM
 */
class Config
{
    public static function get( $path = null )
    {
        if( $path )
        {
            $config = $GLOBALS[ 'config' ];
            $path = explode( '/', $path );

            foreach ( $path as $bit )
            {
                if( isset( $config[ $bit ] ) )
                    $config = $config[ $bit ];
            }

            return $config;
        }

        return false;
    }
}