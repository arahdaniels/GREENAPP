<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_library
 *
 * @author SoftwareTZ
 */
class Admin_library {
    //put your code here
    
    private $app;
    
    public function __construct() {
        $this->app  =& get_instance();
        $this->app->load->model(['admin_model'=>'modal']);
    }
    
    public function register_user_corporate() {
        $person = [
            'firstname' => $this->app->input->post('firstname'),
            'lastname' => $this->app->input->post('lastname'),
            'email' => $this->app->input->post('email'),
            'mobile' => $this->app->input->post('mobile'),
            'username' => $this->app->input->post('username'),
            'passwd' => $this->app->authentication->hash_passwd($this->app->input->post('passwd'))
        ];
        
        $company = [
            'company_name' => $this->app->input->post('company_name'),
            'company_type' => $this->app->input->post('company_type'),
            'company_email' => $this->app->input->post('company_email'),
            'company_primary_address' => $this->app->input->post('company_primary_address'),
            'company_phone' => $this->app->input->post('company_phone'),
            'company_landphone' => $this->app->input->post('company_landphone'),
            'company_reg_number' => $this->app->input->post('company_reg_number'),
            'company_fax' => $this->app->input->post('company_fax'),
            'company_tin' => $this->app->input->post('company_tin'),
            'company_tax_clearence' => $this->app->input->post('company_tax_clearence'),
            'company_business_licence' => $this->app->input->post('company_business_licence')
        ];
        
        if($this->app->modal->register_user_corporate($person,$company)):
          return TRUE;
            else:
          return FALSE;
        endif;
    }
    
    public function update_user_corporate() {
        $person = [
            'firstname' => $this->app->input->post('firstname'),
            'lastname' => $this->app->input->post('lastname'),
        ];
        $p_key = $this->app->input->post('p_key',TRUE);
        $company = [
            'company_name' => $this->app->input->post('company_name'),
            'company_type' => $this->app->input->post('company_type'),
            'company_email' => $this->app->input->post('company_email'),
            'company_primary_address' => $this->app->input->post('company_primary_address'),
            'company_phone' => $this->app->input->post('company_phone'),
            'company_landphone' => $this->app->input->post('company_landphone'),
            'company_reg_number' => $this->app->input->post('company_reg_number'),
            'company_fax' => $this->app->input->post('company_fax'),
            'company_tin' => $this->app->input->post('company_tin'),
            'company_tax_clearence' => $this->app->input->post('company_tax_clearence'),
            'company_business_licence' => $this->app->input->post('company_business_licence')
        ];
        $c_key = $this->app->input->post('c_key',TRUE);
        if($this->app->modal->update_user_corporate($p_key,$person,$c_key,$company)):
          return TRUE;
            else:
          return FALSE;
        endif;
    }
    
    public function register_corporate_validation() {
        $this->app->load->model('validation_callables');
        $this->app->load->library('form_validation');
        $fields = array('name' => $this->app->input->post('name',TRUE),
                        'passwd' => $this->app->input->post('passwd',TRUE),
                        'mobile' => $this->app->input->post('mobile',TRUE),
                        'username' => $this->app->input->post('username',TRUE),
                        'company_name' => $this->app->input->post('company_name',TRUE),
                        'email' => $this->app->input->post('email',TRUE));
        
        $this->app->form_validation->set_data($fields);
        
                $rules = [ [
                                     'field' => 'passwd',
                                     'label' => 'Password',
                                     'rules' => [
                                             'trim',
                                             'required',
                                             [ 
                                                     '_check_password_strength', 
                                                     [$this->app->validation_callables, '_check_password_strength'] 
                                             ]
                                     ]
                             ],
                               [
                                        'field' => 'company_name',
                                        'label' => 'Company Name',
                                        'rules' => [
                                                'trim',
                                                'required'
                                        ]
                                ],
                                [
                                        'field' => 'mobile',
                                        'label' => 'Contact person mobile',
                                        'rules' => [
                                                'trim',
                                                'required',
                                                'is_unique['. config_item('user_table').'.mobile]'
                                        ]
                                ],
                               [
                                        'field' => 'email',
                                        'label' => 'Email',
                                        'rules' => [
                                                'trim',
                                                'required',
                                                'is_unique['. config_item('user_table').'.email]'
                                        ]
                                ],
                    [
                                        'field' => 'username',
                                        'label' => 'Username',
                                        'rules' => [
                                                'trim',
                                                'required',
                                                'is_unique['. config_item('user_table').'.username]'
                                        ]
                                ]
                            ];
        $this->app->form_validation->set_rules($rules);
        if( $this->app->form_validation->run()){
            return TRUE;
        }
    }
    
    public function update_corporate_validation() {
        $this->app->load->model('validation_callables');
        $this->app->load->library('form_validation');
        $fields = array('company_name' => $this->app->input->post('company_name',TRUE));
        
        $this->app->form_validation->set_data($fields);
        
                $rules = [ 
                               [
                                        'field' => 'company_name',
                                        'label' => 'Company Name',
                                        'rules' => [
                                                'trim',
                                                'required'
                                        ]
                                ]
                            ];
        $this->app->form_validation->set_rules($rules);
        if( $this->app->form_validation->run()){
            return TRUE;
        }
    }
    
    public function register_user_status($flag,$msg) {
        switch ($flag) {
            case 'success':
                $status['class'] = 'alert-success';
                $status['message'] = $msg;
                break;
            case 'fail':
                $status['class'] = 'alert-danger';
                $status['message'] = $msg;
                break;
            default:
                $status['class'] = 'alert-warning';
                $status['message'] = 'Was unable to perform specified task';
                break;
        }
        $this->app->load->vars($status);
    }
    
}
