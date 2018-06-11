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
                            <strong><?php echo lang('menu_landtypes');?></strong>
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
                        <h5 class="text-uppercase"><?php echo lang('menu_modify').' | '.$landcrop->landtype.' '.$landcrop->crop;?></h5>
                    </div>
                        <div class="ibox-content">
                                    <?php $attr = array('class'=>'form-horizontal','method'=>'post','id'=>'updatelandcrop'); 
                                            echo form_open(base_url('admin/landtypes/updatelandcrop'),$attr);?>
                                    <input type="hidden" name="landcrops_id" value="<?php echo $key;?>"/>
                                    <table style="display: table; width: 100%;
                                                border-collapse: separate; text-align: right;
                                                border-spacing: 30px;" >
                                    <tbody >
                                        <tr >
                                            <td class="vertical-align"><b><?php echo lang('menu_landtype');?></b></td>
                                            <td class="vertical-align">
                                                <select name="landcrops_land" class="select2 form-control" >
                                                <?php if(!empty($landtypes)){
                                                    foreach($landtypes as $key => $value){?>
                                                    <option <?php if($landcrop->landcrops_land == $value['landtype_id']){ echo 'selected';};?> value="<?php echo $value['landtype_id'];?>"><?php echo $value['landtype'];?></option>
                                                   <?php }
                                                } ?>
                                                </select>
                                            </td>
                                        </tr>
                                         <tr >
                                            <td class="vertical-align"><b><?php echo lang('menu_crops');?></b></td>
                                            <td class="vertical-align">
                                                <select name="landcrops_crop" class="select2 form-control" >
                                                <?php if(!empty($crops)){
                                                    foreach($crops as $key => $value){?>
                                                    <option <?php if($landcrop->landcrops_crop == $value['crop_id']){ echo 'selected';};?> value="<?php echo $value['crop_id'];?>"><?php echo $value['crop'];?></option>
                                                   <?php }
                                                } ?>
                                                </select>
                                            </td>
                                        </tr>
                                         <tr >
                                            <td class="vertical-align"><b><?php echo lang('menu_preparationstages');?></b></td>
                                            <td class="vertical-align">
                                                <input min="<?php echo $stages;?>" value="<?php echo $landcrop->preparation_stages;?>" type="number" name="preparation_stages" placeholder="<?php echo lang('menu_preparationstages');?>" class="form-control" />
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="vertical-align"><b><?php echo lang('menu_cultivationstages');?></b></td>
                                            <td class="vertical-align">
                                                <input min="<?php echo $cstages;?>" value="<?php echo $landcrop->cultivation_stages;?>" type="number" name="cultivation_stages" placeholder="<?php echo lang('menu_cultivationstages');?>" class="form-control" />
                                            </td>
                                        </tr>
                                        <tr>
                                              <td></td>
                                              <td><button class="btn btn-primary btn-block text-uppercase" type="submit"><?php echo lang('menu_update');?></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <?php echo form_close();?>
                        </div>
                    </div>
                    
                    <div class="ibox">                        
                    <div class="ibox-title bg-primary">
                        <h5 class="text-uppercase"><?php echo lang('menu_landtype').' & '.lang('menu_crops');?></h5>
                    </div>
                        <div class="ibox-content">
                                    <br/>
                                    <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search">
                                    <table class="table footable" data-page-size="10" data-filter=#filter>
                                        <thead>
                                            <tr>
                                                <th><?php echo lang('menu_landtype');?></th>
                                                <th><?php echo lang('menu_crop');?></th>
                                                <th><?php echo lang('menu_preparationstages');?></th>
                                                <th><?php echo lang('menu_cultivationstages');?></th>
                                                <th><?php echo lang('menu_option');?></th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php if(!empty($landcrops)){
                                            foreach ($landcrops as $key => $value) { ?>
                                                <tr>
                                                    <td class="vertical-align"><a class="text-navy"><?php echo $value['landtype'];?></a></td>
                                                    <td class="vertical-align"><a class="text-navy"><?php echo $value['crop'];?></a></td>
                                                    <td class="vertical-align"><a class="text-navy"><?php echo $value['preparation_stages'];?></a></td>
                                                    <td class="vertical-align"><a class="text-navy"><?php echo $value['cultivation_stages'];?></a></td>
                                                    <td class="vertical-align">
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle text-navy" id="optionsmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                          <?php echo lang('menu_activity');?>
                                                          <span class="caret"></span>
                                                        </a> 
                                                        <ul class="dropdown-menu" aria-labelledby="optionsmenu">
                                                          <li  class="text-danger"><a class="text-danger" href="javascript:deletelandcrop( <?php echo $value['landcrops_id'];?> );"><?php echo lang('menu_delete');?></a></li>
                                                          <li><a href="<?php echo base_url('admin/landtypes/modify/'.$value['landcrops_id']);?>"><?php echo lang('menu_modify');?></a></li>
                                                          <li><a href="<?php echo base_url('admin/landtypes/preparation/'.$value['landcrops_id']);?>"><?php echo lang('menu_landpreparation');?></a></li>
                                                          <li><a href="<?php echo base_url('admin/landtypes/cultivation/'.$value['landcrops_id']);?>"><?php echo lang('menu_landcultivation');?></a></li>
                                                          <li><a href="<?php echo base_url('admin/landtypes/applyfert/'.$value['landcrops_id']);?>"><?php echo lang('menu_fertilizerapplication');?></a></li>
                                                        </ul>
                                                      </div></td> 
                                                    
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
  
    function deletelandcrop( key ){
        swal({
            title: 'Remove Land crop?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/admin/landtypes/deletelandcrop',
                        type: 'post',
                        data: {'landcrops_id' : key },
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
         $('form#updatelandcrop').each( function(){
        var form = $( this );
        form.submit( function(e){
            e.preventDefault();
            var data =  form.serialize();
            swal({
            title: 'Modify Land Crop?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/admin/landtypes/updatelandcrop',
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
