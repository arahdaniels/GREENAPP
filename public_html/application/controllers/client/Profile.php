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



class Profile  extends MY_Controller{
 
    public function __construct() {
        
        parent::__construct();
        
        if( ! $this->require_role('client') ){
             redirect('app/logout'); 
         } 
       
       //Load helpes
      $this->load->helper(array('form','client'));
      
        //Load model
        $this->load->model(array('client_model'));
        
      $vars['page'] = 'profile';
      $this->load->vars($vars);
  
     
    }
     
   public function index()
	{   
           $this->load->view('client/profile_overview');
	} 
        
        
    public function overview()
	{   
           $this->load->view('client/profile_overview');
	} 
        
    public function settings()
	{    
        
        if( $this->uri->uri_string() == 'client/profile/settings'){
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
                 $this->system_model->client_profile_update($this->auth_user_id,$data);
             }  
               
            if($type === 'localization'){
               $data = array(
                          'localization' => trim($this->input->post('localization')),
                   'default_city' => trim($this->input->post('default_city')));
                         
                   if($this->client_model->profile_update($key,$data)){
                        $this->data['profile'] = $this->client_model->profile_data($key);
                        $this->data['updatesuccessifully'] = TRUE;
                        $this->data['updatemessage'] = 'You have successifully updated <br/> Localization Details';
                 }else{
                          $this->data['updatefailed'] = TRUE;
                          $this->data['updatemessage'] = 'Failed to update Recovery details';                      
                    }  
            }
           
             if($type === 'currency'){
               $data = array('default_currency' => trim($this->input->post('default_currency')));
                         
                   if($this->client_model->profile_update($key,$data)){
                        $this->data['profile'] = $this->client_model->profile_data($key);
                        $this->data['updatesuccessifully'] = TRUE;
                        $this->data['updatemessage'] = 'You have successifully updated <br/> Currency Details';
                 }else{
                          $this->data['updatefailed'] = TRUE;
                          $this->data['updatemessage'] = 'Failed to update Recovery details';                      
                    }  
            }
            
         if(
                 $this->authentication->check_passwd($this->system_model->get_password($this->auth_user_id), $this->input->post('oldpassword'))
                 ){
                          
            if($type === 'personal'){
               $data = array('firstname' => trim($this->input->post('firstname')),
                          'middlename' => trim($this->input->post('middlename')),
                         'lastname' => trim($this->input->post('lastname')));
               
                   if($this->system_model->client_profile_update($key,$data)){
                        $this->profile = $this->system_model->client_profile($this->auth_user_id);
                        $this->data['profile'] = $this->profile;
                        $this->data['updatesuccessifully'] = TRUE;
                        $this->data['updatemessage'] = 'You have successifully updated <br/> Personal Details';
                 }else{
                          $this->data['updatefailed'] = TRUE;
                          $this->data['updatemessage'] = 'Failed to update Personal details';                      
                    }
            }
            
            if($type === 'recovery'){
               $mobile = str_replace('-', '',trim($this->input->post('mobile')));
               $mobile = str_replace(' ','',$mobile);
               $data = array('mobile' => $mobile,
                          'email' => trim($this->input->post('email')));
                      
                   if($this->system_model->client_profile_update($key,$data)){
                        $this->profile = $this->system_model->client_profile($this->auth_user_id);
                        $this->data['profile'] = $this->profile;
                        $this->data['updatesuccessifully'] = TRUE;
                        $this->data['updatemessage'] = 'You have successifully updated <br/> Recovery Details';
                 }else{
                          $this->data['updatefailed'] = TRUE;
                          $this->data['updatemessage'] = 'Failed to update Recovery details';                      
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
                     
                    if($this->system_model->client_profile_update($key,$data)){
                             $this->data['updatesuccessifully'] = TRUE;
                             $this->data['updatemessage'] = 'You have successifully updated <br/> Login Details';
                       }else{
                          $this->data['updatefailed'] = TRUE;
                          $this->data['updatemessage'] = 'Failed to update Login details';                      
                    }
                    
                } else {
                
               $this->data['updatefailed'] = TRUE;
               $this->data['updatemessage'] = 'Form data error';  
             }              
               
            }
            
             }else{
              if($this->input->post('require_password') === 'requirepassword' ){
                $this->data['updatefailed'] = TRUE;
                $this->data['updatemessage'] = 'Invalid Password';   
                 }                 
            } 
            
          }         
          $this->data['localization'] = $this->client_model->localizations();
          $this->data['cities'] = $this->client_model->weather_cities();
          $this->data['currency'] = $this->client_model->currencies();
          $this->load->vars($this->data);
          $this->load->view('client/profile_settings');
	}
}
