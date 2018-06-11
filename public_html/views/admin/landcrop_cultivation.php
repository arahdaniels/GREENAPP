<?php include('header.php');?>
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
                            <strong><?php echo lang('menu_landcultivation');?></strong>
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
                    <h3 class="text-navy text-uppercase"><?php echo lang('menu_landcultivation');?></h3>
                    <div class="hr-line-solid text-navy"></div>
                    <div class="ibox">                      
                            <div class="ibox-title bg-primary text-capitalize">
                                <h5 class="text-uppercase"><i class="fa fa-plus-square fa-1x"></i> <?php echo $landcrop->landtype.' - '.$landcrop->crop;?>
                                    </h5>
                                        <div class="dropdown pull-right">
                                        <a class="dropdown-toggle text-white" id="optionsmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i class="fa fa-bars"></i> <?php echo lang('menu_options');?>
                                        </a> 
                                        <ul class="dropdown-menu" aria-labelledby="optionsmenu">
                                          <li class="text-navy"><a href="<?php echo base_url('admin/landtypes/modify/'.$landcrop->landcrops_id);?>"><?php echo lang('menu_modify');?></a></li>
                                          <li class="text-navy"><a href="<?php echo base_url('admin/landtypes/preparation/'.$landcrop->landcrops_id);?>"><?php echo lang('menu_landpreparation');?></a></li>
                                          <li class="text-navy"><a href="<?php echo base_url('admin/landtypes/applyfert/'.$landcrop->landcrops_id);?>"><?php echo lang('menu_fertilizerapplication');?></a></li>
                                        </ul>
                                      </div>
                            </div>
                        <div class="ibox-content">
                               <div class="row">
                                    <?php $attr = array('class'=>'form-horizontals','method'=>'post','id'=>'addcultivationstage'); 
                                            echo form_open(base_url('admin/landtypes/addcultivationstage'),$attr);?>
                                   <input type="hidden" value="<?php echo $key;?>" name="landcrop_id" />
                                              <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label"><?php echo lang('menu_stage');?></label>
                                                </div>
                                                <div class="col-sm-10">
                                                   <?php $avail_stages = ($landcrop->cultivation_stages - $cstages);
                                                   if($avail_stages << $landcrop->cultivation_stages){
                                                       $st = ($landcrop->cultivation_stages - $avail_stages) + 1;?>
                                                    <input type="text" name="stage" class="form-control" required="" readonly value="<?php echo 'Stage '.$st?>"/>
                                                      <!-- <select name="stage" class="select2 form-control"  readonly  >
                                                            <?php 
                                                                for ($j = 1; $j <= $avail_stages; $j++) {
                                                                    $i = $j + $cstages;?>
                                                                 <option  value="<?php echo 'Stage '.$i;?>"><?php echo 'Stage '.$i;?></option>
                                                               <?php } ?>
                                                       </select>-->
                                                   <?php }else{ ?>
                                                    <div class="alert alert-danger">No more stages available. <a href="<?php echo base_url('admin/landtypes/modify/'.$key);?>">Set stage</a></div>
                                                    <input type="hidden" name="stage" required=""/>
                                                   <?php } ?>
                                                </div>
                                              </div>
                                               <div class="clearfix"></div><br/>
                                                <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label"><?php echo lang('menu_applyfertilizer?');?></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="applyfertilizer" name="apply_fertilizer"  required >
                                                        <option value="NO" selected><?php echo lang('menu_no');?></option>
                                                        <option value="YES" ><?php echo lang('menu_yes');?></option>
                                                    </select>
                                                </div>
                                              </div>
                                               <div id="fertilizer" class="hidden">
                                               <div class="clearfix"></div><br/>
                                                <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label"><?php echo lang('menu_fertilizer');?></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <select name="fertilizer" class="select2 form-control" >
                                                        <option value="NULL"><?php echo lang('menu_selectfertilizer');?></option>
                                                <?php if(!empty($fertilizers)){
                                                    foreach($fertilizers as $key => $value){?>
                                                    <option value="<?php echo $value['fertilizer_id'];?>"><?php echo $value['fertilizer'];?></option>
                                                   <?php }
                                                } ?>
                                                </select>
                                                </div>
                                              </div> 
                                              </div>
                                               <div id="fertilizer-details" class="hidden">
                                               <div class="clearfix"></div><br/>
                                                <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label"><?php echo lang('menu_fertilizerdetails');?></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea id="fertilizer-details" name="fertilizer_details" class="form-control summernote" rows="6" placeholder="<?php echo lang('menu_fertilizerdetails'); ?>" ></textarea>
                                                </div>
                                              </div>
                                               </div>
                                                <div class="clearfix"></div><br/>
                                                <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label"><?php echo lang('menu_stagedetails');?></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="details" class="form-control summernote" rows="6" placeholder="<?php echo lang('menu_details'); ?>" required></textarea>
                                                </div>
                                              </div>
                                                <div class="clearfix"></div><br/>
                                                <div class="form-group">
                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-block btn-primary text-uppercase"><?php echo lang('menu_submit');?></button>
                                                </div>
                                              </div>
                                    <?php echo form_close();?>
                                  </div>
                        </div>
                    </div>
                    
                    <div class="ibox">                      
                            <div class="ibox-title bg-primary text-capitalize">
                                <h5 class="text-uppercase"><i class="fa fa-list fa-1x"></i> <?php echo $landcrop->landtype.' - '.$landcrop->crop.' | '.lang('menu_cultivationstages');?></h5>
                                <span class="pull-right"><?php echo $cstages.' / '.$landcrop->cultivation_stages;?></span>
                            </div>
                        <div class="ibox-content">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th><?php echo lang('menu_stage');?></th>
                                                <th><?php echo lang('menu_details');?></th>
                                                <th><?php echo lang('menu_option');?></th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php if(!empty($cultivations)){
                                            foreach ($cultivations as $key => $value) { ?>
                                                <tr>
                                                    <td style="width: 10%;" class="vertical-align"><?php echo $value['landcultivation_stage'];?></td>
                                                    <td style="width: 70%;" class="vertical-align" ><div class="truncate fh-150" style="max-height:30px; overflow: hidden;"><?php echo $value['landcultivation_stagedetails'];?></div></td>
                                                    <td style="width: 30%;" class="vertical-align">
                                                        <a class="text-danger" href="javascript:deletecultivation('<?php echo $value['landcultivation_id'];?>');"><?php echo lang('menu_delete');?></a>
                                                        | <a class="text-navy" href="<?php echo base_url('admin/landtypes/cdetails/'.$value['landcultivation_landcrop'].'/'.$value['landcultivation_id']);?>"><?php echo lang('menu_details');?></a></td>                                                     
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
<script src="<?php echo $this->config->item('resources');?>js/plugins/dotdotdot/jquery.dotdotdot.min.js"></script>
<script>       
    function deletecultivation( key ){
        swal({
            title: 'Remove Stage?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            confirmButtonColor: 'Red',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'https://greenapp.co.tz/admin/landtypes/deletecultivation',
                        type: 'post',
                        data: {'key' : key },
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
        $(".truncate").dotdotdot({
            watch: 'window',
            ellipsis: ' ...'
        });
        $('.summernote').summernote();
        
        $('select#applyfertilizer').change( function(){
            var selector = $( this );
            var value = selector.val();
            var fert = $('#fertilizer');
            var fertDetail = $('#fertilizer-details');
            if( value == 'YES'){
                fert.removeClass('hidden');
                fertDetail.removeClass('hidden');
            }else{
                fert.addClass('hidden');
                fertDetail.addClass('hidden');
            }
        });
        
        $('form#addcultivationstage').each( function(){
        var form = $( this );
        form.submit( function(e){
            e.preventDefault();
            var data =  form.serialize();
            swal({
            title: 'Add Culitivation Stage?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'https://greenapp.co.tz/admin/landtypes/addcultivationstage',
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
