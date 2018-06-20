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
                        <div class="col-sm-12 img-container">
                            <img src="<?php echo $this->config->item('resources');?>/img/smalllogo.png" />
                          </div>
                        <div class="clearfix"></div><br/>
                        <div class="col-lg-12">
                            <h2><strong>Account Recovery</strong></h2>
                                <?php
                                if( isset( $disabled ) )
                                {
                                        echo '
                                                <div style="border:1px solid red; color:red; padding:10px;">
                                                        <p>
                                                                Account Recovery is Disabled.
                                                        </p>
                                                        <p>
                                                                If you have exceeded the maximum login attempts, or exceeded
                                                                the allowed number of password recovery attempts, account recovery 
                                                                will be disabled for a short period of time. 
                                                                Please wait ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' 
                                                                minutes, or contact us if you require assistance gaining access to your account.
                                                        </p>
                                                </div>
                                        ';
                                }
                                else if( isset( $banned ) )
                                {
                                        echo '
                                                <div style="border:1px solid red;">
                                                        <p>
                                                                Account Locked.
                                                        </p>
                                                        <p>
                                                                You have attempted to use the password recovery system using 
                                                                an email address that belongs to an account that has been 
                                                                purposely denied access to the authenticated areas of this website. 
                                                                If you feel this is an error, you may contact us  
                                                                to make an inquiry regarding the status of the account.
                                                        </p>
                                                </div>
                                        ';
                                }
                                else if( isset( $confirmation ) )
                                {
                                        echo '
                                                <div style="border:1px solid green; color: green; padding:10px;">
                                                        <p>
                                                               <b>Congratulation!</b>
                                                        </p>
                                                        <p>
                                                                We have sent you an email with instructions on how 
                                                                to recover your account.
                                                        </p>
                                                </div>
                                        ';
                                }
                                else if( isset( $no_match ) )
                                {
                                        echo '
                                                <div  style="border:1px solid red; padding:10px; color:red;"">
                                                       Supplied email did not match any record.
                                                </div> <br/>
                                        ';

                                        $show_form = 1;
                                }
                                else if(isset ($token_error)){
                                     echo '
                                                <div  style="border:1px solid red; padding:10px; color:red;">
                                                                Cant\'t perform requested operation <b>#E-TMsME</b>
                                                </div> <br/>
                                        ';

                                        $show_form = 1;
                                }
                                 else if(isset ($email_error)){
                                     echo '
                                                <div  style="border:1px solid red; padding:10px; color:red;">
                                                      Cant\'t perform requested operation <b>#E-SME</b>
                                                </div> <br/>
                                        ';

                                        $show_form = 1;
                                }
                                else
                                {
                                        echo '
                                                <p>
                                                        If you\'ve forgotten your password, 
                                                        enter the email address used for your account, 
                                                        and we will send you an e-mail 
                                                        with instructions on how to access your account.
                                                </p>
                                        ';

                                        $show_form = 1;
                                }
                                if( isset( $show_form ) )
                                {
                                        ?>

                                                 <?php echo form_open(); ?>
                                                        <div>
                                                                <fieldset>
                                                                        <legend>Enter your account's email address</legend>
                                                                        <div class="form-group">

                                                                                <?php
                                                                                        // EMAIL ADDRESS *************************************************
                                                                                        echo form_label('Email Address','email', ['class'=>'form_label'] );

                                                                                        $input_data = [
                                                                                                'name'		=> 'email',
                                                                                                'required' => 'required',
                                                                                                'id'		=> 'email',
                                                                                                'class'		=> 'form-control',
                                                                                                'maxlength' => 255
                                                                                        ];
                                                                                        echo form_input($input_data);
                                                                                ?>

                                                                        </div>
                                                                        <div class="form-group"> 

                                                                                        <?php
                                                                                                // SUBMIT BUTTON **************************************************************
                                                                                                $input_data = [
                                                                                                        'name'  => 'submit',
                                                                                                        'class' => 'btn btn-success pull-right',
                                                                                                        'id'    => 'submit_button',
                                                                                                        'value' => 'Send Email'
                                                                                                ];
                                                                                                echo form_submit($input_data);
                                                                                        ?>
                                                                                    <a class="btn btn-warning pull-left" href="<?php echo base_url('app/logout');?>">Cancel</a>
                                                                                </div>
                                                                        
                                                                </fieldset>
                                                        </div>
                                                </form>

                                        <?php
                                } ?>                                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Greenapp 
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
