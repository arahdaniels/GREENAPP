<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of App_library
 *
 * @author canwo
 */
class App_library {
    //put your code here
   
   protected  $app;
   
   var $viewPath;
   
   public function __construct() {
       $this->app =& get_instance();
      $this->app->load->library('user_agent');
        
        if ($this->app->agent->is_mobile()):
             $this->viewPath = 'mobile';
             else:
              $this->viewPath = 'standard';
               endif;
   }
}
