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
class Market extends MY_Controller{
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
        
      $vars['page'] = 'market';
      $this->load->vars($vars);
    }
    
   
         public function index()
	{   
           $this->load->view('client/market');
	}
        
         public function manageshops()
	{   
             // Method should not be directly accessible
		if( $this->uri->uri_string() == 'client/market/manageshops')
			show_404();
           $this->load->view('client/manageshops');
	}
}
