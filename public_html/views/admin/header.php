<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php if(!empty($title)) echo $title; else echo 'Greenapp | Dashboard';?></title>
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->config->item('resources');?>img/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->config->item('resources');?>img/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->config->item('resources');?>img/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->config->item('resources');?>img/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->config->item('resources');?>img/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->config->item('resources');?>img/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->config->item('resources');?>img/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->config->item('resources');?>img/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->config->item('resources');?>img/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $this->config->item('resources');?>img/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->config->item('resources');?>img/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->config->item('resources');?>img/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->config->item('resources');?>img/icons/favicon-16x16.png">
<link rel="manifest" href="<?php echo $this->config->item('resources');?>img/icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link href="<?php echo $this->config->item('resources');?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $this->config->item('resources');?>font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo $this->config->item('resources');?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href="<?php echo $this->config->item('resources');?>css/animate.css" rel="stylesheet">
<link href="<?php echo $this->config->item('resources');?>css/style.css" rel="stylesheet">    
<link href="<?php echo $this->config->item('resources');?>css/appx.css" rel="stylesheet">    
<link href="<?php echo $this->config->item('resources');?>css/plugins/select2/select2.min.css" rel="stylesheet">
<link href="<?php echo $this->config->item('resources');?>css/sweetalert.css" rel="stylesheet">    
<link href="<?php echo $this->config->item('resources');?>/css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
</head>

<body class="top-navigation" style="padding-top: 30px; background: url(<?php echo $this->config->item('resources');?>img/bg/white-background-images-23.jpg); background-repeat: no-repeat;  background-size: cover; background-attachment: fixed;">
 <div id="wrapper">
        <div id="page-wrapper">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="<?php echo base_url();?>"><img  class="navbar-brand"  src="<?php echo $this->config->item('resources');?>/img/logosmallwhite.png" /></a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav" style="text-transform: uppercase; ">
                    <li class="<?php if( ! empty($page) && $page == 'dashboard') echo 'active';?>"> 
                        <a href="<?php echo base_url();?>"> <?php echo lang('menu_dashboard');?> </a>
                    </li> 
                    <li class="dropdown <?php if( ! empty($page) && $page == 'users') echo 'active';?>">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo lang('menu_users');?> </a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo base_url('admin/users/corporates');?>"><?php echo lang('menu_corporates');?></a></li>
                            <li><a href="<?php echo base_url('admin/users/clients');?>"><?php echo lang('menu_clients');?></a></li>
                        </ul>
                    </li> 
                    <li class="dropdown <?php if( ! empty($page) && $page == 'agriculture') echo 'active';?>" >
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo lang('menu_agriculture');?> </a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo base_url('admin/fertilizers');?>"><?php echo lang('menu_fertilizers');?></a></li>
                            <li><a href="<?php echo base_url('admin/crops');?>"><?php echo lang('menu_crops');?></a></li>
                            <li><a href="<?php echo base_url('admin/landtypes');?>"><?php echo lang('menu_landtypes');?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if( ! empty($page) && $page == 'weather') echo 'active';?>" >
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo lang('menu_weather');?> </a>
                        <ul role="menu" class="dropdown-menu">
                            <!--<li><a href="<?php echo base_url('admin/weather');?>"><?php echo lang('menu_overview');?></a></li>-->
                            <li><a href="<?php echo base_url('admin/weather/cities');?>"><?php echo lang('menu_cities');?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if( ! empty($page) && $page == 'education') echo 'active';?>">
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="javascript:;"><?php echo lang('menu_education');?></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo base_url('admin/education');?>"><?php echo lang('menu_overview');?></a></li>
                            <li><a href="<?php echo base_url('admin/education/categories');?>"><?php echo lang('menu_categories');?></a></li>
                            <li><a href="<?php echo base_url('admin/education/types');?>"><?php echo lang('menu_types');?></a></li>
                            <li><a href="<?php echo base_url('admin/education/videos');?>"><?php echo lang('menu_videos');?></a></li>
                        </ul>
                    </li> 
                    <li class="<?php if( ! empty($page) && $page == 'financial') echo 'active';?>"><a href="<?php echo base_url('admin/financial');?>"><?php echo lang('menu_financial');?></a></li>
                    <li class="<?php if( ! empty($page) && $page == 'settings') echo 'active';?>"><a href="<?php echo base_url('admin/settings');?>"><?php echo lang('menu_settings');?></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown <?php if( ! empty($page) && $page == 'profile') echo 'active';?>">
                         <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"  data-toggle="dropdown"> <i class="fa fa-language"></i> <?php echo lang('menu_language');?></a>
                        <ul role="menu" class="dropdown-menu">
                            <?php switch ($auth_locale) {
                             case 'tanzania':
                               print ' <li><a href="'.base_url('app/language/sw-tz').'"><img src="'.$this->config->item('resources').'img/flags/16/Tanzania.png"/> &nbsp Kiswahili</a></li>';
                               print ' <li><a href="'.base_url('app/language/english').'"><img src="'.$this->config->item('resources').'img/flags/16/England.png"/> &nbsp English</a></li>';
                             break;

                             default:
                                  print ' <li><a href="'.base_url('app/language/english').'"><img src="'.$this->config->item('resources').'img/flags/16/England.png"/> &nbsp English</a></li>';
                             break;
                             };?>
                            
                        </ul>
                    </li>
                    <li class="dropdown <?php if( ! empty($page) && $page == 'profile') echo 'active';?>">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"  data-toggle="dropdown"><i class="fa fa-user-circle-o"></i> <?php echo ucfirst($profile_data->firstname);?> </a>
                        <ul role="menu" class="dropdown-menu">
                           <!-- <li><a href="<?php echo base_url('admin/overview');?>"><?php echo lang('menu_overview');?></a></li>-->
                            <li><a href="<?php echo base_url('admin/settings');?>"><?php echo lang('menu_settings');?></a></li>
                            <li>
                                <a href="<?php echo base_url('logout');?>"> 
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        </div>