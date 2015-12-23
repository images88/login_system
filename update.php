<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.09.2015
 * Time: 4:24 PM
 */

require_once 'core/init.php';

$user = new User();

if( ! $user->isLoggedIn() )
{
    Redirect::to( 'index.php' );
}

if ( Input::exists() )
{
    if ( Token::check( Input::get( 'token' ) ) )
    {
        $validate = new Validate();
        $validation = $validate->check( $_POST, [
            'name' => [
                'required' => true,
                'min' => 2,
                'max' => 50
            ]
        ] );

        if ( $validation->passed() )
        {
            try
            {
                $user->update( [
                    'name' => Input::get( 'name' )
                ] );

                Session::flash( 'home', 'Your profile has been updated' );
                Redirect::to( 'index.php' );
            }
            catch ( Exception $e )
            {
                die( $e->getMessage() );
            }
        } else
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
        <label for="name">Name</label> <input type="text" name="name" value="<?= escape( $user->data()->name ) ?>">

        <input type="hidden" name="token" value="<?= Token::generate() ?>">
        <input type="submit" value="Update">
    </div>
</form>
