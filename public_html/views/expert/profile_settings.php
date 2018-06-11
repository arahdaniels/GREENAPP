<?php include('header.php');?>
    <link href="<?php echo $this->config->item('resources');?>css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
        <div class="wrapper wrapper-content">
            <div class="container">
                 <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2 class="text-uppercase"><?php echo lang('menu_settings');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li> 
                            <a href="<?php echo base_url('expert/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('expert/settings');?>" style="text-transform: capitalize;"><?php echo lang('menu_settings');?></a>
                        </li>
                        <li class="active">
                            <strong><?php echo lang('menu_profilesettings');?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2"></div>
            </div>
            <?php 
            $profil['resource_url'] = $this->config->item('resources');
            $profil['firstname'] = $profile->firstname;
            $profil['middlename'] = $profile->middlename;
            $profil['lastname'] = $profile->lastname;
            $profil['about'] = $profile->about;
            $profil['auth_role'] = $auth_role;
            profile_header($profil);?>
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                                <h3><?php echo $profile->firstname.' '.$profile->lastname;?></h3> 
                            <p class="small">
                                <?php echo $profile->about;?>
                            </p>
                        </div>
                    </div>
                    <?php settings_menu();?>
                </div>
                <div class="col-lg-9">
                    <h3><?php echo lang('menu_profilesettings');?></h3>
                    <div class="hr-line-solid"></div>
                        <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> <i class="fa fa-user-circle"></i> <?php echo lang('menu_personal_details');?></a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false"> <i class="fa fa-lock"></i> <?php echo lang('menu_login_details');?></a></li>
                            <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false"> <i class="fa fa-key"></i> <?php echo lang('menu_recovery_details');?></a></li>
                            <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false"> <i class="fa fa-user-secret"></i> <?php echo lang('menu_about');?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                              <?php $attr = array('class'=>'form-horizontal','method'=>'post','id'=>'personal-details'); 
                                  echo form_open(base_url('expert/settings/updatesettings'),$attr);?>
                                    <input type="hidden" name="types" value="personal"/>
                                    <input type="hidden" name="modifier" value="<?php if(!empty($profile->user_id)) echo $profile->user_id;?>"/>
                                    <div class="form-group"><label class="col-sm-2 control-label"><?php echo lang('form_firstname');?></label>
                                      <div class="col-sm-10"><input name="firstname" value="<?php if(!empty($profile->firstname)) echo $profile->firstname;?>" type="text" class="form-control"></div>
                                </div> 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label"><?php echo lang('form_middlename');?></label>
                                        <div class="col-sm-10"><input name="middlename" value="<?php if(!empty($profile->middlename)) echo $profile->middlename;?>" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label"><?php echo lang('form_lastname');?></label>
                                        <div class="col-sm-10"><input name="lastname" value="<?php if(!empty($profile->lastname)) echo $profile->lastname;?>" type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            <?php echo form_close();?>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <?php $attr = array('class'=>'form-horizontal','method'=>'post','id'=>'login-details'); 
                                  echo form_open(base_url('expert/settings/updatesettings'),$attr);?>
                                    <input type="hidden" name="types" value="login"/>
                                    <input type="hidden" name="modifier" value="<?php if(!empty($profile->user_id)) echo $profile->user_id;?>"/>
                                <div class="form-group"><label class="col-sm-2 control-label"><?php echo lang('form_password');?></label>
                                    <div class="col-sm-10"><input name="passwd"  type="password" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label"><?php echo lang('form_confirmpassword');?></label>
                                        <div class="col-sm-10"><input name="confirmpasswd"  type="password" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label"><?php echo lang('form_oldpassword');?></label>
                                        <div class="col-sm-10"><input name="oldpassword"  type="password" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            <?php echo form_close();?>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane">
                                <div class="panel-body">
                              <?php $attr = array('class'=>'form-horizontal','method'=>'post','id'=>'recovery-details'); 
                                  echo form_open(base_url('expert/settings/updatesettings'),$attr);?>
                                    <input type="hidden" name="types" value="recovery"/>
                                    <input type="hidden" name="modifier" value="<?php if(!empty($profile->user_id)) echo $profile->user_id;?>"/>
                                    <div class="form-group"><label class="col-sm-2 control-label"><?php echo lang('form_mobile');?></label>
                                      <div class="col-sm-10"><input name="mobile" value="<?php if(!empty($profile->mobile)) echo $profile->mobile;?>" type="text" class="form-control" data-mask="999 999-999999" placeholder="Mobile e.g 255 653 74360*" required=""/></div>
                                </div> 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label"><?php echo lang('form_email');?></label>
                                        <div class="col-sm-10"><input name="email" value="<?php if(!empty($profile->email)) echo $profile->email;?>" type="email" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            <?php echo form_close();?>
                                </div>
                            </div>
                            <div id="tab-4" class="tab-pane">
                                <div class="panel-body">
                                    <div class="summernote">
                                        <?php echo $profile->about;?>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary" type="button" id="about">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div><br/>                    
                </div>
            </div>
         </div>
       </div>
<?php include('footer.php');?>
<script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/summernote/summernote.min.js"></script>
<script>
     $(document).ready(function() {
            
     $('.summernote').summernote();
     
     $('form#personal-details').submit( function(e){
                e.preventDefault();
                var data = $( this ).serialize();
                swal({
            title: 'Update personal details?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/updatesettings',
                        type: 'post',
                        data: data,
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           resolve( xhr.statusText );
                        }
                    });
              });
            },
            allowOutsideClick: () => !swal.isLoading()
          }).then((result) => {
            if (result.value) {
              swal({
                type: 'success',
                title: result.value
              });
            }
          });
        });
        
     $('form#recovery-details').submit( function(e){
                e.preventDefault();
                var data = $( this ).serialize();
                swal({
            title: 'Update recovery details?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/updatesettings',
                        type: 'post',
                        data: data,
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           resolve( xhr.statusText );
                        }
                    });
              });
            },
            allowOutsideClick: () => !swal.isLoading()
          }).then((result) => {
            if (result.value) {
              swal({
                type: 'success',
                title: result.value
              });
            }
          });
        });
     
     $('form#login-details').submit( function(e){
                e.preventDefault();
                var data = $( this ).serialize();
                swal({
            title: 'Update login details?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/updatesettings',
                        type: 'post',
                        data: data,
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           resolve( xhr.statusText );
                        }
                    });
              });
            },
            allowOutsideClick: () => !swal.isLoading()
          }).then((result) => {
            if (result.value) {
              swal({
                type: 'success',
                title: result.value
              });
            }
          });
        });
     
     $('form#localization').submit( function(e){
                e.preventDefault();
                var data = $( this ).serialize();
                swal({
            title: 'Update personal details?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/updatesettings',
                        type: 'post',
                        data: data,
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           resolve( xhr.statusText );
                        }
                    });
              });
            },
            allowOutsideClick: () => !swal.isLoading()
          }).then((result) => {
            if (result.value) {
              swal({
                type: 'success',
                title: result.value
              });
            }
          });
        });
     
     $('form#currency').submit( function(e){
                e.preventDefault();
                var data = $( this ).serialize();
                swal({
            title: 'Update personal details?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/updatesettings',
                        type: 'post',
                        data: data,
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           resolve( xhr.statusText );
                        }
                    });
              });
            },
            allowOutsideClick: () => !swal.isLoading()
          }).then((result) => {
            if (result.value) {
              swal({
                type: 'success',
                title: result.value
              });
            }
          });
        });

     $('button#about').click( function (){
                    var html =  $('.summernote').summernote('code');
                    var data = {'about' : html, 'types' : 'about'};
                      swal({
                            title: 'Update about details?',
                            showCancelButton: true,
                            confirmButtonText: 'Yes',
                            showLoaderOnConfirm: true,
                            preConfirm: () => {
                              return new Promise((resolve) => {
                                  $.ajax({
                                        url: 'http://greenapp.co.tz/expert/settings/updatesettings',
                                        type: 'post',
                                        data: data,
                                        success: function( result ){
                                                resolve( result );
                                            window.document.location.href = document.URL;
                                        },
                                        error: function(xhr){
                                           resolve( xhr.statusText );
                                        }
                                    });
                              });
                            },
                            allowOutsideClick: () => !swal.isLoading()
                          }).then((result) => {
                            if (result.value) {
                              swal({
                                type: 'success',
                                title: result.value
                              });
                            }
                          });
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
