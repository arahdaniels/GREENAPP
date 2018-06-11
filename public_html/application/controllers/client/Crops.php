<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Market
 *
 * @author canwo
 */
class Crops extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
         if( ! $this->require_role('client') ){
             redirect('app/logout');
         }
         
           //Force https
      $this->force_ssl();
      
       //Load helpes
      $this->load->helper(array('form','client'));
      
      $this->load->library(array('weather_library'));
      
        //Load model
        $this->load->model(array('client_model'));
        $this->load->model(array('app_model'));
        
      $vars['page'] = 'agriculture';
      $this->load->vars($vars);
    }
    
   
         public function index()
	{   
           $this->data['landtypes'] = $this->app_model->landtypes();
           $this->data['fields'] = $this->client_model->client_fields($this->auth_user_id);
           //$this->data['wcond'] = $this->weather_library->loadCurrentConditions(1);
           $this->data['fieldCrops'] = $this->client_model->clientFieldCrops($this->auth_user_id);
           $this->data['units'] = $this->app_model->units();
           $this->load->vars($this->data);
           $this->load->view('client/crops');
	}
        
        public function registar() {
           $this->data['landtypes'] = $this->app_model->landtypes();
           $this->data['fields'] = $this->client_model->client_fields($this->auth_user_id);
           $this->data['fieldCrops'] = $this->client_model->clientFieldCrops($this->auth_user_id);
           $this->load->vars($this->data);
           $this->load->view('client/cropsregister');
        }
        
        public function cropinfo($crop) {
           $cropInfo = $this->client_model->clientFieldCrop($crop,$this->auth_user_id);
           $this->data['cropInfo'] = $cropInfo;
           $this->data['wcond'] = $this->weather_library->loadCurrentConditions($cropInfo->weather_city_location_serial);
           $this->data['wcast'] = $this->weather_library->loadForecasts($cropInfo->weather_city_location_serial,$this->weather_library->forecastDays());
           $this->data['cityweatherinfo'] = $this->weather_library->loadCityInfo($cropInfo->weather_city_location_serial);
           $this->data['fields'] = $this->client_model->client_fields($this->auth_user_id);
           $this->data['fieldCrops'] = $this->client_model->clientFieldCrops($this->auth_user_id);
           $this->load->vars($this->data);
           $this->load->view('client/cropdetails');
        }
        
         public function cropvarieties($crop) {
           $cropInfo = $this->client_model->clientFieldCrop($crop,$this->auth_user_id);
           $this->data['cropInfo'] = $cropInfo;
           $this->data['link'] = 'varieties';
           $this->data['varieties'] = $this->client_model->clientCropVarieties($crop,$this->auth_user_id);
           $this->data['wcond'] = $this->weather_library->loadCurrentConditions($cropInfo->weather_city_location_serial);
           $this->data['wcast'] = $this->weather_library->loadForecasts($cropInfo->weather_city_location_serial,$this->weather_library->forecastDays());
           $this->data['cityweatherinfo'] = $this->weather_library->loadCityInfo($cropInfo->weather_city_location_serial);
           $this->data['fields'] = $this->client_model->client_fields($this->auth_user_id);
           $this->data['fieldCrops'] = $this->client_model->clientFieldCrops($this->auth_user_id);
           $this->load->vars($this->data);
           $this->load->view('client/cropvarieties');
        }
        
        public function modifyfield($key=NULL) {
           $this->data['landtypes'] = $this->app_model->landtypes();
           $this->data['fields'] = $this->client_model->client_fields($this->auth_user_id);
           $this->data['field'] = $this->client_model->client_field($this->auth_user_id,$key);
           $this->data['units'] = $this->app_model->units();
           $this->load->vars($this->data);
           $this->load->view('client/fieldmodify');
        }
        
         public function detailsfield($key=NULL) {
           $this->data['fields'] = $this->client_model->client_fields($this->auth_user_id);
           $this->data['field'] = $this->client_model->client_field($this->auth_user_id,$key);
           $this->data['wcond'] = $this->weather_library->loadCurrentConditions($this->data['field']->weather_city_location_serial);
           $this->data['wcast'] = $this->weather_library->loadForecasts($this->data['field']->weather_city_location_serial,$this->weather_library->forecastDays());
           $this->load->vars($this->data);
           $this->load->view('client/fielddetails');
        }
        
         public function fields() {
            $this->data['landtypes'] = $this->app_model->landtypes();
           $this->data['fields'] = $this->client_model->client_fields($this->auth_user_id);
           $this->data['units'] = $this->app_model->units();
           $this->load->vars($this->data);
           $this->load->view('client/fields');
        }
        
         public function deletecropvariety() {
            if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
                $key = $this->input->post('variety_id');
                 if($this->client_model->deletecropvariety($key)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
            }
        }
        
        public function modifycropvariety() {
            if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
                $key = $this->input->post('variety_id');
                $data = array('variety_name' => $this->input->post('variety_name'));
                 if($this->client_model->modifycropvariety($key,$data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
            }
        }
        
        public function deletefieldcrop() {
            if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
                $key = $this->input->post('field_crop_id');
                 if($this->client_model->deletefieldcrop($key)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
            }
        }
        
         public function deletefield() {
            if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
                $key = $this->input->post('field_id');
                 if($this->client_model->deletefield($key)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
            }
        }
        
        public function modifyfieldaction() {
            if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
                $key = $this->input->post('field_id');
                $data =array(
                  'field_account'  => $this->auth_user_id,
                  'field_name' => $this->input->post('feild_name'),
                    'field_area' => $this->input->post('field_area'),
                    'field_unit' => $this->input->post('field_unit'),
                    'field_cadastralplot' => $this->input->post('field_cadastralplot'),
                    'field_landtype' => $this->input->post('field_landtype'),
                    'field_ownership' => $this->input->post('field_ownership'),
                    'field_country' => $this->input->post('field_country'),
                    'field_city' => $this->input->post('field_city'),
                    'field_location' => $this->input->post('field_location')
                );
                 if($this->client_model->modifyfield($key,$data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
            }
        }
        public function addfield() {
            if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
                $data =array(
                  'field_account'  => $this->auth_user_id,
                  'field_name' => $this->input->post('feild_name'),
                    'field_area' => $this->input->post('field_area'),
                    'field_unit' => $this->input->post('field_unit'),
                    'field_cadastralplot' => $this->input->post('field_cadastralplot'),
                    'field_landtype' => $this->input->post('field_landtype'),
                    'field_ownership' => $this->input->post('field_ownership'),
                    'field_country' => $this->input->post('field_country'),
                    'field_city' => $this->input->post('field_city'),
                    'field_location' => $this->input->post('field_location')
                );
                 if($this->client_model->addfield($data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
            }
        }
        
        public function addcrop() {
            if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
                $data =array(
                  'field_crop_account'  => $this->auth_user_id,
                  'field_crop_crop' => $this->input->post('field_crop_crop'),
                  'field_crop_field' => $this->input->post('field_crop_field'),
                  'field_crop_area' => $this->input->post('field_crop_area')
                );
                 if($this->client_model->addFieldCrop($data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
            }
        }
        
        public function addvariety() {
            if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
                $data =array(
                  'variety_account'  => $this->auth_user_id,
                  'variety_name' => $this->input->post('variety_name'),
                  'variety_fieldcrop' => $this->input->post('variety_fieldcrop')
                );
                 if($this->client_model->addCropVariety($data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
            }
        }
         public function manageshops()
	{   
             // Method should not be directly accessible
		if( $this->uri->uri_string() == 'client/market/manageshops')
			show_404();
           $this->load->view('client/agriculture');
	}
}
