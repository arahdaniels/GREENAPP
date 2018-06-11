<?php include('header.php');?>
        <div class="wrapper wrapper-content">
            <div class="container">
                 <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2 class="text-uppercase"><?php echo lang('menu_agriculture');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('client/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                         <li>
                            <a href="<?php echo base_url('client/market');?>" style="text-transform: capitalize;"><?php echo lang('menu_market');?></a>
                        </li>
                        <li class="active">
                            <strong><?php echo lang('menu_overview');?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <?php 
            $profil['resource_url'] = $this->config->item('resources');
            $profil['firstname'] = $profile->firstname;
            $profil['middlename'] = $profile->middlename;
            $profil['lastname'] = $profile->lastname;
            $profil['about'] = $profile->about;
            $profil['auth_role'] = $auth_role;
            profile_header($profil);?>
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox float-e-margins border-top border-left-right border-bottom border-size-lg">
                        <!--<div class="ibox-title">
                            <h5><?php echo lang('menu_mapinformation');?></h5>
                            <div class="ibox-tools">
                                <span id="map-status" class=" pull-right label label-default"><?php
                                 $result = json_decode(file_get_contents('https://www.iplocate.io/api/lookup/'.$_SERVER['REMOTE_ADDR'])); 
                                 echo $result->country;
                                    ?></span>
                            </div>
                        </div>-->
                        <div class="ibox-content no-padding">
                            <div style="height: 300px" id="mapInfo">Loading map ...</div>
                        </div>

                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins border-top border-left-right border-bottom border-size-lg">
                            <div class="ibox-content">
                                <div>
                                        <span class="pull-right text-right">
                                        <small>Average value of sales in the past month in: <strong>Tanzania</strong></small>
                                            <br/>
                                            All sales: 0
                                        </span>
                                    <h3 class="font-bold no-margins">
                                        Half-year revenue margin
                                    </h3>
                                    <small>Sales marketing.</small>
                                </div>

                                <div class="m-t-sm">

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div>
                                            <canvas id="lineChart" height="114"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="stat-list m-t-lg">
                                                <li>
                                                    <h2 class="no-margins">0</h2>
                                                    <small>Total orders in period</small>
                                                    <div class="progress progress-mini">
                                                        <div class="progress-bar" style="width: 0%;"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h2 class="no-margins ">0</h2>
                                                    <small>Orders in last month</small>
                                                    <div class="progress progress-mini">
                                                        <div class="progress-bar" style="width: 0%;"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                                <div class="m-t-md">
                                    <small class="pull-right">
                                        <i class="fa fa-clock-o"> </i>
                                        Update on Today
                                    </small>
                                    <small>
                                        <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $0.
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins border-top border-left-right border-bottom border-size-lg">
                            <div class="ibox-title">
                                <span class="label label-warning pull-right">Data has changed</span>
                                <h5>User activity</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <small class="stats-label">Pages / Visit</small>
                                        <h4>2.80</h4>
                                    </div>

                                    <div class="col-xs-4">
                                        <small class="stats-label">% New Visits</small>
                                        <h4>0.11%</h4>
                                    </div>
                                    <div class="col-xs-4">
                                        <small class="stats-label">Last week</small>
                                        <h4>0.000</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
      <?php include('footer.php');?>
    <script>
        $(document).ready(function() {
          
        });
    </script>

</body>
<script>
function initMap() {
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition( function(pos){
        
        // container vvariables
         var poly;
         var map;
         
         // Create map
            map = new google.maps.Map(document.getElementById('mapInfo'), {
              zoom: 7,
              center: {lat: pos.coords.latitude, lng: pos.coords.longitude},
              mapTypeId: 'terrain'
            });
            
         // Set map accept polygon
         poly = new google.maps.Polyline({
          strokeColor: '#00cc33',
          strokeOpacity: 0.7,
          strokeWeight: 1
        });
        poly.setMap(map);
        // Add a listener for the click event
        map.addListener('click', addLatLng);
        
         //Creating info windows
           var infowindow = new google.maps.InfoWindow({
            content: 'Content'
          });
            // Handles click events on a map, and adds a new point to the Polyline.
         function addLatLng(event) {
           var path = poly.getPath();
           setField(event.latLng);
           // Because path is an MVCArray, we can simply append a new coordinate
           // and it will automatically appear.
           path.push(event.latLng);
           

           
        // Now open info window 
        infowindow.open(map, marker);
          
         }
         
        function setField(input) {
            
        }
        
        });
      }
}


  var x = document.getElementById("map-status");

  $.getJSON('https://smart-ip.net/geoip-json/?callback=?', function (data) {
      x.innerHTML = data.countryName;
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
        
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdXdGSc06S_1iIj3fewv2NgbQc_aIH_Ag&callback=initMap">
</script>
</html>
