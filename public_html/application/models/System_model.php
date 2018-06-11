<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of System_model
 *
 * @author canwo
 */
class System_model extends CI_Model {
    //put your code here
   
    public function addstage($data) {
        $this->db->insert('landprepare',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
    public function deletelandprepare($key){
        $this->db->where('landprepare_id',$key);
        $this->db->limit(1);
        $this->db->delete('landprepare');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
     
     public function updatelandprepare($key,$data){
        $this->db->where('landprepare_id',$key);
        $this->db->limit(1);
        $this->db->update('landprepare',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    } 
    
    public function addlandcrop($data) {
        $this->db->insert('landcrops',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
   
    public function addlandcultivation($data) {
        $this->db->insert('landcrop_cultivation',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
    
    public function deletelandcrop($key){
        $this->db->where('landcrops_id',$key);
        $this->db->limit(1);
        $this->db->delete('landcrops');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    //fertilizers
   public function addfertilizer($data) {
        $this->db->insert('fertilizers',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
    
    public function deletefertilizer($key){
        $this->db->where('fertilizer_id',$key);
        $this->db->limit(1);
        $this->db->delete('fertilizers');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
   
    public function modifyfertilizer($key,$data){
        $this->db->where('fertilizer_id',$key);
        $this->db->limit(1);
        $this->db->update('fertilizers',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    } 
    
    // Crops
    public function addcrop($data) {
        $this->db->insert('crops',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
   
    public function deletecrop($key){
        $this->db->where('crop_id',$key);
        $this->db->limit(1);
        $this->db->delete('crops');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
   public function deletecitylocation($key){
        $this->db->where('weather_city_location_id',$key);
        $this->db->limit(1);
        $this->db->delete('weather_cities_locations');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function modifycitylocation($key,$data) {
        $this->db->where('weather_city_location_id',$key);
        $this->db->limit(1);
        $this->db->update('weather_cities_locations',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
  public function modifycultivationstage($key,$data){ 
        $this->db->where('landcultivation_id',$key);
        $this->db->limit(1);
        $this->db->update('landcrop_cultivation',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function deletelandcultivation($key){ 
        $this->db->where('landcultivation_id',$key);
        $this->db->limit(1);
        $this->db->delete('landcrop_cultivation');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
     
    public function modifylandcrops($key,$data){
        $this->db->where('landcrops_id',$key);
        $this->db->limit(1);
        $this->db->update('landcrops',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function modifycrop($key,$data){
        $this->db->where('crop_id',$key);
        $this->db->limit(1);
        $this->db->update('crops',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    } 
    // landtypes
   public function addlandtype($data) {
        $this->db->insert('landtypes',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
   
    public function deletelandtype($key){
        $this->db->where('landtype_id',$key);
        $this->db->limit(1);
        $this->db->delete('landtypes');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
   
    public function modifylandtype($key,$data){
        $this->db->where('landtype_id',$key);
        $this->db->limit(1);
        $this->db->update('landtypes',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    } 
    
   public function addunit($data) {
        $this->db->insert('units',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
    
   public function deleteunit($key){
        $this->db->where('unit_id',$key);
        $this->db->limit(1);
        $this->db->delete('units');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    } 
  
  public function modifyunit($key,$data){
        $this->db->where('unit_id',$key);
        $this->db->limit(1);
        $this->db->update('units',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    } 
    
   public function delete_currency($key){
        $this->db->where('currency_id',$key);
        $this->db->limit(1);
        $this->db->delete('currencies');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    } 
   
    public function addcitylocation($data) {
        $this->db->insert('weather_cities_locations',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    }
    
   public function add_currency($data) {
        $this->db->insert('currencies',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
    
    public function currencies() {
        $this->db->order_by('locale','ASC');
        $this->db->join('localization','localization.localization_id=currencies.currency_localization');
       $query = $this->db->get('currencies');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    } 
    
    public function add_eduvideo($data) {
        $this->db->insert('edu_videos',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    }
    
     public function edu_videos() {
        $this->db->order_by('edu_category','ASC');
        $this->db->where('edu_videos_localization',$this->config->item( 'language_id'));
        $this->db->join('edu_categories','edu_categories.edu_category_key=edu_videos.edu_videos_category');
        $this->db->join('edu_types','edu_types.edu_types_key=edu_videos.edu_videos_type');
       $query = $this->db->get('edu_videos');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    } 
  
      public function delete_edu_video($key) {
        $this->db->where('edu_videos_key',$key);
        $this->db->limit(1);
        $this->db->delete('edu_videos');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    } 
    
     public function admin_edu_video($key) {
        $this->db->where('edu_videos_key',$key);
        $this->db->join('currencies','currencies.currency_id=edu_videos.edu_videos_currency');
        $this->db->join('edu_categories','edu_categories.edu_category_key=edu_videos.edu_videos_category');
        $this->db->join('edu_types','edu_types.edu_types_key=edu_videos.edu_videos_type');
       $query = $this->db->get('edu_videos');
        return ($query->num_rows()>0)? $query->row(): FALSE;
    } 
    
    public function admin_edu_videos() {
        $this->db->order_by('edu_category','ASC');
        $this->db->join('edu_categories','edu_categories.edu_category_key=edu_videos.edu_videos_category');
        $this->db->join('currencies','currencies.currency_id=edu_videos.edu_videos_currency');
        $this->db->join('edu_types','edu_types.edu_types_key=edu_videos.edu_videos_type');
       $query = $this->db->get('edu_videos');
        return ($query->num_rows()>0)? $query->result_array(): FALSE; 
    } 
   public function modify_eduvideo($key,$data) {
        $this->db->where('edu_videos_key',$key); 
        $this->db->limit(1);
        $this->db->update('edu_videos',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
   public function language_data($language) {
         $this->db->where('language',$language);
       $query = $this->db->get('localization');
        return ($query->num_rows()>0)? $query->row(): FALSE;
    }
     public function localization() {
       $query = $this->db->get('localization');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
  public function edu_type($key) {
         $this->db->where('edu_types_key',$key);
       $query = $this->db->get('edu_types');
        return ($query->num_rows()>0)? $query->row(): FALSE;
    }
    
   public function add_edutypes($data) {
        $this->db->insert('edu_types',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
  
  public function edu_types() {
        $this->db->order_by('edu_category','ASC');
        $this->db->where('type_localization',$this->config->item( 'language_id'));
        $this->db->join('edu_categories','edu_categories.edu_category_key=edu_types.edu_types_category','left');
       $query = $this->db->get('edu_types');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    } 
     public function modify_edu_types($key,$data) {
        $this->db->where('edu_types_key',$key);
        $this->db->limit(1);
        $this->db->update('edu_types',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function delete_edu_types($key) {
        $this->db->where('edu_types_key',$key);
        $this->db->limit(1);
        $this->db->delete('edu_types');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    } 
    
    
  public function add_educategory($data) {
        $this->db->insert('edu_categories',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
  
  public function edu_categories() {
        $this->db->order_by('edu_category','ASC');
        $this->db->where('edu_localization',$this->config->item( 'language_id'));
       $query = $this->db->get('edu_categories');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    } 
    
    public function edu_category($key) {
         $this->db->where('edu_category_key',$key);
       $query = $this->db->get('edu_categories');
        return ($query->num_rows()>0)? $query->row(): FALSE;
    }
    
     public function modify_edu_category($key,$data) {
        $this->db->where('edu_category_key',$key);
        $this->db->limit(1);
        $this->db->update('edu_categories',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function delete_edu_category($key) {
        $this->db->where('edu_category_key',$key);
        $this->db->limit(1);
        $this->db->delete('edu_categories');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }  
    
  public function weather_add_city($data) {
        $this->db->insert('weather_cities',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
    
   public function weather_profile_data($key) {
       $this->db->where('profile_weather_account',$key);
       $this->db->join('weather_cities','weather_cities.city_id=profile_weather_data.profile_weather_city','left');
       $query = $this->db->get('profile_weather_data');
        return ($query->num_rows()==1)? $query->row(): FALSE;
    }
   
    public function weather_modify_city($key,$data) {
        $this->db->where('city_id',$key);
        $this->db->limit(1);
        $this->db->update('weather_cities',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    
    
    public function delete_city($key) {
        $this->db->where('city_serial',$key);
        $this->db->limit(1);
        $this->db->delete('weather_cities');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
  

    /*
     * Localizaation
     */
   public function localizations(){
       $this->db->order_by('locale','ASC');
       $query = $this->db->get('localization');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
   }
 
    
    public function get_password($key) {
       $this->db->select('passwd');
        $this->db->where('user_id',$key);
        $query = $this->db->get('users');
        return ($query->num_rows()==1)? $query->row()->passwd: FALSE;
    }
   
   public function profiledata($key) {
       $this->db->select('firstname,default_city,default_currency,localization,middlename,lastname,user_id,email,mobile,username,about');
        $this->db->where('user_id',$key);
        $this->db->join('localization','localization.localization_id=users.localization','left');
        $this->db->join('weather_cities','weather_cities.city_id=users.default_city','left');
        $this->db->join('currencies','currencies.currency_id=users.default_currency','left');
        $query = $this->db->get('users');
        return ($query->num_rows()==1)? $query->row(): FALSE;
    }
    
   public function client_profile($key) {
       $this->db->select('firstname,middlename,lastname,user_id,email,mobile,username,about');
        $this->db->where('auth_level',3);
        $this->db->where('user_id',$key);
        $query = $this->db->get('users');
        return ($query->num_rows()==1)? $query->row(): FALSE;
    } 
    
    public function transactions() {
        //$this->db->where('transaction_account',$key);
         $this->db->join('users','users.user_id = transactions.transaction_account','left');
        $query = $this->db->get('transactions');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function netincome() {
        $this->db->select_sum('transaction_amount','netincome');
        $this->db->where('transaction_status',TRUE);
        $query = $this->db->get('transactions');
        return ($query->num_rows()>0)? $query->row(): FALSE;
    }
    
     public function student_profile($key) {
        $this->db->where('auth_level',4);
        $this->db->where('user_id',$key);
        $this->db->join('identity_types','identity_types.identity_type_id = users.user_id_type','left');
        $query = $this->db->get('users');
        return ($query->num_rows()==1)? $query->row(): FALSE;
    }
   public function register_student($data) {
       $this->db->trans_start();
        $this->db->insert('users',$data);
        $datar['action_id'] = 70;
        $datar['user_id'] = $data['user_id'];
        $this->db->insert('acl',$datar);
        $this->db->where( 'user_id', $data['user_id'] );
	$this->db->update('users',['passwd' => $this->authentication->hash_passwd('tanzaproud')] );
        $this->db->trans_complete();
       return $this->db->trans_status();
        
    }
    
   public function update_profile($key,$data) {
        $this->db->where('user_id', $key);
        $this->db->limit(1);
        $this->db->update('users',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
   public function admin_profile($key) {
        $this->db->where('auth_level',9);
        $this->db->where('user_id',$key);
        $query = $this->db->get('users');
        return ($query->num_rows()==1)? $query->row(): FALSE;
    }
   
     public function employee_profile($key) {
        $this->db->where('auth_level',6);
        $this->db->where('user_id',$key);
        $query = $this->db->get('users');
        return ($query->num_rows()==1)? $query->row(): FALSE;
    }
    
    public function profile_picture($key,$level) {
        $this->db->select('avatar');
        $this->db->where('auth_level',$level);
        $this->db->where('user_id',$key);
        $query = $this->db->get('users');
        return ($query->num_rows()==1)? $query->row()->avatar: FALSE;
    }
    
    public function profile_update($key,$data) {
         $this->db->where('user_id',$key);
         $this->db->limit(0);
         $this->db->update('users',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function admin_update_picture($key,$data) {
        $this->db->where('user_id', $key);
        $this->db->limit(1);
        $this->db->update('users',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function profile_update_picture($key,$data) {
        $this->db->where('user_id', $key);
        $this->db->limit(1);
        $this->db->update('users',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function experts_register($data) {
        $this->db->insert('users',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function experts() {
        $this->db->where('auth_level',5);
        $query = $this->db->get('users');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function expert($key) {
        $this->db->where('auth_level',5);
        $this->db->where('user_id',$key);
        $query = $this->db->get('users');
        return ($query->num_rows()==1)? $query->row(): FALSE;
    }
    
     public function supporter_register($data) {
        $this->db->insert('users',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function supporters() {
        $this->db->where('auth_level',7);
        $query = $this->db->get('users');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function supporter($key) {
        $this->db->where('auth_level',7);
        $this->db->where('user_id',$key);
        $query = $this->db->get('users');
        return ($query->num_rows()==1)? $query->row(): FALSE;
    }    
    
    public function student($key) {
        $this->db->where('auth_level',4);
        $this->db->where('user_id',$key);
        $this->db->join('payments','payments.payment_acount = users.user_id','left');
        $query = $this->db->get('users');
        return ($query->num_rows()==1)? $query->row(): FALSE;
    }
    
    public function student_transactions($key) {
        $this->db->where('transaction_account',$key);
        $query = $this->db->get('transactions');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function student_payments($key) {
        $this->db->where('payment_acount',$key);
        $query = $this->db->get('payments');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function students() {
        $this->db->where('auth_level',4);
        $this->db->order_by('created_at','DESC');
        $query = $this->db->get('users');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function agents() {
        $this->db->where('auth_level',3);
        $this->db->order_by('created_at','DESC');
        $query = $this->db->get('users');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function students_modify($key,$data) {
         $this->db->where('user_id',$key);
         $this->db->limit(0);
         $this->db->update('users',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function students_activate($key,$data,$transactions) {   
         $this->db->trans_start();
         
         $this->db->where('user_id',$key);
         $this->db->limit(0);
         $this->db->update('users',$data);
         
         $this->db->insert('transactions',$transactions);
         
         $this->db->trans_complete();
        return ($this->db->trans_status() === TRUE) ? TRUE : FALSE;
    }
   
    
     public function receive_activate_student($raw,$data,$transactions) {   
         $this->db->trans_start();
         
         $this->db->where('user_id',$raw['transaccount']);
         $this->db->limit(0);
         $this->db->update('users',$data);
         
         $this->db->where('transaction_account',$raw['transaccount']);
         $this->db->where('transaction_gateway_mobile',$raw['transmobile']);
         $this->db->where('transaction_gateway_id',$raw['transid']);
         $this->db->limit(0);
         $this->db->update('transactions',$transactions);
         
         $this->db->trans_complete();
        return ($this->db->trans_status() === TRUE) ? TRUE : FALSE;
    }
   
    
    public function studentremovetransaction($raw) {  
         $this->db->where('transaction_id',$raw['transid']);
         $this->db->where('user_id',$raw['transaccount']);
         $this->db->update('users',['transaction_id' => NULL,'student_status' => FALSE]);        
         
         
         $this->db->where('transaction_gateway_id',$raw['transid']);
         $this->db->where('transaction_account',$raw['transaccount']);
         $this->db->where('transaction_gateway_mobile',$raw['transmobile']);
         $this->db->delete('transactions');
         return ($this->db->affected_rows()>0) ? TRUE : FALSE;
    }
    
    public function studentdeactivatetransaction($raw) {  
        
         $this->db->where('transaction_id',$raw['transid']);
         $this->db->where('user_id',$raw['transaccount']);
         $this->db->update('users',['transaction_id' => NULL,'student_status' => FALSE]);        
         
        
         $this->db->where('transaction_gateway_id',$raw['transid']);
         $this->db->where('transaction_account',$raw['transaccount']);
         $this->db->where('transaction_gateway_mobile',$raw['transmobile']);
         $this->db->update('transactions',['transaction_status' => FALSE]);
         return ($this->db->affected_rows()>0) ? TRUE : FALSE;
    }
    
     public function students_removetransaction($key,$trans) {   
         $this->db->trans_start();
   
         $this->db->where('transaction_gateway_id',$trans);
         $this->db->where('transaction_account',$key);
         $this->db->delete('transactions');
         
         $this->db->trans_complete();
        return ($this->db->trans_status() === TRUE) ? TRUE : FALSE;
    }
    
     public function removeaccount($key) {   
         $this->db->where('user_id',$key); 
         $this->db->limit(0);
         $this->db->delete('users');
        return ($this->db->affected_rows()>0) ? TRUE : FALSE;
    }
    
      public function students_diactivate($key,$data,$trans) {   
         $this->db->trans_start();
         
         $this->db->where('user_id',$key);
        // $this->db->limit(0);
         $this->db->update('users',$data);
         
         $this->db->where('transaction_gateway_id',$trans);
         $this->db->where('transaction_account',$key);
         $this->db->delete('transactions');
         
         $this->db->trans_complete();
        return ($this->db->trans_status() === TRUE) ? TRUE : FALSE;
    }
    
    public function student_register($student = NULL,$payment=NULL,$transaction) {
        $this->db->trans_start();
        $this->db->insert('users',$student);  
        $payment['payment_acount'] = $student['user_id'];
        $payment['payment_status'] = 1;
        $this->db->insert('payments',$payment);  
        $transaction['transaction_account'] = $student['user_id'];
        $transaction['transaction_payment'] = $this->db->insert_id();
        $this->db->insert('transactions',$transaction);  
        $this->db->trans_complete();
        return ($this->db->trans_status() === TRUE) ? TRUE : FALSE;
    }
   
    public function student_sendtrans($data) {
        $this->db->trans_start();
        
        $this->db->where('transaction_account',$data['transaction_account']);
        $this->db->where('transaction_gateway_id',$data['transaction_gateway_id']);
        $this->db->where('transaction_gateway',$data['transaction_gateway']);
        $this->db->where('transaction_gateway_mobile',$data['transaction_gateway_mobile']);
        
        $rows = $this->db->get('transactions')->num_rows();
        if($rows>0){
            $result['status'] = 'Failed';
            $result['message']  = 'information already in database';
         } else {
             $this->db->insert('transactions',$data);
             if($this->db->affected_rows()>0){
                  $result['status'] = 'Success';
                  $result['message']  = 'Information Received';
              }else{
                  $result['status'] = 'Failed';
                  $result['message']  = 'Can not receive information, Try again';
             }
        }
      $this->db->trans_complete();
        if($this->db->trans_status()){
            return $result;
           }else{
            $result['status'] = 'Failed';
                  $result['message']  = 'Can not receive information, Try again in few seconds';
        }
    }

    public function is_transaction_details($param) {
        $this->db->where('payment_gateway',$param['payment_gateway']);
        $this->db->where('payment_gateway_trans_id',$param['payment_gateway_trans_id']);
        $this->db->where('payment_mobile',$param['payment_mobile']);
        $query = $this->db->get('payments');
        return ($query->num_rows()>1) ? TRUE: FALSE;
    }
    
    public function account_id($account) {
        $this->db->select('user_id');
        $this->db->where('username',$account);
        $query = $this->db->get('users');
        return ($query->num_rows()==1) ? $query->row()->user_id: FALSE;
    }
    
    public function identities() {
        $this->db->where('identity_deleted',FALSE);
        $query = $this->db->get('identity_types');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    public function identity($key) {
        $this->db->where('identity_type_id',$key);
        $query = $this->db->get('identity_types');
        return ($query->num_rows()==1)? $query->row(): FALSE;
    }
    
    public function identities_register($data) {
         $this->db->insert('identity_types',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function identities_delete($key) {
        $this->db->where('identity_type_id',$key);
        $this->db->limit(0);
         $this->db->delete('identity_types');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
     public function identities_update($key,$data) {
        $this->db->where('identity_type_id',$key);
        $this->db->limit(0);
         $this->db->update('identity_types',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function services() {
        $this->db->where('service_deleted',FALSE);
        $this->db->where('department_deleted',FALSE);
        $this->db->join('departments','departments.department_key = services.service_department_key','both');
        $query = $this->db->get('services');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function services_recycled() {
        $this->db->where('service_deleted',TRUE);
        $this->db->where('department_deleted',FALSE);
        $this->db->join('departments','departments.department_key = services.service_department_key','both');
        $query = $this->db->get('services');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function service_register($data) {
        $this->db->insert('services',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function services_add_expert($data) {
        $this->db->where('service_expert',$data['service_expert']);
        $this->db->where('service_service_id',$data['service_service_id']);
        $query =  $this->db->get('services_experts');
        if($query->num_rows()<1){
            $this->db->insert('services_experts',$data);
        }        
        return;
    }
    
    
    public function service($param){
        $this->db->where('service_id',$param);
        $this->db->join('departments','departments.department_key = services.service_department_key','both');
        $this->db->limit(1);
        $query = $this->db->get('services');
        return ($query->num_rows()>0)? $query->row(): FALSE;
    }
    
    public function service_experts($param){
        $this->db->where('service_service_id',$param);
        $this->db->join('services','services.service_id = services_experts.service_service_id','left');
        $this->db->join('departments','departments.department_key = services.service_department_key','left');
        $this->db->join('users','users.user_id = services_experts.service_expert','left');
        $query = $this->db->get('services_experts');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function service_update($key,$data) {
        $this->db->where('service_id',$key);
        $this->db->limit(1);
        $this->db->update('services',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function service_delete($key) {
        $this->db->where('service_id',$key);
        $this->db->limit(1);
        $this->db->delete('services');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function department_register($data) {
        $this->db->trans_start();
        $this->db->insert('departments',$data);
        $this->db->trans_complete();
        return ($this->db->trans_status() === TRUE)? TRUE: $this->db->error();
    }
    
    public function departments($param=FALSE) {
        $this->db->select('*, COUNT(`service_id`) as `total_services`');
        $this->db->where('department_deleted',$param);
        $this->db->join('services','services.service_department_key = departments.department_key','left');
        $this->db->group_by('department_key');
        $query = $this->db->get('departments');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
     
    public function department_services($key) {
        $this->db->where('department_key',$key);
        $this->db->where('department_deleted',FALSE);
        $this->db->join('services','services.service_department_key = departments.department_key','both');
        $this->db->join('services_experts','services_experts.service_service_id = services.service_id','both');
        $query = $this->db->get('departments');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function departments_student_view($key) {
        $this->db->select('*, COUNT(`service_id`) as `total_services`');
        $this->db->where('department_deleted',$key);
        $this->db->join('services','services.service_department_key = departments.department_key','left');
        $this->db->group_by('department_key');
        $query = $this->db->get('departments');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
 
     public function get_unused_educategory_key()
    {
        // Create a random user id between 1200 and 4294967295
        $random_unique_int = 2147567658 + mt_rand( -2147456758, 21456783647 );

        // Make sure the random user_id isn't already in use
        $this->db->where( 'edu_category_key', $random_unique_int );
        $query = $this->db->get('edu_categories');

        if( $query->num_rows() > 0 )
        {
            $query->free_result();

            // If the random user_id is already in use, try again
            return $this->get_unused_id();
        }

        return $random_unique_int;
    }
    
    public function get_unused_edutypes_key()
    {
        // Create a random user id between 1200 and 4294967295
        $random_unique_int = 2567573648 + mt_rand( -2147575678, 21478678647 );

        // Make sure the random user_id isn't already in use
        $this->db->where( 'edu_types_key', $random_unique_int );
        $query = $this->db->get('edu_types');

        if( $query->num_rows() > 0 )
        {
            $query->free_result();

            // If the random user_id is already in use, try again
            return $this->get_unused_id();
        }

        return $random_unique_int;
    }
    
       public function get_unused_eduvideos_key()
    {
        // Create a random user id between 1200 and 4294967295
        $random_unique_int = 21478434768 + mt_rand( -21243568, 21123345647 );

        // Make sure the random user_id isn't already in use
        $this->db->where( 'edu_videos_key', $random_unique_int );
        $query = $this->db->get('edu_videos');

        if( $query->num_rows() > 0 )
        {
            $query->free_result();

            // If the random user_id is already in use, try again
            return $this->get_unused_id();
        }

        return $random_unique_int;
    }
    
    
     public function get_unused_reset_key()
    {
        // Create a random user id between 1200 and 4294967295
        $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

        // Make sure the random user_id isn't already in use
        $this->db->where( 'reset_key', $random_unique_int );
        $query = $this->db->get('users');

        if( $query->num_rows() > 0 )
        {
            $query->free_result();

            // If the random user_id is already in use, try again
            return $this->get_unused_id();
        }

        return $random_unique_int;
    }
    
     public function get_unused_user_id()
    {
        // Create a random user id between 1200 and 4294967295
        $random_unique_int = 2147483648 + mt_rand( -2147482448, 2147483647 );

        // Make sure the random user_id isn't already in use
        $this->db->where( 'user_id', $random_unique_int );
        $query = $this->db->get('users');

        if( $query->num_rows() > 0 )
        {
            $query->free_result();

            // If the random user_id is already in use, try again
            return $this->get_unused_id();
        }

        return $random_unique_int;
    }
}

