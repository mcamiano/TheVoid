<?php

require_once 'bootstrap.php';


function failbigtime($msg) {
  echo htmlspecialchars($msg);
  exit;
}

try
{
    if ('POST' != $_SERVER['REQUEST_METHOD']) throw new Exception('Login rejected because of invalid HTTP method.');

    // Login credentials
    $credentials = array(
        'email'    => $request->get('email'),
        'password' => $request->get('password')
    );

    // Authenticate the user
    $user = Sentry::authenticate($credentials, false);
}
catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
{
    failbigtime('Login field is required.');
}
catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
{
    failbigtime('Password field is required.');
}
catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
{
    failbigtime('Wrong password, try again.');
}
catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
{
    failbigtime('User was not found.');
}
catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
{
    failbigtime('User is not activated.');
}
// The following is only required if the throttling is enabled
catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
{
    failbigtime('User is suspended.');
}
catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
{
    failbigtime('User is banned.');
}

try
{
    // Find the user using the user id
    // $user = Sentry::findUserByID(1);

    // Get the user permissions
    $userpermissions = $user->getPermissions();

    echo "Authenticated\n";
    echo "User Permissions:\n";
    echo var_dump($userpermissions);

        // Get the user permissions
    $grouppermissions = $user->getMergedPermissions();
    echo "Group Permissions:\n";
    echo var_dump($grouppermissions);
}
catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
{
    echo 'User was not found.';
}

?>

