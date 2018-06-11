<?php include('header.php');?>
   <div class="wrapper wrapper-content">
       <div class="container">
           <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2><?php echo lang('menu_videos');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('expert/education');?>"><?php echo lang('menu_education');?></a>
                        </li>
                        <li class="active">
                            <a style="text-transform: capitalize;"><strong><?php echo lang('menu_overview');?></strong></a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">195</span>
                        <h5><?php echo lang('menu_subscribed');?></h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">386,200</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                        <small>Total views</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">195</span>
                        <h5><?php echo lang('menu_unsubscribed');?></h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">80,800</h1>
                        <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                        <small>New orders</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">1022</span>
                        <h5><?php echo lang('menu_totalvideos');?></h5>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="no-margins">406,42</h1>
                                <div class="font-bold text-navy"> <i class="fa fa-eye"></i> <small><?php echo lang('menu_free');?></small></div>
                            </div>
                            <div class="col-md-6">
                                <h1 class="no-margins">206,12</h1>
                                <div class="font-bold text-navy"><i class="fa fa-money"></i> <small><?php echo lang('menu_paid');?></small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Monthly income</h5>
                        <div class="ibox-tools">
                            <span class="label label-primary">Updated 12.2015</span>
                        </div>
                    </div>
                    <div class="ibox-content no-padding">
                        <div class="flot-chart m-t-lg" style="height: 55px;">
                            <div class="flot-chart-content" id="flot-chart1" style="padding: 0px; position: relative;"><canvas class="flot-base" width="758" height="55" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 758px; height: 55px;"></canvas><canvas class="flot-overlay" width="758" height="55" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 758px; height: 55px;"></canvas></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                       <div class="ibox">
                        <div class="ibox-title bg-primary text-uppercase">                            
                            <h3><i class="fa fa-film"></i>  <?php echo lang('menu_addvideo'); ?></h3>
                        </div>
                        <div class="ibox-content">
                           <?php $attr = array('method'=>'post','id'=>'add-edu-video'); echo form_open(base_url('expert/education/videos'),$attr);?>
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
                                <select name="edu_video_typecategory" class="form-control">
                                    <?php if(!empty($types)){
                                          foreach ($types as $key => $value) { ?>
                                            <option value="<?php echo $value['edu_category_key'].'-'.$value['edu_types_key'];?>"><?php echo $value['edu_category'].' | '.$value['edu_types'];?></option>
                                           <?php    }
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text"  required name="edu_video" class="form-control" placeholder="<?php echo lang('menu_video'); ?>" />
                            </div>
                           <!-- <div class="form-group">
                                <input type="url"  required name="edu_video_url" class="form-control" placeholder="<?php echo lang('menu_videourl').' (youtube)'; ?>" />
                            </div> -->
                            <div class="form-group">
                                <h5><?php echo lang('menu_videomode');?></h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><?php echo lang('menu_paid');?></label>
                                        <input checked="checked" type="radio" value="paid" required name="edu_videos_mode"  />
                                    </div>
                                    <div class="col-sm-6">
                                        <label><?php echo lang('menu_free');?></label>
                                        <input type="radio" value="free" required name="edu_videos_mode"   />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input value="0"  name="edu_videos_fee" class="form-control" placeholder="<?php echo lang('menu_videofee'); ?>" />
                                    </div>
                                    <div class="col-sm-6">                                        
                                        <select name="edu_videos_currency_locale" class="form-control">
                                            <?php if(!empty($currencies)){
                                                  foreach ($currencies as $key => $value) { ?>
                                            <option <?php if($value['currency_localization'] ===  $language_id) echo 'selected';?> class="text-capitalize" value="<?php echo $value['currency_id'].'-'.$value['localization_id'].'-'.$value['currency_cunit'];?>"><span class="text-capitalize"><?php echo ucfirst($value['locale']).' | '.$value['language'].' | '.$value['currency'];?></span></option>
                                                   <?php    }
                                            }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="edu_videos_details" class="form-control summernote" data-provide="markdowns" rows="6" placeholder="<?php echo lang('menu_videodetails'); ?>"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block text-uppercase"><?php echo lang('menu_submit'); ?></button>
                        <?php echo form_close();?>
                        </div>
                    </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-warning pull-right">Data has changed</span>
                        <h5>User activity</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Pages / Visit</small>
                                <h4>236 321.80</h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">% New Visits</small>
                                <h4>46.11%</h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Last week</small>
                                <h4>432.021</h4>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Pages / Visit</small>
                                <h4>643 321.10</h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">% New Visits</small>
                                <h4>92.43%</h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Last week</small>
                                <h4>564.554</h4>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Pages / Visit</small>
                                <h4>436 547.20</h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">% New Visits</small>
                                <h4>150.23%</h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Last week</small>
                                <h4>124.990</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
                        <div class="ibox-title bg-primary text-uppercase">
                            <h5><i class="fa fa-film"></i> <?php echo lang('menu_videos');?></h5>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th><?php echo lang('menu_mode');?></th>
                                    <th data-hide="phone,tablet"><?php echo lang('menu_video');?></th>                                    
                                    <th data-hide="phone,tablet"><?php echo lang('menu_category');?></th>
                                    <th data-hide="phone,tablet"><?php echo lang('menu_type');?></th>
                                    <th data-hide="phone,tablet"><?php echo lang('menu_fee');?></th>
                                    <th data-hide="phone,tablet"><?php echo lang('menu_option');?></th>
                                </tr>
                                </thead>
                                    <tbody>
                                        <?php if(!empty($videos)){
                                           foreach ($videos as $key => $value) {
                                               if($value['edu_videos_mode'] =='paid'){$class = 'label-warning';}else{$class = 'label-primary';};?>
                                                <tr>
                                                    <td class="project-status">
                                                        <span class="label <?php echo $class;?>"><?php echo $value['edu_videos_mode'];?></span>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="<?php echo base_url('expert/educattion/videodetails');?>"><?php echo $value['edu_video'];?></a>
                                                    </td>
                                                     <td class="project-title">
                                                        <a href="javascript:;"><?php echo $value['edu_category'];?></a>
                                                    </td>
                                                    <td class="project-title">
                                                        <a href="javascript:;"><?php echo $value['edu_types'];?></a>
                                                    </td>
                                                    <td class="project-title"> 
                                                        <?php 
                                                         if($value['currency_symbol_position'] == 'left'){ 
                                                              $fee = $value['edu_videos_fee'] * $value['currency_cunit'];
                                                              echo $value['currency_symbol'].' '.number_format($fee,2,'.',',');
                                                            }else{
                                                             $fee = $value['edu_videos_fee'] * $value['currency_cunit'];
                                                              echo number_format($fee,2,'.',',').' '.$value['currency_symbol'];
                                                         }?>
                                                    </td>
                                                    <td class="project-actions">
                                                        <a href="<?php echo base_url('expert/education/dvideo/'.$value['edu_videos_key']);?>"><?php echo lang('menu_details');?></a> | 
                                                        <a href="<?php echo base_url('expert/education/mvideo/'.$value['edu_videos_key']);?>"><?php echo lang('menu_modify');?></a> | 
                                                        <a href="javascript:removevideo(<?php echo $value['edu_videos_key'];?>);"><?php echo lang('menu_delete');?></a>                                                      
                                                    </td>
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

       
    <?php include('footer.php');?>       
    <script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/plugins/summernote/summernote.min.js"></script>
    <script>
        $(function(){  
            $('.summernote').summernote();
            
            $('form#add-edu-video').submit( function(e){
                e.preventDefault();
                var data = $( this ).serialize();
                swal({
            title: 'Add new video',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/expert/education/videos',
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
