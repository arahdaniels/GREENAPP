<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 

/**
 * Description of Settings
 *
 * @author test
 */
class Crops extends MY_Controller {
    //put your code here
      public function __construct() {
        
        parent::__construct();
        
         if( ! $this->require_role('admin') ){
             redirect('app/logout'); 
         } 
         
        //Load helpes
      $this->load->helper('form');
      $this->load->helper('admin');
      
      $vars['page'] = 'settings';
      $this->load->vars($vars); 
    }
   
    public function index(){
        $this->data['crops'] = $this->app_model->crops();
        $this->load->vars($this->data);
        $this->load->view('admin/crops');
    }
    
    public function addcrop(){
        if( $this->uri->uri_string() == 'admin/crops/addtypeland'){
			show_404();
        }
        if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
            $data = array('crop' => $this->input->post('crop'));
                         if($this->system_model->addcrop($data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
        }
    }

    
    public function deletecrop() {
        $key = $this->input->post('crop_id');
        if($this->system_model->deletecrop($key)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
    
    public function modifycrop() {
        $key = $this->input->post('crop_id');
        $data = array('crop' => $this->input->post('crop'));
                         if($this->system_model->modifycrop($key,$data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
}
