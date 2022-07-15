<?php

/**
 * Router for the MVC.
 *
 * It handles the route and loads the controller
 *
 * @author Erick T Cuevas
 */
class Router
{
    /**
     * This method loads the controller
     * 
     * @param string $route - contains the URI to route 
     * @param string $request - contains the serialized and enconded data ( See class model/Data ) 
     *
     */
   public function route($route,$request){
    switch($route){
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
   } 
}