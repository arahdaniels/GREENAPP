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
        
         if( ! $this->require_role('client') ){
             redirect('app/logout'); 
         } 
         
        //Load helpes
      $this->load->helper(array('form','client'));
      
        //Load model
        $this->load->model(array('client_model'));
        
      $vars['page'] = 'education';
      $this->load->vars($vars);
    }
    
    
    public function index()
	{   
            $edudata['videos'] = $this->client_model->edu_videos();
            $edudata['categories'] = $this->client_model->edu_categories();
            $this->load->vars($edudata);
           $this->load->view('client/education');
	}
        
     public function search()
	{   
         if( $this->uri->uri_string() == 'client/education/search')
			show_404();
           $this->load->view('client/education_results');
	}
    
    public function videodetails($key=NULL)
	{   
         if( $this->uri->uri_string() == 'client/education/videodetails')
			show_404();
         
         $edudata['categories'] = $this->client_model->edu_categories();
         $edudata['video'] = $this->client_model->edu_video($key);
         $this->load->vars($edudata); 
           $this->load->view('client/education_vdetails'); 
	}
    
    public function videos()
	{   
         if( $this->uri->uri_string() == 'client/education/videos')
			show_404();
            $edudata['videos'] = $this->client_model->edu_videos();
            $edudata['categories'] = $this->client_model->edu_categories();
            $this->load->vars($edudata);
           $this->load->view('client/education_videos'); 
	}
        
        public function categoryvideos($key=NULL)
	{   
         if( $this->uri->uri_string() == 'client/education/categoryvideos')
			show_404();
            $edudata['videos'] = $this->client_model->edu_category_videos($key);
            $edudata['categories'] = $this->client_model->edu_categories();
            $edudata['category'] = $this->client_model->edu_category($key);
            $this->load->vars($edudata);
           $this->load->view('client/education_category_videos'); 
	}
}
 