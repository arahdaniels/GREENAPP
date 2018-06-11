<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function landmanagement_menu(){?>
    <div class="ibox">
        <div class="ibox-title bg-primary">
            <h5 class="text-uppercase"><?php echo lang('menu_landmanagement');?></h5> 
        </div>
        <div class="ibox-content"> 
            <table class="table table-stripped small m-t-md">
                <tbody>
                <tr> 
                    <td class="no-borders">
                        <i class="fa fa-cog text-navy"></i>
                    </td>
                    <td class="no-borders">
                        <a class="text-navy" href="<?php echo base_url('admin/landtypes/landcrops');?>"><?php echo lang('menu_landcrops');?></a>
                    </td>
                </tr>
                 <tr> 
                    <td class="no-borders">
                        <i class="fa fa-cogs text-navy"></i>
                    </td>
                    <td class="no-borders">
                        <a class="text-navy" href="<?php echo base_url('admin/landtypes/landcropfertilizer');?>"><?php echo lang('menu_landcropfertilizer');?></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php } 

function settings_menu(){?>
    <div class="ibox">
        <div class="ibox-title">
            <h5 class="text-uppercase"><?php echo lang('menu_settingsmenu');?></h5> 
        </div>
        <div class="ibox-content">
            <table class="table table-stripped small m-t-md">
                <tbody>
                <tr>
                    <td class="no-borders">
                        <i class="fa fa-cog text-navy"></i>
                    </td>
                    <td class="no-borders">
                        <a class="text-navy" href="<?php echo base_url('admin/settings/profile');?>"><?php echo lang('menu_profilesettings');?></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fa fa-cogs text-danger"></i>
                    </td>
                    <td>
                        <a class="text-navy" href="<?php echo base_url('admin/settings/app');?>"><?php echo lang('menu_systemsettings');?></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php } 

function agriculture_menu(){?>
    <div class="ibox">
        <div class="ibox-title bg-primary">
            <h5 class="text-uppercase"><?php echo lang('menu_agriculture');?></h5>  
        </div>
        <div class="ibox-content">
            <table class="table table-stripped small m-t-md">
                <tbody>
                <tr>
                    <td class="no-borders">
                        <i class="fa fa-map text-navy"></i>
                    </td>
                    <td class="no-borders">
                        <a class="text-navy" href="<?php echo base_url('admin/landtypes');?>"><?php echo lang('menu_landtypes');?></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fa fa-exchange text-danger"></i>
                    </td>
                    <td>
                        <a class="text-navy" href="<?php echo base_url('admin/crops');?>"><?php echo lang('menu_crops');?></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fa fa-bank text-navy"></i>
                    </td>
                    <td>
                        <a class="text-navy" href="<?php echo base_url('admin/fertilizers');?>"><?php echo lang('menu_fertilizers');?></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php } 

function profile_header($profile){?>
    <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">
                    <div class="profile-image">
                        <img src="<?php echo $profile['resource_url'];?>img/avatar.jpg" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                   <?php echo $profile['firstname'].' '.$profile['lastname'];?>
                                </h2>
                                <h4 style="text-transform: capitalize;"><?php echo $profile['auth_role'];?></h4>
                                <small>
                                    <?php echo $profile['about'];?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <small>Sales in last 24h</small>
                    <h2 class="no-margins">0</h2>
                    <div id="sparkline1"></div>
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
                if($j = 1){
                    $class1 = 'label-primary';
                    $class2 = 'badge-primary';
                }elseif ($i == $j) {
                    $class = 'label-warning';
                    $class2 = 'badge-warning';
                 }else{
                    $class = 'label-danger';
                    $class2 = 'badge-danger';
              }  ?>
                <li class="list-group-item <?php if($i ==1) echo 'fist-item';?>"> 
                    <a href="<?php echo base_url('client/video/categories/'.$value['category_key']);?>">
                       <span class="pull-right badge <?php echo $class2;?>">  
                          <?php echo $totalvideos;?>  <?php echo lang('menu_videos');?>
                       </span>
                       <span class="label <?php echo $class1;?>"><?php echo $i;?></span> LIVESTOCK
                    </a>
                </li>
            <?php $i++;}
        print '</ul>
                    <div class="hr-line-dashed"></div>
                    <a href="'.base_url('client/videos').'">'.lang('menu_browsevideos').'</a>
                </div>
                  </div>';
        }  else{?>
            <div class="ibox">
                <div class="ibox-title bg-primary ">                            
                    <h5><?php echo lang('menu_videocategories');?></h5>
                </div>
                <div class="ibox-content">
                <ul class="list-group clear-list m-t">
                    <li class="list-group-item fist-item"> 
                     <a href="<?php echo base_url('client/video/categories');?>">
                        <span class="pull-right badge badge-warning">  
                            123 <?php echo lang('menu_videos');?>
                        </span>
                        <span class="label label-info">2</span> Livestock
                     </a> 
                    </li> 
                    <li class="list-group-item">
                     <a href="<?php echo base_url('client/video/categories');?>">
                        <span class="pull-right badge badge-warning">  
                            123 <?php echo lang('menu_videos');?>
                        </span>
                        <span class="label label-info">2</span> Livestock
                     </a>
                    </li>
                </ul>
                    <div class="hr-line-dashed"></div>
                    <a href="<?php echo base_url('client/videos');?>"><?php echo lang('menu_browsevideos');?></a>
                </div>
        </div>
       <?php }
}