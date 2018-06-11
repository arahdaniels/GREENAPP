<style>
     /* The location pointed to by the popup tip. */
      .popup-tip-anchor {
        height: 0;
        position: absolute;
        /* The max width of the info window. */
        width: 200px;
      }
      /* The bubble is anchored above the tip. */
      .popup-bubble-anchor {
        position: absolute;
        width: 100%;
        bottom: /* TIP_HEIGHT= */ 8px;
        left: 0;
      }
      /* Draw the tip. */
      .popup-bubble-anchor::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        /* Center the tip horizontally. */
        transform: translate(-50%, 0);
        /* The tip is a https://css-tricks.com/snippets/css/css-triangle/ */
        width: 0;
        height: 0;
        /* The tip is 8px high, and 12px wide. */
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: /* TIP_HEIGHT= */ 8px solid white;
      }
      /* The popup bubble itself. */
      .popup-bubble-content {
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, -100%);
        /* Style the info window. */
        background-color: white;
        padding: 5px;
        border-radius: 5px;
        font-family: sans-serif;
        overflow-y: auto;
        max-height: 60px;
        box-shadow: 0px 2px 10px 1px rgba(0,0,0,0.5);
      }
    </style>
<?php include('header.php');
// create curl resource 

    if( !empty($wcast->Code)){
        echo br(2);
        echo '<div class="alert alert-danger">Error Code: '.$wcast->Code.' Message: '.$wcast->Message.'</div>';
        $wcast = NULL;
        $weatherText = 'Unavailable';
        $tempinfo = 'Unavailable';
    }else{

            if( ! empty($wcast)){
                   $tempinfo = $wcast->DailyForecasts[0]->Temperature->Maximum->Value.'\''.$wcast->DailyForecasts[0]->Temperature->Maximum->Unit;               
              }else{
                $wcast = NULL;            
            }  
            if(!empty($wcond)) {
               $weatherText = $wcond[0]->WeatherText;
               $tempinfo = $wcond[0]->Temperature->Metric->Value.' \''.$wcond[0]->Temperature->Metric->Unit;
            }else{
               $weatherText = 'Unavailable';
               $tempinfo = 'Unavailable';
           }
    }

?>
        <div class="wrapper wrapper-content">
            <div class="container-fluid">
              <div class="row  border-bottom bg-primary page-heading b-r-md" style="margin-bottom: 30px;">
                <div class="col-lg-12">
                    <h2 class="text-uppercase"><?php echo lang('menu_agriculture');?>
                        <small class=" text-white" style="font-size: small;">
                            <?php if($sampleweather){
                                echo 'Weather data whown are not actual, They are for DEMO puporse';
                                } ?>
                        </small>
                    </h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('client/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                         <li>
                            <a href="<?php echo base_url('client/fields');?>" style="text-transform: capitalize;"><?php echo lang('menu_fields');?></a>
                        </li>
                        <li class="active">
                            <strong><?php echo lang('menu_details');?></strong>
                        </li>
                    </ol>                    
                </div>
            </div>
            <?php 
            $profil['resource_url'] = $this->config->item('resources');
            $profil['firstname'] = $profile->firstname;
            $profil['middlename'] = $profile->middlename;
            $profil['lastname'] = $profile->lastname;
            $profil['about'] = $profile->about;
            $profil['auth_role'] = $auth_role;
            if(!empty($wcond)){
                $wdata['humidity'] = $wcond[0]->RelativeHumidity;
                $wdata['winddirection'] = $wcond[0]->Wind->Direction->Degrees.' '.$wcond[0]->Wind->Direction->English;
                $wdata['windspeed'] = $wcond[0]->Wind->Speed->Metric->Value.' '.$wcond[0]->Wind->Speed->Metric->Unit;
                $wdata['precipitation'] = $wcond[0]->PrecipitationSummary->Precipitation->Metric->Value.' '.$wcond[0]->PrecipitationSummary->Precipitation->Metric->Unit;
                $wdata['pressure'] = $wcond[0]->Pressure->Metric->Value.' '.$wcond[0]->Pressure->Metric->Unit;
            }else{
                $wdata = NULL;
            }
            profile_header_weather($profil,$wdata);?>
           <div class="row">            
            <div class="col-sm-3">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-cloud fa-4x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <small><?php echo $weatherText;?></small>
                            <h3 class="font-bold"><?php echo $tempinfo;?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget bg-muted">
                    <div class="row">
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-map-o fa-4x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> <?php echo lang('menu_areautilized');?> </span>
                            <h2 class="font-bold">0 %</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-envelope-o fa-4x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> messages </span>
                            <h2 class="font-bold">260</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget style1 white-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-bell-o fa-4x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> <?php echo lang('menu_notification');?> </span>
                            <h2 class="font-bold">0</h2>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="clearfix"></div><br/>
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox float-e-margins border-top border-left-right border-bottom border-size-lg">
                       <!--
                        <div class="ibox-title">
                            <h5><?php echo lang('menu_fielddetails').' - <b class="text-navy">'.$field->field_name;?></b></h5>
                        </div> -->
                        <div class="ibox-content ">
                            <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#overview"> <?php echo lang('menu_overview');?></a></li>
                            <li class=""><a data-toggle="tab" href="#weather"><?php echo lang('menu_weather');?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="overview" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h3><?php echo ucfirst($field->field_name);?></h3>
                                            <small><?php echo $field->city_name.' '.$field->weather_city_location_name;?></small>
                                            <ul class="list-group clear-list m-t">
                                                <li class="list-group-item fist-item">
                                                    <span class="pull-right">
                                                        <?php echo ucfirst($field->field_name);?>
                                                    </span>
                                                     <?php echo lang('menu_name');?>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right">
                                                        <?php echo ucfirst($field->weather_city_location_name);?>
                                                    </span>
                                                     <?php echo lang('menu_location');?>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right">
                                                        <?php if($field->unit_symbol_position == 'left') { echo $field->unit_symbol.' '.$field->field_area; }else{
                                                           echo  $field->field_area.' '.$field->unit_symbol;
                                                        };?>
                                                    </span>
                                                     <?php echo lang('menu_area');?>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right">
                                                        <?php echo ucfirst($field->weather_city_location_name);?>
                                                    </span>
                                                     <?php echo lang('menu_usage');?>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right">
                                                        <?php echo $field->landtype;?>
                                                    </span>
                                                     <?php echo lang('menu_landtype');?>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right">
                                                        <?php echo ucfirst($field->field_ownership);?>
                                                    </span>
                                                     <?php echo lang('menu_ownership');?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-8">
                                            <div style="height: 300px" id="mapInfo">Loading map ...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="weather" class="tab-pane">
                                <div class="panel-body">
                                  <p>
                                      <?php if(!empty($wcast)) { ?>
                                        <div class="alert alert-info"><?php echo $wcast->Headline->Text;?></div>    
                                        <?php } else {?>
                                        <div class="alert alert-danger">Unavailable</div>
                                      <?php  } ?>
                                    </p>
                                    <div class="table-responsive">
                           <table class="text-center table" style="border: 1px #cccccc solid;">
                                <thead class="p-sm">
                                    <tr class="p-sm" style="border-top:3px #0aa873 solid;border-bottom:3px #0aa873 solid; height: 60px;">
                                        <?php if(!empty($wcast)){
                                        foreach ($wcast->DailyForecasts as $key => $value) {
                                             $day = date('l');
                                             $today = date('l', strtotime($value->Date));?>                                             
                                                <th class="text-center <?php if($day == $today) echo 'bg-primary';?>">
                                                <?php  echo $today;?><br>
                                                 <?php  echo date('d/m/Y', strtotime($value->Date));?></th>     
                                            <?php   }
                                          }?> 
                                    </tr>
                                </thead>
                                <tbody >
                                   <tr>                                                 
                                    <?php if(!empty($wcast)){
                                        foreach ($wcast->DailyForecasts as $key => $value) { ?>
                                            <td style="border: 1px #cccccc solid;">
                                                <h5>Max: <span style=" font-size: 16px;"><?php echo $value->Temperature->Maximum->Value.'\''.$value->Temperature->Maximum->Unit;?></span><br/></h5>
                                                <h5>Min: <span style=" font-size: 16px;"><?php echo $value->Temperature->Minimum->Value.'\''.$value->Temperature->Minimum->Unit;?></span><br/></h5>
                                                <h5>Precip prob: <span style=" font-size: 16px;"><?php echo $value->Day->PrecipitationProbability;?></span><br/></h5>
                                                <h5>Rain Prob: <span style=" font-size: 16px;"><?php echo $value->Day->RainProbability;?></span><br/></h5>
                                                <h5>Wind speed: <span style=" font-size: 16px;"><?php echo $value->Day->Wind->Speed->Value.' '.$value->Day->Wind->Speed->Unit;?></span><br/></h5>                                               
                                            </td>
                                      <?php }
                                    }?>
                                  </tr>
                                </tbody>
                            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-12">
                    <div class="ibox float-e-margins border-top border-left-right border-bottom border-size-lg">
                        <div class="ibox-content ">
                            <div class="table-responsive">
                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th><?php echo lang('menu_fieldname');?></th>
                                    <th><?php echo lang('menu_location');?></th>
                                    <th><?php echo lang('menu_area');?></th>
                                    <th><?php echo lang('menu_options');?></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($fields)){
                                        foreach ($fields as $key => $value) {?>
                                        <tr class="gradeX">
                                            <td><?php echo $value['field_name'];?></td>
                                            <td><?php echo $value['city_name'].' , '.$value['weather_city_location_name'];?></td>
                                            <td>
                                                <?php 
                                                if($value['unit_symbol_position'] == 'left'){
                                                    echo $value['unit_symbol'].' '.$value['field_area']; 
                                                }else{
                                                    echo $value['field_area'].' '.$value['unit_symbol']; 
                                                }
                                                ?>
                                            </td>
                                            <td class="center">
                                                <a href="<?php echo base_url('client/field/modify/'.$value['field_id']);?>" class="text-warning"><?php echo lang('menu_modify');?></a> | 
                                                <a href="javascript: deletefield( <?php echo $value['field_id'];?> );" class="text-danger"><?php echo lang('menu_delete');?></a> | 
                                                <a href="<?php echo base_url('client/field/details/'.$value['field_id']);?>" class="text-navy"><?php echo lang('menu_details');?></a>
                                            </td>
                                        </tr>
                                      <?php }
                                    }else{?>
                                        <tr>
                                            <td colspan="5">
                                                <h5 class="text-danger">You don't have field Yet</h5>
                                            </td>
                                        </tr>
                                   <?php  }
?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>                
            </div>
        </div>
    <div id="mapcontent" class="text-navy"><b><?php echo $field->field_name.' '.$field->field_area.$field->unit_symbol;?></b><br/>
    <?php echo $field->city_name.' '.$field->weather_city_location_name;?></div>
      <?php include('footer.php');?>
</body>
<script>
      function deletefield( key ){
        swal({
            title: 'Remove Field?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('client/agriculture/deletefield');?>',
                        type: 'post',
                        data: {'field_id' : key },
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = '<?php echo base_url('client/agriculture/fields');?>';
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
    
    
$(document).ready(function() {    
         $('form#modifyfield').each( function(){
        var form = $( this );
        form.submit( function(e){
            e.preventDefault();
            var data =  form.serialize();
            swal({
            title: 'Modify Field?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('client/agriculture/modifyfieldaction');?>',
                        type: 'post',
                        data: data,
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
            
        });
     });
    });  
$('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('app/countrystate/states');?>',
                    data:'country_id='+ countryID,
                    beforeSend: function(){
                        $('#state').html('<option value="">Please wait...</option>');
                    },
                    success:function(html){
                        $('#state').html(html);
                    }
                }); 
            }else{
                $('#state').html('<option value="">Select country first</option>');
            }
        });
 $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('app/countrystate/citylocations');?>',
                    data:'city_id='+ stateID,
                    beforeSend: function(){
                        $('#city-location').html('<option value="">Select city first</option>');
                    },
                    success:function(html){
                        $('#city-location').html(html);
                    }
                }); 
            }else{
                $('#city-location').html('<option value="">Select country first</option>');
            }
        });
  var map, popup, Popup;
  function initMap() {
  definePopupClass();
        // container vvariables
         var myLatLng = { lat: <?php echo $cityweatherinfo->GeoPosition->Latitude;?>, lng: <?php echo $cityweatherinfo->GeoPosition->Longitude;?>};
         // Create map
            map = new google.maps.Map(document.getElementById('mapInfo'), {
              zoom: 9,
              center: myLatLng,
              mapTypeId: 'hybrid'
            });
            
              popup = new Popup(
                    new google.maps.LatLng(<?php echo $cityweatherinfo->GeoPosition->Latitude;?>, <?php echo $cityweatherinfo->GeoPosition->Longitude;?>),
                    document.getElementById('mapcontent'));
                popup.setMap(map);
              }
           
/** Defines the Popup class. */
function definePopupClass() {
  /**
   * A customized popup on the map.
   * @param {!google.maps.LatLng} position
   * @param {!Element} content
   * @constructor
   * @extends {google.maps.OverlayView}
   */
  Popup = function(position, content) {
    this.position = position;

    content.classList.add('popup-bubble-content');

    var pixelOffset = document.createElement('div');
    pixelOffset.classList.add('popup-bubble-anchor');
    pixelOffset.appendChild(content);

    this.anchor = document.createElement('div');
    this.anchor.classList.add('popup-tip-anchor');
    this.anchor.appendChild(pixelOffset);

    // Optionally stop clicks, etc., from bubbling up to the map.
    this.stopEventPropagation();
  };
  // NOTE: google.maps.OverlayView is only defined once the Maps API has
  // loaded. That is why Popup is defined inside initMap().
  Popup.prototype = Object.create(google.maps.OverlayView.prototype);

  /** Called when the popup is added to the map. */
  Popup.prototype.onAdd = function() {
    this.getPanes().floatPane.appendChild(this.anchor);
  };

  /** Called when the popup is removed from the map. */
  Popup.prototype.onRemove = function() {
    if (this.anchor.parentElement) {
      this.anchor.parentElement.removeChild(this.anchor);
    }
  };

  /** Called when the popup needs to draw itself. */
  Popup.prototype.draw = function() {
    var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);
    // Hide the popup when it is far out of view.
    var display =
        Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ?
        'block' :
        'none';

    if (display === 'block') {
      this.anchor.style.left = divPosition.x + 'px';
      this.anchor.style.top = divPosition.y + 'px';
    }
    if (this.anchor.style.display !== display) {
      this.anchor.style.display = display;
    }
  };

  /** Stops clicks/drags from bubbling up to the map. */
  Popup.prototype.stopEventPropagation = function() {
    var anchor = this.anchor;
    anchor.style.cursor = 'auto';

    ['click', 'dblclick', 'contextmenu', 'wheel', 'mousedown', 'touchstart',
     'pointerdown']
        .forEach(function(event) {
          anchor.addEventListener(event, function(e) {
            e.stopPropagation();
          });
        });
  };
       
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdXdGSc06S_1iIj3fewv2NgbQc_aIH_Ag&callback=initMap">
</script>
</html>
