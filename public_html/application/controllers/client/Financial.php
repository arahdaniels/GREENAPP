<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Market
 *
 * @author canwo
 */
class Financial extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
         if( ! $this->require_role('client') ){
             redirect('app/logout');
         }
         
           //Force https
      $this->force_ssl();
      
      //Load helpes
      //Load helpes
      $this->load->helper(array('form','client'));
      
        //Load model
        $this->load->model(array('client_model'));
        
      $vars['page'] = 'profile';
      $this->load->vars($vars);
    }
    
    public function index()
	{   
           $this->load->view('client/financial');
	} 
        
}
