<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 03.09.2015
 * Time: 4:24 PM
 */

require_once 'core/init.php';

if( !$username = Input::get( 'user' ) )
  Redirect::to( 'index.php' );
else
{
  $user = new User( $username );

  if( !$user->exists() )
    Redirect::to( 404 );
  else
  {
    $data = $user->data();
  }
?>
  <h3><?= escape( $data->username ) ?></h3>
  <p>Full Name: <?= escape( $data->name ) ?></p>
<?php
}