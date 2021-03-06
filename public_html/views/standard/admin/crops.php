<?php include('header.php');?>
    <link href="<?php echo $this->config->item('resources');?>css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
        <div class="wrapper wrapper-content">
            <div class="container">
                 <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2 class="text-uppercase"><?php echo lang('menu_agriculture');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li> 
                            <a href="<?php echo base_url('admin/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                        <li class="active">
                            <strong><?php echo lang('menu_crops');?></strong>
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
                    <?php landmanagement_menu();?>
                    <?php agriculture_menu();?>
                </div>

                <div class="col-lg-9">
                    <div class="ibox">
                        <div class="ibox-title bg-primary">
                            <h5 class="text-uppercase"><i class="fa fa-plus-square fa-1x"></i> <?php echo lang('menu_addcrop');?></h5>
                        </div>
                        <div class="ibox-content">
                                    <?php $attr = array('class'=>'form-horizontal','method'=>'post','id'=>'addcrop'); 
                                            echo form_open(base_url('admin/crops/addcrop'),$attr);?>
                                    <input type="hidden" name="settings" value="addunit"/>
                                    <table style="display: table; width: 100%;
                                                border-collapse: separate; text-align: right;
                                                border-spacing: 30px;" >
                                    <tbody >
                                        <tr >
                                            <td class="vertical-align"><b><?php echo lang('menu_crop');?></b></td>
                                            <td class="vertical-align">
                                                <input placeholder="<?php echo lang('menu_crop');?>" name="crop" type="text" class="form-control" required />
                                            </td>
                                        </tr>
                                        <tr>
                                              <td></td>
                                              <td><button class="btn btn-primary btn-block text-uppercase" type="submit"><?php echo lang('menu_submit');?></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <?php echo form_close();?>
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-title bg-primary">
                            <h5 class="text-uppercase"><i class="fa fa-list fa-1x"></i> <?php echo lang('menu_crops');?></h5>
                        </div>
                        <div class="ibox-content">
                                    <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search">
                                    <table class="table footable" data-page-size="10" data-filter=#filter>
                                        <thead>
                                            <tr>
                                                <th><?php echo lang('menu_crop');?></th>
                                                <th><?php echo lang('menu_option');?></th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php if(!empty($crops)){
                                            foreach ($crops as $key => $value) { ?>
                                                <tr>
                                                    <td class="vertical-align"><a class="text-navy"><?php echo $value['crop'];?></a></td>
                                                    <td class="vertical-align"><a data-toggle="tooltip" data-placement="top" title="<?php echo lang('menu_modify');?>" class="text-navy" href="javascript:modifycrop( '<?php echo $value['crop_id'];?>' );"><?php echo lang('menu_modify');?></a> |
                                                        <a class="text-danger" href="javascript:deletecrop( <?php echo $value['crop_id'];?> );"><?php echo lang('menu_delete');?></a></td> 
                                                </tr>
                                          <?php }
                                        } ?>                                        
                                    </tbody> 
                                </table>
                        </div>
                    </div>
                </div>
                
            </div>
         </div>
       </div>
<?php include('footer.php');?>
<script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/summernote/summernote.min.js"></script>
<script>
    function modifycrop( key ){
        swal({
            title: 'Modify Crop?',
            input: 'text',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            inputPlaceholder: 'Enter Crop',
            inputValidator: (value) => {
                return !value && 'You need to write something!'
                },
            showLoaderOnConfirm: true,
            preConfirm: ( crop ) => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/admin/crops/modifycrop',
                        type: 'post',
                        data: {'crop' : crop , 'crop_id' : key },
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
    }
  
    function deletecrop( key ){
        swal({
            title: 'Remove Crop?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/admin/crops/deletecrop',
                        type: 'post',
                        data: {'crop_id' : key },
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
    }
    
    
     $(document).ready(function() {    
         $('form#addcrop').each( function(){
        var form = $( this );
        form.submit( function(e){
            e.preventDefault();
            var data =  form.serialize();
            swal({
            title: 'Add Crop?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/admin/crops/addcrop',
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
     });
     });
</script>
</body>
</html>
