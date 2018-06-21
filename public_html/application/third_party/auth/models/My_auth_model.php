<?php
 
class My_auth_model extends Auth_model {
   
  public function __construct()
  {
    parent::__construct();
  }
 
  // --------------------------------------------------------------
 
  public function get_auth_data( $user_string )
  {
    if( $auth_data = parent::get_auth_data( $user_string ) )
    {
      return $this->add_profile_data( $auth_data );
    }
 
    return FALSE;
  }
 
  // --------------------------------------------------------------
 
  public function check_login_status( $user_id, $user_login_time )
  {
    if( $auth_data = parent::check_login_status( $user_id, $user_login_time ) )
    {
      return $this->add_profile_data( $auth_data );
    }
 
    return FALSE;
  }
   
  // -----------------------------------------------------------------------
 
  public function add_profile_data( $auth_data )
  {
    if( $auth_data->auth_level == '9' )
    {
      // Selected profile data
      $selected_columns = array(
        'first_name',
        'last_name'
      );
 
      $query = $this->db->select( $selected_columns )
        ->from( config_item('profiletable') )
        ->where( 'user_id=', $auth_data->user_id )
        ->limit(1)
        ->get();
 
      if( $query->num_rows() == 1 )
      {
        foreach( $query->row_array() as $k => $v )
        {
          $auth_data->$k = $v;
        }
      } 
    }
 
    return $auth_data;
  }
   
  // -----------------------------------------------------------------------
  
   public function _get_profile($user_id) {
    $this->db->select('*');
    $this->db->where('user_id', $user_id);
    $query = $this->db->get( config_item('user_table'));
    return $query->row();    
  }
  
  public function _get_client_profile($user_id) {
    $this->db->select('*');
    $this->db->where('user_id', $user_id);
    $query = $this->db->get( config_item('user_table'));
    return $query->row();    
  }
  
  public function _get_admin_profile($user_id) {
    $this->db->select('*');
    $this->db->where('user_id', $user_id);
    $query = $this->db->get( config_item('user_table'));
    return $query->row();    
  }
  
  public function _get_corporate_profile($user_id) {
    $this->db->select('*');
    $this->db->where('user_id', $user_id);
    $this->db->join(config_item('companies_table').' as c','c.company_person=user_id','both');
    $query = $this->db->get( config_item('user_table'));
    return $query->row();    
  }
  
  public function get_settings() {
      $query = $this->db->select( '*' )
        ->from( config_item('settingstable') )
        ->get();
      $setting = NULL;
      foreach ($query->result_array() as $key => $value) {
          $setting[$value['setting_item']] = $value['setting_value'];
      }
    return $setting;
  }

  
}
 
/* End of file My_auth_model.php */
/* Location: /application/models/My_auth_model */