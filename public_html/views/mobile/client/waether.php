<?php include('header.php');?>
        <div class="wrapper wrapper-content">
            <div class="container">
             <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2 class="text-uppercase"><?php echo lang('menu_weather');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('client/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                         <li>
                            <a href="<?php echo base_url('client/weather');?>" style="text-transform: capitalize;"><?php echo lang('menu_weather');?></a>
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
                    <div class="col-lg-112">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div class="feature-module">
                                        <div class="feature-radar">
                                            <div class="radar-info">
                                            <h3>Tanzania Weather Map</h3>
                                            </div>
                                    <div id="radar" class="" style="position:relative;overflow:hidden;background:#7a9fb9;">
                                            <a href="https://www.accuweather.com/en/tz/national/satellite">
                                                        <div style="position:relative;width:100%;height:300px;background:#7a9fb9 url('https://onetile.accuweather.com/OneTile/en-us/WorldSat/b30dabe91/gray/labels/3/2/4/8/7.jpg');background-position: -47px -199px;">
                                                <i class="location-marker"></i>
                                                    <span class="bing-attrib"></span>
                                                </div>
                                            </a>

                                            </div>
                                        </div>

                                    </div>
                                <!--<div class="row">
                                    <div class="col-sm-12 col-sm-6">
                                        <ul class="list-group clear-list m-t">
                                        <li class="list-group-item fist-item" data-href="https://www.accuweather.com/en/tz/arusha/317029/weather-forecast/317029"> 
                                            <div class="frame"></div> 
                                            <div class="info"> 
                                                <h6><a href="https://www.accuweather.com/en/tz/arusha/317029/weather-forecast/317029">Arusha</a></h6> 
                                                <a href="https://www.accuweather.com/en/tz/arusha/317029/weather-forecast/317029">
                                                    <div class="icon icon-inline i-4-s"></div>
                                                    <span>23°</span>
                                                </a>
                                            </div> 
                                        </li> 
                                        <li class="list-group-item" data-href="https://www.accuweather.com/en/tz/bagamoyo/314424/weather-forecast/314424"> 
                                            <div class="frame"></div> 
                                            <div class="info"> 
                                                <h6><a href="https://www.accuweather.com/en/tz/bagamoyo/314424/weather-forecast/314424">Bagamoyo</a></h6> 
                                                <a href="https://www.accuweather.com/en/tz/bagamoyo/314424/weather-forecast/314424">
                                                    <div class="icon icon-inline i-7-s"></div>
                                                    <span>28°</span>
                                                </a>
                                            </div> 
                                        </li> 
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-sm-6">
                                        <ul class="list-group clear-list m-t">
                                        <li class="list-group-item fist-item" data-href="https://www.accuweather.com/en/tz/arusha/317029/weather-forecast/317029"> 
                                            <div class="frame"></div> 
                                            <div class="info"> 
                                                <h6><a href="https://www.accuweather.com/en/tz/arusha/317029/weather-forecast/317029">Arusha</a></h6> 
                                                <a href="https://www.accuweather.com/en/tz/arusha/317029/weather-forecast/317029">
                                                    <div class="icon icon-inline i-4-s"></div>
                                                    <span>23°</span>
                                                </a>
                                            </div> 
                                        </li> 
                                        <li class="list-group-item" data-href="https://www.accuweather.com/en/tz/dodoma/312738/weather-forecast/312738"> 
                                            <div class="frame"></div> 
                                            <div class="info"> 
                                                <h6><a href="https://www.accuweather.com/en/tz/dodoma/312738/weather-forecast/312738">Dodoma</a></h6> 
                                                <a href="https://www.accuweather.com/en/tz/dodoma/312738/weather-forecast/312738">
                                                    <div class="icon icon-inline i-2-s"></div>
                                                    <span>23°</span>
                                                </a>
                                            </div> 
                                        </li> 
                                        </ul>
                                    </div>
                                </div>  -->
                                    

                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
      <?php include('footer.php');?>
    <script>
    </script>

</body>

</html>
