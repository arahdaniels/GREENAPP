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
                    <h3 class="text-navy text-uppercase"><a class="text-navy" href="<?php echo base_url('expert/landtypes/preparation/'.$key2);?>"><?php echo $landcrop->landtype.' - '.$landcrop->crop;?></a></h3>
                    <div class="hr-line-solid text-navy"></div>
                    <div class="ibox">
                      <div class="ibox-title bg-primary text-uppercase">
                                <h3> <?php echo $landprepare->landprepare_stage;?></h3>
                            </div>
                        <div class="ibox-content">
                               <div class="row">
                                    <?php $attr = array('class'=>'form-horizontals','method'=>'post','id'=>'updatestageform'); 
                                            echo form_open(base_url('expert/landprepare/addstage'),$attr);?>
                                   <input type="hidden" value="<?php echo $key;?>" name="landprepare_id" />
                                              <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label"><?php echo lang('menu_stage');?></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input readonly value="<?php echo $landprepare->landprepare_stage;?>" class="form-control" name="stage" type="text" placeholder="<?php echo lang('menu_stage');?>" required />
                                                </div>
                                              </div>
                                                <div class="clearfix"></div><br/>
                                                <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label"><?php echo lang('menu_stagedetails');?></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="details" class="form-control summernote" rows="6" placeholder="<?php echo lang('menu_details'); ?>" required><?php echo $landprepare->landprepare_stagedetails;?></textarea>
                                                </div>
                                              </div>
                                                <div class="clearfix"></div><br/>
                                                <div class="form-group">
                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-block btn-primary text-uppercase"><?php echo lang('menu_update');?></button>
                                                </div>
                                              </div>
                                    <?php echo form_close();?>
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
<script src="<?php echo $this->config->item('resources');?>js/plugins/dotdotdot/jquery.dotdotdot.min.js"></script>
<script>
     $(document).ready(function() { 
        $('.summernote').summernote();
        
        $('form#updatestageform').each( function(){
        var form = $( this );
        form.submit( function(e){
            e.preventDefault();
            var data =  form.serialize();
            swal({
            title: 'Update Stage?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/landprepare/updatestage',
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
