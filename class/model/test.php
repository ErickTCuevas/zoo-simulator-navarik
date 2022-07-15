<?php

die( __DIR__);


// Model
require_once('Animal.php');
require_once('AnimalStatus.php');
require_once('Elephant.php');
require_once('Monkey.php');
require_once('Giraffe.php');
require_once('Zoo.php');
// Data handler
require_once('Data.php');
// Helper
require_once('RandomGenerator.php');
// Controller
require_once('Sim.php');
// View
require_once('View.php');

$action = $_GET['action'];
$request = $_GET['data'];

// Router
switch($action){
    case 'FEED':
        // Load controller
        $sim = new SimController();
        $sim->feedZoo($request);
        break;
    case 'PASS':
        $sim = new SimController();
        $sim->provokePassTimeZoo($request);
        break;
    default:
        $sim = new SimController();
        $sim->openZoo();
        break;
}


