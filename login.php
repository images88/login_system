<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.09.2015
 * Time: 4:24 PM
 */

require_once 'core/init.php';

if( Input::exists() )
{
    if( Token::check( Input::get( 'token' ) ) )
    {
        $validate = new Validate();
        $validation = $validate->check( $_POST, [
            'username' => [
                'required' => true
            ],
            'password' => [
                'required' => true
            ],
        ]);

        if( $validation->passed() )
        {
            $user = new User();

            $remember = ( Input::get( 'remember' ) === 'on' ) ? true : false;
            $login = $user->login(  Input::get( 'username' ), Input::get( 'password' ), $remember );

            if( $login )
            {
                Redirect::to( 'index.php' );
            }
            else
            {
                echo 'Login error';
            }
        }
        else
        {
            foreach ( $validation->errors() as $error )
            {
                echo $error, '<br>';
            }
        }
    }
}
?>

<form action="" method="post">
    <div class="field">
        <label for="username">Username</label> <input type="text" name="username" id="username" autocomplete="off">
    </div>

    <div class="field">
        <label for="password">Password</label> <input type="password" name="password" id="password" autocomplete="off">
    </div>

    <div class="field">
        <label for="remember">Remember me</label> <input type="checkbox" name="remember" id="remember">
    </div>

    <input type="hidden" name="token" value="<?= Token::generate() ?>">
    <input type="submit" value="Login">
</form>
