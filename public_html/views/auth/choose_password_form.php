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

    <title><?php if(!empty($title)) echo $title; else echo 'Greenapp';?></title>

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
            <h2>Account Recovery</h2>
                            <?php

                            $showform = 1;

                            if( isset( $validation_errors ) )
                            {
                                    echo '
                                            <div style="border:1px solid red; color:red; padding:10px;">
                                                    <p>
                                                            The following error occurred while changing your password:
                                                    </p>
                                                    <ul>
                                                            ' . $validation_errors . '
                                                    </ul>
                                                    <p>
                                                            PASSWORD NOT UPDATED
                                                    </p>
                                            </div>
                                    ';
                            }
                            else
                            {
                                    $display_instructions = 1;
                            }

                            if( isset( $validation_passed ) )
                            {
                                    echo '
                                            <div style="border:1px solid green; color:green; padding:10px;">
                                                    <p>
                                                            You have successfully changed your password.
                                                    </p>
                                                    <p>
                                                            You can now <a href="' . base_url(LOGIN_PAGE) . '"><b>login</b></a>
                                                    </p>
                                            </div>
                                    ';

                                    $showform = 0;
                            }
                            if( isset( $recovery_error ) )
                            {
                                    echo '
                                            <div style="border:1px solid red; color:red; padding:10px;">
                                                    <p>
                                                            No usable data for account recovery.
                                                    </p>
                                                    <p>
                                                            Account recovery links expire after 
                                                            ' . ( (int) config_item('recovery_code_expiration') / ( 60 * 60 ) ) . ' 
                                                            hours.<br />You will need to use the 
                                                            <a href="/auth/recover">Account Recovery</a> form 
                                                            to send yourself a new link.
                                                    </p>
                                            </div>
                                    ';

                                    $showform = 0;
                            }
                            if( isset( $disabled ) )
                            {
                                    echo '
                                            <div style="border:1px solid red; color: red; padding:10px;">
                                                    <p>
                                                            Account recovery is disabled.
                                                    </p>
                                                    <p>
                                                            You have exceeded the maximum login attempts or exceeded the 
                                                            allowed number of password recovery attempts. 
                                                            Please wait ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' 
                                                            minutes, or contact us if you require assistance gaining access to your account.
                                                    </p>
                                            </div>
                                    ';

                                    $showform = 0;
                            }
                            if( $showform == 1 )
                            {
                                    if( isset( $recovery_code, $user_id ) )
                                    {
                                            if( isset( $display_instructions ) )
                                            {
                                                    if( isset( $username ) )
                                                    {
                                                            echo '<p>
                                                                    Your login user name is <b><i>' . $username . '</i><b/>
                                                            </p>';
                                                    }
                                                    else
                                                    {
                                                            echo '<p>Please change your password now:</p>';
                                                    }
                                            }

                                            ?>
                                                    <div id="form">
                                                            <?php echo form_open(); ?>
                                                                    <fieldset>
                                                                            <legend>Choose your new password</legend>
                                                                            <div class="form-group">

                                                                                    <?php
                                                                                            // PASSWORD LABEL AND INPUT ********************************
                                                                                            echo form_label('Password','passwd', ['class'=>'label']);

                                                                                            $input_data = [
                                                                                                    'name'       => 'passwd',
                                                                                                    'id'         => 'passwd',
                                                                                                    'class'      => 'form-control',
                                                                                                    'max_length' => config_item('max_chars_for_password')
                                                                                            ];
                                                                                            echo form_password($input_data);
                                                                                    ?>

                                                                            </div>
                                                                            <div class="form-group">

                                                                                    <?php
                                                                                            // CONFIRM PASSWORD LABEL AND INPUT ******************************
                                                                                            echo form_label('Confirm Password','passwd_confirm', ['class'=>'label']);

                                                                                            $input_data = [
                                                                                                    'name'       => 'passwd_confirm',
                                                                                                    'id'         => 'passwd_confirm',
                                                                                                    'class'      => 'form-control',
                                                                                                    'max_length' => config_item('max_chars_for_password')
                                                                                            ];
                                                                                            echo form_password($input_data);
                                                                                    ?>

                                                                            </div>
                                                                    </fieldset>
                                                                    <div>
                                                                            <div>

                                                                                    <?php
                                                                                            // RECOVERY CODE *****************************************************************
                                                                                            echo form_hidden('recovery_code',$recovery_code);

                                                                                            // USER ID *****************************************************************
                                                                                            echo form_hidden('user_identification',$user_id);

                                                                                            // SUBMIT BUTTON **************************************************************
                                                                                            $input_data = [
                                                                                                    'name'  => 'form_submit',
                                                                                                    'id'    => 'submit_button',
                                                                                                    'class' => 'btn btn-success',
                                                                                                    'value' => 'Change Password'
                                                                                            ];
                                                                                            echo form_submit($input_data);
                                                                                    ?>

                                                                            </div>
                                                                    </div>
                                                            </form>
                                                    </div>
                                            <?php
                                    }
                            } ?>
            <p class="m-t"> <small>Greenapp &copy; <?php echo date('Y');?></small> </p>
        </div>
    </div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?php echo $this->config->item('resources');?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/bootstrap.min.js"></script>

</body>

</html>
