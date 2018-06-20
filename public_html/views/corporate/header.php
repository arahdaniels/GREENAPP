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

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <!--<span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>-->
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $profiler->company_name;?></strong>
                                </span> <span class="text-muted text-xs block"> <?php echo ucfirst($auth_role);?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo base_url('corporate/profile');?>">Profile</a></li>
                            <li><a href="<?php echo base_url('corporate/contacts');?>">Contacts</a></li>
                            <li><a href="<?php echo base_url('corporate/mailbox');?>">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('logout');?>">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        GA
                    </div>
                </li>
                <li class="<?php if( isset($link1) && $link1 == 'dashboard') echo 'active';?>">
                    <a href="javascript:(0);"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?php if( isset($link2) && $link2 == 'overview') echo 'active';?>"><a href="<?php echo base_url('corporate/dashboard');?>">Default</a></li>
                        <li class="<?php if( isset($link2) && $link2 == 'financial') echo 'active';?>"><a href="<?php echo base_url('corporate/dashboardf');?>">Financial</a></li>
                    </ul>
                </li>
                <li class="<?php if( isset($link1) && $link1 == 'clients') echo 'active';?>">
                    <a href="javascript:(0);"><i class="fa fa-user-circle"></i> <span class="nav-label">Clients</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?php if( isset($link2) && $link2 == 'overview') echo 'active';?>"><a href="<?php echo base_url('corporate/clients');?>">Overview</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:(0);"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="<?php echo base_url('logout');?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>