<?php include('header.php');?>
        <div class="wrapper wrapper-content">
            <div class="container">
                 <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2 class="text-uppercase"><?php echo lang('menu_agriculture');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li> 
                            <a href="<?php echo base_url('expert/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
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
                    <h3 class="text-navy text-uppercase"><?php echo lang('menu_landpreparation');?></h3>
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
                                          <li class="text-navy"><a href="<?php echo base_url('expert/landtypes/modify/'.$landcrop->landcrops_id);?>"><?php echo lang('menu_modify');?></a></li>
                                          <li class="text-navy"><a href="<?php echo base_url('expert/landtypes/cultivation/'.$landcrop->landcrops_id);?>"><?php echo lang('menu_landcultivation');?></a></li>
                                          <li class="text-navy"><a href="<?php echo base_url('expert/landtypes/applyfert/'.$landcrop->landcrops_id);?>"><?php echo lang('menu_fertilizerapplication');?></a></li>
                                        </ul>
                                      </div>
                            </div>
                        <div class="ibox-content">
                               <div class="row">
                                    <?php $attr = array('class'=>'form-horizontals','method'=>'post','id'=>'addstageform'); 
                                            echo form_open(base_url('expert/landprepare/addstage'),$attr);?>
                                   <input type="hidden" value="<?php echo $key;?>" name="landcrop_id" />
                                              <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label"><?php echo lang('menu_stage');?></label>
                                                </div>
                                                <div class="col-sm-10">
                                                   <?php $avail_stages = ($landcrop->preparation_stages - $stages);
                                                   if($avail_stages << $landcrop->preparation_stages){
                                                       $st = ($landcrop->preparation_stages - $avail_stages) + 1;?>
                                                    <input type="text" name="stage" class="form-control" required="" readonly value="<?php echo 'Stage '.$st?>"/>
                                                      <!-- <select name="stage" class="select2 form-control"  readonly  >
                                                            <?php 
                                                                for ($j = 1; $j <= $avail_stages; $j++) {
                                                                    $i = $j + $stages;?>
                                                                 <option  value="<?php echo 'Stage '.$i;?>"><?php echo 'Stage '.$i;?></option>
                                                               <?php } ?>
                                                       </select>-->
                                                   <?php }else{ ?>
                                                    <div class="alert alert-danger">No more stages available. <a href="<?php echo base_url('expert/landtypes/modify/'.$key);?>">Set stage</a></div>
                                                    <input type="hidden" name="stage" required=""/>
                                                   <?php } ?>
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
                                <h5 class="text-uppercase"><i class="fa fa-list fa-1x"></i> <?php echo $landcrop->landtype.' - '.$landcrop->crop.' | '.lang('menu_stages');?></h5>
                                <span class="pull-right"><?php echo $stages.' / '.$landcrop->preparation_stages;?></span>
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
                                        <?php if(!empty($landprepares)){
                                            foreach ($landprepares as $key => $value) { ?>
                                                <tr>
                                                    <td style="width: 10%;" class="vertical-align"><?php echo $value['landprepare_stage'];?></td>
                                                    <td style="width: 70%;" class="vertical-align" ><div class="truncate fh-150" style="max-height:30px; overflow: hidden;"><?php echo $value['landprepare_stagedetails'];?></div></td>
                                                    <td style="width: 30%;" class="vertical-align">
                                                        <a class="text-danger" href="javascript:deletelandprepare('<?php echo $value['landprepare_id'];?>');"><?php echo lang('menu_delete');?></a>
                                                        | <a class="text-navy" href="<?php echo base_url('expert/landtypes/stagedetails/'.$value['landprepare_landcrop'].'/'.$value['landprepare_id']);?>"><?php echo lang('menu_details');?></a></td>                                                     
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
    function deletelandprepare( key ){
        swal({
            title: 'Remove Stage?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/landprepare/deletelandprepare',
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
            ellipsis: '...'
        });
        $('.summernote').summernote();
        
        $('form#addstageform').each( function(){
        var form = $( this );
        form.submit( function(e){
            e.preventDefault();
            var data =  form.serialize();
            swal({
            title: 'Add Stage?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/landprepare/addstage',
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
