<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.09.2015
 * Time: 4:31 PM
 */

function escape( $string )
{
    return htmlentities( $string, ENT_QUOTES, 'UTF-8' );
}