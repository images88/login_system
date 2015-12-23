<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.09.2015
 * Time: 4:29 PM
 */
class Token
{
    public static function generate()
    {
        return Session::put( Config::get( 'session/token_name' ), md5( uniqid() ) );
    }

    public static function check( $token )
    {
        $tokenName = Config::get( 'session/token_name' );

        if( Session::exists( $tokenName )  && $token === Session::get( $tokenName ) )
        {
            Session::delete( $tokenName );

            return true;
        }

        return false;
    }
}