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

    <title><?php if(!empty($title)) echo $title; else echo 'Greenapp Reset Password';?></title>

    <link href="<?php echo $this->config->item('resources');?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo $this->config->item('resources');?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">
                    <div class="row">

                        <div class="col-lg-12">
                            <?php if(isset($success)){?>
                            <div class="m-t">
                                <p>Your new password has been sent <a href="<?php echo base_url('login');?>">Login here</a></p>
                            </div>
                           <?php }else{
                                echo '<h2 class="font-bold">Forgot password</h2>

                                        <p>
                                            Enter your Account Mobile Number and your password will be reset and sent to you.
                                        </p>';
                                $attr = array('role' => 'form','class'=> 'm-t','method'=>'post');
                            
                                echo form_open(base_url('reset'),$attr);?>
                             <?php if(isset($disabled) && $disabled === TRUE){?>            
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        <p class="alert alert-danger">
                                              Account Recovery is Disabled.
                                        </p>
                                        <p class="alert alert-info">
                                                If you have exceeded the maximum login attempts, or exceeded
                                                the allowed number of password recovery attempts, account activation 
                                                will be disabled for a short period of time. 
                                                Please wait ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' 
                                                minutes, or contact us if you require assistance gaining access to your account.
                                        </p>
                                   </div> 
                                </div><?php } ?>  
                             <?php if(isset($banned) && $banned === TRUE){?>            
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        <p>
                                                Account Locked.
                                        </p>
                                        <p>
                                                You have attempted to use the password recovery system using 
                                                an mobile number that belongs to an account that has been 
                                                purposely denied access to the authenticated areas of this website. 
                                                If you feel this is an error, you may contact us  
                                                to make an inquiry regarding the status of the account.
                                        </p>
                                   </div> 
                                </div><?php } ?> 
                            <?php if(isset($no_match) && $no_match === TRUE){?>            
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        <p>
                                            Supplied <b>Mobile Number</b> did not match any record.
                                        </p>
                                </div>
                               </div><?php } ?>
                                <div class="form-group">
                                    <input name="mobile" value="<?php echo set_value('mobile');?>" type="text" class="form-control" data-mask="999 999-999999" placeholder="Mobile e.g 255 653 74360*" required="">
                                </div>

                                <button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>

                            <?php echo form_close();
                             } ?>                                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Greenapp by Jap Technologies
            </div>
            <div class="col-md-6 text-right">
               <small>&copy; <?php echo date('Y');?></small>
            </div>
        </div>
    </div>

</body>
<script src="<?php echo $this->config->item('resources');?>js/jquery-3.1.1.min.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
</html>
