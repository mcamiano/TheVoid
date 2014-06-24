<?php

require_once 'bootstrap.php';

try
{
    // Create the user
    $admin = Sentry::createUser(array(
        'email'     => 'admin@ncsu.edu',
        'password'  => 'secret',
        'activated' => true,
    ));

    // Find the group using the group id
    $adminGroup = Sentry::findGroupById(1);

    // Assign the group to the user
    $admin->addGroup($adminGroup);

    $user = Sentry::createUser(array(
        'email'     => 'user@ncsu.edu',
        'password'  => 'secret',
        'activated' => true,
    ));

    // Find the group using the group id
    $userGroup = Sentry::findGroupById(2);

    // Assign the group to the user
    $user->addGroup($userGroup);
}
catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
{
    echo 'Login field is required.';
}
catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
{
    echo 'Password field is required.';
}
catch (Cartalyst\Sentry\Users\UserExistsException $e)
{
    echo 'User with this login already exists.';
}
catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
{
    echo 'Group was not found.';
}

header('Location: index.php');
