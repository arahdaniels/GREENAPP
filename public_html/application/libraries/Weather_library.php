<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Weather
 *
 * @author test
 */
class Weather_library {
    //put your code here
    
    protected $app;
    
    protected $loadWeather;
    
    protected $apiKey;


    public function __construct(){
        
        $this->app =& get_instance();
        
        // load resourecs
        $this->app->load->model('weather_model');
        
        // check if load is enabled
        $this->app->loadWeather = $this->app->weather_model->loadWeatherData();
        
        // get api key
        $this->app->apiKey = $this->app->weather_model->loadWeatherApiKey();
         
        if(! $this->app->loadWeather){
            $vars['sampleweather'] = TRUE;
            $this->app->load->vars($vars);
           }else{
           $vars['sampleweather'] = FALSE;
            $this->app->load->vars($vars); 
        }
    }
    public function loadCityInfo($lockey) {
        if($this->app->loadWeather){
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "http://dataservice.accuweather.com/locations/v1/".$lockey."?apikey=".$this->app->apiKey."&details=true"); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $output = curl_exec($ch); 
            curl_close($ch);
            if( !empty($output)){
                return json_decode($output);
             }else{
             return FALSE;   
            }      
        }else{
            return $this->app->weather_model->loadWeatherSampleCityInfo();
        }
    }
    
    public function loadCurrentConditions($lockey) {
        if($this->app->loadWeather){
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "http://dataservice.accuweather.com/currentconditions/v1/".$lockey."?apikey=".$this->app->apiKey."&details=true"); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $output = curl_exec($ch); 
            curl_close($ch);
            if( !empty($output)){
                return json_decode($output);
             }else{
             return FALSE;   
            }      
        }else{
            return $this->app->weather_model->loadWeatherSampleCurrentConditions();
        }
    }
    
    public function loadForecasts($lockey,$days) {
        if($this->app->loadWeather){
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "http://dataservice.accuweather.com/forecasts/v1/daily/".$days."day/".$lockey."?apikey=".$this->app->apiKey."&details=true&metric=true"); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $output = curl_exec($ch); 
            curl_close($ch);
            if( !empty($output)){
                return json_decode($output);
             }else{
             return FALSE;   
            }  
         }else{
            return $this->app->weather_model->loadWeatherSampleForecasts();
        }
        
    }
   
    public function forecastDays() {
        return $this->app->weather_model->forecastDays();
    }
}
