<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
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
    <link href="<?php echo $this->config->item('resources');?>icons/css/weather-icons.min.css" rel="stylesheet">    
    <link href="<?php echo $this->config->item('resources');?>css/plugins/select2/select2.min.css" rel="stylesheet">

</head>

<body class="top-navigation style1" style="padding-top: 30px; background: url(<?php echo $this->config->item('resources');?>img/bg/white-background-images-23.jpg); background-repeat: no-repeat;  background-size: cover; background-attachment: fixed;">
 <div id="wrapper">
        <div id="page-wrapper" class="gray-bgs">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed text-muted" style=" background: none;" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="<?php echo base_url('app');?>"><img  class="navbar-brand"  src="<?php echo $this->config->item('resources');?>/img/logosmallwhite.png" /></a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav" style="text-transform: uppercase; ">
                    <li class="<?php if( ! empty($page) && $page == 'dashboard') echo 'active';?>"> 
                        <a href="<?php echo base_url('app');?>"> <?php echo lang('menu_dashboard');?> </a>
                    </li> 
                    <li class="dropdown <?php if( ! empty($page) && $page == 'market') echo 'active';?>">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo lang('menu_marketplace');?> </a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo base_url('client/market/inventory');?>"><?php echo lang('menu_inventory');?></a></li>
                            <li><a href="<?php echo base_url('client/market/manage');?>"><?php echo lang('menu_manageshops');?></a></li>
                        </ul>
                    </li> 
                    <li class="dropdown <?php if( ! empty($page) && $page == 'agriculture') echo 'active';?>" >
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo lang('menu_agriculture');?> </a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo base_url('client/fields');?>"><?php echo lang('menu_fieldmanagement');?></a></li>
                            <li><a href="<?php echo base_url('client/crops');?>"><?php echo lang('menu_cropmanagement');?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if( ! empty($page) && $page == 'resources') echo 'active';?>" >
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo lang('menu_resources');?> </a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo base_url('client/resources/machines');?>"><?php echo lang('menu_machines');?></a></li>
                            <li><a href="<?php echo base_url('client/resources/human');?>"><?php echo lang('menu_human');?></a></li>
                            <li><a href="<?php echo base_url('client/resources/fertilizers');?>"><?php echo lang('menu_fertilizers');?></a></li>
                        </ul>
                    </li>
                    <li class="<?php if( ! empty($page) && $page == 'education') echo 'active';?>"><a href="<?php echo base_url('client/education');?>"><?php echo lang('menu_education');?></a></li>
                    <li class="<?php if( ! empty($page) && $page == 'weather') echo 'active';?>"> <a href="<?php echo base_url('client/weather');?>"> <?php echo lang('menu_weather');?> </a> </li>

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
                    <li class="dropdown  <?php if( ! empty($page) && $page == 'profile') echo 'active';?>">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"  data-toggle="dropdown"> Profile </a>
                        <ul role="menu" class="dropdown-menu">
                           <!-- <li><a href="<?php echo base_url('client/overview');?>"><?php echo lang('menu_overview');?></a></li>-->
                            <li><a href="<?php echo base_url('client/settings');?>"><?php echo lang('menu_settings');?></a></li>
                            <li><a href="<?php echo base_url('client/financial');?>"><?php echo lang('menu_financial');?></a></li>
                            <li><a href="<?php echo base_url('');?>"><?php echo lang('menu_website');?></a></li>
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