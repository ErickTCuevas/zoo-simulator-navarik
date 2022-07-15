<?php

/**
 * SimController Class 
 *
 * It handles interaction with the zoo.
 *
 * @author Erick T Cuevas
 */
class SimController
{
    protected $request;
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * This method feeds the animals of the zoo.
     * 
     * @param string $request - contains the encoded data 
     *
     */
    public function feedZoo($request){
        // TODO - validate request
        // Feed animals
        $zoo = new Zoo();
        $zoo_updated_data = $zoo->feedAnimals($request);
        $zoo_updated_data['feed_uri']='FEED';
        $zoo_updated_data['pass_time_uri']='PASS';
        // Render view
        $this->view->render('homepage', $zoo_updated_data);
    }

    /**
     * This method initialize the zoo.
     * 
     * @param string $request - contains the encoded data 
     *
     */
    public function openZoo(){
        // TODO - Validate Request
        // Open zoo
        $zoo = new Zoo();
        $zoo_updated_data = $zoo->init();
        $zoo_updated_data['feed_uri']='FEED';
        $zoo_updated_data['pass_time_uri']='PASS';
        // Render view
        $this->view->render('homepage', $zoo_updated_data);
    }

    /**
     * This method provokes to pass time in the zoo.
     * 
     * @param string $request - contains the encoded data 
     *
     */
    public function provokePassTimeZoo($request){
        // TODO - Validate Request
        // Open zoo
        $zoo = new Zoo();
        $zoo_updated_data = $zoo->passTime($request);
        $zoo_updated_data['feed_uri']='FEED';
        $zoo_updated_data['pass_time_uri']='PASS';
        // Render view
        $this->view->render('homepage', $zoo_updated_data);
    }
}