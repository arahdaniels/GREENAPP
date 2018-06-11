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
class client_model extends CI_Model {
    //put your code here
    
   public function __construct() {
        
    } 
    public function deletecropvariety($key) {
         $this->db->where('variety_id',$key);
         $this->db->limit(0);
         $this->db->delete('fieldcrop_varieties');
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function modifycropvariety($key,$data) {
         $this->db->where('variety_id',$key);
         $this->db->limit(0);
         $this->db->update('fieldcrop_varieties',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    
    public function addFieldCrop($data) {
        $this->db->insert('field_crops',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
    public function addCropVariety($data) {
        $this->db->insert('fieldcrop_varieties',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
    public function addfield($data) {
        $this->db->insert('fields',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
    public function modifyfield($key,$data) {
        $this->db->where('field_id',$key);
        $this->db->limit(1);
        $this->db->update('fields',$data);
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
    
    public function deletefield($key) {
        $this->db->where('field_id',$key);
        $this->db->limit(1);
        $this->db->delete('fields');
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    } 
  public function deletefieldcrop($key) {
        $this->db->where('field_crop_id',$key);
        $this->db->limit(1);
        $this->db->delete('field_crops');
        return ($this->db->affected_rows()==1)? TRUE: FALSE;
    }
    
   public function client_fields($key) {
        $this->db->order_by('field_name','ASC');
        $this->db->where('field_account',$key);
        $this->db->join('localization','localization.localization_id=fields.field_country');
        $this->db->join('weather_cities','weather_cities.city_serial=fields.field_city');
        $this->db->join('weather_cities_locations','weather_cities_locations.weather_city_location_id=fields.field_location');
        $this->db->join('landtypes','landtypes.landtype_id=fields.field_landtype');
        $this->db->join('units','units.unit_id=fields.field_unit');
       $query = $this->db->get('fields');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    } 
  
    public function clientFieldCrops($key) {
        $this->db->order_by('crop','ASC');
        $this->db->where('field_crop_account',$key);
        //$this->db->join('localization','localization.localization_id=fields.field_country');
        //$this->db->join('weather_cities','weather_cities.city_serial=fields.field_city');
        //$this->db->join('weather_cities_locations','weather_cities_locations.weather_city_location_id=fields.field_location');
        //$this->db->join('landtypes','landtypes.landtype_id=fields.field_landtype');
        //$this->db->join('units','units.unit_id=fields.field_unit');
        $this->db->join('crops','crops.crop_id=field_crops.field_crop_crop','left');
        $this->db->join('fields','fields.field_id=field_crops.field_crop_field','left');
       $query = $this->db->get('field_crops');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    public function clientCropVarieties($key,$account) {
        $this->db->order_by('variety_name','ASC');
        $this->db->where('variety_fieldcrop',$key);
        $this->db->where('variety_account',$account);
        //$this->db->join('localization','localization.localization_id=fields.field_country');
        //$this->db->join('weather_cities','weather_cities.city_serial=fields.field_city');
        //$this->db->join('weather_cities_locations','weather_cities_locations.weather_city_location_id=fields.field_location');
        //$this->db->join('landtypes','landtypes.landtype_id=fields.field_landtype');
        //$this->db->join('units','units.unit_id=fields.field_unit');
        //$this->db->join('crops','crops.crop_id=field_crops.field_crop_crop','left');
        //$this->db->join('fields','fields.field_id=fieldcrop_varieties.variety_fieldcrop','left');
       $query = $this->db->get('fieldcrop_varieties');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
    public function clientFieldCrop($crop,$key) {
        $this->db->order_by('crop','ASC');
        $this->db->where('field_crop_account',$key);
        $this->db->where('field_crop_id',$crop);
        $this->db->join('weather_cities','weather_cities.city_serial=fd.field_city');
        $this->db->join('units','units.unit_id=fd.field_unit');
        $this->db->join('weather_cities_locations','weather_cities_locations.weather_city_location_id=fd.field_location');
        $this->db->join('landtypes','landtypes.landtype_id=fd.field_landtype');
        $this->db->join('crops','crops.crop_id=fc.field_crop_crop','left');
        $this->db->join('fields','fields.field_id=fc.field_crop_field','left');
       $query = $this->db->get('field_crops as fc,fields as fd');
        return ($query->num_rows()>0)? $query->row(): FALSE;
    }
    
   public function client_field($account,$key) {
       $this->db->where('field_account',$account);
        $this->db->where('field_id',$key);
        $this->db->join('localization','localization.localization_id=fields.field_country');
        $this->db->join('weather_cities','weather_cities.city_serial=fields.field_city');
        $this->db->join('weather_cities_locations','weather_cities_locations.weather_city_location_id=fields.field_location');
        $this->db->join('landtypes','landtypes.landtype_id=fields.field_landtype');
        $this->db->join('units','units.unit_id=fields.field_unit');
       $query = $this->db->get('fields');
        return ($query->num_rows()>0)? $query->row(): FALSE;
    } 
    
   public function currencies() {
        $this->db->order_by('locale','ASC');
        $this->db->join('localization','localization.localization_id=currencies.currency_localization');
       $query = $this->db->get('currencies');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    } 
    
   public function profile_data($key) {
        $this->db->select('firstname,middlename,lastname,user_id,email,mobile,username,about,default_city,localization,currency,currency_symbol,currency_symbol_position');
        $this->db->where('auth_level',3);
        $this->db->where('user_id',$key);
        $this->db->join('localization','localization.localization_id=users.localization');
        $this->db->join('weather_cities','weather_cities.city_id=users.default_city','left');
        $this->db->join('currencies','currencies.currency_id=users.default_currency','left');
        $query = $this->db->get('users');
        return ($query->num_rows()==1)? $query->row(): FALSE;
    } 
    
   public function profile_update($key,$data) {
         $this->db->where('user_id',$key);
         $this->db->where('auth_level',3);
         $this->db->limit(0);
         $this->db->update('users',$data);
        return ($this->db->affected_rows()>0)? TRUE: FALSE;
    }
    public function edu_videos() {
        $this->db->order_by('edu_category','ASC');
        $this->db->where('edu_videos_localization',$this->config->item( 'language_id'));
        $this->db->join('edu_categories','edu_categories.edu_category_key=edu_videos.edu_videos_category');
        $this->db->join('edu_types','edu_types.edu_types_key=edu_videos.edu_videos_type');
        $this->db->join('currencies','currencies.currency_id=edu_videos.edu_videos_currency');
       $query = $this->db->get('edu_videos');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    } 
     public function edu_category($key) {
       $this->db->select('edu_category_key,edu_category,COUNT(`edu_videos_key`) as totalvideos');
       $this->db->where('edu_category_key',$key);
       $this->db->where('edu_localization',$this->config->item( 'language_id'));
       $this->db->join('edu_videos','edu_videos.edu_videos_category=edu_categories.edu_category_key','left');
       $query = $this->db->get('edu_categories');
        return ($query->num_rows()>0)? $query->row(): FALSE;
    }
     public function edu_type($key) {
         $this->db->where('edu_types_key',$key);
       $query = $this->db->get('edu_types');
        return ($query->num_rows()>0)? $query->row(): FALSE;
    }
    
    public function edu_categories() {
        $this->db->select('edu_category_key,edu_videos_type,edu_category,COUNT(`edu_videos_key`) as totalvideos');
        $this->db->order_by('edu_category','ASC');
        $this->db->where('edu_localization',$this->config->item( 'language_id'));
        $this->db->join('edu_videos','edu_videos.edu_videos_category=edu_categories.edu_category_key','left');
        $this->db->group_by('edu_category_key');
        $query = $this->db->get('edu_categories');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    } 
    
 public function edu_category_videos($key) {
        $this->db->where('edu_category_key',$key);
        $this->db->where('edu_videos_localization',$this->config->item( 'language_id'));
        $this->db->join('edu_categories','edu_categories.edu_category_key=edu_videos.edu_videos_category');
        $this->db->join('edu_types','edu_types.edu_types_key=edu_videos.edu_videos_type');
       $query = $this->db->get('edu_videos');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
    }
    
 public function edu_video($key){
        $this->db->where('edu_videos_key',$key);
        $this->db->join('currencies','currencies.currency_id=edu_videos.edu_videos_currency');
        $this->db->join('edu_categories','edu_categories.edu_category_key=edu_videos.edu_videos_category');
        $this->db->join('edu_types','edu_types.edu_types_key=edu_videos.edu_videos_type');
       $query = $this->db->get('edu_videos');
        return ($query->num_rows()>0)? $query->row(): FALSE;
    }  

/* 
 * Localizations
 */ 
    
 public function localizations(){
       $this->db->order_by('locale','ASC');
       $query = $this->db->get('localization');
       return ($query->num_rows()>0)? $query->result_array(): FALSE;
 }
 
 public function weather_cities() {
       $this->db->order_by('city_name','ASC');
       $query = $this->db->get('weather_cities');
        return ($query->num_rows()>0)? $query->result_array(): FALSE;
    } 
     
 
 
}

