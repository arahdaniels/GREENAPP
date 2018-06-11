<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Weather
 *
 * @author canwo
 */
class Weather extends MY_Controller {
    //put your code here
       public function __construct() {
        parent::__construct();
         if( ! $this->require_role('client') ){
             redirect('app/logout');
         }
         
           //Force https
      $this->force_ssl();
      
        
      //Load helpes
      $this->load->helper(array('form','client'));
      
        //Load model
        $this->load->model(array('client_model'));
        
      $vars['page'] = 'weather';
      $this->load->vars($vars);
    }  
    
     public function index()
	{   
           $this->load->view('client/waether');
	}  
}
 