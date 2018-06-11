<?php include('header.php');?>

        <div class="wrapper wrapper-content">
            <div class="container">
                <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2><?php echo lang('menu_weather');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('expert/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                        <li>
                            <a style="text-transform: capitalize;"><?php echo lang('menu_cities');?></a>
                        </li>
                        <li class="active">
                            <strong><?php echo lang('menu_modify');?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <img src="<?php echo $this->config->item('resources');?>img/a4.jpg" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                   <?php echo $profile->firstname.' '.$profile->lastname;?>
                                </h2>
                                <h4 style="text-transform: capitalize;"><?php echo $auth_role;?></h4>
                                <small>
                                    <?php  $profile->about;?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3">

                    <div class="ibox">
                        <div class="ibox-content text-primary">
                            <a href="" class="btn btn-block btn-warning text-uppercase"><?php echo lang('menu_videos');?></a>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-title bg-primary text-uppercase">                            
                            <h3><?php echo lang('menu_addcategory'); ?></h3>
                        </div>
                        <div class="ibox-content">
                           <?php $attr = array('method'=>'post','id'=>'addcategory'); echo form_open(base_url('expert/education'),$attr);?>
                            <input value="addcategory" name="types" type="hidden" readonly />
                            <div class="form-group">
                                 <select class="form-control" name="localization" id="country">
                                    <?php if(! empty($localization)){
                                        foreach ($localization as $key => $value) {?>
                                         <option class="text-capitalize" <?php 
                                            if($value['localization_id'] == $language_id){ echo 'selected="selected"';}?>  value="<?php echo $value['localization_id'];?>"><?php echo ucfirst($value['locale']).' | '.$value['language'];?></option>
                                        <?php }
                                    }?>
                                 </select>
                            </div>
                            <div class="form-group">
                               <!-- <label><?php echo lang('menu_category'); ?></label>-->
                                <input required name="edu_category" class="form-control" placeholder="<?php echo lang('menu_category'); ?>" />
                            </div>
                            <button class="btn btn-primary btn-block text-uppercase"><?php echo lang('menu_submit'); ?></button>
                        <?php echo form_close();?>
                        </div>
                    </div>
                    
                    <div class="ibox">
                        <div class="ibox-title bg-primary text-uppercase">                            
                            <h3><?php echo lang('menu_addtype'); ?></h3>
                        </div>
                        <div class="ibox-content">
                           <?php $attr = array('method'=>'post','id'=>'addtypes'); echo form_open(base_url('expert/education'),$attr);?>
                            <input value="addtypes" name="types" type="hidden" readonly />
                           <div class="form-group">
                                 <select class="form-control" name="localization" id="country">
                                    <?php if(! empty($localization)){
                                        foreach ($localization as $key => $value) {?>
                                         <option class="text-capitalize" <?php 
                                            if($value['localization_id'] == $language_id){ echo 'selected="selected"';}?>  value="<?php echo $value['localization_id'];?>"><?php echo ucfirst($value['locale']).' | '.$value['language'];?></option>
                                        <?php }
                                    }?>
                                 </select>
                            </div>
                            <div class="form-group">
                               <!-- <label><?php echo lang('menu_category'); ?></label>-->
                                <select name="edu_types_category" class="form-control">
                                    <?php if(!empty($categories)){
                                          foreach ($categories as $key => $value) { ?>
                                            <option value="<?php echo $value['edu_category_key'];?>"><?php echo $value['edu_category'];?></option>
                                           <?php    }
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                               <!-- <label><?php echo lang('menu_type'); ?></label>-->
                                <input  required name="edu_type" class="form-control" placeholder="<?php echo lang('menu_type'); ?>" />
                            </div>
                            <button class="btn btn-primary btn-block text-uppercase"><?php echo lang('menu_submit'); ?></button>
                        <?php echo form_close();?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                        <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> <i class="fa fa-list"></i> <?php echo lang('menu_categories');?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo lang('menu_category');?></th>
                                            <th><?php echo lang('menu_options');?></th>
                                        </tr> 
                                        </thead>
                                        <tbody>
                                       <?php if(!empty($categories)){
                                            $i =1;
                                                foreach ($categories as $key => $value) { ?> 
                                                     <tr>                                                         
                                                        <td><?php echo $i;?></td>
                                                        <td><?php echo $value['edu_category'];?></td>
                                                        <td><a class="text-primary" href="<?php echo base_url('expert/education/modifycategory/'.$value['edu_category_key']);?>"><?php echo lang('menu_modify');?></a> | 
                                                            <a class="text-danger" href="javascript:removecategory( <?php echo $value['edu_category_key'];?> );"><?php echo lang('menu_remove');?></a></td>
                                                    </tr>
                                           <?php $i++;}
                                       } ?>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                             <li class="active"><a data-toggle="tab-1" href="#tab-2" aria-expanded="true"> <i class="fa fa-list-alt"></i> <?php echo lang('menu_types');?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo lang('menu_category');?></th>
                                            <th><?php echo lang('menu_types');?></th>
                                            <th><?php echo lang('menu_options');?></th>
                                        </tr> 
                                        </thead>
                                        <tbody>
                                       <?php if(!empty($types)){
                                            $i =1;
                                                foreach ($types as $key => $value) { ?> 
                                                     <tr>                                                         
                                                        <td><?php echo $i;?></td>
                                                        <td><?php echo $value['edu_category'];?></td>
                                                        <td><?php echo $value['edu_types'];?></td>
                                                        <td><a class="text-primary" href="<?php echo base_url('expert/education/modifytypes/'.$value['edu_types_key']);?>"><?php echo lang('menu_modify');?></a> | 
                                                            <a class="text-danger" href="javascript:removetypes( <?php echo $value['edu_types_key'];?> );"><?php echo lang('menu_remove');?></a></td>
                                                    </tr>
                                           <?php $i++;}
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
      <?php include('footer.php');?>
<script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>

<script>
   $( function(){
        $('form#addcategory').submit( function(e){
                e.preventDefault();
                var data = $( this ).serialize();
                swal({
            title: 'Add new category',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/education',
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
      
      $('form#addtypes').submit( function(e){
                e.preventDefault();
                var data = $( this ).serialize();
                swal({
            title: 'Add new type',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/education',
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
</script>
</body>
</html>
