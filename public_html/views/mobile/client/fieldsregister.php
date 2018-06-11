<?php include('header.php');?>
        <div class="wrapper wrapper-content">
            <div class="container-fluid">
                 <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2 class="text-uppercase"><?php echo lang('menu_agriculture');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('client/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                         <li>
                            <a href="<?php echo base_url('client/fields');?>" style="text-transform: capitalize;"><?php echo lang('menu_fields');?></a>
                        </li>
                        <li class="active">
                            <strong><?php echo lang('menu_register');?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
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
                <div class="col-sm-3">
                    <?php    fieldMenu();?>
                    <?php    fieldCropsMenu();?>
                </div>
                <div class="col-sm-9">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo lang('menu_createfield');?></h5>
                        </div>
                        <div class="ibox-content ">
                             <?php $attr = array('method'=>'post','id'=>'addfield'); echo form_open(base_url('client/agriculture/addfield'),$attr);?>
                            <div class="table-responsive"><table class="table">
                                        <thead>
                                            <tr>
                                                <th><b><?php echo lang('menu_fieldname');?></b> <small>*</small></th>
                                                <th><b><?php echo lang('menu_area');?> </b><small>*</small></th>
                                                <th><b><?php echo lang('menu_cadastralplot');?></b></th>
                                                <th><b><?php echo lang('menu_landtype');?></b></th>
                                                <th class="vertical-align"><b><?php echo lang('menu_ownership');?></b></th>
                                            </tr>
                                        </thead>
                                    <tbody >
                                        <tr >
                                            <td >
                                                <input type="text" name="feild_name" class="form-control" placeholder="<?php echo lang('menu_fieldname');?>" required />
                                            </td>
                                            <td >
                                                <div class="input-group">
                                                    <input required name="field_area" placeholder="<?php echo lang('menu_area');?>" style="width:65%; position: inherit;" type="number" class="form-group-addons form-control">
                                                    <select required name="field_unit" style="width:35%; background-color: #e1dbdb; position: inherit;" class="form-group-addons form-control">
                                                      <?php 
                                                      if(!empty($units)){ 
                                                      foreach ($units as $key => $value) {?>
                                                        <option value="<?php echo $value['unit_id'];?>"><?php echo $value['unit_symbol'];?></option>
                                                        <?php    }
                                                      }?>
                                                    </select>
                                                  </div>
                                            </td>
                                            <td><input name="field_cadastralplot" placeholder="<?php echo lang('menu_cadastralplot');?>"  type="text" class="form-control"></td>
                                            <td>
                                                <select required name="field_landtype" class="select2 form-control" >
                                                <?php if(!empty($landtypes)){
                                                    foreach($landtypes as $key => $value){?>
                                                    <option value="<?php echo $value['landtype_id'];?>"><?php echo $value['landtype'];?></option>
                                                   <?php }
                                                } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select required name="field_ownership" class="select2 form-control" >
                                                    <option value="private"><?php echo lang('menu_private');?></option>
                                                    <option value="lease"><?php echo lang('menu_lease');?></option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="3"><b><?php echo lang('menu_fieldlocation');?></b> <small>*</small></th>
                                            </tr>
                                        </thead>
                                    <tbody >
                                        <tr >
                                            <td>
                                                <div class="form-group">
                                                    <select style="width: 100%;" required class="form-control select2" name="field_country" id="country">
                                                        <option selected>Select Country</option>
                                                            <?php if(! empty($localization)){
                                                                foreach ($localization as $key => $value) {
                                                                 if($value['locale'] != 'england'){   ?>
                                                                 <option class="text-capitalize"  value="<?php echo $value['localization_id'];?>"><?php echo ucfirst($value['locale']);?></option>
                                                                 <?php  }}} else{?>
                                                                <option value="">Country not available</option>
                                                            <?php } 
                                                            ?>
                                                         </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select style="width:100%;" required class="form-control select2" name="field_city" id="state">
                                                 </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select style="width: 100%;" required class="form-control select2" name="field_location" id="city-location">
                                                 </select>
                                                </div>
                                            </td>   
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                            <div class="input-group">
                                              <div class="input-group-btn">
                                                  <button class="btn btn-primary text-uppercase"><i class="fa fa-check fa-1x"></i></button>
                                                <button class="btn btn-primary text-uppercase" type="submit"><?php echo lang('menu_createfield');?></button>
                                              </div>
                                            </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                             <?php echo form_close();?>
                        </div>
                    </div>
                    <?php fields($fields);?>
                </div>
            </div>
                
            </div>

        </div>
      <?php include('footer.php');?>
</body>
<script>
$(document).ready(function() {   
         $('form#addfield').each( function(){
        var form = $( this );
        form.submit( function(e){
            e.preventDefault();
            var data =  form.serialize();
            swal({
            title: 'Add Field?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('client/agriculture/addfield');?>',
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
 $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('app/countrystate/citylocations');?>',
                    data:'city_id='+ stateID,
                    beforeSend: function(){
                        $('#city-location').html('<option value="">Select city first</option>');
                    },
                    success:function(html){
                        $('#city-location').html(html);
                    }
                }); 
            }else{
                $('#city-location').html('<option value="">Select country first</option>');
            }
        });
    function deletefield( key ){
        swal({
            title: 'Remove Field?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('client/agriculture/deletefield');?>',
                        type: 'post',
                        data: {'field_id' : key },
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = '<?php echo base_url('client/agriculture/fields');?>';
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
    
</script>
</html>
