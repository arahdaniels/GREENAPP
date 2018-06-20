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
class Clients  extends MY_Controller{
    
    public $pagedata;
     
    public function __construct() {
        parent::__construct();
        ( $this->require_role('corporate'));
         
         $this->load->helper('corporate');
         $this->load->model(['corporate_model'=>'modal']);
         
         $this->pagedata['link1'] = 'clients';
    }
    
    public function index()
	{   
           $this->pagedata['link2'] = 'overview';
           $this->pagedata['clients'] = $this->modal->clients();
           $this->load->vars($this->pagedata);
           $this->load->view('corporate/clients',$this->pagedata);
	}
}
