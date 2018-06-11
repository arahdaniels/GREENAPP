<?php include('header.php');
// create curl resource 
// 
if( !empty($wcast->Code)){
    echo br(2);
    echo '<div class="alert alert-danger">Error Code: '.$wcast->Code.' Message: '.$wcast->Message.'</div>';
    $wcast = NULL;
    $weatherText = 'Unavailable';
    $tempinfo = 'Unavailable';
}else{
  
        if( ! empty($wcast)){
               $tempinfo = $wcast->DailyForecasts[0]->Temperature->Maximum->Value.'\''.$wcast->DailyForecasts[0]->Temperature->Maximum->Unit;               
          }else{
            $wcast = NULL;            
        }  
        if(!empty($wcond)) {
           $weatherText = $wcond[0]->WeatherText;
           $tempinfo = $wcond[0]->Temperature->Metric->Value.' \''.$wcond[0]->Temperature->Metric->Unit;
        }else{
           $weatherText = 'Unavailable';
           $tempinfo = 'Unavailable';
       }
}

?>
        <div class="wrapper wrapper-content">
            <div class="container-fluid">
            <div class="row  border-bottom bg-primary page-heading b-r-md" style="margin-bottom: 30px;">
                <div class="col-lg-12 col-md-12">
                    <h2 class="text-uppercase"><?php echo lang('menu_agriculture');?>
                        <small class=" text-white" style="font-size: small;"> <?php   if($sampleweather){
                                echo 'Weather data whown are not actual, They are for DEMO puporse';
                                } ?></small></h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('client/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                         <li>
                            <a href="<?php echo base_url('client/crops');?>" style="text-transform: capitalize;"><?php echo lang('menu_crops');?></a>
                        </li>
                        <li class="active">
                            <strong><?php echo lang('menu_cropmanagement');?></strong>
                        </li>
                    </ol>
                    
                </div>
            </div>
            <?php 
            $profil['resource_url'] = $this->config->item('resources');
            $profil['firstname'] = $profile->firstname;
            $profil['middlename'] = $profile->middlename;
            $profil['lastname'] = $profile->lastname;
            $profil['about'] = $profile->about;
            $profil['auth_role'] = $auth_role;
            if(!empty($wcond)){
                $wdata['temphigh'] = $wcond[0]->TemperatureSummary->Past6HourRange->Maximum->Metric->Value.' \''.$wcond[0]->TemperatureSummary->Past6HourRange->Maximum->Metric->Unit;
                $wdata['templow'] = $wcond[0]->TemperatureSummary->Past6HourRange->Minimum->Metric->Value.' \''.$wcond[0]->TemperatureSummary->Past6HourRange->Minimum->Metric->Unit;
                $wdata['humidity'] = $wcond[0]->RelativeHumidity;
                $wdata['winddirection'] = $wcond[0]->Wind->Direction->Degrees.' '.$wcond[0]->Wind->Direction->English;
                $wdata['windspeed'] = $wcond[0]->Wind->Speed->Metric->Value.' '.$wcond[0]->Wind->Speed->Metric->Unit;
                $wdata['precipitation'] = $wcond[0]->PrecipitationSummary->Precipitation->Metric->Value.' '.$wcond[0]->PrecipitationSummary->Precipitation->Metric->Unit;
                $wdata['weather'] = $wcond[0]->WeatherText;
                $wdata['temperature'] = $wcond[0]->Temperature->Metric->Value.' \''.$wcond[0]->Temperature->Metric->Unit;
            }else{
                $wdata = NULL;
            } 
            profile_header_crop($profil,$wdata);?>
                <div class="clearfix"></div><br/>
            <div class="row">
                <div class="col-sm-3">
                    <?php fieldCropsMenu($fieldCrops);  ?>
                </div>
                 <div class="col-sm-9" >
                     <div class="ibox">
                        <div class="ibox-content white-bg no-borders b-r-xs">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="text-muted text-uppercase"><b> <?php echo lang('menu_registercrop');?> </b></h5>
                                    <div class="hr-line-dashed"></div>
                                        <?php $attr = array('method' => 'post', 'id' => 'addfieldcrop'); echo form_open(base_url('client/crops/addcrop'),$attr)?>
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-12 col-md-4">
                                                    <div class="form-group">
                                                        <select name="field_crop_field" class="form-control text-uppercase" id="fields">
                                                            <option><?php echo lang('menu_selectfield');?></option>
                                                            <?php if( !empty($fields)):
                                                                    foreach ($fields as $key => $value) :?>
                                                            <option value="<?php echo $value['field_id'];?>"><b><?php echo $value['field_name'];?></b></option>
                                                                  <?php  endforeach;
                                                                   endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-12 col-md-4">
                                                    <div class="form-group">
                                                        <select name="field_crop_crop" class="form-control text-uppercase" id="crops">
                                                            <option><?php echo lang('menu_selectcrop');?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-12 col-md-4">
                                                    <div class="input-group">
                                                        <input required name="field_crop_area" style="width: 60%;" class="form-group-addons form-control text-uppercase" type="number"  placeholder="<?php echo lang('menu_croparea');?>" />
                                                        <input style="width: 40%;  background: #cccccc;" id="cropunit" class="form-group-addons form-control" value="NA"  />
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div><br/>
                                                <div class="col-sm-6 col-xs-12 col-md-4 pull-left">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-primary text-uppercase "><i class="fa fa-check fa-1x"></i></button>
                                                      <button class="btn btn-primary text-uppercase " type="submit"><?php echo lang('menu_registercrop');?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php if( ! empty( $fieldCrops)):
                     fieldCrops($fieldCrops);
                     else : ?>
                       <div class="alert alert-danger red-bg">
                           <p>You have no Crops Yet create one <a class="text-uppercase text-white font-bold" href="<?php echo base_url('client/crops/register');?>">< here ></a></p>
                       </div>
                    <?php endif;
                    ?>
                </div> 
                </div>
            </div>
        </div>
      <?php include('footer.php');?>
</body>
<script>
    $(document).ready(function() {    
         $('form#addfieldcrop').each( function(){
        var form = $( this );
        form.submit( function(e){
            e.preventDefault();
            var data =  form.serialize();
            swal({
            title: 'Register Crop?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('client/crops/addcrop');?>',
                        type: 'post',
                        data: data,
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           resolve( xhr.status + ' ' + xhr.statusText );
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
    
$('#fields').on('change',function(){
            var fieldID = $(this).val();
            changeFieldCrop(fieldID);
            changeFieldUnit(fieldID);
        });
        
  
 function changeFieldCrop(fieldID){
    if(fieldID){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('app/getfielddata/crops');?>',
                    data:'field_id='+ fieldID,
                    beforeSend: function(){
                        $('#crops').html('<option value="">Please wait...</option>');
                    },
                    success:function(html){
                        $('#crops').html(html);
                    }
                }); 
            }else{
                $('#state').html('<option value="">Select field first</option>');
            }
    }
    function changeFieldUnit(fieldID){
    if(fieldID){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('app/getfielddata/fieldunit');?>',
                    data:'field_id='+ fieldID,
                    beforeSend: function( ){
                        $('#cropunit').val('...');
                    },
                    success:function( result ){
                        var data = JSON.parse( result );
                        $('#cropunit').val( data.unit_symbol);
                        $('#cropunitvalue').val( data.unit_id);
                    }
                }); 
            }else{
                $('#cropunit').html('<option value="">!..</option>');
            }
    }
  
      function deletefieldcrop( key ){
        swal({
            title: 'Remove Crop?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('client/crops/deletefieldcrop');?>',
                        type: 'post',
                        data: {'field_crop_id' : key },
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
</script>
</html>
