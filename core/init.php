<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.09.2015
 * Time: 4:31 PM
 */
session_start();
date_default_timezone_set( 'Europe/Moscow' );

$GLOBALS[ 'config' ] = [
    'mysql' => [
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => 'mysql',
        'db' => 'login_sys'
    ],
    'remember' => [
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ],
    'session' => [
        'session_name' => 'user',
        'token_name' => 'token'
    ]
];

spl_autoload_register( function( $class )
{
    require_once 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';

if( Cookie::exists( Config::get( 'remember/cookie_name' ) ) && ! Session::exists( Config::get( 'session/session_name' ) ) )
{
    $hash = Cookie::get( Config::get( 'remember/cookie_name' ) );
    $hashCheck = DB::getInstance()->get( 'users_session', [ 'hash', '=', $hash ] );

    if( $hashCheck->count() )
    {
        $user = new User( $hashCheck->first()->user_id );
        $user->login();
    }
}