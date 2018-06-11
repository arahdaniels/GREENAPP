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
class Agriculture extends MY_Controller{
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
           $this->data['fields'] = $this->client_model->client_fields($this->auth_user_id);
           $this->load->vars($this->data);
           $this->load->view('client/agriculture');
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
           $this->data['cityweatherinfo'] = $this->weather_library->loadCityInfo($this->data['field']->weather_city_location_serial);
           $this->data['wcond'] = $this->weather_library->loadCurrentConditions($this->data['field']->weather_city_location_serial);
           $this->data['wcast'] = $this->weather_library->loadForecasts($this->data['field']->weather_city_location_serial,$this->weather_library->forecastDays());
           $this->load->vars($this->data);
           $this->load->view('client/fielddetails');
        }
        public function registerfield() {
            $this->data['landtypes'] = $this->app_model->landtypes();
           $this->data['fields'] = $this->client_model->client_fields($this->auth_user_id);
           $this->data['units'] = $this->app_model->units();
           $this->load->vars($this->data);
           $this->load->view('client/fieldsregister');
        }
        
         public function fields() {
            $this->data['landtypes'] = $this->app_model->landtypes();
           $this->data['fields'] = $this->client_model->client_fields($this->auth_user_id);
           $this->data['units'] = $this->app_model->units();
           $this->load->vars($this->data);
           $this->load->view('client/fields');
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
         public function manageshops()
	{   
             // Method should not be directly accessible
		if( $this->uri->uri_string() == 'client/market/manageshops')
			show_404();
           $this->load->view('client/agriculture');
	}
}
