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
                           <?php $attr = array('method'=>'post'); echo form_open(base_url('expert/education'),$attr);?>
                            <input value="addcategory" name="types" type="hidden" readonly />
                            <input value="<?php echo $language_id;?>" name="localization" type="hidden" readonly />
                            <div class="form-group">
                               <!-- <label><?php echo lang('menu_category'); ?></label>-->
                                <input required name="edu_category" class="form-control" placeholder="<?php echo lang('menu_category'); ?>" />
                            </div>
                            <button class="btn btn-primary btn-block text-uppercase"><?php echo lang('menu_submit'); ?></button>
                        <?php echo form_close();?>
                        </div>
                    </div>
                    
                    
                </div>

                <div class="col-lg-9">
                    <div class="ibox">
                        <div class="ibox-title bg-primary text-uppercase">                            
                            <h3><?php echo lang('menu_modify'); ?></h3>
                        </div>
                        <div class="ibox-content">
                           <?php $attr = array('method'=>'post'); echo form_open(base_url('expert/education/modifytypes/'.$type->edu_types_key),$attr);?>
                            <input value="<?php echo $type->edu_types_key;?>" name="dui" type="hidden" readonly />
                            <input value="<?php echo $language_id;?>" name="localization" type="hidden" readonly />
                            <div class="form-group">
                               <!-- <label><?php echo lang('menu_category'); ?></label>-->
                                <select name="edu_types_category" class="form-control">
                                    <?php if(!empty($categories)){
                                          foreach ($categories as $key => $value) { ?>
                                            <option <?php if($type->edu_types_category == $value['edu_category_key'])echo 'selected';?> value="<?php echo $value['edu_category_key'];?>"><?php echo $value['edu_category'];?></option>
                                           <?php    }
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                               <!-- <label><?php echo lang('menu_type'); ?></label>-->
                                <input value="<?php echo $type->edu_types;?>" required name="edu_type" class="form-control" placeholder="<?php echo lang('menu_type'); ?>" />
                            </div>
                            <button class="btn btn-primary btn-block text-uppercase"><?php echo lang('menu_submit'); ?></button>
                        <?php echo form_close();?>
                        </div>
                    </div>
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
                                                        <td><a class="text-primary" href="<?php echo base_url('expert/education/modifytypes/'.$value['edu_types_key']);?>"><?php echo lang('menu_modify');?></a></td>
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
        
        function removetypes( key ){
                    $.ajax({
                        url: '<?php echo base_url('expert/education/removetypes');?>',
                        type: 'post',
                        data: {'key' : key},
                        success: function( result ){
                            alert( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           alert( xhr.status + ' ' + xhr.statusText ); 
                        }
                    });
            }
            
    </script>

</body>

</html>
