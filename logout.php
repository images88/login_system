<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.09.2015
 * Time: 4:24 PM
 */

require 'core/init.php';

$user = new User();
$user->logout();

Redirect::to( 'index.php' );