<?php

require_once 'bootstrap.php';

try
{
    // Create another group
    $group = Sentry::createGroup(array(
        'name'        => 'admin',
        'permissions' => array(
            'admin' => 1,
            'user.all' => 1,
        ),
    ));
    // Create the group
    $group = Sentry::createGroup(array(
        'name'        => 'user',
        'permissions' => array(
            'admin' => 0,
            'user.all' => 1,
        ),
    ));
}
catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
{
    echo 'Name field is required';
}
catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
{
    echo 'Group already exists';
}

header('Location: user.create.php');
