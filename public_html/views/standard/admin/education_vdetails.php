<?php include('header.php');?>

    <link href="<?php echo $this->config->item('resources');?>css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

        <div class="wrapper wrapper-content">
            <div class="container">
                <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2 class="text-uppercase"><?php echo lang('menu_education');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('client/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('client/education');?>" style="text-transform: capitalize;"><?php echo lang('menu_education');?></a>
                        </li> 
                        <li class="active">
                            <strong><?php echo lang('menu_results');?></strong>
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
                                    <?php echo $profile->about;?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                <strong>142</strong> Projects
                            </td>
                            <td>
                                <strong>22</strong> Followers
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong>61</strong> Comments
                            </td>
                            <td>
                                <strong>54</strong> Articles
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>154</strong> Tags
                            </td>
                            <td>
                                <strong>32</strong> Friends
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <small>Sales in last 24h</small>
                    <h2 class="no-margins">206 480</h2>
                    <div id="sparkline1"></div>
                </div>


            </div>
        <div class="row">
           <div class="col-lg-4">
                <div class="ibox">
                <div class="ibox-title bg-primary ">                            
                    <h5 class="text-uppercase"><?php echo lang('menu_videooptions');?></h5>
                </div>
                <div class="ibox-content">
                <ul class="list-group clear-list m-t">
                    <li class="list-group-item fist-item"> 
                        <a class="text-info" href="<?php echo base_url('admin/education/mvideo/'.$video->edu_videos_key);?>"> <i class="fa fa-pencil"></i>  <?php echo lang('menu_modify');?></a> 
                    </li> 
                    <li class="list-group-item">
                        <a class="text-danger" href="javascript:removevideo(<?php echo $video->edu_videos_key;?>);"> <i class="fa fa-trash"></i> <?php echo lang('menu_delete');?></a> 
                    </li>
                </ul>
                </div>
        </div>
                </div> 

                <div class="col-lg-8">
                    <!--<div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <figure>
                                <iframe width="560" height="315" src="<?php echo $video->edu_videos_url;?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen style="width: 100%; height:300px;"></iframe>
                            </figure>
                        </div>
                    </div>-->
                    <div class="ibox float-e-margins">
                        <div class="ibox-title bg-primary text-uppercase">
                            <h5><?php echo lang('menu_videodescription');?></h5>
                        </div>
                     <div class="ibox-content">
                      <table class="table table-striped table-bordered">
                        <tbody>                            
                        <tr>
                            <td colspan="2">
                                <strong><?php echo lang('menu_title');?></strong> <?php echo $video->edu_video;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong><?php echo lang('menu_mode');?></strong> <?php echo $video->edu_videos_mode;?>
                            </td>
                            <td>
                                <strong><?php echo lang('menu_fee');?></strong> 
                                 <?php 
                                    if($video->currency_symbol_position == 'left'){ 
                                         $fee = $video->edu_videos_fee * $video->currency_cunit;
                                         echo $video->currency_symbol.' '.number_format($fee,2,'.',',');
                                       }else{
                                        $fee = $video->edu_videos_fee * $video->currency_cunit;
                                         echo number_format($fee,2,'.',',').' '.$video->currency_symbol;
                                    }?>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong><?php echo lang('menu_category');?></strong> <?php echo $video->edu_category;?>
                            </td>
                            <td>
                                <strong><?php echo lang('menu_type');?></strong> <?php echo $video->edu_types;?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                     </div>   
                    </div>
                    <div class="ibox float-e-margins">                        
                        <div class="ibox-content profile-content">
                            <?php echo $video->edu_videos_details;?>
                        </div>
                    </div>
                </div>

            </div>

            </div>  

        </div>
    

<?php include('footer.php');?>
<script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <script> 
        
    function removevideo( key ){        
        swal({
            title: '<?php echo lang('menu_deletevideo?');?>',
            showCancelButton: true,
            confirmButtonText: '<?php echo lang('menu_yesdelete');?>',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                     $.ajax({
                        url: '<?php echo base_url('admin/education/removevideo');?>',
                        type: 'post',
                        data: {'key' : key},
                        success: function( result ){
                            resolve( result )
                            window.document.location.href = '<?php echo base_url('admin/education/videos');?>';
                        },
                        error: function(xhr){
                            resolve( xhr.statusText )
                        }
                    });
              })
            },
            allowOutsideClick: () => !swal.isLoading()
          }).then((result) => {
            if (result.value) {
              swal({
                type: 'success',
                title: '<?php echo lang('menu_videodeleted');?>'
              })
            }
          });                   
        }
            
    </script>

</body>

</html>
