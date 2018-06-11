<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function cropInfo($crop=NULL,$link=NULL){?>
    <div class="ibox">
        <div class="ibox-content white-bg no-borders b-r-xm">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="text-muted text-uppercase"><b> <?php echo lang('menu_features');?> </b></h5>
                    <div class="hr-line-dashed"></div>
                    <div class="">
                        <a <?php if($link == 'overview') : echo 'class="text-info text-uppercase font-bold"'; endif; ?> href="<?php echo base_url('client/crops/details/'.$crop->field_crop_id);?>" style="font-size: 14px;" class="text-muted font-normal"><i class="fa fa-eye fa-2x pull-left"></i> &nbsp;&nbsp;&nbsp;<?php echo lang('menu_overview');?></a><div class="clearfix"></div><br/>
                        <a <?php if($link == 'varieties') : echo 'class="text-info text-uppercase font-bold"'; endif; ?> href="<?php echo base_url('client/crops/varieties/'.$crop->field_crop_id);?>" style="font-size: 14px;" class="text-muted font-normal"><i class="fa fa-leaf fa-2x pull-left"></i> &nbsp;&nbsp;&nbsp;<?php echo lang('menu_varieties');?></a><div class="clearfix"></div><br/>
                        <a style="font-size: 14px;" class="text-muted font-normal"><i class="fa fa-tasks fa-2x pull-left"></i> &nbsp;&nbsp;&nbsp;<?php echo lang('menu_seasons');?></a><div class="clearfix"></div><br/>
                        <a style="font-size: 14px;" class="text-muted font-normal"><i class="wi wi-day-light-wind fa-2x pull-left"></i>  &nbsp;&nbsp;&nbsp;<?php echo lang('menu_weather');?></a><div class="clearfix"></div><br/>
                        <a style="font-size: 14px;" class="text-muted font-normal"><i class="fa fa-cog fa-2x pull-left"></i>  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('menu_settings');?></a><div class="clearfix"></div><br/>
                        <div class=" hr-line-dashed"></div>
                        <a class="text-navy font-bold" href="<?php echo base_url('client/crops');?>" style="font-size: 14px;" class="text-muted font-normal"><i class="fa fa-list-alt fa-2x pull-left"></i>  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('menu_mycrops');?></a><div class="clearfix"></div><br/>
                        <a class="text-navy font-bold" href="<?php echo base_url('client/fields');?>" style="font-size: 14px;" class="text-muted font-normal"><i class="fa fa-map-o fa-2x pull-left"></i> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo lang('menu_fields');?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
<?php }


function fieldCrops($fieldCrops){?>
    <div class="ibox">
        <div class="ibox-content white-bg no-borders b-r-xs">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="text-muted text-uppercase"><b> <?php echo lang('menu_mycrops');?> </b></h5>
                    <div class="hr-line-dashed"></div>
                    <div class="">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo lang('menu_field');?></th>
                                    <th><?php echo lang('menu_crop');?></th>
                                    <th><?php echo lang('menu_options');?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($fieldCrops as $value) : ?>
                                <tr>
                                    <td><a class="text-navy font-bold" href="<?php echo base_url('client/field/details/'.$value['field_id']);?>"><?php echo $value['field_name'];?></a></td>
                                    <td><?php echo $value['crop'];?></td>
                                    <td>
                                        <a class="font-bold text-navy" href="<?php echo base_url('client/crops/details/'.$value['field_crop_id']);?>"><?php echo lang('menu_details');?></a> | 
                                        <a class="font-bold text-warning" href="<?php echo base_url('client/crops/modify');?>"><?php echo lang('menu_modify');?></a> | 
                                        <a  class="font-bold text-danger" href="javascript: deletefieldcrop( <?php echo $value['field_crop_id'];?> );"><?php echo lang('menu_delete');?></a>
                                    </div>
                                    </td>
                                </tr>
                                <?php  endforeach;?>
                            </tbody>
                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
<?php }
function fields( $fields = NULL){?>
    <div class="ibox ">
                        <div class="ibox-title">
                            <h5><?php echo lang('menu_fields');?></h5>
                        </div>
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
                                   <?php  }?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                    </div>
<?php }
function fieldMenu(){ ?>
    <a class="btn btn-primary btn-block text-uppercase" href="<?php echo base_url('client/field/register');?>"><?php echo lang('menu_createfield');?></a>    
    <div class="hr-line-dashed"></div>
<?php }
function fieldCropsMenu(){?>
    <div class="ibox">
        <div class="ibox-content b-r-sm white-bg no-borders">
            <div class="file-manager">
                <h5><?php echo lang('menu_cropmanagement');?></h5>
                <div class="hr-line-dashed"></div>
                 <ul class="list-group ">
                     <li class="list-group-item no-borders text-muted"><a class="text-muted" href="<?php echo base_url('client/fields');?>" style="font-size: 14px;" class="text-muted font-normal"><i class="fa fa-map-o fa-2x pull-left"></i> <?php echo lang('menu_fields');?></span></a></li> 
                     <li class="list-group-item no-borders text-muted"><a class="text-muted" href="<?php echo base_url('client/crops');?>" style="font-size: 14px;" class="text-muted font-normal"><i class="fa fa-leaf fa-2x pull-left"></i> <?php echo lang('menu_crops');?></span></a></li> 
                     <!--<li class="list-group-item no-borders text-muted"><a class="text-muted" href="<?php echo base_url('client/crops/tasks');?>" style="font-size: 14px;" class="text-muted font-normal"><i class="fa fa-tasks fa-2x pull-left"></i> <?php echo lang('menu_tasks');?></span></a></li> -->
                 </ul>              
                <!-- <h5><?php echo lang('menu_features');?></h5>
                <ul class="folder-list" style="padding: 0">
                    <li><a href="<?php echo base_url('crops/advisory/'.$crop->field_crop_id);?>"><i class="fa fa-book"></i> <?php echo lang('menu_cropadvisory');?></a></li>
                    <li><a href="<?php echo base_url('crops/inventory/'.$crop->field_crop_id);?>"><i class="fa fa-database"></i> <?php echo lang('menu_cropinventory');?></a></li>
                    <li><a href="<?php echo base_url('crops/fertilizer/'.$crop->field_crop_id);?>"><i class="wi wi-dust"></i> <?php echo lang('menu_cropfertilizer');?></a></li>
                    <li><a href="<?php echo base_url('crops/pests/'.$crop->field_crop_id);?>"><i class="fa fa-bug"></i> <?php echo lang('menu_croppests');?></a></li>
                    <li><a href="<?php echo base_url('crops/wather/'.$crop->field_crop_id);?>"><i class="wi wi-raindrop"></i> <?php echo lang('menu_cropwater');?></a></li>
                    <li><a href="<?php echo base_url('crops/machinery/'.$crop->field_crop_id);?>"><i class="fa fa-truck"></i> <?php echo lang('menu_cropmachinery');?></a></li>
                    <li><a href="<?php echo base_url('crops/manpower/'.$crop->field_crop_id);?>"><i class="fa fa-user"></i> <?php echo lang('menu_cropmanpower');?></a></li>
                </ul>
               <h5 class="tag-title">Tags</h5>
                <ul class="tag-list" style="padding: 0">
                    <li><a href="">Family</a></li>
                    <li><a href="">Work</a></li>
                    <li><a href="">Home</a></li>
                    <li><a href="">Children</a></li>
                    <li><a href="">Holidays</a></li>
                    <li><a href="">Music</a></li>
                    <li><a href="">Photography</a></li>
                    <li><a href="">Film</a></li>
                </ul>-->
                <br/>
            </div>
        </div>
                    </div>
<?php }
function profile_header($profile,$data=NULL){?>
    <div class="row m-b-lg m-t-lg">
                <div class="col-sm-6">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                <strong>0</strong> Projects
                            </td>
                            <td>
                                <strong>0</strong> Followers
                            </td>

                        </tr> 
                        <tr>
                            <td>
                                <strong>0</strong> Comments
                            </td>
                            <td>
                                <strong>0</strong> Articles
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>0</strong> Tags
                            </td>
                            <td>
                                <strong>0</strong> Friends
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
<?php }

function profile_header_weather($profile,$data=NULL){?>
    <div class="row m-b-lg m-t-lg">
         <div class="col-lg-6 col-sm-6">
                <div class="widget style1 bg-muted">
                    <?php if(!empty($data)){?>
                    <div class="row no-padding">
                        <div class="col-sm-6">
                          <ul class="list-group clear-list">
                            <li class="list-group-item fist-item">
                              Humidity <strong><?php echo $data['humidity'];?></strong>
                            </li>
                            <li class="list-group-item">
                               Pressure <strong><?php echo $data['pressure'];?></strong>
                            </li>
                          </ul>
                        </div>
                        <div class="col-sm-6">
                          <ul class="list-group clear-list">
                            <li class="list-group-item fist-item">
                                Precipitation <strong><?php echo $data['precipitation'];?></strong>
                            </li>
                            <li class="list-group-item">
                               Wind speed <strong><?php echo $data['windspeed'];?></strong>
                            </li>
                        </ul>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            </div>
<?php }

function profile_header_crop($profile,$data=NULL){?>
    <div class="row no-padding">
            <div class="col-sm-6 col-md-3 ">
                <div class="widget bg-muted">
                    <div class="row">
                        <div class="col-xs-4 text-center">
                            <i class="wi wi-day-sleet-storm  fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <h3 class="font-bold"><?php echo lang('menu_weather');?></h3>
                            <span><?php echo $data['weather'];?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget bg-muted">
                    <div class="row">
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-thermometer-quarter fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <h3> <?php echo lang('menu_temperature');?> </h3>
                            <span class="font-bold text-danger"><i class="fa fa-caret-up"></i> <?php echo $data['temphigh'];?></span><br/>
                            <span class="font-bold text-info"><i class="fa fa-caret-down "></i> <?php echo $data['templow'];?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget style1 bg-muted">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="wi wi-windy fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <h3><?php echo lang('menu_wind');?> </h3>
                            <span><?php echo $data['windspeed'];?></span><br/>
                            <span><?php echo $data['winddirection'];?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget style1 bg-muted">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="wi wi-humidity fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <h3> <?php echo lang('menu_humidity');?> </h3>
                            <h2 class="font-bold"><?php echo $data['humidity'];?></h2>
                        </div>
                    </div>
                </div>
            </div>  
     </div>
<?php }


function videoCategories($param = NULL){
    if(!empty($param)){ 
        $i = 1;
        print '<div class="ibox">
                        <div class="ibox-title bg-primary text-uppercase">                            
                            <h5>'.lang('menu_videocategories').'</h5>
                        </div>
                        <div class="ibox-content">
                        <ul class="list-group clear-list m-t">';
            foreach ($param as $key => $value) {
                $j = $i % 2;
                if($j === 1){
                    $class1 = 'label-primary';
                    $class2 = 'badge-primary';
                }elseif ($i === $j) {
                    $class = 'label-warning';
                    $class2 = 'badge-warning';
                 }else{
                    $class = 'label-danger';
                    $class2 = 'badge-danger';
              }  ?>
                <li class="list-group-item <?php if($i ==1) echo 'fist-item';?>"> 
                    <a class="text-navy text-capitalize " href="<?php echo base_url('client/categoryvideos/'.$value['edu_category_key']);?>">
                       <span class="pull-right badges <?php echo $class2;?>s">  
                          <?php echo $value['totalvideos'];?>  <?php echo lang('menu_videos');?>
                       </span>
                       <!--<span class="label  <?php echo $class1;?>"><?php echo $i;?></span>--> <?php echo $value['edu_category'];?>
                    </a>
                </li>
            <?php $i++;}
        print '</ul>
                    <div class="hr-line-dashed"></div>
                    <a class="text-navy" href="'.base_url('client/videos').'">'.lang('menu_browsevideos').'</a>
                </div>
                  </div>';
        }  else{?>
            <div class="ibox">
                <div class="ibox-title bg-primary text-uppercase ">                            
                    <h5><?php echo lang('menu_videocategories');?></h5>
                </div>
                <div class="ibox-content">
                <ul class="list-group clear-list m-t">
                    <li class="list-group-item fist-item"> 
                     <a>
                          <?php echo lang('menu_nocontent');?>
                     </a> 
                    </li> 
                </ul>
                    <div class="hr-line-dashed"></div>
                    <a   href="<?php echo base_url('client/videos');?>"><span class="text-primary"><?php echo lang('menu_browsevideos');?></span></a>
                </div>
        </div>
       <?php }
}