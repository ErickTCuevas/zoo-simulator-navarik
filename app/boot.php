<?php

/**
 * Boot the MVC app.
 *
 * Loads all the classes needed by the MVC app
 *
 * @author Erick T Cuevas
 */
// Router
require_once('router.php');  
// Model
require_once(__DIR__.'/../class/model/Animal.php');
require_once(__DIR__.'/../class/model/AnimalStatus.php');
require_once(__DIR__.'/../class/model/Elephant.php');
require_once(__DIR__.'/../class/model/Monkey.php');
require_once(__DIR__.'/../class/model/Giraffe.php');
require_once(__DIR__.'/../class/model/Zoo.php');
// Data handler
require_once(__DIR__.'/../class/model/Data.php');
// Helper
require_once(__DIR__.'/../class/helper/RandomGenerator.php');
// Controller
require_once(__DIR__.'/../class/controller/Sim.php');
// View
require_once(__DIR__.'/../class/view/View.php');