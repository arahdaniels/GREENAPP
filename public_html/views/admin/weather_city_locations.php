<?php include('header.php');?>
<link href="<?php echo $this->config->item('resources');?>css/plugins/footable/footable.core.css" rel="stylesheet">
        <div class="wrapper wrapper-content">
            <div class="container">
                <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2><?php echo lang('menu_weather');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('admin/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                        <li>
                            <a style="text-transform: capitalize;"><?php echo lang('menu_cities');?></a>
                        </li>
                        <li class="active">
                            <strong><?php echo lang('menu_locations');?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <img src="<?php echo $this->config->item('resources');?>img/a4.jpg" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                   <?php echo $profile->firstname.' '.$profile->lastname;?>
                                </h2>
                                <h4 style="text-transform: capitalize;"><?php echo $auth_role;?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3">

                    <div class="ibox">
                        <div class="ibox-content text-primary">
                             <div class="row">
                                    <div class="col-xs-4 text-primary">
                                        <i style="color: #e2e0e0;" class="fa fa-cloud fa-5x text-primary"></i>
                                    </div>
                                    <div class="col-xs-8 text-right ">
                                        <span> <?php echo $weather->city_name;?> </span>
                                        <h3 class="font-bold text-primary"><?php if(empty($output)){
                                                $wdata = json_decode('{
  "Headline": {
    "EffectiveDate": "2018-01-14T07:00:00+03:00",
    "EffectiveEpochDate": 1515902400,
    "Severity": 7,
    "Text": "Seasonal temperatures for the next 5 days",
    "Category": "",
    "EndDate": null,
    "EndEpochDate": null,
    "MobileLink": "https://m.accuweather.com/en/tz/dar-es-salaam/317663/extended-weather-forecast/317663?unit=c&lang=en-us",
    "Link": "https://www.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?unit=c&lang=en-us"
  },
  "DailyForecasts": [
    {
      "Date": "2018-01-14T07:00:00+03:00",
      "EpochDate": 1515902400,
      "Sun": {
        "Rise": "2018-01-14T06:18:00+03:00",
        "EpochRise": 1515899880,
        "Set": "2018-01-14T18:46:00+03:00",
        "EpochSet": 1515944760
      },
      "Moon": {
        "Rise": "2018-01-14T04:02:00+03:00",
        "EpochRise": 1515891720,
        "Set": "2018-01-14T16:44:00+03:00",
        "EpochSet": 1515937440,
        "Phase": "WaningCrescent",
        "Age": 27
      },
      "Temperature": {
        "Minimum": {
          "Value": 25,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 31.4,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperature": {
        "Minimum": {
          "Value": 28.2,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 36.6,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "RealFeelTemperatureShade": {
        "Minimum": {
          "Value": 28.2,
          "Unit": "C",
          "UnitType": 17
        },
        "Maximum": {
          "Value": 34.8,
          "Unit": "C",
          "UnitType": 17
        }
      },
      "HoursOfSun": 5.3,
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
        "Icon": 4,
        "IconPhrase": "Intermittent clouds",
        "ShortPhrase": "Times of clouds and sun",
        "LongPhrase": "Times of clouds and sun",
        "PrecipitationProbability": 20,
        "ThunderstormProbability": 0,
        "RainProbability": 20,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 18.5,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 18,
            "Localized": "NNE",
            "English": "NNE"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 31.5,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 360,
            "Localized": "N",
            "English": "N"
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
        "CloudCover": 61
      },
      "Night": {
        "Icon": 38,
        "IconPhrase": "Mostly cloudy",
        "ShortPhrase": "Increasing clouds",
        "LongPhrase": "Increasing clouds",
        "PrecipitationProbability": 25,
        "ThunderstormProbability": 24,
        "RainProbability": 25,
        "SnowProbability": 0,
        "IceProbability": 0,
        "Wind": {
          "Speed": {
            "Value": 14.8,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 25,
            "Localized": "NNE",
            "English": "NNE"
          }
        },
        "WindGust": {
          "Speed": {
            "Value": 20.4,
            "Unit": "km/h",
            "UnitType": 7
          },
          "Direction": {
            "Degrees": 58,
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
        "CloudCover": 82
      },
      "Sources": [
        "AccuWeather"
      ],
      "MobileLink": "https://m.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=1&unit=c&lang=en-us",
      "Link": "https://www.accuweather.com/en/tz/dar-es-salaam/317663/daily-weather-forecast/317663?day=1&unit=c&lang=en-us"
    }
  ]
}');
                                             //   var_dump($wdata)  ;
                                                echo $wdata->DailyForecasts[0]->Temperature->Minimum->Value.'\''.$wdata->DailyForecasts[0]->Temperature->Minimum->Unit.' - '.$wdata->DailyForecasts[0]->Temperature->Maximum->Value.'\''.$wdata->DailyForecasts[0]->Temperature->Maximum->Unit;
                                        }?></h3>
                                    </div>
                                </div>

                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-title bg-primary text-uppercase">                            
                            <h3><i class="fa fa-location-arrow fa-1x"></i> <?php echo lang('menu_registerlocation'); ?></h3>
                        </div>
                        <div class="ibox-content">
                           <?php $attr = array('method'=>'post'); echo form_open(base_url('admin/weather/location/'.$city->city_serial),$attr);?>
                            <input value="<?php echo $city->city_serial;?>" name="city_serial" type="hidden" readonly />
                            <div class="form-group">
                               <!-- <label><?php echo lang('menu_locationname'); ?></label>-->
                                <input required name="location_name" class="form-control" placeholder="<?php echo lang('menu_locationname'); ?>" />
                            </div>
                            <div class="form-group">
                                <!--<label><?php echo lang('menu_locationserial'); ?></label>-->
                                <input required name="location_serial" class="form-control" placeholder="<?php echo lang('menu_locationserial'); ?>" />
                            </div>
                            <button class="btn btn-primary btn-block text-uppercase"><?php echo lang('menu_submit'); ?></button>
                        <?php echo form_close();?>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">
                        <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#locations" aria-expanded="true"> <i class="fa fa-location-arrow"></i> <?php echo lang('menu_locations');?></a></li>
                            <li><a data-toggle="tab" href="#cities" aria-expanded="true"> <i class="fa fa-street-view"></i> <?php echo lang('menu_cities');?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="locations" class="tab-pane active">
                                <div class="panel-body">
                                  <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search <?php echo lang('menu_location');?>">
                                    <table class="table footable table-stripped" data-page-size="10" data-filter=#filter>
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo lang('menu_locationname');?></th>
                                            <th><?php echo lang('menu_locationserial');?></th>
                                            <th><?php echo lang('menu_options');?></th>
                                        </tr> 
                                        </thead>
                                        <tbody>
                                       <?php if(!empty($locations)){
                                            $i =1;
                                                foreach ($locations as $key => $value) { ?> 
                                                     <tr>                                                         
                                                        <td><?php echo $i;?></td>
                                                        <td><?php echo ucfirst($value['weather_city_location_name']);?><a style="text-decoration: none; text-decoration-style: dashed; text-decoration-color:grey;" class="text-primary" href="javascript:modifylocationname( <?php echo $value['weather_city_location_id'];?> , '<?php echo $value['weather_city_location_serial'];?>' );"> <sub style="color:red;"><small><b>ch</b></small></sub></a></td>
                                                        <td><?php echo $value['weather_city_location_serial'];?><a style="text-decoration: none; text-decoration-style: dashed; text-decoration-color:grey;" class="text-primary" href="javascript:modifylocationserial( <?php echo $value['weather_city_location_id'];?> , '<?php echo $value['weather_city_location_name'];?>' );"> <sub style="color:red;"><small><b>ch</b></small></sub></a></td>
                                                        <td><a class="text-danger" href="javascript:removelocation( <?php echo $value['weather_city_location_id'];?> );"><?php echo lang('menu_remove');?></a></td>
                                                    </tr>
                                           <?php $i++;}
                                       } ?>
                                       
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3">
                                                    <ul class="pagination pull-right"></ul>
                                                </td>
                                            </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div id="cities" class="tab-pane">
                                <div class="panel-body">
                                  <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search  <?php echo lang('menu_city');?>">
                                    <table class="table footable table-stripped" data-page-size="10" data-filter=#filter>
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo lang('menu_locale');?></th>
                                            <th><?php echo lang('menu_cityname');?></th>
                                            <th><?php echo lang('menu_citycode');?></th>
                                            <th><?php echo lang('menu_cityserial');?></th>
                                            <th><?php echo lang('menu_options');?></th>
                                        </tr> 
                                        </thead>
                                        <tbody>
                                       <?php if(!empty($cities)){
                                            $i =1;
                                                foreach ($cities as $key => $value) { ?> 
                                                     <tr>                                                         
                                                        <td><?php echo $i;?></td>
                                                        <td><?php echo ucfirst($value['locale']);?></td>
                                                        <td><?php echo $value['city_name'];?></td>
                                                        <td><?php echo $value['city_code'];?></td>
                                                        <td><?php echo $value['city_serial'];?></td>
                                                        <td><a class="text-primary" href="<?php echo base_url('admin/weather/location/'.$value['city_serial']);?>"><?php echo lang('menu_locations');?></a> | <a class="text-primary" href="<?php echo base_url('admin/weather/modifycity/'.$value['city_serial']);?>"><?php echo lang('menu_modify');?></a> | 
                                                            <a class="text-danger" href="javascript:removecity( <?php echo $value['city_serial'];?> );"><?php echo lang('menu_remove');?></a></td>
                                                    </tr>
                                           <?php $i++;}
                                       } ?>
                                       
                                        </tbody>
                                        <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            </div>

        </div><br/>
      <?php include('footer.php');?>
<script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <script>
   function modifylocationname( key , locationSerial ){
        swal({
            title: 'Modify Location Name?',
            input: 'text',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            inputPlaceholder: 'Enter Location Name',
            inputValidator: (value) => {
                return !value && 'You need to write something!'
                },
            showLoaderOnConfirm: true,
            preConfirm: ( name ) => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('admin/weather/modifycitylocation');?>',
                        type: 'post',
                        data: {'location_id' : key, 'location_serial' : locationSerial , 'location_name' : name },
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           resolve( xhr.statusText );
                        }
                        });
                  });
                },
                allowOutsideClick: () => !swal.isLoading()
              }).then((result) => {
                if (result.value) {
                  swal({
                    type: 'success',
                    title: result.value
                  });
                }
              });
    }
  
   function modifylocationserial( key , locationName ){
        swal({
            title: 'Modify Location Serial?',
            input: 'text',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            inputPlaceholder: 'Enter Location Serial',
            inputValidator: (value) => {
                return !value && 'You need to write something!'
                },
            showLoaderOnConfirm: true,
            preConfirm: ( serial ) => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('admin/weather/modifycitylocation');?>',
                        type: 'post',
                        data: {'location_id' : key, 'location_name' : locationName , 'location_serial' : serial },
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           resolve( xhr.statusText );
                        }
                        });
                  });
                },
                allowOutsideClick: () => !swal.isLoading()
              }).then((result) => {
                if (result.value) {
                  swal({
                    type: 'success',
                    title: result.value
                  });
                }
              });
    }
  
  
    function removelocation( key ){
             swal({
            title: '<?php echo lang('menu_delete?');?>',
            showCancelButton: true,
            confirmButtonText: '<?php echo lang('menu_yesdelete');?>',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('admin/weather/deletecitylocation');?>',
                        type: 'post',
                        data: {'location_id' : key},
                        success: function( result ){
                                resolve( result )
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           resolve( xhr.statusText )
                        }
                    });
              })
            },
            allowOutsideClick: () => !swal.isLoading()
          }).then((result) => {
            if (result.value) {
              swal({
                type: 'success',
                title: result.value
              })
            }
          });
                   
            }
            
              $(function (){
        $('.footable1').footable();
    });
    </script>

</body>

</html>
