<?php

namespace SolutionMvc\Healthsafety\Controller;

use SolutionMvc\Core\Controller;

class homeController extends Controller{
    
    public function indexAction(){
         echo $this->twig->render("HealthSafety/index.html.twig", array(
        ));
    }
    
}
