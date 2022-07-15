<?php

/**
 * MVC App - Simple Zoo Simulator
 * 
 * @package Simple Zoo Simulator 
 *
 * @author Erick T Cuevas
 */

// Load classes
require_once('./app/boot.php');

// Parse URI & Data
$route = $_GET['route'];
$request = $_GET['data'];

// Load and route request
$router = new Router();
$router->route($route,$request);