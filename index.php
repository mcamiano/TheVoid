<?php

require_once 'bootstrap.php';

try
{
    // Find the user using the user id
    $user = Sentry::findUserByID(1);

    // Get the permissions
    $grouppermissions = $user->getMergedPermissions();
}
catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
{
  header('Location: group.create.php');
}


?>
<form action='login.php' method="POST">
  Email: <input type='text' name='email'>
  Password: <input type='password' name='password'>
  <input type='submit' value='submit'>
</form>

HTML index file
