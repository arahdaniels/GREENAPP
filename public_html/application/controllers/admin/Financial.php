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
class Financial extends MY_Controller {
    //put your code here
    public function __construct() {
        
        parent::__construct();
        
         if( ! $this->require_role('admin') ){
             redirect('app/logout'); 
         } 
         
        //Load helpes
      $this->load->helper('form');
      $this->load->helper('admin');
      
      $vars['page'] = 'financial';
      $this->load->vars($vars);
    }
    
    
    public function index()
	{   
          $edudata['currencies'] = $this->system_model->currencies(); 
          $edudata['localization'] = $this->system_model->localization(); 
            $this->load->vars($edudata);
          if( strtolower($this->input->server('REQUEST_METHOD')) == 'post'){ 
      
                $this->load->helper('auth');
                $this->load->model('app/validation_callables');
                $this->load->library('form_validation');
    
                $data = array('currency' => $this->input->post('currency'),
                                'currency_symbol' => $this->input->post('currency_symbol'),
                    'currency_localization' => $this->input->post('currency_localization'),
                            'currency_cunit' => $this->input->post('currency_cunit'),
                        'currency_symbol_position' => $this->input->post('currency_symbol_position'));             
                
                $this->form_validation->set_data( $data );
                    
                    $validation_rules = [
		
			[
				'field' => 'currency',
				'label' => 'Currency',
				'rules' => [
					'trim',
					'required'
				],
				'errors' => [
					'required' => 'The Currency field is required.'
				]
			]
		];
 
	      $this->form_validation->set_rules( $validation_rules );
             if( $this->form_validation->run() )
		{                     
                    
                    if($this->system_model->add_currency($data)){
                             $this->data['success'] = TRUE;
                             $this->data['successmessage'] = 'Successifully';
                             // update data for views
                             $edudata['currencies'] = $this->system_model->currencies(); 
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
           $this->load->view('admin/financial');
	}
        
  public function deletecurrency()
          {
            if( $this->uri->uri_string() == 'admin/financial/deletecurrency')
			show_404();
           
            $key = $this->input->post('key');
            $status = $this->system_model->delete_currency($key);
            if($status){
                print 'success';
                }else{
                print 'failed';
            }
        }
   
  public function categorymodify($key = NULL) {
         
            if( $this->uri->uri_string() == 'admin/education/categorymodify')
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
          
           $this->load->view('admin/currencymodify');
        }

}
 