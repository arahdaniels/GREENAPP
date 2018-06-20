<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author SoftwareTZ
 */
class Users extends MY_Controller {
    //put your code here    
    public $data;
    
    public function __construct() {
        parent::__construct();
        
        ($this->require_role('admin'));         
                //Load helpes
        
            $this->load->helper(['form','admin']);
            $this->load->library(['admin_library'=>'library']);
            $this->load->model(['admin_model'=>'model']);
            $this->data['page'] = 'users';        
    } 
     
    public function index() { 
        
    } 
    public function corpoedit($key=NULL) {
        if(strtolower($this->input->server('REQUEST_METHOD')) == 'post'):
            $this->data['action'] = TRUE;
            if($this->library->update_corporate_validation()):
                if($this->library->update_user_corporate($key)):
                        $this->library->register_user_status('success','User updated successifully');
                    else:
                        $this->library->register_user_status('fail','Failed to update user');
                endif;
            else:
                $this->library->register_user_status('fail',validation_errors());
            endif;
        endif;
        $this->data['company_types'] = $this->model->company_types();
        $this->data['corporate'] = $this->model->users_corporate($key);
        $this->load->vars($this->data);
        $this->load->view('admin/users_corporate_update');
    } 
    
    public function corpoview($key=NULL) {
        $this->data['company_types'] = $this->model->company_types();
        $this->data['corporate'] = $this->model->users_corporate($key);
        $this->load->vars($this->data);
        $this->load->view('admin/users_corporate_details');
    } 
    
    public function corporegister() {
        if(strtolower($this->input->server('REQUEST_METHOD')) == 'post'):
            $this->data['action'] = TRUE;
            if($this->library->register_corporate_validation()):
                if($this->library->register_user_corporate()):
                        $this->library->register_user_status('success','User registered successifully');
                    else:
                        $this->library->register_user_status('fail','Failed to register user');
                endif;
            else:
                $this->library->register_user_status('fail',validation_errors());
            endif;
        endif;
        $this->data['company_types'] = $this->model->company_types();
        $this->data['corporates'] = $this->model->users_corporates();
        $this->load->vars($this->data);
        $this->load->view('admin/users_corporate_register');
    }
    
    public function corporates() {
        $this->data['corporates'] = $this->model->users_corporates();
        $this->load->vars($this->data);
        $this->load->view('admin/users_corporates');
    }
    
    
}
