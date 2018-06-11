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
class Weather  extends MY_Controller{
   
     protected $pagedata;
     
    public function __construct() {
        parent::__construct();
        if( ! $this->require_role('admin') ){
             redirect('app/logout');
         }
         
         $this->load->helper(array('admin','form'));
         
         $this->load->model(array('system_model'));
         /*
           * Weather data
          */
         $weatherdata['weather'] = $this->system_model->weather_profile_data($this->auth_user_id);
         $weatherdata['cities'] = $this->app_model->weather_cities(); 
         $weatherdata['localization'] = $this->system_model->localizations(); 
         
         /*
          * Load weather data to views
          */
         
         $this->load->vars($weatherdata);
         
         $this->pagedata =array('page' => 'weather');
    }
    
    public function index() 
	{   
        
           $this->load->view('admin/dashboard',$this->pagedata);
	}
     
     public function locations($param = NULL)   {
         if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           $data = array('weather_city_location_city' => $this->input->post('city_serial'),
                         'weather_city_location_name' => $this->input->post('location_name'),
                         'weather_city_location_serial' => $this->input->post('location_serial'));
           if($this->system_model->addcitylocation($data)){
                             print 'Success';
                              }else{
                             print 'Fail';
                            }
             
         }
         
         $this->data['locations'] = $this->app_model->weather_city_locations($param);
         $this->data['city'] = $this->app_model->weather_city($param);
         $this->load->vars($this->data);
         $this->load->view('admin/weather_city_locations');
     }
     
    public function modifycitylocation() {
        $key = $this->input->post('location_id');
        $data = array( 'weather_city_location_name' => $this->input->post('location_name'),
                         'weather_city_location_serial' => $this->input->post('location_serial'));
                         if($this->system_model->modifycitylocation($key,$data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
   
    public function deletecitylocation() {
        $key = $this->input->post('location_id');
        if($this->system_model->deletecitylocation($key)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
    
     public function managecities() 
	{   
           if( $this->uri->uri_string() == 'admin/weather/managecities')
			show_404();
           
          if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           
            $type = $this->input->post('types');
    
                $this->load->helper('auth');
                $this->load->model('app/validation_callables');
                $this->load->library('form_validation');
         
            if($type === 'addcity'){
                $data = array('city_name' => $this->input->post('city_name'),
                             'city_code' => $this->input->post('city_code'),
                            'city_locale' => $this->input->post('city_locale'),
                             'city_serial' => $this->input->post('city_serial'));             
                
                $this->form_validation->set_data( $data );
                    
                    $validation_rules = [
			
			[
				'field' => 'city_name',
				'label' => 'City name',
				'rules' => [
					'trim',
					'required',
                                        'is_unique[weather_cities.city_name]'
				],
				'errors' => [
					'required' => 'The city name field is required.'
				]
			],
                       [
				'field' => 'city_code',
				'label' => 'City code',
				'rules' => [
					'trim',
					'required',
                                        'is_unique[weather_cities.city_code]'
				],
				'errors' => [
					'required' => 'The city code field is required.'
				]
			]
		];

	      $this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{                     
                    
                    if($this->system_model->weather_add_city($data)){
                             $this->data['success'] = TRUE;
                             $this->data['successmessage'] = 'Successifully';
                             // update cities foe views
                             $weatherdata['cities'] = $this->app_model->weather_cities(); 
                             $this->load->vars($weatherdata);
                       }else{
                          $this->data['failed'] = TRUE;
                          $this->data['failedmessage'] = 'Failed';                      
                    }
                    
                } else {
                
               $this->data['failed'] = TRUE;
               $this->data['failedmessage'] = validation_errors();  
             }              
               
            }
          
            
          }         
         
           $this->load->view('admin/managecities',$this->pagedata);
	}
        
    public function deletecity() {
            if( $this->uri->uri_string() == 'admin/weather/deletecity')
			show_404();
           
            $key = $this->input->post('key');
            $status = $this->system_model->delete_city($key);
            if($status){
                print 'success';
                }else{
                print 'failed';
            }
        }
    
     public function citymodify($key = NULL) {
         
            if( $this->uri->uri_string() == 'admin/weather/citymodify')
			show_404();
            
           $weatherdata['cities'] = $this->app_model->weather_cities(); 
           $weatherdata['city']= $this->app_model->weather_city($key);
              
            if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           
            $keys = $this->input->post('types');
    
                $this->load->helper('auth');
                $this->load->model('app/validation_callables');
                $this->load->library('form_validation');
                
                $data = array('city_name' => $this->input->post('city_name'),
                             'city_code' => $this->input->post('city_code'),
                               'city_locale' => $this->input->post('city_locale'),
                             'city_serial' => $this->input->post('city_serial'));             
                
                $this->form_validation->set_data( $data );
                    
                    $validation_rules = [
			
			[
				'field' => 'city_name',
				'label' => 'City name',
				'rules' => [
					'trim',
					'required'
				],
				'errors' => [
					'required' => 'The city name field is required.'
				]
			],
                       [
				'field' => 'city_code',
				'label' => 'City code',
				'rules' => [
					'trim',
					'required'
				],
				'errors' => [
					'required' => 'The city code field is required.'
				]
			]
		];

	      $this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{   
                    if($this->system_model->weather_modify_city($keys,$data)){
                             $weatherdata['updatesuccessifully'] = TRUE;
                             $weatherdata['updatemessage'] = 'You have successifully updated <br/> City Details';
                             // update cities foe views
                             $weatherdata['cities'] = $this->app_model->weather_cities(); 
                             $this->pagedata['city']= $this->app_model->weather_city($data['city_serial']);
                       }else{
                          $weatherdata['updatefailed'] = TRUE;
                          $weatherdata['updatemessage'] = 'City details not updated';                      
                    }
                    
                } else {
                
               $this->data['failed'] = TRUE;
               $this->data['failedmessage'] = validation_errors();  
             }     
          }         else{
         
              $weatherdata['cities'] = $this->app_model->weather_cities(); 
              $weatherdata['city']= $this->app_model->weather_city($key);
          }
           $this->load->vars($weatherdata);
           $this->load->view('admin/citymodify',$this->pagedata);
        }
}
