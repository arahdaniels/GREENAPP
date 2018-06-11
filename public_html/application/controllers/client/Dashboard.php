<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profile
 *
 * @author canwo
 */
class Dashboard  extends MY_Controller{
    
    protected $pagedata;
    
    public function __construct() {
        parent::__construct();
        if( ! $this->require_role('client') ){
             redirect('app/logout');
         }
         
       $this->pagedata =array('page' => 'dashboard');
       $this->load->library('app_library');
    }
    
    public function index()
	{   
           $this->load->view($this->app_library->viewPath.'/client/dashboard',$this->pagedata);
	}
}
