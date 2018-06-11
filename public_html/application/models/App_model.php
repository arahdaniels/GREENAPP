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
class App_model extends MY_Model {
    //put your code here
    
   public function __construct() {
        
    } 
    
    /* 
 * Localizations
 */ 
public function weather_city($key) {
    $this->db->where('city_serial',$key);
    $query = $this->db->get('weather_cities');
     return ($query->num_rows()>0)? $query->row(): FALSE;
 } 
 
public function weather_cities() {
 $this->db->order_by('locale','ASC');
 //$this->db->group_by('locale');
 $this->db->join('weather_cities','weather_cities.city_locale=localization.localization_id','both');
 $query = $this->db->get('localization');
  return ($query->num_rows()>0)? $query->result_array(): FALSE;
} 
     
    
public function weather_city_locations($city=NULL){
    $this->db->where('weather_city_location_city',$city);
       $this->db->order_by('weather_city_location_name','ASC');
       $this->db->join('weather_cities','weather_cities.city_serial=weather_cities_locations.weather_city_location_city','left');
       $query = $this->db->get('weather_cities_locations');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
 }
 
public function units(){
       $this->db->order_by('unit_name','ASC');
       $query = $this->db->get('units');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
 }
 
 public function landprepares($key){
       $this->db->order_by('landprepare_id','ASC');
       $this->db->where('landprepare_landcrop',$key);
       $query = $this->db->get('landprepare');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
 }
 
 public function landprepare($key){
       $this->db->where('landprepare_id',$key);
       $this->db->join('landcrops','landcrops.landcrops_id = landprepare.landprepare_landcrop','left');
       $query = $this->db->get('landprepare');
       return ($query->num_rows()>0)? $query->row(): FALSE;
 }
 
 public function landcrop($key){
       $this->db->where('landcrops_id',$key);
       $this->db->join('landtypes','landtypes.landtype_id = landcrops.landcrops_land','left');
       $this->db->join('crops','crops.crop_id = landcrops.landcrops_crop','left');
       $query = $this->db->get('landcrops');
       return ($query->num_rows()>0)? $query->row(): FALSE;
 }
 
 public function landcrop_stages($key){
       $this->db->select('COUNT(`landprepare_landcrop`) AS stages');
       $this->db->where('landprepare_landcrop',$key);
       $query = $this->db->get('landprepare');
       return ($query->num_rows()>0)? $query->row()->stages: FALSE;
 }
 
 public function landcrop_cstages($key){
       $this->db->select('COUNT(`landcultivation_landcrop`) AS cstages');
       $this->db->where('landcultivation_landcrop',$key);
       $query = $this->db->get('landcrop_cultivation');
       return ($query->num_rows()>0)? $query->row()->cstages: FALSE;
 }
 
  public function landcrop_cultivations(){
       $this->db->order_by('landcultivation_id','ASC');
       $this->db->join('landcrops','landcrops.landcrops_id = landcultivation_landcrop','left');
       $this->db->join('fertilizers','fertilizers.fertilizer_id = landcultivation_fertilizer','left');
       $query = $this->db->get('landcrop_cultivation');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
 }
 
 public function landcrop_cultivation($key){
       $this->db->where('landcultivation_id',$key);
       $this->db->order_by('landcultivation_id','ASC');
       $this->db->join('landcrops','landcrops.landcrops_id = landcultivation_landcrop','left');
       $this->db->join('fertilizers','fertilizers.fertilizer_id = landcultivation_fertilizer','left');
       $query = $this->db->get('landcrop_cultivation');
       return ($query->num_rows()>0)? $query->row(): FALSE;
 }
 public function landcrops(){
       $this->db->order_by('landtype','ASC');
       $this->db->join('landtypes','landtypes.landtype_id = landcrops.landcrops_land','left');
       $this->db->join('crops','crops.crop_id = landcrops.landcrops_crop','left');
       $query = $this->db->get('landcrops');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
 }
 
 public function landtypes(){
       $this->db->order_by('landtype','ASC');
       $query = $this->db->get('landtypes');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
 }
 
 
 public function crops(){
       $this->db->order_by('crop','ASC');
       $query = $this->db->get('crops');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
 }
 
  public function fertilizers(){
       $this->db->order_by('fertilizer','ASC');
       $query = $this->db->get('fertilizers');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
 }
 
 public function localizations(){
       $this->db->order_by('locale','ASC');
       $query = $this->db->get('localization');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
 }
 
 public function language_data($language) {
       $this->db->where('language_id',$language);
       $this->db->join('weather_cities','weather_cities.city_locale=localization.language_id');
       $query = $this->db->get('localization');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
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
    
    public function get_recovery_data( $email )
	{
		$query = $this->db->select( 'u.user_id, u.email, u.banned' )
			->from( $this->db_table('user_table') . ' u' )
			->where( 'LOWER( u.email ) =', strtolower( $email ) )
			->limit(1)
			->get();

		if( $query->num_rows() == 1 )
			return $query->row();

		return FALSE;
	}
    
   public function get_recovery_verification_data( $user_id )
	{
		$recovery_code_expiration = date('Y-m-d H:i:s', time() - config_item('recovery_code_expiration') );

		$query = $this->db->select( 'username, passwd_recovery_code' )
			->from( $this->db_table('user_table') )
			->where( 'user_id', $user_id )
			->where( 'passwd_recovery_date >', $recovery_code_expiration )
			->limit(1)
			->get();

		if ( $query->num_rows() == 1 )
			return $query->row();
		
		return FALSE;
	}
        
    /**
	 * Update a user record with data not from POST
	 *
	 * @param  int     the user ID to update
	 * @param  array   the data to update in the user table
	 * @return bool
	 */
	public function update_user_raw_data( $the_user, $user_data = [] )
	{
		$this->db->where('user_id', $the_user)
			->update( $this->db_table('user_table'), $user_data );
	}
        
        public function recovery_password_change()
	{
		$this->load->library('form_validation');

		// Load form validation rules
		$this->load->model('app/validation_callables');
		$this->form_validation->set_rules([
			[
				'field' => 'passwd', 
				'label' => 'NEW PASSWORD',
				'rules' => [
					'trim',
					'required',
					'matches[passwd_confirm]',
					[  
						'_check_password_strength', 
						[$this->validation_callables, '_check_password_strength'] 
					]
				]
			],
			[
				'field' => 'passwd_confirm',
				'label' => 'CONFIRM NEW PASSWORD',
				'rules' => 'trim|required'
			],
			[
				'field' => 'recovery_code'
			],
			[
				'field' => 'user_identification'
			]
		]);

		if( $this->form_validation->run() !== FALSE )
		{
			$this->load->vars( ['validation_passed' => 1] );

			$this->_change_password(
				set_value('passwd'),
				set_value('passwd_confirm'),
				set_value('user_identification'),
				set_value('recovery_code')
			);
		}
		else
		{
			$this->load->vars( ['validation_errors' => validation_errors()] );
		}
	}

        protected function _change_password( $password, $password2, $user_id, $recovery_code )
	{
		// User ID check
		if( isset( $user_id ) && $user_id !== FALSE )
		{
			$query = $this->db->select( 'user_id' )
				->from( $this->db_table('user_table') )
				->where( 'user_id', $user_id )
				->where( 'passwd_recovery_code', $recovery_code )
				->get();

			// If above query indicates a match, change the password
			if( $query->num_rows() == 1 )
			{
				$user_data = $query->row();

				$this->db->where( 'user_id', $user_data->user_id )
					->update( 
						$this->db_table('user_table'), 
						[
							'passwd' => $this->authentication->hash_passwd( $password ),
							'passwd_recovery_code' => NULL,
							'passwd_recovery_date' => NULL
						] 
					);
			}
		}
	}
}

