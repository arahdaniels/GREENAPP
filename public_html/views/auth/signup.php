<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php if(!empty($title)) echo $title; else echo 'Greenapp Signup';?></title>

    <link href="<?php echo $this->config->item('resources');?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/style.css" rel="stylesheet">

</head>

<body class="gray-bgs">
    <div class="ibox-content">
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

           <img src="<?php echo $this->config->item('resources');?>/img/smalllogo.png" />

            </div>
            <h3>Register to GREENAPP</h3>
            <p>Create account to see it in action.</p>
            <?php $attr = array('role' => 'form','class'=> 'm-t','method'=>'post');
            echo form_open(base_url('signup'),$attr);?>
                <?php if(isset($status)){?>     
            <input type="hidden" name="auth_level" value="client" readonly/>
             <div class="form-group">
                 <div class="alert <?php echo $class;?>">
                     <p> <?php echo $message;?></p>
                </div> 
             </div><?php } ?>       
            <div class="form-group">
                <select required class="form-control" id="country" name="localization">
                    <option value="">Select Country</option>
                    <?php if(!empty($localization)){
                        foreach ($localization as $key => $value) {  ?>
                    <option class="text-capitalize"  value="<?php echo $value['localization_id'];?>"><?php echo ucfirst($value['locale']).' | '.$value['language'];?></option>
                    <?php } } ?>
                </select>
            </div>
             <div class="form-group">
                <select class="form-control" name="default_city" id="state">  
                <option value="">Select country first</option></select>
            </div>
            <div class="form-group">
                <input name="mobile" value="<?php echo set_value('mobile');?>" type="text" class="form-control" data-mask="999 999-999999" placeholder="Mobile e.g 255 653 74360*" required="">
            </div>
                <div class="form-group">
                    <input type="email" value="<?php echo set_value('email');?>" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="passwd" class="form-control" placeholder="Password" required="">
                </div>
                 <div class="form-group">
                    <input type="password" name="confirmpasswd" class="form-control" placeholder="Confirm Password" required="">
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> <input required="required" type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url('login');?>">Login</a>
            <?php echo form_close();?>
            <p class="m-t"> <small>Greenapp by Jap Technologies &copy; <?php echo date('Y');?></small> </p>
        </div>
    </div>
</div>
    <!-- Mainly scripts -->
    <script src="<?php echo $this->config->item('resources');?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo $this->config->item('resources');?>js/plugins/iCheck/icheck.min.js"></script>
     <!-- Input Mask-->
    <script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            
      $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('app/countrystate/states');?>',
                    data:'country_id='+ countryID,
                    beforeSend: function(){
                        $('#state').html('<option value="">Please wait...</option>');
                    },
                    success:function(html){
                        $('#state').html(html);
                    }
                }); 
            }else{
                $('#state').html('<option value="">Select country first</option>');
            }
        });
        });
        
    </script>
</body>

</html>
