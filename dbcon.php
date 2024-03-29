<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$factory = (new Factory)
    ->withServiceAccount('contacts-4d840-firebase-adminsdk-ia938-d8f3e9cb1b.json')
    ->withDatabaseUri('https://contacts-4d840-default-rtdb.firebaseio.com/');
    
$database = $factory->createDatabase();
$auth = $factory->createAuth();

?>