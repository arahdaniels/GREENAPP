<?php 

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of App
 *
 * @author canwo
 */
class App {
    //put your code here
    
 
    public  $apps;
     
    public function __construct() {
        $this->apps =& get_instance();
    }

    public function profiledata() {        
      $this->apps->load->model('system_model');
      $profile['profile'] = $this->apps->system_model->profiledata($this->apps->auth_user_id);      
      $profile['localization'] = $this->apps->system_model->localizations();   
      $this->apps->load->vars($profile);
    }
    
    public function loadlanguages(){
         
      //Load language files
        if(! empty($this->apps->session->userdata('language'))){
            $lang = $this->apps->session->userdata('language');
          }else{
            $lang = $this->apps->auth_language;
        }
      $data['language_id'] = $this->apps->system_model->language_data($lang)->localization_id;
      $this->apps->config->set_item( 'language_id', $data['language_id']);
      $this->apps->load->vars($data);
      $this->apps->lang->load($this->apps->config->item('languages'),$lang);
    }
    
    public function autoconfig() {
    
    }
}
