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
class Profile  extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        if( ! $this->require_role('admin') ){
             redirect('app/logout');
         }
    }
    
    public function index()
	{   
           $this->load->view('manmage/profile');
	}
}
