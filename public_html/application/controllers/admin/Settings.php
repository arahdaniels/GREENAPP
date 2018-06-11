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
class Settings extends MY_Controller {
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
        $this->data['localization'] = $this->system_model->localizations();
        $this->data['cities'] = $this->app_model->weather_cities();
        $this->data['currency'] = $this->system_model->currencies();
        $this->load->vars($this->data);
        $this->load->view('admin/profile_settings');
    }
    
    public function profile(){
        if( $this->uri->uri_string() == 'admin/settings/profile'){
			show_404();
        }
        $this->data['localization'] = $this->system_model->localizations();
        $this->data['cities'] = $this->app_model->weather_cities();
        $this->data['currency'] = $this->system_model->currencies();
        $this->load->vars($this->data);
        $this->load->view('admin/profile_settings');
    }
    
    public function settingadd(){
        if( $this->uri->uri_string() == 'admin/settings/settingadd'){
			show_404();
        }
        
       if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           $flag = $this->input->post('settings');
               switch ($flag) {
                   case 'addunit':
                       $this->addunit();
                       break;
                   case 'modifyunit':
                       $this->modifyunit();
                       break;
                   case 'deleteunit':
                       $this->deleteunit();
                       break;
                   default:
                       print 'Fail';
                       break;
               }
         }
    }
    
    public function appu(){
        if( $this->uri->uri_string() == 'admin/settings/appu'){
			show_404();
        }
        $this->data['localization'] = $this->system_model->localizations();
        $this->data['cities'] = $this->app_model->weather_cities();
        $this->data['currency'] = $this->system_model->currencies();
        $this->data['unit'] = $this->app_model->units();
        $this->load->vars($this->data);
        $this->load->view('admin/system_settings');
    }
    
    public function update(){
        if( $this->uri->uri_string() == 'admin/settings/update'){
			show_404();
        }
        
        $this->load->helper('auth');
        $this->load->model('app/app_model');
        $this->load->model('app/validation_callables');
        $this->load->library('form_validation');
          
        if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           
            $key = $this->input->post('modifier');
            $type = $this->input->post('types');
          
                
             if($type === 'about'){
                 $data = array('about' => trim($this->input->post('about')));
                if($this->system_model->profile_update($this->auth_user_id,$data)){
                    print 'Success';
                       return;
                }else{
                 print 'Fail';
                       return;
                }
             }  
          
            if($type === 'personal'){
               $data = array('firstname' => trim($this->input->post('firstname')),
                          'middlename' => trim($this->input->post('middlename')),
                         'lastname' => trim($this->input->post('lastname')));
               
                   if($this->system_model->profile_update($key,$data)){
                        print 'Success';
                       return;
                 }else{
                       print 'Fail';
                       return;                     
                    }
            }            
            
         if($this->authentication->check_passwd($this->system_model->get_password($this->auth_user_id), $this->input->post('oldpassword'))){
            
            if($type === 'recovery'){
               $mobile = str_replace('-', '',trim($this->input->post('mobile')));
               $mobile = str_replace(' ','',$mobile);
               $data = array('mobile' => $mobile,
                          'email' => trim($this->input->post('email')));
                      
                   if($this->system_model->profile_update($key,$data)){
                        print 'Success';
                       return;
                     }else{
                          print 'Fail';
                       return;                     
                    }  
            }
           
            if($type === 'login'){
                $data = array('passwd' => $this->input->post('passwd'),
                             'confirmpasswd' => $this->input->post('confirmpasswd'));             
                
                $this->form_validation->set_data( $data );
                    
                    $validation_rules = [
			
			[
				'field' => 'passwd',
				'label' => 'passwd',
				'rules' => [
					'trim',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'The password field is required.'
				]
			],
                        [
				'field'  => 'confirmpasswd',
				'label'  => 'Confirm Password',
				'rules'  => 'required|matches[passwd]',
				'errors' => [
					'is_unique' => 'Passwords do not match.'
				]
			]
		];

	     $this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{                     
                     unset($data['confirmpasswd']);
                     
                     $data['passwd'] = $this->authentication->hash_passwd($data['passwd']);
                     
                    if($this->system_model->profile_update($key,$data)){
                             print 'Success';
                            return;
                       }else{
                         print 'Fail';
                       return;                     
                    }
                    
                } else {
                print 'Form data error';
                       return;
             }              
               
            }
            
             }else{
              if($this->input->post('require_password') === 'requirepassword' ){
                print 'Wrong password';
                       return; 
                 }                 
            }             
          }     
    }
    
    public function updatesystem(){
        if( $this->uri->uri_string() == 'admin/settings/update'){
			show_404();
        }
        
        $this->load->helper('auth');
        $this->load->model('app/app_model');
        $this->load->model('app/validation_callables');
        $this->load->library('form_validation');
          
        if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           
            $key = $this->input->post('modifier');
            $type = $this->input->post('types');
               
            if($type === 'localization'){
               $data = array(
                          'localization' => trim($this->input->post('localization')),
                          'default_city' => trim($this->input->post('default_city')));
                         
                   if($this->system_model->profile_update($key,$data)){
                       print 'Success';
                       return;
                 }else{
                          print 'fail';
                       return;                     
                    }  
            }
           
            if($type === 'currency'){
               $data = array('default_currency' => trim($this->input->post('default_currency')));
                         
                   if($this->system_model->profile_update($key,$data)){
                       print 'Success';
                       return;
                 }else{
                          print 'Fail';
                       return;                      
                    }  
            }
                         
          }     
    }
    
    private function addunit() {
        $data = array('unit_name' => $this->input->post('unit_name'),
                             'unit_symbol' => $this->input->post('unit_symbol'),
                             'unit_symbol_position' => $this->input->post('unit_symbol_position'));
                         if($this->system_model->addunit($data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
               }
    
    private function deleteunit() {
        $key = $this->input->post('unit_id');
        if($this->system_model->deleteunit($key)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
    
    private function modifyunit() {
        $key = $this->input->post('unit_id');
        $data = array('unit_name' => $this->input->post('unit_name'),
                             'unit_symbol' => $this->input->post('unit_symbol'),
                             'unit_symbol_position' => $this->input->post('unit_symbol_position'));
                         if($this->system_model->modifyunit($key,$data)){
                             print 'Success';
                         }else{
                             print 'Fail';
                            }
                     return;
    }
}
