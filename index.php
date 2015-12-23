<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.09.2015
 * Time: 4:23 PM
 */

require_once 'core/init.php';

if( Session::exists( 'home' ) )
    echo '<p>' . Session::flash( 'home' ) . '</p>';

$user = new User();

?>

<? if ( $user->isLoggedIn() ) : ?>
    <p>Hello, <a href="profile.php?user=<?= escape( $user->data()->username ) ?>"><?= escape( $user->data()->username ) ?></a>!</p>

    <ul>
        <li><a href="logout.php">Log Out</a></li>
        <li><a href="update.php">Update profile</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
    </ul>

    <? if( $user->hasPermission( 'admin' ) ) : ?>
        <p>ADMIN</p>
    <? endif ?>

<? else : ?>
    <p>You need to <a href="login.php">login</a> or <a href="register.php">register</a>.</p>
<? endif ?>
<p>user: admin</p>
<p>pass: 123456</p>

Основные возможности, созданные в данном скрипте: <br><br>
<ul>
    <li>Простое разделение прав</li>
    <li>Атозагрузка классов</li>
    <li>Работа с куками, сесиями</li>
    <li>Класс БД с возможностью удобного обращиния к добавлению, получению и к другим операциям с данными</li>
    <li>Создание хэшов паролей</li>
    <li>Управление редиректом</li>
    <li>Реализация флеш-сообщений</li>
    <li>Генерация токинов для пользователей</li>
</ul>
