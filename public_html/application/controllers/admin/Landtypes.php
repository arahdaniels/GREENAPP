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
class Landtypes extends MY_Controller {
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
        $this->data['landtypes'] = $this->app_model->landtypes();
        $this->load->vars($this->data);
        $this->load->view('admin/landtypes');
    } 
    public function modification($key = NULL) {
        $this->data['key'] = $key;
        $this->data['stages'] = $this->app_model->landcrop_stages($key);
        $this->data['cstages'] = $this->app_model->landcrop_cstages($key);
        $this->data['landtypes'] = $this->app_model->landtypes();
        $this->data['crops'] = $this->app_model->crops();
        $this->data['landcrop'] = $this->app_model->landcrop($key);
        $this->data['landcrops'] = $this->app_model->landcrops();
        $this->load->vars($this->data);
        $this->load->view('admin/landcrop_modification');
    }
    
    public function prepare($key = NULL) {
        $this->data['key'] = $key;
        $this->data['landprepares'] = $this->app_model->landprepares($key); 
        $this->data['stages'] = $this->app_model->landcrop_stages($key);
        $this->data['landprepare'] = $this->app_model->landprepare($key); 
        $this->data['landcrop'] = $this->app_model->landcrop($key);
        $this->load->vars($this->data);
        $this->load->view('admin/landcrop_preparation');
    }
    
    public function landcrop_cultivation($key = NULL) {
        $this->data['key'] = $key;
        $this->data['cstages'] = $this->app_model->landcrop_cstages($key);
        $this->data['landcrop'] = $this->app_model->landcrop($key);
        $this->data['cultivations'] = $this->app_model->landcrop_cultivations($key);
        $this->data['fertilizers'] = $this->app_model->fertilizers();
        $this->load->vars($this->data);
        $this->load->view('admin/landcrop_cultivation');
    }
    
     public function landcutivationdetails( $landcrop = NULL,$cultivate = NULL) {
        $this->data['landcrop'] = $landcrop;
        $this->data['cultivate'] = $cultivate;
        $this->data['cstages'] = $this->app_model->landcrop_cstages($landcrop);
        $this->data['landcrop'] = $this->app_model->landcrop($landcrop);
        $this->data['cultivations'] = $this->app_model->landcrop_cultivations($landcrop);
        $this->data['details'] = $this->app_model->landcrop_cultivation($cultivate);
        $this->data['fertilizers'] = $this->app_model->fertilizers();
        $this->load->vars($this->data);
        $this->load->view('admin/landcrop_cultivation_details');
    }
    
       public function detailsstage( $key = NULL,$key2 = NULL) {
        $this->data['key'] = $key2;
        $this->data['key2'] = $key;
        $this->data['landcrop'] = $this->app_model->landcrop($key);
        $this->data['landprepare'] = $this->app_model->landprepare($key2); 
        $this->load->vars($this->data);
        $this->load->view('admin/landprepare_details');
    }
    
    public function landcrops(){
        $this->data['landtypes'] = $this->app_model->landtypes();
        $this->data['crops'] = $this->app_model->crops();
        $this->data['landcrops'] = $this->app_model->landcrops();
        $this->load->vars($this->data);
        $this->load->view('admin/landcrops');
    }
    
 
    
    public function applyfert(){
        $this->data['landtypes'] = $this->app_model->landtypes();
        $this->data['crops'] = $this->app_model->crops();
        $this->data['landcrops'] = $this->app_model->landcrops(); 
        $this->load->vars($this->data);
        $this->load->view('admin/landcrops');
    }
    
    public function stagesland(){
        $this->data['landtypes'] = $this->app_model->landtypes();
        $this->data['crops'] = $this->app_model->crops();
        $this->data['landcrops'] = $this->app_model->landcrops(); 
        $this->load->vars($this->data);
        $this->load->view('admin/landcrops');
    }
    
     public function updatelandcrop() {
        $id = $this->input->post('landcrops_id');
        $data = array('landcrops_land' => $this->input->post('landcrops_land'),
                      'landcrops_crop' => $this->input->post('landcrops_crop'),
                        'cultivation_stages' => $this->input->post('cultivation_stages'),
                        'preparation_stages' => $this->input->post('preparation_stages'));
                         if($this->system_model->modifylandcrops($id,$data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
    
    public function addlandcrop(){
     
      if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
            $data = array('landcrops_land' => $this->input->post('landcrops_land'),
                           'landcrops_crop' => $this->input->post('landcrops_crop'),
                'cultivation_stages' => $this->input->post('cultivation_stages'),
                        'preparation_stages' => $this->input->post('preparation_stages'));
                         if($this->system_model->addlandcrop($data)){
                             print 'Success';
                              }else{
                             print 'Fail';
                            }
            }
    }
    
     public function addcultivationstage(){
     
      if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
         
        if($this->input->post('fertilizer') == 'NULL'){
              $fertilizer  = NULL;
              $apply_fertilizer = NULL;
              $fertilizerdetails = NULL;
            }else{
              $fertilizer = $this->input->post('fertilizer');
              $apply_fertilizer = $this->input->post('apply_fertilizer');
              $fertilizerdetails = $this->input->post('fertilizer_details');
          }
            $data = array(
                'landcultivation_landcrop' => $this->input->post('landcrop_id'),
                'landcultivation_stage' => $this->input->post('stage'),
                'landcultivation_stagedetails' => $this->input->post('details'),
                'landcultivation_fertilizer' => $fertilizer,
                'landcultivation_applyfertilizer' => $apply_fertilizer,
                'landcultivation_fertilizerdetails' => $fertilizerdetails);
                         
                         if($this->system_model->addlandcultivation($data)){
                             print 'Success';
                              }else{
                             print 'Fail';
                            }
            }
    }
    
    public function modifycultivationstage(){
     
      if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
          if($this->input->post('fertilizer') == 'NULL'){
              $fertilizer  = NULL;
              $apply_fertilizer = NULL;
              $fertilizerdetails = NULL;
          }else{
              $fertilizer = $this->input->post('fertilizer');
              $apply_fertilizer = $this->input->post('apply_fertilizer');
              $fertilizerdetails = $this->input->post('fertilizer_details');
          }
          $key = $this->input->post('landcropcultivate_id');
            $data = array(
                'landcultivation_stage' => $this->input->post('stage'),
                'landcultivation_stagedetails' => $this->input->post('details'),
                'landcultivation_fertilizer' => $fertilizer,
                'landcultivation_applyfertilizer' => $apply_fertilizer,
                'landcultivation_fertilizerdetails' => $fertilizerdetails);
                         if($this->system_model->modifycultivationstage($key,$data)){
                             print 'Success';
                              }else{
                             print 'Fail';
                            }
            }
    }
    
    public function addtypeland(){
        if( $this->uri->uri_string() == 'admin/landtypes/addtypeland'){
			show_404();
        }
        if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
            $data = array('landtype' => $this->input->post('landtype'));
                         if($this->system_model->addlandtype($data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
        }
    }

    
    public function deletecultivation() {
        $key = $this->input->post('key');
        if($this->system_model->deletelandcultivation($key)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
    
    public function deletelandtype() {
        $key = $this->input->post('landtype_id');
        if($this->system_model->deletelandtype($key)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
    
    public function modifylandtype() {
        $key = $this->input->post('landtype_id');
        $data = array('landtype' => $this->input->post('landtype'));
                         if($this->system_model->modifylandtype($key,$data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
    
    public function deletelandcrop() {
        $key = $this->input->post('landcrops_id');
        if($this->system_model->deletelandcrop($key)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
}
