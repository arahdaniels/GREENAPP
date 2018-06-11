<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <title><?php if(!empty($title)) echo $title; else echo 'Greenapp';?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->config->item('resources');?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="<?php echo $this->config->item('resources');?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $this->config->item('resources');?>css/style.css" rel="stylesheet">
</head>
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   <!-- <a target="__blank" class="navbar-brand" style="text-transform: uppercase;" href="<?php echo base_url('signup');?>"><?php echo lang('menu_try_app');?></a>-->
                    <!--<a  href="<?php echo base_url();?>"><img  class="navbar-brand"  src="<?php echo $this->config->item('resources');?>/img/logosmallwhite.png" /></a>-->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="#page-top"><?php echo lang('menu_home');?></a></li>
                        <li><a class="page-scroll" href="#features"><?php echo lang('menu_features');?></a></li>
                        <li><a class="page-scroll" href="#contact"><?php echo lang('menu_contact');?></a></li>
                        <!--<li><a class="page-scroll" href="#team">Team</a></li>
                        <li><a class="page-scroll" href="#testimonials">Testimonials</a></li> -->
                        <li><a class="page-scroll" href="<?php echo base_url('login');?>">APP</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('signup');?>"><?php echo lang('menu_getstarted');?></a></li>
                        <li class="dropdown" style=" color: #000; background: none;" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-language"></i> <?php echo $auth_locale;?></a>
                            <ul class="dropdown-menu" style="position: relative;
                                        z-index: 9; /* put .gold-box above .green-box and .dashed-box */
                                        left: 0px;
                                        background: #03b04d;
                                        color: #000;
                                        top: 0px;">
                              <?php 
                                   print ' <li><a href="'.base_url('app/language/sw-tz').'"><img src="'.$this->config->item('resources').'img/flags/16/Tanzania.png"/> &nbsp sw-tz</a></li>';
                                   print ' <li><a href="'.base_url('app/language/english').'"><img src="'.$this->config->item('resources').'img/flags/16/England.png"/> &nbsp en-uk</a></li>';
                               ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div> 
        </nav>
</div>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active" style="height: 470px;
  width: 100%;background: url('<?php echo $this->config->item('resources');?>sliders/slider2.png') 55% 0 no-repeat;">
            <div class="container">
                <div class="carousel-caption">
                   <!-- <h1><?php echo lang('slider_caption_one');?> </h1>
                    <p><?php echo lang('slider_subcaption_one');?></p> 
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button"><?php echo lang('btn_read_more');?></a>
                        <a class="caption-link" href="#" role="button">Jap Technologies</a>
                    </p>-->
                </div>
                <div class="carousel-image wow zoomIn" style="overflow:hidden; height: 310px;">
                   <!-- <img class="img-responsive" style="width:100%;" src="<?php echo $this->config->item('resources');?>sliders/slider0.png" alt="laptop"/>-->
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div style="background: url('<?php echo $this->config->item('resources');?>sliders/slider2.png') 50% 0 no-repeat;"></div>

        </div>
        <div class="item" style="height: 470px;
  width: 100%;background: url('<?php echo $this->config->item('resources');?>sliders/slider1.png') 0 no-repeat;">
            <div class="container">
                <div class="carousel-caption">
                   <!-- <h1><?php echo lang('slider_caption_one');?> </h1>
                    <p><?php echo lang('slider_subcaption_one');?></p> 
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button"><?php echo lang('btn_read_more');?></a>
                        <a class="caption-link" href="#" role="button">Jap Technologies</a>
                    </p>-->
                </div>
                <div class="carousel-image wow zoomIn" style="overflow:hidden; height: 310px;">
                   <!-- <img class="img-responsive" style="width:100%;" src="<?php echo $this->config->item('resources');?>sliders/slider0.png" alt="laptop"/>-->
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div style="background: url('<?php echo $this->config->item('resources');?>sliders/slider2.png') 50% 0 no-repeat;"></div>

        </div>
        <div class="item" style="height: 470px;
  width: 100%;background: url('<?php echo $this->config->item('resources');?>sliders/slider2.png') 50% 0 no-repeat;">
            <div class="container">
                <div class="carousel-caption">
                   <!-- <h1><?php echo lang('slider_caption_one');?> </h1>
                    <p><?php echo lang('slider_subcaption_one');?></p> 
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button"><?php echo lang('btn_read_more');?></a>
                        <a class="caption-link" href="#" role="button">Jap Technologies</a>
                    </p>-->
                </div>
                <div class="carousel-image wow zoomIn" style="overflow:hidden; height: 310px;">
                   <!-- <img class="img-responsive" style="width:100%;" src="<?php echo $this->config->item('resources');?>sliders/slider0.png" alt="laptop"/>-->
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div style="background: url('<?php echo $this->config->item('resources');?>sliders/slider1.png') 50% 0 no-repeat;"></div>

        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<section  class="container features">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><?php echo lang('menu_aboutgreenapp');?></h1>
            <p><?php echo lang('menu_aboutgreenappcontent');?></p>
        </div>
    </div>
</section>
    
<section id="features" class="container services">
    <div class="row">
        <div class="col-sm-3">
            <h2>Weather information</h2>
            <p>Weather is an important factor influencing crop growth. Therefore, app provides 7 days
weather forecast at village level which involves several parameters like temperature,
relative humidity, wind speed, rainfall.</p>
         <!--   <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>-->
        </div>
        <div class="col-sm-3">
            <h2>Prices</h2>
            <p>Our app helps farmers find out latest prices obtainable for his crop among his area.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Audio and Video advisory</h2>
            <p>Advisory is also available in audio and video format which is beneficial for farmers who do
not want to read.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Farmer Registration</h2>
            <p>Hassle free App requires one time registration only and it if for free<br/>
New farmers can register by entering their mobile number, name of village & crops.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
    </div>
</section>

    <section  class="container services">
    <div class="row">
        <div class="col-sm-4">
            <h2>Crop/Weather News</h2>
            <p>Crop & Weather related latest news.</p>
         <!--   <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>-->
        </div>
        <div class="col-sm-4">
            <h2>Nearest Agro Shops</h2>
            <p>It will be able to list Seed Dealers, Fertilizer Dealers, Pesticide Dealers, Machinery Dealers</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-4">
            <h2>Audio and Video</h2>
            <p>It allows people to record their voice & give feedback to us using the app.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
    </div>
</section>
    
<section  class="container features">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Marketing<br/> <span class="navy">Register yourself as Buyer or Seller.</span> </h1>
            <p>This app is promising to be used by many Tanzanians as there is an increase in the use of smart
phones and the internet bundle for many telecommunication companies is cheap and hence
affordable.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-center wow fadeInLeft">
            <div>
                <i class="fa fa-coffee features-icon"></i>
                <h2>Farmers</h2>
                <p>Do you own a farm? With GreenApp you will be able to list your farm products and sell them, own an account which will be managed by you online.</p>
            </div>
            <div class="m-t-lg">
                <i class="fa fa-bar-chart features-icon"></i>
                <h2>Herders</h2>
                <p>Do you keep Animals? GreenApp allows you to list the stock of animals and sell them online.</p>
            </div>
        </div>
        <div class="col-md-6 text-center  wow zoomIn">
            <img src="<?php echo $this->config->item('resources');?>homepage/register.png" alt="dashboard" class="img-responsive">
        </div>
        <div class="col-md-3 text-center wow fadeInRight">
            <div>
                <i class="fa fa-envelope features-icon"></i>
                <h2>Companies</h2>
                <p>Companies have a room to sell and buy their products on this app</p>
            </div>
            <div class="m-t-lg">
                <i class="fa fa-google features-icon"></i>
                <h2>Buyers</h2>
                <p>As a normal buyer, when registered with us, will have a bonus when purchasing products from our farmers and herders.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Discover great features</h1>
        </div>
    </div>
    <div class="row features-block">
        <div class="col-lg-6 features-text wow fadeInLeft">
            <small>GREENAPP</small>
            <h2>Perfectly designed </h2>
            <p>We shall have pest’s detection and treatment.<BR/>
Our app will be embedded with an AI(Artificial Intelligence) mechanism of detecting pests and suggesting the treatment mechanism.
We noted that there are very few agri advisors, our app will act as a personal adviser as if someone’s crops gets affected, he/she has to take a picture and submit to the application and the application automatically will translate the picture and advise the type of disease and advise the nearest agro shop for medication.
            </p>
        </div>
        <div class="col-lg-6 text-right wow fadeInRight">
             <img src="<?php echo $this->config->item('resources');?>homepage/pests.png" alt="dashboard" class="img-responsive">
        </div>
    </div>
</section>
    <!--
<section id="team" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Our Team</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 wow fadeInLeft">
                <div class="team-member">
                    <img src="<?php echo $this->config->item('resources');?>img/landing/avatar3.jpg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy">Amelia</span> Smith</h4>
                    <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus. </p>
                    <ul class="list-inline social-icon">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member wow zoomIn">
                    <img src="<?php echo $this->config->item('resources');?>img/landing/avatar1.jpg" class="img-responsive img-circle" alt="">
                    <h4><span class="navy">John</span> Novak</h4>
                    <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus.</p>
                    <ul class="list-inline social-icon">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 wow fadeInRight">
                <div class="team-member">
                    <img src="<?php echo $this->config->item('resources');?>img/landing/avatar2.jpg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy">Peter</span> Johnson</h4>
                    <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus.</p>
                    <ul class="list-inline social-icon">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>


<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Even more great features</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-3 features-text wow fadeInLeft">
                <h2>Seed Companies </h2>
                <p>Most of seed companies needs a tool that can help them easily identify best production practices and compare the performance of varieties that will ultimately be shortlisted and sent into production. They need data to back you up in order to explain why certain varieties were picked as compared to others. GreenApp provides a tool that will close the entire product lifecycle from seeding till harvest, by serving as an internal software for comprehensive field trial management.</p>
            </div>
            <div class="col-lg-6 text-right m-t-n-lg wow zoomIn">
                <img src="<?php echo $this->config->item('resources');?>homepage/features.png" alt="dashboard" class="img-responsive">
            </div>
            <div class="col-lg-3 features-text text-right wow fadeInRight">
                <h2>Fertilizer Companies </h2>
                <p>Do you own a fertilizer company? Then this is your place. Most of fertilizer companies have been facing a challenge on some of their products to why they are not productive to a targeted crop.
                GreenApp will provide you with tools that that will help you easily identify which fertilizers work better on which crops and soil types. 
                </p>
            </div>
        </div>
    </div>

</section>
<!--
<section id="testimonials" class="navy-section testimonials" style="margin-top: 0">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center wow zoomIn">
                <i class="fa fa-comment big-icon"></i>
                <h1>
                    What our users say
                </h1>
                <div class="testimonials-text">
                    <i>"Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."</i>
                </div>
                <small>
                    <strong>12.02.2014 - Andy Smith</strong>
                </small>
            </div>
        </div>
    </div>

</section>

<section class="comments gray-section" style="margin-top: 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>What our partners say</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada. </p>
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-4">
                <div class="bubble">
                    "Uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="<?php echo $this->config->item('resources');?>img/landing/avatar3.jpg">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            Andrew Williams
                        </div>
                        <small class="text-muted">Company X from California</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bubble">
                    "Uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="<?php echo $this->config->item('resources');?>img/landing/avatar1.jpg">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            Andrew Williams
                        </div>
                        <small class="text-muted">Company X from California</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bubble">
                    "Uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="<?php echo $this->config->item('resources');?>img/landing/avatar2.jpg">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            Andrew Williams
                        </div>
                        <small class="text-muted">Company X from California</small>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>More and more extra great feautres</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 features-text">
                <small>INSPINIA</small>
                <h2>Perfectly designed </h2>
                <i class="fa fa-bar-chart big-icon pull-right"></i>
                <p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with.</p>
            </div>
            <div class="col-lg-5 features-text">
                <small>INSPINIA</small>
                <h2>Perfectly designed </h2>
                <i class="fa fa-bolt big-icon pull-right"></i>
                <p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 features-text">
                <small>INSPINIA</small>
                <h2>Perfectly designed </h2>
                <i class="fa fa-clock-o big-icon pull-right"></i>
                <p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with.</p>
            </div>
            <div class="col-lg-5 features-text">
                <small>INSPINIA</small>
                <h2>Perfectly designed </h2>
                <i class="fa fa-users big-icon pull-right"></i>
                <p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with.</p>
            </div>
        </div>
    </div>

</section>
  
<section id="pricing" class="pricing">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>App Pricing</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        Basic
                    </li>
                    <li class="pricing-desc">
                        Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus.
                    </li>
                    <li class="pricing-price">
                        <span>$16</span> / month
                    </li>
                    <li>
                        Dashboards
                    </li>
                    <li>
                        Projects view
                    </li>
                    <li>
                        Contacts
                    </li>
                    <li>
                        Calendar
                    </li>
                    <li>
                        AngularJs
                    </li>
                    <li>
                        <a class="btn btn-primary btn-xs" href="#">Signup</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 wow zoomIn">
                <ul class="pricing-plan list-unstyled selected">
                    <li class="pricing-title">
                        Standard
                    </li>
                    <li class="pricing-desc">
                        Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus.
                    </li>
                    <li class="pricing-price">
                        <span>$22</span> / month
                    </li>
                    <li>
                        Dashboards
                    </li>
                    <li>
                        Projects view
                    </li>
                    <li>
                        Contacts
                    </li>
                    <li>
                        Calendar
                    </li>
                    <li>
                        AngularJs
                    </li>
                    <li>
                        <strong>Support platform</strong>
                    </li>
                    <li class="plan-action">
                        <a class="btn btn-primary btn-xs" href="#">Signup</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        Premium
                    </li>
                    <li class="pricing-desc">
                        Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an soluta sensibus.
                    </li>
                    <li class="pricing-price">
                        <span>$160</span> / month
                    </li>
                    <li>
                        Dashboards
                    </li>
                    <li>
                        Projects view
                    </li>
                    <li>
                        Contacts
                    </li>
                    <li>
                        Calendar
                    </li>
                    <li>
                        AngularJs
                    </li>
                    <li>
                        <a class="btn btn-primary btn-xs" href="#">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row m-t-lg">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg">
                <p>*Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. <span class="navy">Various versions</span>  have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            </div>
        </div>
    </div>

</section>
-->
<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Contact Us</h1>
               <!-- <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-3">
                <address>
                    <strong><span class="navy">Japtechnologies Limited.</span></strong><br/>
                    Sam Nujoma Road, Mwenge Trafic Light<br/>
                    P.O.Box 54491 Dar es salaam<br/>
                    <abbr title="Phone">P:</abbr> (255) 783 843 833
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                    Dealers in Best Weather System, Climate, Data, Artificial Intelligence, Solar nd AgriSystems
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:info@greenapp.co.tz" class="btn btn-primary">Send us mail</a>
                <p class="m-t-sm">
                    Or follow us on social platform
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; <?php echo date('Y');?> Japtechnologies Limited</strong></p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="<?php echo $this->config->item('resources');?>js/jquery-3.1.1.min.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo $this->config->item('resources');?>js/inspinia.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/pace/pace.min.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/wow/wow.min.js"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a6e7bdc4b401e45400c7740/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
