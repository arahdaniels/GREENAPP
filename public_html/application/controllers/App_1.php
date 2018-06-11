<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of App
 *
 * @author Jobskelvin
 */
class App  extends MY_Controller{
   
    
    public function __construct() {
        
      // Overide super controller
      parent::__construct();
       
      //Force https
      $this->force_ssl();
      
      //Load helpes
      $this->load->helper('form');
                
      //Load model
      $this->load->model(array('app_model','client_model'));
      
      //Load libraries
      $this->load->library(array('app_library','system_library'));
      
      //Load language files
      $this->lang->load($this->config->item('languages'),$this->session->userdata('language'));      
      }
    
    function index(){
        if( $this->require_min_level(1))
		{       
                        $redirect_protocol = USE_SSL ? 'https' : NULL;

                        redirect( base_url($this->auth_role.'/dashboard'), $redirect_protocol );
                        
		}
    }
    
    public function test() {
        $data = json_decode('{
  "Headline": {
    "EffectiveDate": "2018-02-16T01:00:00+03:00",
    "EffectiveEpochDate": 1518732000,
    "Severity": 5,
    "Text": "Expect showery weather late Thursday night through Friday morning",
    "Category": "rain",
    "EndDate": "2018-02-16T13:00:00+03:00",
    "EndEpochDate": 1518775200,
    "MobileLink": "http://m.accuweather.com/en/tz/dar-es-salaam/317663/extended-weather-forecast/317663?unit=c&lang=en-us",
    "Link": "http://www.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?unit=c&lang=en-us"
  },
  "DailyForecasts": [
    {
      "Date": "2018-02-15T07:00:00+03:00",
      "EpochDate": 1518667200,
      "Sun": {
        "Rise": "2018-02-15T06:27:00+03:00",
        "EpochRise": 1518665220,
        "Set": "2018-02-15T18:47:00+03:00",
        "EpochSet": 1518709620
      },
      "Moon": {
        "Rise": "2018-02-15T05:57:00+03:00",
        "EpochRise": 1518663420,
        "Set": "2018-02-15T18:34:00+03:00",
        "EpochSet": 1518708840,
        "Phase": "New",
        "Age": 0
      },
      "Temperature": {
        "Minimum": {
          "Value": 24.6,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 32.2,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperature": {
        "Minimum": {
          "Value": 27.7,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 37.7,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperatureShade": {
        "Minimum": {
          "Value": 27.7,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 37.8,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "HoursOfSun": 9.1,
      "DegreeDaySummary": {
        "Heating": {
          "Value": 0,
          "Unit": "C",
          "UnitType": 17
        },
        "Cooling": {
          "Value": 10,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "AirAndPollen": [
        {
          "Name": "AirQuality",
          "Value": 0,
          "Category": "Good",
          "CategoryValue": 1,
          "Type": "Ozone"
        },
        {
          "Name": "Grass",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Mold",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Ragweed",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Tree",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "UVIndex",
          "Value": 12,
          "Category": "Extreme",
          "CategoryValue": 5
        }
      ],
      "Day": {
        "Icon": 2,
        "IconPhrase": "Mostly sunny",
        "ShortPhrase": "A morning shower; sunshine",
        "LongPhrase": "A shower in spots late this morning; otherwise, sunshine and patchy clouds",
        "PrecipitationProbability": 50,
        "ThunderstormProbability": 20,
        "RainProbability": 50,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 13,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 43,
            "Localized": "NE",
            "English": "NE"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 33.3,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 20,
            "Localized": "NNE",
            "English": "NNE"
          }
        },
        "TotalLiquid": {
          "Value": 1,
          "Unit": "mm",
          "UnitType": 3
        },
        "Rain": {
          "Value": 1,
          "Unit": "mm",
          "UnitType": 3
        },
        "Snow": {
          "Value": 0,
          "Unit": "cm",
          "UnitType": 4
        },
        "Ice": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "HoursOfPrecipitation": 0.5,
        "HoursOfRain": 0.5,
        "HoursOfSnow": 0,
        "HoursOfIce": 0,
        "CloudCover": 29
      },
      "Night": {
        "Icon": 39,
        "IconPhrase": "Partly cloudy w/ showers",
        "ShortPhrase": "Partly cloudy, a shower late",
        "LongPhrase": "Partly cloudy with a shower late",
        "PrecipitationProbability": 55,
        "ThunderstormProbability": 20,
        "RainProbability": 55,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 13,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 40,
            "Localized": "NE",
            "English": "NE"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 18.5,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 50,
            "Localized": "NE",
            "English": "NE"
          }
        },
        "TotalLiquid": {
          "Value": 1,
          "Unit": "mm",
          "UnitType": 3
        },
        "Rain": {
          "Value": 1,
          "Unit": "mm",
          "UnitType": 3
        },
        "Snow": {
          "Value": 0,
          "Unit": "cm",
          "UnitType": 4
        },
        "Ice": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "HoursOfPrecipitation": 1,
        "HoursOfRain": 1,
        "HoursOfSnow": 0,
        "HoursOfIce": 0,
        "CloudCover": 42
      },
      "Sources": [
        "AccuWeather"
      ],
      "MobileLink": "http://m.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=1&unit=c&lang=en-us",
      "Link": "http://www.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=1&unit=c&lang=en-us"
    },
    {
      "Date": "2018-02-16T07:00:00+03:00",
      "EpochDate": 1518753600,
      "Sun": {
        "Rise": "2018-02-16T06:28:00+03:00",
        "EpochRise": 1518751680,
        "Set": "2018-02-16T18:46:00+03:00",
        "EpochSet": 1518795960
      },
      "Moon": {
        "Rise": "2018-02-16T06:45:00+03:00",
        "EpochRise": 1518752700,
        "Set": "2018-02-16T19:19:00+03:00",
        "EpochSet": 1518797940,
        "Phase": "WaxingCrescent",
        "Age": 1
      },
      "Temperature": {
        "Minimum": {
          "Value": 24.3,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 31.7,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperature": {
        "Minimum": {
          "Value": 29,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 37.5,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperatureShade": {
        "Minimum": {
          "Value": 29,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 36.8,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "HoursOfSun": 7.4,
      "DegreeDaySummary": {
        "Heating": {
          "Value": 0,
          "Unit": "C",
          "UnitType": 17
        },
        "Cooling": {
          "Value": 10,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "AirAndPollen": [
        {
          "Name": "AirQuality",
          "Value": 0,
          "Category": "Good",
          "CategoryValue": 1,
          "Type": "Ozone"
        },
        {
          "Name": "Grass",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Mold",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Ragweed",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Tree",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "UVIndex",
          "Value": 11,
          "Category": "Extreme",
          "CategoryValue": 5
        }
      ],
      "Day": {
        "Icon": 14,
        "IconPhrase": "Partly sunny w/ showers",
        "ShortPhrase": "A shower in the morning",
        "LongPhrase": "A shower in the morning; otherwise, partly sunny",
        "PrecipitationProbability": 58,
        "ThunderstormProbability": 20,
        "RainProbability": 58,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 18.5,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 38,
            "Localized": "NE",
            "English": "NE"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 24.1,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 40,
            "Localized": "NE",
            "English": "NE"
          }
        },
        "TotalLiquid": {
          "Value": 2,
          "Unit": "mm",
          "UnitType": 3
        },
        "Rain": {
          "Value": 2,
          "Unit": "mm",
          "UnitType": 3
        },
        "Snow": {
          "Value": 0,
          "Unit": "cm",
          "UnitType": 4
        },
        "Ice": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "HoursOfPrecipitation": 1,
        "HoursOfRain": 1,
        "HoursOfSnow": 0,
        "HoursOfIce": 0,
        "CloudCover": 41
      },
      "Night": {
        "Icon": 35,
        "IconPhrase": "Partly cloudy",
        "ShortPhrase": "Partly cloudy",
        "LongPhrase": "Partly cloudy",
        "PrecipitationProbability": 25,
        "ThunderstormProbability": 1,
        "RainProbability": 25,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 13,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 47,
            "Localized": "NE",
            "English": "NE"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 20.4,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 59,
            "Localized": "ENE",
            "English": "ENE"
          }
        },
        "TotalLiquid": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "Rain": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "Snow": {
          "Value": 0,
          "Unit": "cm",
          "UnitType": 4
        },
        "Ice": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "HoursOfPrecipitation": 0,
        "HoursOfRain": 0,
        "HoursOfSnow": 0,
        "HoursOfIce": 0,
        "CloudCover": 32
      },
      "Sources": [
        "AccuWeather"
      ],
      "MobileLink": "http://m.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=2&unit=c&lang=en-us",
      "Link": "http://www.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=2&unit=c&lang=en-us"
    },
    {
      "Date": "2018-02-17T07:00:00+03:00",
      "EpochDate": 1518840000,
      "Sun": {
        "Rise": "2018-02-17T06:28:00+03:00",
        "EpochRise": 1518838080,
        "Set": "2018-02-17T18:46:00+03:00",
        "EpochSet": 1518882360
      },
      "Moon": {
        "Rise": "2018-02-17T07:34:00+03:00",
        "EpochRise": 1518842040,
        "Set": "2018-02-17T20:03:00+03:00",
        "EpochSet": 1518886980,
        "Phase": "WaxingCrescent",
        "Age": 2
      },
      "Temperature": {
        "Minimum": {
          "Value": 24.8,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 32.1,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperature": {
        "Minimum": {
          "Value": 29.4,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 38.6,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperatureShade": {
        "Minimum": {
          "Value": 29.4,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 37.6,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "HoursOfSun": 6.9,
      "DegreeDaySummary": {
        "Heating": {
          "Value": 0,
          "Unit": "C",
          "UnitType": 17
        },
        "Cooling": {
          "Value": 10,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "AirAndPollen": [
        {
          "Name": "AirQuality",
          "Value": 0,
          "Category": "Good",
          "CategoryValue": 1,
          "Type": "Ozone"
        },
        {
          "Name": "Grass",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Mold",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Ragweed",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Tree",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "UVIndex",
          "Value": 11,
          "Category": "Extreme",
          "CategoryValue": 5
        }
      ],
      "Day": {
        "Icon": 3,
        "IconPhrase": "Partly sunny",
        "ShortPhrase": "A t-storm around in the a.m.",
        "LongPhrase": "A thunderstorm in spots in the morning; otherwise, partly sunny",
        "PrecipitationProbability": 40,
        "ThunderstormProbability": 60,
        "RainProbability": 40,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 14.8,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 46,
            "Localized": "NE",
            "English": "NE"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 22.2,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 56,
            "Localized": "NE",
            "English": "NE"
          }
        },
        "TotalLiquid": {
          "Value": 1,
          "Unit": "mm",
          "UnitType": 3
        },
        "Rain": {
          "Value": 1,
          "Unit": "mm",
          "UnitType": 3
        },
        "Snow": {
          "Value": 0,
          "Unit": "cm",
          "UnitType": 4
        },
        "Ice": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "HoursOfPrecipitation": 0.5,
        "HoursOfRain": 0.5,
        "HoursOfSnow": 0,
        "HoursOfIce": 0,
        "CloudCover": 45
      },
      "Night": {
        "Icon": 34,
        "IconPhrase": "Mostly clear",
        "ShortPhrase": "Mainly clear",
        "LongPhrase": "Mainly clear",
        "PrecipitationProbability": 25,
        "ThunderstormProbability": 3,
        "RainProbability": 25,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 11.1,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 97,
            "Localized": "E",
            "English": "E"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 20.4,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 71,
            "Localized": "ENE",
            "English": "ENE"
          }
        },
        "TotalLiquid": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "Rain": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "Snow": {
          "Value": 0,
          "Unit": "cm",
          "UnitType": 4
        },
        "Ice": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "HoursOfPrecipitation": 0,
        "HoursOfRain": 0,
        "HoursOfSnow": 0,
        "HoursOfIce": 0,
        "CloudCover": 24
      },
      "Sources": [
        "AccuWeather"
      ],
      "MobileLink": "http://m.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=3&unit=c&lang=en-us",
      "Link": "http://www.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=3&unit=c&lang=en-us"
    },
    {
      "Date": "2018-02-18T07:00:00+03:00",
      "EpochDate": 1518926400,
      "Sun": {
        "Rise": "2018-02-18T06:28:00+03:00",
        "EpochRise": 1518924480,
        "Set": "2018-02-18T18:46:00+03:00",
        "EpochSet": 1518968760
      },
      "Moon": {
        "Rise": "2018-02-18T08:21:00+03:00",
        "EpochRise": 1518931260,
        "Set": "2018-02-18T20:46:00+03:00",
        "EpochSet": 1518975960,
        "Phase": "WaxingCrescent",
        "Age": 3
      },
      "Temperature": {
        "Minimum": {
          "Value": 24.7,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 33,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperature": {
        "Minimum": {
          "Value": 29.6,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 39.3,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperatureShade": {
        "Minimum": {
          "Value": 29.6,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 38.2,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "HoursOfSun": 8.4,
      "DegreeDaySummary": {
        "Heating": {
          "Value": 0,
          "Unit": "C",
          "UnitType": 17
        },
        "Cooling": {
          "Value": 11,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "AirAndPollen": [
        {
          "Name": "AirQuality",
          "Value": 0,
          "Category": "Good",
          "CategoryValue": 1,
          "Type": "Ozone"
        },
        {
          "Name": "Grass",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Mold",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Ragweed",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Tree",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "UVIndex",
          "Value": 11,
          "Category": "Extreme",
          "CategoryValue": 5
        }
      ],
      "Day": {
        "Icon": 14,
        "IconPhrase": "Partly sunny w/ showers",
        "ShortPhrase": "Occasional morning rain",
        "LongPhrase": "A bit of rain in the morning; otherwise, partly sunny",
        "PrecipitationProbability": 55,
        "ThunderstormProbability": 24,
        "RainProbability": 55,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 16.7,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 34,
            "Localized": "NE",
            "English": "NE"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 22.2,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 73,
            "Localized": "ENE",
            "English": "ENE"
          }
        },
        "TotalLiquid": {
          "Value": 1,
          "Unit": "mm",
          "UnitType": 3
        },
        "Rain": {
          "Value": 1,
          "Unit": "mm",
          "UnitType": 3
        },
        "Snow": {
          "Value": 0,
          "Unit": "cm",
          "UnitType": 4
        },
        "Ice": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "HoursOfPrecipitation": 1.5,
        "HoursOfRain": 1.5,
        "HoursOfSnow": 0,
        "HoursOfIce": 0,
        "CloudCover": 35
      },
      "Night": {
        "Icon": 35,
        "IconPhrase": "Partly cloudy",
        "ShortPhrase": "Partly cloudy",
        "LongPhrase": "Partly cloudy",
        "PrecipitationProbability": 25,
        "ThunderstormProbability": 24,
        "RainProbability": 25,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 11.1,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 102,
            "Localized": "ESE",
            "English": "ESE"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 20.4,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 78,
            "Localized": "ENE",
            "English": "ENE"
          }
        },
        "TotalLiquid": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "Rain": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "Snow": {
          "Value": 0,
          "Unit": "cm",
          "UnitType": 4
        },
        "Ice": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "HoursOfPrecipitation": 0,
        "HoursOfRain": 0,
        "HoursOfSnow": 0,
        "HoursOfIce": 0,
        "CloudCover": 35
      },
      "Sources": [
        "AccuWeather"
      ],
      "MobileLink": "http://m.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=4&unit=c&lang=en-us",
      "Link": "http://www.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=4&unit=c&lang=en-us"
    },
    {
      "Date": "2018-02-19T07:00:00+03:00",
      "EpochDate": 1519012800,
      "Sun": {
        "Rise": "2018-02-19T06:28:00+03:00",
        "EpochRise": 1519010880,
        "Set": "2018-02-19T18:46:00+03:00",
        "EpochSet": 1519055160
      },
      "Moon": {
        "Rise": "2018-02-19T09:09:00+03:00",
        "EpochRise": 1519020540,
        "Set": "2018-02-19T21:31:00+03:00",
        "EpochSet": 1519065060,
        "Phase": "WaxingCrescent",
        "Age": 4
      },
      "Temperature": {
        "Minimum": {
          "Value": 24.4,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 33,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperature": {
        "Minimum": {
          "Value": 29.1,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 39.4,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperatureShade": {
        "Minimum": {
          "Value": 29.1,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 38.2,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "HoursOfSun": 8.4,
      "DegreeDaySummary": {
        "Heating": {
          "Value": 0,
          "Unit": "C",
          "UnitType": 17
        },
        "Cooling": {
          "Value": 11,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "AirAndPollen": [
        {
          "Name": "AirQuality",
          "Value": 0,
          "Category": "Good",
          "CategoryValue": 1,
          "Type": "Ozone"
        },
        {
          "Name": "Grass",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Mold",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Ragweed",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "Tree",
          "Value": 0,
          "Category": "Low",
          "CategoryValue": 1
        },
        {
          "Name": "UVIndex",
          "Value": 11,
          "Category": "Extreme",
          "CategoryValue": 5
        }
      ],
      "Day": {
        "Icon": 3,
        "IconPhrase": "Partly sunny",
        "ShortPhrase": "A morning t-storm in the area",
        "LongPhrase": "Widely separated morning thunderstorms; otherwise, partly sunny",
        "PrecipitationProbability": 50,
        "ThunderstormProbability": 60,
        "RainProbability": 50,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 13,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 49,
            "Localized": "NE",
            "English": "NE"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 20.4,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 82,
            "Localized": "E",
            "English": "E"
          }
        },
        "TotalLiquid": {
          "Value": 2,
          "Unit": "mm",
          "UnitType": 3
        },
        "Rain": {
          "Value": 2,
          "Unit": "mm",
          "UnitType": 3
        },
        "Snow": {
          "Value": 0,
          "Unit": "cm",
          "UnitType": 4
        },
        "Ice": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "HoursOfPrecipitation": 1,
        "HoursOfRain": 1,
        "HoursOfSnow": 0,
        "HoursOfIce": 0,
        "CloudCover": 35
      },
      "Night": {
        "Icon": 34,
        "IconPhrase": "Mostly clear",
        "ShortPhrase": "Mostly clear",
        "LongPhrase": "Mostly clear",
        "PrecipitationProbability": 25,
        "ThunderstormProbability": 24,
        "RainProbability": 25,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 9.3,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 119,
            "Localized": "ESE",
            "English": "ESE"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 20.4,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 83,
            "Localized": "E",
            "English": "E"
          }
        },
        "TotalLiquid": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "Rain": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "Snow": {
          "Value": 0,
          "Unit": "cm",
          "UnitType": 4
        },
        "Ice": {
          "Value": 0,
          "Unit": "mm",
          "UnitType": 3
        },
        "HoursOfPrecipitation": 0,
        "HoursOfRain": 0,
        "HoursOfSnow": 0,
        "HoursOfIce": 0,
        "CloudCover": 24
      },
      "Sources": [
        "AccuWeather"
      ],
      "MobileLink": "http://m.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=5&unit=c&lang=en-us",
      "Link": "http://www.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=5&unit=c&lang=en-us"
    }
  ]
}');
        print '$data->DailyForecasts[0]->Temperature->Maximum->Value';
        echo br();
        foreach ($data->DailyForecasts as $key => $value) {
            print $value->Temperature->Maximum->Value;
            echo br();
        }
       
        
        var_dump($data);
    }
    
    public function countrystate($param){
        switch ($param) {
            case 'states':
                $countryID = $this->input->post('country_id');
                $this->db->where('city_locale',$countryID);
                $this->db->order_by('city_name','ASC');
                $result = $this->db->get('weather_cities');
                if($result->num_rows()>0){
                    foreach ($result->result_array() as $key => $row) {
                        echo '<option value="'.$row['city_serial'].'">'.$row['city_name'].'</option>';
                    }
                 }else{
                    echo '<option value="">State not available</option>';
                }
                break;
            case 'citylocations':
                $cityID = $this->input->post('city_id');
                $this->db->where('weather_city_location_city',$cityID);
                $this->db->order_by('weather_city_location_name','ASC');
                $result = $this->db->get('weather_cities_locations');
                if($result->num_rows()>0){
                    foreach ($result->result_array() as $key => $row) {
                        echo '<option value="'.$row['weather_city_location_id'].'">'.$row['weather_city_location_name'].'</option>';
                    }
                 }else{
                    echo '<option value="">No Location available</option>';
                }
                break;
            default:
                 echo '<option value="">State not available</option>';
                break;
        }
}

   public function getfielddata($param){
        switch ($param) {
            case 'crops':
                $fieldID = $this->input->post('field_id');
                $this->db->select('field_landtype');
                $this->db->where('field_id',$fieldID);
                $result = $this->db->get('fields');
                if($result->num_rows()>0):
                    $landtype = $result->row()->field_landtype;
                    $result->free_result();
                    $this->db->where('landcrops_land',$landtype);
                    $this->db->join('crops','crops.crop_id=landcrops.landcrops_crop','left');
                    $results = $this->db->get('landcrops');
                    if($results->num_rows()>0):
                        foreach ($results->result_array() as $key => $row) :
                        echo '<option value="'.$row['crop_id'].'">'.$row['crop'].'</option>';
                    endforeach;
                    endif;
                  else :
                    echo '<option value="">Unavailable</option>';
                endif;                
                break;
            case 'fieldunit':
                $fieldID = $this->input->post('field_id');
                $this->db->select('field_unit');
                $this->db->where('field_id',$fieldID);
                $result = $this->db->get('fields');
                if($result->num_rows()>0):
                    $unit_id = $result->row()->field_unit;
                    $result->free_result();
                    $this->db->where('unit_id',$unit_id);
                    $results = $this->db->get('units');
                    if($results->num_rows()>0):
                        $data['unit_symbol'] = $results->row()->unit_symbol;
                        $data['unit_id'] = $results->row()->unit_id;
                        print json_encode($data);
                    endif;
                  else :
                    echo 'NA';
                endif;                
                break;
            default:
                 echo 'NA';
                break;
        }
}

  
   
    public function language($param=NULL) {
        $languages = array('sw-tz','english');
        if(!empty($param) && in_array($param, $languages)){
            $this->session->set_userdata('language',$param);
        }
        
        if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        } else {
            header("Location: " . base_url());
        }    
    }
    
    public function unavailable() {
     $this->load->view('unavailables');    
    }
    
   /**
    * Sign up for application
   */
    public function createaccount()
	{
      
		// Method should not be directly accessible
		if( $this->uri->uri_string() == 'app/createaccount')
			show_404();
                
                if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' ){
                    // Customize this array for your user
                    
                    $mobile = str_replace('-', '',trim($this->input->post('mobile')));
                    $mobile = str_replace(' ','',$mobile);
                    //$mobile_code = rand(10000,99999);
                    
                    switch ($this->input->post('auth_level')) {
                        case 'client':
                            $auth_level = '3';
                            break;

                        default:
                            $auth_level = '3';
                            break;
                    }
                    
                    $user_data = [
                            'mobile'   => $mobile,
                            'email'   => $this->input->post('email'),
                            'localization'   => $this->input->post('localization'),
                            'passwd'     => $this->input->post('passwd'),
                        'default_city'     => $this->input->post('default_city'),
                            'confirmpasswd'     => $this->input->post('confirmpasswd'),
                            'auth_level' => $auth_level, 
                    ];
                    
                    // Load resources
                    $this->load->helper('auth');
                    $this->load->model('app/app_model');
                    $this->load->model('app/validation_callables');
                    $this->load->library('form_validation');

                    $this->form_validation->set_data( $user_data );
                    
                    $validation_rules = [
			[
				'field' => 'mobile',
				'label' => 'Mobile',
				'rules' => 'max_length[12]|is_unique[' . db_table('user_table') . '.mobile]',
				'errors' => [
					'is_unique' => 'Mobile number already in use.'
				]
			],
			[
				'field' => 'passwd',
				'label' => 'passwd',
				'rules' => [
					'trim',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'The password field is required.'
				]
			],
			[
				'field'  => 'email',
				'label'  => 'email',
				'rules'  => 'trim|required|valid_email|is_unique[' . db_table('user_table') . '.email]',
				'errors' => [
					'is_unique' => 'Email address already in use.'
				]
			],
                        [
				'field'  => 'confirmpasswd',
				'label'  => 'Confirm Password',
				'rules'  => 'required|matches[passwd]',
				'errors' => [
					'is_unique' => 'Passwords do not match.'
				]
			],
			[
				'field' => 'auth_level',
				'label' => 'auth_level',
				'rules' => 'required|integer|in_list[1,2,3,4,5,6,7,8,9]'
			]
		];

		$this->form_validation->set_rules( $validation_rules );
                

		if( $this->form_validation->run() )
		{
                        $user_id = $this->app_model->get_unused_user_id();
			$user_data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
			$user_data['user_id']    = $user_id;
			$user_data['created_at'] = date('Y-m-d H:i:s');
                        
                      
			// If username is not used, it must be entered into the record as NULL
			if( empty( $user_data['username'] ) )
			{
				$user_data['username'] = $mobile;
			}
                        
                        unset($user_data['confirmpasswd']);
                        
			$this->db->set($user_data)
				->insert(db_table('user_table'));

			if( $this->db->affected_rows() == 1 ){
                              $user_weather_data = [
                                    'profile_weather_account'   => $user_id,
                                    'profile_weather_city'   => 1
                                ];
                        
                            $this->db->insert('profile_weather_data',$user_weather_data);
                                    
                            $var['status'] = TRUE;
                            $var['class'] = 'alert-success';
		            $var['message'] = '<h4>Congratulations</h4>' . '<p>User ' . $user_data['username'] . ' was created.</p>';
                            $this->load->vars($var);
                        }
                            }
                            else
                            {
                            $var['status'] = TRUE;
                            $var['class'] = 'alert-danger';
		            $var['message'] = '<h5>User Creation Error(s)</h5>' . validation_errors();
                            $this->load->vars($var);
                            }
                     }
	
                $pagedata = array('localization' => $this->client_model->localizations());
                $this->load->view('signup',$pagedata);
	}
        

    public function login()
	{
        
         if( $this->is_logged_in() ){
             redirect($this->auth_role.'/dashboard'); print 'not loged';
         } 
		// Method should not be directly accessible
		if( $this->uri->uri_string() == 'app/login')
			show_404();
                
                if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' )
			$this->require_min_level(1);
                
                $this->setup_login_form();
                
                $data = array();
                $pageData = array('data'=>$data);
                $this->load->view('login',$pageData);
	}

                
	public function logout()
	{
		$this->authentication->logout();

		// Set redirect protocol
		$redirect_protocol = USE_SSL ? 'https' : NULL;

		redirect( base_url() );
	}

	// --------------------------------------------------------------
 
        /**
	 * User recovery form
	 */
	public function reset() 
	{
		// Load resources
		$this->load->model('app/app_model');

		/// If IP or posted email is on hold, display message
		if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
		{
			$view_data['disabled'] = TRUE;
		}
		else
		{
			// If the form post looks good
			if( $this->input->post('mobile') )
			{
                             $number = str_replace('-', '',trim($this->input->post('mobile',TRUE)));
                             $number = str_replace(' ','',$number);
				if( $user_data = $this->app_model->get_recovery_data( $number ) )
				{
					// Check if user is banned
					if( $user_data->banned == '1' )
					{
						// Show special message for banned user
						$view_data['banned'] = 1;
					}
					else
					{
				        // Update user record with recovery code and time
                                            $charsz = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
                                            $password = substr( str_shuffle( $charsz ), 0, 8 ).'!';
                                            $datar['passwd'] = $this->authentication->hash_passwd($password);
					    $datar['passwd_recovery_date'] = date('Y-m-d H:i:s');
                                            $this->load->model('system_model');
                                            $this->system_model->profile_update($user_data->user_id,$datar);
                        
                                                $sms['sender'] = 'Tanzaproud';
                                                $sms['recepient'] = $number;
                                                $sms['text'] = 'Your New Password is '.$password.'  For support +255653743604 \n Jap Technologies';
                                                $this->system_library->sendSingleSms($sms); 
                                                $view_data['success'] = TRUE;
					}
				}
				// There was no match, log an error, and display a message
				else
				{
                                    $view_data['no_match'] = TRUE;
				}
			}
		}


	 $this->load->view('reset', ( isset( $view_data ) ) ? $view_data : '' );

		
	}

	// --------------------------------------------------------------

        /**
	 * Verification of a user by email for recovery
	 * 
	 * @param  int     the user ID
	 * @param  string  the passwd recovery code
	 */
	public function verification($reset_key=NULL )
	{
	
            /// If IP is on hold, display message
	  if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
		{
		   $view_data['disabled'] = 1;
		}
		else
		 {
			// Load resources
			$this->load->model('external/examples_model');

			if( 
				/**
				 * Make sure that $user_id is a number and less 
				 * than or equal to 10 characters long
				 */
				is_numeric( $reset_key ) && strlen( $reset_key ) <= 10 &&
				$recovery_data = $this->examples_model->get_recovery_verification_data( $reset_key )
                                
                                )
			{
				
					$view_data['user_id']       = $recovery_data->user_id;
					$view_data['username']     = $recovery_data->username;
					$view_data['recovery_code'] = $recovery_data->passwd_recovery_code;
			
			}

			// Link is bad so show message
			else
			{
				$view_data['recovery_error'] = 1;

				// Log an error
				$this->authentication->log_error('');
			}

			/**
			 * If form submission is attempting to change password 
			 */
			if( $this->tokens->match )
			{
				$this->examples_model->recovery_password_change();
			}
		}


		$this->load->view( 'choose_password_form', $view_data);
	}

	// --------------------------------------------------------------

         /**
	 * Verification of a user by email for recovery
	 * 
	 * @param  int     the user ID
	 * @param  string  the passwd recovery code
	 */
	public function recovery_verification( $user_id = '', $recovery_code = '' )
	{
		/// If IP is on hold, display message
	  if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
		{
		   $view_data['disabled'] = 1;
		}
		else
		 {
			// Load resources
			$this->load->model('external/examples_model');

			if( 
				/**
				 * Make sure that $user_id is a number and less 
				 * than or equal to 10 characters long
				 */
				is_numeric( $user_id ) && strlen( $user_id ) <= 10 &&

				/**
				 * Make sure that $recovery code is exactly 72 characters long
				 */
				strlen( $recovery_code ) == 72 &&

				/**
				 * Try to get a hashed password recovery 
				 * code and user salt for the user.
				 */
				$recovery_data = $this->examples_model->get_recovery_verification_data( $user_id ) )
			{
				/**
				 * Check that the recovery code from the 
				 * email matches the hashed recovery code.
				 */
				if( $recovery_data->passwd_recovery_code == $this->authentication->check_passwd( $recovery_data->passwd_recovery_code, $recovery_code ) )
				{
					$view_data['user_id']       = $user_id;
					$view_data['username']     = $recovery_data->username;
					$view_data['recovery_code'] = $recovery_data->passwd_recovery_code;
				}

				// Link is bad so show message
				else
				{
					$view_data['recovery_error'] = 1;

					// Log an error
					$this->authentication->log_error('');
				}
			}

			// Link is bad so show message
			else
			{
				$view_data['recovery_error'] = 1;

				// Log an error
				$this->authentication->log_error('');
			}

			/**
			 * If form submission is attempting to change password 
			 */
			if( $this->tokens->match )
			{
				$this->examples_model->recovery_password_change();
			}
		}


		$this->load->view( 'choose_password_form', $view_data);
	}

	// --------------------------------------------------------------

   private function __password($length = 8, $add_dashes = false, $available_sets = 'luds') {
        $sets = array();
        if (strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if (strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if (strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if (strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';
        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];
        $password = str_shuffle($password);
        if (!$add_dashes)
            return $password;
        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while (strlen($password) > $dash_len) {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }

}
 
