<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_modal
 *
 * @author SoftwareTZ
 */
class Corporate_model extends MY_Model {
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function company_types() {
        return $this->db->get(config_item('company_types_table'))->result_array();
    }
    
    public function users_corporate($key) {  
        $this->db->select('*, COUNT(`corporate`) as clients');
        $this->db->where('company_key',$key);
        $this->db->join(config_item('company_types_table'),config_item('company_types_table').'.btype_id='.config_item('companies_table').'.company_type','both');
        $this->db->join(config_item('user_table').' as us','us.user_id='.config_item('companies_table').'.company_person','left');
        $this->db->group_by('company_id');
        $sql = $this->db->get(config_item('companies_table'));
        return ($sql->num_rows()>0)? $sql->row() : TRUE;
    } 
     
    public function clients() {  
        $this->db->select('*');
        $this->db->join(config_item('user_table').' as u','u.corporate='.config_item('companies_table').'.company_key','both');
        $sql = $this->db->get(config_item('companies_table'));
        return ($sql->num_rows()>0)? $sql->result_array() : TRUE;
    }
    
    public function users_corporates() {  
        $this->db->select('*, COUNT(`corporate`) as clients');
        $this->db->join(config_item('company_types_table'),config_item('company_types_table').'.btype_id='.config_item('companies_table').'.company_type','both');
        $this->db->join(config_item('user_table').' as u','u.corporate='.config_item('companies_table').'.company_key','left');
        $this->db->group_by('company_id');
        $sql = $this->db->get(config_item('companies_table'));
        return ($sql->num_rows()>0)? $sql->result_array() : TRUE;
    }
    
    public function branches() {  
        $this->db->select('*, COUNT(`user_id`) as clients');
        $this->db->join(config_item('users_branches_table').' as ub','ub.branch_key='.config_item('branches_table').'.branch_key','both');
        $sql = $this->db->get(config_item('branches_table'));
        return ($sql->num_rows()>0)? $sql->result_array() : TRUE;
    }
    
}
