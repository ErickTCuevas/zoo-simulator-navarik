<?php

/**
 * View Class 
 *
 * It handles and renders templates
 *
 * @author Erick T Cuevas
 */
class View
{
    /**
     * This method loads a template.
     * 
     * @param string $template - name of the template (without '.php') in the template folder.
     * @param array $template_data - constains the data to render in the template
     *
     */
    public function render($template, $template_data){
        require_once( __DIR__.'/template/'.$template.'.php');
    }
}