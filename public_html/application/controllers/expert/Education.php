<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Education
 *
 * @author canwo
 */
class Education extends MY_Controller {
    //put your code here
    public function __construct() {
        
        parent::__construct();
        
         if( ! $this->require_role('expert') ){
             redirect('app/logout'); 
         } 
         
        //Load helpes
      $this->load->helper('form');
      $this->load->helper('expert');
      
      $vars['page'] = 'education';
      $this->load->vars($vars);
    }
    
    
    public function index()
	{   
        
            $edudata['types'] = $this->system_model->edu_types(); 
            $edudata['categories'] = $this->system_model->edu_categories(); 
            $this->load->vars($edudata);
          if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           
            $type = $this->input->post('types');
    
                $this->load->helper('auth');
                $this->load->model('app/validation_callables');
                $this->load->library('form_validation');
         
            if($type === 'addcategory'){
                $data = array('edu_category' => $this->input->post('edu_category'));             
                
                $this->form_validation->set_data( $data );
                    
                    $validation_rules = [
		
			[
				'field' => 'edu_category',
				'label' => 'Category',
				'rules' => [
					'trim',
					'required',
                                        'is_unique[edu_categories.edu_category]'
				],
				'errors' => [
					'required' => 'The city name field is required.'
				]
			]
		];

	$this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{                     
                    
        $data['edu_localization']= $this->input->post('localization');
                    if($this->system_model->add_educategory($data)){
                        print 'Success';
                        return;
                             $this->data['success'] = TRUE;
                             $this->data['successmessage'] = 'Successifully';
                             // update dta for views
                             $edudata['categories'] = $this->system_model->edu_categories(); 
                             $this->load->vars($edudata);
                       }else{
                            print 'Failed';
                            return;
                          $this->data['failed'] = TRUE;
                          $this->data['failedmessage'] = 'Failed';                      
                    }
                    
                } else {
                
               $this->data['failed'] = TRUE;
               $this->data['failedmessage'] = validation_errors();  
             }              
               
            }
          
            if($type === 'addtypes'){
                $data = array('edu_types' => $this->input->post('edu_type'),
                                'edu_types_category' => $this->input->post('edu_types_category'));             
                
                $this->form_validation->set_data( $data );
                    
                    $validation_rules = [
		
			[
				'field' => 'edu_types',
				'label' => 'Type',
				'rules' => [
					'trim',
					'required',
                                        'is_unique[edu_types.edu_types]'
				],
				'errors' => [
					'required' => 'The city name field is required.'
				]
			]
		];

	      $this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{                     
                    
        $data['type_localization']= $this->input->post('localization');
                    if($this->system_model->add_edutypes($data)){
                        print 'Success';
                        return;
                             $this->data['success'] = TRUE;
                             $this->data['successmessage'] = 'Successifully';
                             // update dta for views
                             $edudata['types'] = $this->system_model->edu_types(); 
                       }else{
                           print 'Failed';
                             return;
                          $this->data['failed'] = TRUE;
                          $this->data['failedmessage'] = 'Failed';                      
                    }
                    
                } else {
                
               $this->data['failed'] = TRUE;
               $this->data['failedmessage'] = validation_errors();  
               print_r(validation_errors());
               exit();
             }              
               
            }
            
          }         
         
          $this->load->vars($edudata);
           $this->load->view('expert/education');
	}
        
  public function deletecategory() {
            if( $this->uri->uri_string() == 'expert/education/deletecategory')
			show_404();
           
            $key = $this->input->post('key');
            $status = $this->system_model->delete_edu_category($key);
            if($status){
                print 'success';
                }else{
                print 'failed';
            }
        }
        
    public function deletetypes() {
            if( $this->uri->uri_string() == 'expert/education/deletetypes')
			show_404();
           
            $key = $this->input->post('key');
            $status = $this->system_model->delete_edu_types($key);
            if($status){
                print 'success';
                }else{
                print 'failed';
            }
        }
        
     public function categorymodify($key = NULL) {
         
            if( $this->uri->uri_string() == 'expert/education/categorymodify')
			show_404();
           
            if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           
            $keys = $this->input->post('udi');
    
                $this->load->helper('auth');
                $this->load->model('app/validation_callables');
                $this->load->library('form_validation');
                
                $data = array('edu_category' => $this->input->post('edu_category'));             
                
                $this->form_validation->set_data( $data );
                  $validation_rules = [
		
			[
				'field' => 'edu_category',
				'label' => 'Category',
				'rules' => [
					'trim',
					'required',
				],
				'errors' => [
					'required' => 'The category field is required.'
				]
			]
		];

	      $this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{   
                    if($this->system_model->modify_edu_category($keys,$data)){
                             $this->data['success'] = TRUE;
                             $this->data['successmessage'] = 'Successifully';
                             // update cities foe views
                       }else{
                          $this->data['failed'] = TRUE;
                          $this->data['failedmessage'] = 'Failed';                      
                    }
                    
                } else {
                
               $this->data['failed'] = TRUE;
               $this->data['failedmessage'] = validation_errors();  
             }     
          } 
                             $edudata['types'] = $this->system_model->edu_types(); 
                             $edudata['categories'] = $this->system_model->edu_categories(); 
                             $edudata['category'] = $this->system_model->edu_category($key); 
                             $this->load->vars($edudata);
          
           $this->load->view('expert/educategorymodify');
        }
    
        public function typemodify($key = NULL) {
         
            if( $this->uri->uri_string() == 'expert/education/typemodify')
			show_404();
           
            if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           
            $keys = $this->input->post('dui');
    
                $this->load->helper('auth');
                $this->load->model('app/validation_callables');
                $this->load->library('form_validation');
                
                $data = array('edu_types_category' => $this->input->post('edu_types_category'),
                            'edu_types' => $this->input->post('edu_type'));             
                
                $this->form_validation->set_data( $data );
                  $validation_rules = [
		
			[
				'field' => 'edu_types',
				'label' => 'Type',
				'rules' => [
					'trim',
					'required',
				],
				'errors' => [
					'required' => 'The Type field is required.'
				]
			]
		];

	      $this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{   
                    if($this->system_model->modify_edu_types($keys,$data)){
                             $this->data['success'] = TRUE;
                             $this->data['successmessage'] = 'Successifully';
                             // update cities foe views
                       }else{
                          $this->data['failed'] = TRUE;
                          $this->data['failedmessage'] = 'Failed';                      
                    }
                    
                } else {
                
               $this->data['failed'] = TRUE;
               $this->data['failedmessage'] = validation_errors();  
             }     
          } 
                             $edudata['types'] = $this->system_model->edu_types(); 
                             $edudata['categories'] = $this->system_model->edu_categories(); 
                             $edudata['type'] = $this->system_model->edu_type($key); 
                             $this->load->vars($edudata);
          
           $this->load->view('expert/edutypesmodify');
        }
     
        
    public function educategories($key = NULL) {
         
            if( $this->uri->uri_string() == 'expert/education/educategories')
			show_404();
             if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           
            $type = $this->input->post('types');
    
                $this->load->helper('auth');
                $this->load->model('app/validation_callables');
                $this->load->library('form_validation');
         
            if($type === 'addcategory'){
                $data = array('edu_category' => $this->input->post('edu_category'));             
                
                $this->form_validation->set_data( $data );
                    
                    $validation_rules = [
		
			[
				'field' => 'edu_category',
				'label' => 'Category',
				'rules' => [
					'trim',
					'required',
                                        'is_unique[edu_categories.edu_category]'
				],
				'errors' => [
					'required' => 'The city name field is required.'
				]
			]
		];

	      $this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{                     
                    
        $data['edu_localization']= $this->input->post('localization');
                    if($this->system_model->add_educategory($data)){
                             $this->data['success'] = TRUE;
                             $this->data['successmessage'] = 'Successifully';
                             // update dta for views
                             $edudata['categories'] = $this->system_model->edu_categories(); 
                             $this->load->vars($edudata);
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
                             $edudata['categories'] = $this->system_model->edu_categories(); 
                             $this->load->vars($edudata);
          
           $this->load->view('expert/educategories');
        }
      
    public function edutypes($key = NULL) {
         
            if( $this->uri->uri_string() == 'expert/education/educategories')
			show_404();
             if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           
            $type = $this->input->post('types');
    
                $this->load->helper('auth');
                $this->load->model('app/validation_callables');
                $this->load->library('form_validation');
         if($type === 'addtypes'){
                $data = array('edu_types' => $this->input->post('edu_type'),
                                'edu_types_category' => $this->input->post('edu_types_category'));             
                
                $this->form_validation->set_data( $data );
                    
                    $validation_rules = [
		
			[
				'field' => 'edu_types',
				'label' => 'Type',
				'rules' => [
					'trim',
					'required',
                                        'is_unique[edu_types.edu_types]'
				],
				'errors' => [
					'required' => 'The city name field is required.'
				]
			]
		];

	      $this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{                     
                    
        $data['type_localization']= $this->input->post('localization');
                    if($this->system_model->add_edutypes($data)){
                             $this->data['success'] = TRUE;
                             $this->data['successmessage'] = 'Successifully';
                             // update dta for views
                             $edudata['types'] = $this->system_model->edu_types(); 
                             $this->load->vars($edudata);
                       }else{
                          $this->data['failed'] = TRUE;
                          $this->data['failedmessage'] = 'Failed';                      
                    }
                    
                } else {
                
               $this->data['failed'] = TRUE;
               $this->data['failedmessage'] = validation_errors();  
               print_r(validation_errors());
               exit();
             }              
               
            }
            
            
          } 
                             $edudata['types'] = $this->system_model->edu_types(); 
                             $edudata['categories'] = $this->system_model->edu_categories(); 
                             $this->load->vars($edudata);
          
           $this->load->view('expert/edutypes');
        }
        
    public function search()
	{   
         if( $this->uri->uri_string() == 'expert/education/search')
			show_404();
           $this->load->view('expert/education_results');
	}
    
    public function videodetails($key=NULL)
	{   
         if( $this->uri->uri_string() == 'expert/education/videodetails')
			show_404();
          $edudata['video'] = $this->system_model->expert_edu_video($key); 
          $this->load->vars($edudata);
           $this->load->view('expert/education_vdetails'); 
	}
        
    public function eduvideos()
	{   
         if( $this->uri->uri_string() == 'expert/education/eduvideos'){
			show_404();
         }
           if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           
            $type = $this->input->post('types');
    
                $this->load->helper('auth');
                $this->load->model('app/validation_callables');
                $this->load->library('form_validation');
                
                $raw = explode('-', $this->input->post('edu_video_typecategory'));
                $category = $raw[0];
                $type = $raw[1];
                
                $raw1 = explode('-', $this->input->post('edu_videos_currency_locale'));
                $currency = $raw1[0];
                $locale = $raw1[1];
                if(empty($raw1[2])){
                    $rawfee = 0;
                    }else{
                     $rawfee = $raw1[2];
                }
                $fee = (1 / $rawfee) * $this->input->post('edu_videos_fee');
                
                $data = array('edu_video' => $this->input->post('edu_video'),
                    'edu_videos_url' => $this->input->post('edu_video_url'),
                                'edu_videos_category' => $category,
                                'edu_videos_type' => $type,
                                'edu_videos_details'=>$this->input->post('edu_videos_details'),
                                'edu_videos_mode' => $this->input->post('edu_videos_mode'),
                                'edu_videos_fee' => $fee,
                                'edu_videos_currency' => $currency,
                                'edu_videos_localization' =>  $this->input->post('localization'));       
                $this->form_validation->set_data( $data );
                    
                    $validation_rules = [
		
			[
				'field' => 'edu_video',
				'label' => 'Video',
				'rules' => [
					'trim',
					'required'
				],
				'errors' => [
					'required' => 'The city name field is required.'
				]
			]
		];

	      $this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{                     
                    
                    if($this->system_model->add_eduvideo($data)){
                             print 'Successifully';
                             return;
                       }else{
                          print 'Failed'; 
                          return;
                    }
                } 
          } 
            
           $edudata['videos'] = $this->system_model->expert_edu_videos(); 
           $edudata['types'] = $this->system_model->edu_types(); 
           $edudata['categories'] = $this->system_model->edu_categories(); 
           $edudata['currencies'] = $this->system_model->currencies(); 
           $this->load->vars($edudata);
           $this->load->view('expert/eduvideos'); 
	}
        
    public function videomodify($key=NULL)
	{   
         if( $this->uri->uri_string() == 'expert/education/videomodify')
			show_404();
         
            $edudata['video'] = $this->system_model->expert_edu_video($key); 
           if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
           
    
                $this->load->helper('auth');
                $this->load->model('app/validation_callables');
                $this->load->library('form_validation');
                
                $raw = explode('-', $this->input->post('edu_video_typecategory'));
                $category = $raw[0];
                $type = $raw[1];
                
                $raw1 = explode('-', $this->input->post('edu_videos_currency_locale'));
                $currency = $raw1[0];
                $locale = $raw1[1];
                
                $data = array('edu_video' => $this->input->post('edu_video'),
                                'edu_videos_url' => $this->input->post('edu_video_url'),
                                'edu_videos_category' => $category,
                                'edu_videos_type' => $type,
                                'edu_videos_details'=>$this->input->post('edu_videos_details'),
                                'edu_videos_mode' => $this->input->post('edu_videos_mode'),
                                'edu_videos_fee' => $this->input->post('edu_videos_fee'),
                                'edu_videos_currency' => $currency,
                                'edu_videos_localization' =>  $locale);       
                $this->form_validation->set_data( $data );
                    
                    $validation_rules = [
		
			[
				'field' => 'edu_video',
				'label' => 'Video',
				'rules' => [
					'trim',
					'required'
				],
				'errors' => [
					'required' => 'The city name field is required.'
				]
			]
		];

	      $this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{                     
                    
                    if($this->system_model->modify_eduvideo($key,$data)){
                        $edudata['video'] = $this->system_model->expert_edu_video($key); 
                             $this->data['success'] = TRUE;
                             $this->data['successmessage'] = 'Successifully';
                       }else{
                          $this->data['failed'] = TRUE;
                          $this->data['failedmessage'] = 'Failed';                      
                    }
                } 
          }     
         
            
            $edudata['videos'] = $this->system_model->expert_edu_videos(); 
            $edudata['types'] = $this->system_model->edu_types(); 
            $edudata['categories'] = $this->system_model->edu_categories(); 
            $edudata['currencies'] = $this->system_model->currencies(); 
            $this->load->vars($edudata);
           $this->load->view('expert/eduvideosmodify'); 
	}
        
     public function deletevideo() {
            if( $this->uri->uri_string() == 'expert/education/deletevideo')
			show_404();
           
            $key = $this->input->post('key');
            $status = $this->system_model->delete_edu_video($key);
            if($status){
                print 'success';
                }else{
                print 'failed';
            }
        }
}
 