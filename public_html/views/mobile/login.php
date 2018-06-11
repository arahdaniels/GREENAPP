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

    <title><?php if(!empty($title)) echo $title; else echo 'Greenapp Login';?></title>

    <link href="<?php echo $this->config->item('resources');?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo $this->config->item('resources');?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/style.css" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="57x57" href="<link href="<?php echo $this->config->item('resources');?>/img/icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->config->item('resources');?>/img/icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->config->item('resources');?>/img/icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->config->item('resources');?>/img/icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->config->item('resources');?>/img/icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->config->item('resources');?>/img/icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->config->item('resources');?>/img/icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->config->item('resources');?>/img/icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->config->item('resources');?>/img/icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $this->config->item('resources');?>/img/icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->config->item('resources');?>/img/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->config->item('resources');?>/img/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->config->item('resources');?>/img/icons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo $this->config->item('resources');?>/img/icons/img/icons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo $this->config->item('resources');?>/img/icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

</head>

<body class="">
    <div class="ibox-content">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
	<?php echo br(5);?>
			<img src="<?php echo $this->config->item('resources');?>/img/smalllogo.png" />
         
            </div>
            <p>Login in. To see it in action.</p>
            <?php  if( !isset( $on_hold_message ) ){
             $attr = array('role' => 'form','class'=> 'm-t','method'=>'post');
               echo form_open($login_url,$attr);
               if( isset( $login_error_mesg ) )
                        {
                                echo '
                                        <div class="alert alert-danger">
                                                <p>
                                                       <b> Username, Email </b> address and password are all case sensitive.
                                                </p>
                                        </div>
                                ';
                        }?>
                <div class="form-group">
                    <input name="login_string" type="text" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="login_pass" <?php  if( config_item('max_chars_for_password') > 0 ) echo 'maxlength="' . config_item('max_chars_for_password') . '"';  ?> class="form-control" placeholder="Password" required="">
                </div>
               <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a href="<?php echo base_url('reset');?>"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url('signup');?>">Create an account</a>
                <input type="button" value="Say hello" onClick="showAndroidToast('Hello Android!')" />

                <script type="text/javascript">
                    function showAndroidToast(toast) {
                        Android.showToast(toast);
                    }  
                </script>
           <?php echo form_close();
            }else{ ?>
             <div class="row">
                <div class="col col-sm-12 alert alert-danger">
               <?php  print' <p>
                            <b>Excessive Login Attempts</b>
                            </p>
                            <p>
                               You have exceeded the maximum number of failed login attempts that this website will allow.
                            <p>
                            <p>
                               Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
                            </p>
                            <p>
                            Please use the <a href="'.base_url('reset').'">Account Recovery</a> after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,
                            or contact us if you require assistance gaining access to your account.
                    </p>';?>
                </div>
            </div>
          <?php  } ?>
            <p class="m-t"> <small>Greenapp by Jap Technologies &copy; <?php echo date('Y');?></small> </p>
        </div>
    </div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?php echo $this->config->item('resources');?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/bootstrap.min.js"></script>

</body>

</html>
