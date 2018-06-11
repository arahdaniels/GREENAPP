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
        if( ! $this->require_role('admin') ){
             redirect('app/logout');
         }
         
         $this->load->helper('admin');
         
         $this->pagedata =array('page' => 'dashboard');
    }
    
    public function index()
	{   
           $this->load->view('admin/dashboard',$this->pagedata);
	}
}
