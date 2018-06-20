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
class Admin_model extends MY_Model {
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
    
    public function users_corporates() {  
        $this->db->select('*, COUNT(`corporate`) as clients');
        $this->db->join(config_item('company_types_table'),config_item('company_types_table').'.btype_id='.config_item('companies_table').'.company_type','both');
        $this->db->join(config_item('user_table').' as u','u.corporate='.config_item('companies_table').'.company_key','left');
        $this->db->group_by('company_id');
        $sql = $this->db->get(config_item('companies_table'));
        return ($sql->num_rows()>0)? $sql->result_array() : TRUE;
    }
    
    public function register_user_corporate($person,$company) {
        $person['user_id'] = $this->__get_unused_user_id();
        $person['auth_level'] = 7;
        $company['company_key'] = $this->__get_unused_company_key();
        $company['company_person'] = $person['user_id'];
        $this->db->trans_start();
        $this->db->insert(config_item('user_table'),$person);
        $this->db->insert(config_item('companies_table'),$company);
        $this->db->trans_complete();
        if($this->db->trans_status() == TRUE):
            return TRUE;
         else:
            return FALSE;
       endif;
    }
    
    public function update_user_corporate($p_key,$person,$c_key,$company) {
        $this->db->trans_start();
        $this->db->where('user_id',$p_key);
        $this->db->update(config_item('user_table'),$person);
        $this->db->where('company_key',$c_key);
        $this->db->update(config_item('companies_table'),$company);
        $this->db->trans_complete();
        if($this->db->trans_status() == TRUE):
            return TRUE;
         else:
            return FALSE;
       endif;
    }
    
     public function __get_unused_company_key()
    {
        // Create a random user id between 1200 and 4294967295
        $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

        // Make sure the random user_id isn't already in use
        $this->db->where( 'company_key', $random_unique_int );
        $query = $this->db->get(config_item('companies_table'));

        if( $query->num_rows() > 0 )
        {
            $query->free_result();

            // If the random user_id is already in use, try again
            return $this->get_unused_id();
        }

        return $random_unique_int;
    }
    
    
     public function __get_unused_user_id()
    {
        // Create a random user id between 1200 and 4294967295
        $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

        // Make sure the random user_id isn't already in use
        $this->db->where( 'user_id', $random_unique_int );
        $query = $this->db->get(config_item('user_table'));

        if( $query->num_rows() > 0 )
        {
            $query->free_result();

            // If the random user_id is already in use, try again
            return $this->get_unused_id();
        }

        return $random_unique_int;
    }
    
}
