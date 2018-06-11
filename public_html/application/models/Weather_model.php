<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of System_config
 *
 * @author test
 */
class Weather_model Extends MY_Model{
    //put your code here
    
    public function loadWeatherData() {
        $this->db->select('load_weather_data');
        $query = $this->db->get('weather_config');
        return ($query->num_rows()>0)? $query->row()->load_weather_data: FALSE;
    }
    
    public function loadWeatherApiKey() {
        $this->db->select('load_weather_api_key');
        $query = $this->db->get('weather_config');
        return ($query->num_rows()>0)? $query->row()->load_weather_api_key: FALSE;
    }
   
    public function loadWeatherSampleForecasts() {
        $this->db->select('weather_sample_forecast');
        $query = $this->db->get('weather_config');
        return ($query->num_rows()>0)? json_decode($query->row()->weather_sample_forecast): FALSE;
    }
    
    public function loadWeatherSampleCurrentConditions() {
        $this->db->select('weather_sample_current_conditions');
        $query = $this->db->get('weather_config');
        return ($query->num_rows()>0)? json_decode($query->row()->weather_sample_current_conditions): FALSE;
    }
    
    public function loadWeatherSampleCityInfo() {
        $this->db->select('weather_sample_city_info');
        $query = $this->db->get('weather_config');
        return ($query->num_rows()>0)? json_decode($query->row()->weather_sample_city_info): FALSE;
    }
    
    public function forecastDays() {
        $this->db->select('forecast_days');
        $query = $this->db->get('weather_config');
        return ($query->num_rows()>0)? $query->row()->forecast_days: 5;
    }
}
