<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Education
 *
 * @author canwo
 */

class Home extends MY_Controller {
    
//put your code here
    
    public function __construct() {
        
    parent::__construct();
           //Force https
      $this->force_ssl();
      
      //Load helpes
      $this->load->helper('form');
                
      //Load model
      $this->load->model(array('system_model'));
      
      //Load libraries
      $this->load->library(array('app_library','system_library'));
      
      //Load language files
      if(! empty($this->session->userdata('language'))){
            $lang = $this->session->userdata('language');
          }else{
            $lang = 'english';
        }
        
      $this->lang->load($this->config->item('languages'),$lang);
      $vars['auth_locale'] = $lang;
      $this->auth_language = FALSE;
      $vars['page'] = 'home';
      $this->load->vars($vars);
      
    }    
    
    public function index()
	{   $pagedata['is_loggen'] = $this->verify_min_level(1);
            $this->load->vars($pagedata);
            $this->load->view('greenapp');
	}

   }
 