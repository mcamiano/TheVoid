<?php

// Include the composer autoload file
include_once "vendor/autoload.php";

date_default_timezone_set('America/New_York');

// Import the necessary classes
use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\HttpFoundation\Request;

if (empty($_SERVER['HTTPS'])) {
  header('Status-Code: 301');
  header('Location: https!://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']).($_SERVER['QUERY_STRING'] ?  '?' . $_SERVER['QUERY_STRING'] : '');
}

// Create the Sentry alias
class_alias('Cartalyst\Sentry\Facades\Native\Sentry', 'Sentry');

// Create a new Database connection
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'TEST_db',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);

$capsule->bootEloquent();

$request = Request::createFromGlobals();


