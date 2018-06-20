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
    
    public $pagedata;
     
    public function __construct() {
        parent::__construct();
        ( $this->require_role('corporate'));
         
         $this->load->helper('corporate');
         
         $this->pagedata['link1'] = 'dashboard';
    }
    
    public function index()
	{   
           $this->pagedata['link2'] = 'overview';
           $this->load->vars($this->pagedata);
           $this->load->view('corporate/dashboard',$this->pagedata);
	}
}
