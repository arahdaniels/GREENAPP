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
class Fertilizers extends MY_Controller {
    //put your code here
      public function __construct() {
        
        parent::__construct();
        
         if( ! $this->require_role('expert') ){
             redirect('app/logout'); 
         } 
         
        //Load helpes
      $this->load->helper('form');
      $this->load->helper('expert');
      
      $vars['page'] = 'settings';
      $this->load->vars($vars); 
    }
   
    public function index(){
        $this->data['fertilizers'] = $this->app_model->fertilizers();
        $this->load->vars($this->data);
        $this->load->view('expert/fertilizers');
    }
    
    public function addfertilizer(){
      
        if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
            $data = array('fertilizer' => $this->input->post('fertilizer'));
                       if($this->system_model->addfertilizer($data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
        }
    }

    
    public function deletefertilizer() {
        $key = $this->input->post('fertilizer_id');
        if($this->system_model->deletefertilizer($key)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
    
    public function modifyfertilizer() {
        $key = $this->input->post('fertilizer_id');
        $data = array('fertilizer' => $this->input->post('fertilizer'));
                         if($this->system_model->modifyfertilizer($key,$data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
}
