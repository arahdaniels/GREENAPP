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
                            <strong><?php echo lang('menu_systemsettings');?></strong>
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
                         <h3><?php echo lang('menu_systemsettings');?></h3>
                    <div class="hr-line-solid"></div>
                    <div class="tabs-container">

                        <div class="tabs-left">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-localization"> <?php echo lang('menu_localization');?></a></li>
                                <li class=""><a data-toggle="tab" href="#tab-currency"> <?php echo lang('menu_currency');?></a></li>
                                <li class=""><a data-toggle="tab" href="#tab-metric"> <?php echo lang('menu_metric');?></a></li>
                            </ul>
                            <div class="tab-content ">
                                <div id="tab-localization" class="tab-pane active">
                                    <div class="panel-body">
                                       <?php $attr = array('class'=>'form-horizontals','method'=>'post','id'=>'localization'); 
                                            echo form_open(base_url('expert/settings/updatesystemsettings'),$attr);?>
                                              <input type="hidden" name="types" value="localization"/>
                                              <input type="hidden" name="require_password" value="nopassword" />
                                              <input type="hidden" name="modifier" value="<?php if(!empty($profile->user_id)) echo $profile->user_id;?>"/>                                   
                                              <table style="display: table; width: 100%;
                                                border-collapse: separate; text-align: right;
                                                border-spacing: 30px;" >
                                                  <tbody >
                                                      <tr >
                                                          <td class="vertical-align"><b><?php echo lang('menu_countrylanguage');?></b></td>
                                                          <td class="vertical-align">
                                                              <select class="form-control" name="localization" id="country">
                                                                <?php if(! empty($localization)){
                                                                    foreach ($localization as $key => $value) {
                                                                        if($value['localization_id'] == $profile->localization){?>
                                                                     <option class="text-capitalize" selected  value="<?php echo $value['localization_id'];?>"><?php echo ucfirst($value['locale']).' | '.$value['language'];?></option>
                                                                    <?php }else{?>
                                                                <?php }?>
                                                                <option class="text-capitalize"  value="<?php echo $value['localization_id'];?>"><?php echo ucfirst($value['locale']).' | '.$value['language'];?></option>
                                                                   <?php }} else{?>
                                                                    <option value="">Country not available</option>
                                                                <?php } ?>
                                                             </select>
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                          <td class="vertical-align" ><b><?php echo lang('menu_city');?></b></td>
                                                          <td class="vertical-align">
                                                              <select class="form-control" name="default_city" id="state">
                                                                <?php if(!empty($cities)){
                                                                    foreach ($cities as $key => $value) {  
                                                                         if($value['city_id'] == $profile->default_city) {?>
                                                                      <option class="text-capitalize" selected  value="<?php echo $value['city_id'];?>"><?php echo ucfirst($value['city_name']);?></option>
                                                                    <?php }else{ ?>
                                                                      <option class="text-capitalize"  value="<?php echo $value['city_id'];?>"><?php echo ucfirst($value['city_name']);?></option>
                                                                    <?php  } }} ?>
                                                             </select></td>
                                                           </tr>
                                                           <tr>
                                                               <td></td>
                                                               <td><button class="btn btn-primary" type="submit">Save changes</button></td>
                                                           </tr>
                                                  </tbody>
                                              </table>
                                      <?php echo form_close();?>
                                    </div>
                                </div>
                                <div id="tab-currency" class="tab-pane">
                                    <div class="panel-body">
                                       <?php $attr = array('class'=>'form-horizontal','method'=>'post','id'=>'currency'); 
                                            echo form_open(base_url('expert/settings/updatesystemsettings'),$attr);?>
                                              <input type="hidden" name="types" value="currency"/>
                                              <input type="hidden" name="require_password" value="nopassword" />
                                              <input type="hidden" name="modifier" value="<?php if(!empty($profile->user_id)) echo $profile->user_id;?>"/>   
                                              <table style="display: table; width: 100%;
                                                border-collapse: separate; text-align: right;
                                                border-spacing: 30px;" >
                                                  <tbody >
                                                      <tr >
                                                          <td class="vertical-align"><b><?php echo lang('menu_currency');?></b></td>
                                                          <td class="vertical-align">
                                                              <select class="form-control" name="default_currency">
                                                                <?php if(! empty($currency)){
                                                                    foreach ($currency as $key => $value) {
                                                                        if($value['currency_id'] == $profile->default_currency){?>
                                                                     <option class="text-capitalize" selected  value="<?php echo $value['currency_id'];?>"><?php if( ucwords($value['currency_symbol_position']) == 'Left') {echo ucwords($value['currency_symbol']).'  '.$value['currency'];}else{echo $value['currency'].' '. ucwords($value['currency_symbol']);}?></option>
                                                                    <?php }?>
                                                                     <option class="text-capitalize"  value="<?php echo $value['currency_id'];?>"><?php if( ucwords($value['currency_symbol_position']) == 'Left') {echo ucwords($value['currency_symbol']).'  '.$value['currency'];}else{echo $value['currency'].' '. ucwords($value['currency_symbol']);}?></option>
                                                                   <?php }} else{?>
                                                                    <option value="">Currency not available</option>
                                                                <?php } ?>
                                                               </select>
                                                          </td>
                                                      </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><button class="btn btn-primary" type="submit">Save changes</button></td>
                                                        </tr>
                                                  </tbody>
                                              </table>
                                      <?php echo form_close();?>
                                    </div>
                                </div>
                                <div id="tab-metric" class="tab-pane">
                                <div class="panel-body">
                                    <?php $attr = array('class'=>'form-horizontal','method'=>'post','id'=>'addsettings'); 
                                            echo form_open(base_url('expert/settings/addsystemsettings'),$attr);?>
                                    <input type="hidden" name="settings" value="addunit"/>
                                    <table style="display: table; width: 100%;
                                                border-collapse: separate; text-align: right;
                                                border-spacing: 30px;" >
                                    <tbody >
                                        <tr >
                                            <td class="vertical-align"><b><?php echo lang('menu_unitname');?></b></td>
                                            <td class="vertical-align">
                                                <input placeholder="<?php echo lang('menu_unitname');?>" name="unit_name" type="text" class="form-control" required />
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="vertical-align"><b><?php echo lang('menu_unitsymbol');?></b></td>
                                            <td class="vertical-align">
                                                <input placeholder="<?php echo lang('menu_unitsymbol');?>" name="unit_symbol" type="text" class="form-control" required />
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="vertical-align"><b><?php echo lang('menu_symbolposition');?></b></td>
                                            <td class="vertical-align">
                                                <select class="select2 form-control" name="unit_symbol_position" required>
                                                    <option value="right" selected="selected"><?php echo lang('menu_right');?></option>
                                                    <option value="left"><?php echo lang('menu_left');?></option>
                                                </select>
                                            </td>
                                        </tr>
                                          <tr>
                                              <td></td>
                                              <td><button class="btn btn-primary btn-block text-uppercase" type="submit"><?php echo lang('menu_submit');?></button></td>
                                          </tr>
                                    </tbody>
                                </table>
                                    <?php echo form_close();?>
                                    <br/>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><?php echo lang('menu_unit');?></th>
                                                <th><?php echo lang('menu_unitsymbol');?></th>
                                                <th><?php echo lang('menu_symbolposition');?></th>
                                                <th><?php echo lang('menu_display');?></th>
                                                <th><?php echo lang('menu_option');?></th>
                                            </tr>
                                        </thead>
                                    <tbody >
                                        <?php if(!empty($unit)){
                                            foreach ($unit as $key => $value) { ?>
                                                <tr>
                                                    <td class="vertical-align"><a data-toggle="tooltip" data-placement="top" title="<?php echo lang('menu_modify');?>" class="text-navy" href="javascript:modifyunitname( '<?php echo $value['unit_id'].' \' ,\' '.$value['unit_symbol'].'\' , \' '.$value['unit_symbol_position'].'\'';?> );"><?php echo $value['unit_name'];?></a></td>
                                                    <td class="vertical-align"><a data-toggle="tooltip" data-placement="top" title="<?php echo lang('menu_modify');?>" class="text-navy" href="javascript:modifyunitsymbol( '<?php echo $value['unit_id'].' \' ,\' '.$value['unit_name'].'\' , \' '.$value['unit_symbol_position'].'\'';?> );"><?php echo $value['unit_symbol'];?></a></td>
                                                    <td class="vertical-align"><a data-toggle="tooltip" data-placement="top" title="<?php echo lang('menu_modify');?>" class="text-navy" href="javascript:modifyunitsymbolposition( '<?php echo $value['unit_id'].' \' ,\' '.$value['unit_name'].'\' , \' '.$value['unit_symbol'].'\'';?> );"><?php echo $value['unit_symbol_position'];?></a></td>
                                                    <td class="vertical-align">
                                                     <?php if($value['unit_symbol_position'] == 'left'){
                                                         echo $value['unit_symbol'].' 10';
                                                         }else{
                                                           echo '10 '.$value['unit_symbol'];
                                                       } ?>
                                                    </td>
                                                    <td><a class="text-danger" href="javascript:deleteunit( <?php echo $value['unit_id'];?> );"><?php echo lang('menu_delete');?></a></td> 
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
                
            </div>
         </div>
       </div>
<?php include('footer.php');?>
<script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/summernote/summernote.min.js"></script>
<script>
    function modifyunitname( key , unit_symbol, unit_symbol_position){
        swal({
            title: 'Modify Unit Name?',
            input: 'text',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: ( name ) => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/addsystemsettings',
                        type: 'post',
                        data: {'unit_name' : name , 'settings' : 'modifyunit', 'unit_id' : key, 'unit_symbol' : unit_symbol, 'unit_symbol_position' : unit_symbol_position},
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
    
    function modifyunitsymbolposition( key , unit_symbol, unit_name){
        swal({
            title: 'Modify Unit Symbol Position?',
            input: 'select',
            inputOptions: {
                'right': 'Right',
                'left': 'Left',
            },
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: ( position ) => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/addsystemsettings',
                        type: 'post',
                        data: {'unit_name' : unit_name , 'settings' : 'modifyunit', 'unit_id' : key, 'unit_symbol' : unit_symbol, 'unit_symbol_position' : position},
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
      
    function modifyunitsymbol( key , unit_name, unit_symbol_position){
        swal({
            title: 'Modify Unit Symbol?',
            input: 'text',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: ( symbol ) => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/addsystemsettings',
                        type: 'post',
                        data: {'unit_symbol' : symbol , 'settings' : 'modifyunit', 'unit_id' : key, 'unit_name' : unit_name, 'unit_symbol_position' : unit_symbol_position},
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
    
    function deleteunit( key ){
        swal({
            title: 'Remove unit?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/addsystemsettings',
                        type: 'post',
                        data: {'settings' : 'deleteunit', 'unit_id' : key },
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
     $('form#addsettings').each( function(){
        var form = $( this );
        form.submit( function(e){
            e.preventDefault();
            var data =  form.serialize();
            swal({
            title: 'Add setting?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/addsystemsettings',
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
     
     $('form#localization').submit( function(e){
                e.preventDefault();
                var data = $( this ).serialize();
                swal({
            title: 'Update Localization details?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/updatesystemsettings',
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
            title: 'Update Currency details?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/settings/updatesystemsettings',
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
