<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Landpreparation
 *
 * @author test
 */
class Landprepare  extends MY_Controller{
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
    
    public function index() {
        $this->data['landtypes'] = $this->app_model->landtypes();
        $this->data['crops'] = $this->app_model->crops();
        $this->data['landcrops'] = $this->app_model->landcrops(); 
        $this->load->vars($this->data);
        $this->load->view('expert/landcrops');
    }
    
    public function preparestages( $land = NULL) {
        $this->data['key'] = $land;
        $this->data['landprepares'] = $this->app_model->landprepares($land); 
        $this->data['landprepare'] = $this->app_model->landprepare($land); 
        $this->load->vars($this->data);
        $this->load->view('expert/landcrop_preparation');
    }
    
    public function detailsstage( $land = NULL) {
        $this->data['key'] = $land;
        $this->data['landprepare'] = $this->app_model->landprepare($land); 
        $this->load->vars($this->data);
        $this->load->view('expert/landprepare_details');
    }
    
    public function addstage() {
        $data = array('landprepare_landcrop' => $this->input->post('landcrop_id'),
                    'landprepare_stage' => $this->input->post('stage'),
            'landprepare_stagedetails' => $this->input->post('details'));
        if($this->system_model->addstage($data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
    }
    
     public function updatestage() {
         $key = $this->input->post('landprepare_id');
        $data = array('landprepare_stage' => $this->input->post('stage'),
            'landprepare_stagedetails' => $this->input->post('details'));
        if($this->system_model->updatelandprepare($key,$data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
    }
    
    public function deletelandprepare() {
        $key = $this->input->post('key');
        if($this->system_model->deletelandprepare($key)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
    
}
