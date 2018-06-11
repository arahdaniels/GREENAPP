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
                            <strong><?php echo lang('menu_varieties');?></strong>
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
                    <?php cropInfo($cropInfo,$link);?>                  
                </div>
                 <div class="col-sm-9" >
                     <div class="ibox  ">
                         <div class="ibox-title bg-muted no-borders">
                             <h3 class="text-muted text-uppercase"><?php echo lang('menu_addvarietyfor').' <a href="'.base_url('client/crops/details/').$cropInfo->field_crop_id.'"><span class="text-navy"> '.$cropInfo->crop.'</span></a>';?></h3>
                         </div>
                        <div class="ibox-content white-bg b-r-xs font-bold">
                            <?php $attr = array('id' => 'addvariety', 'method' => 'post'); echo form_open(base_url('client/crops/addvariety'),$attr);?>
                            <div class="row">
                                <input type="hidden" value="<?php echo $cropInfo->field_crop_id;?>" name="variety_fieldcrop" />
                                <div class=" col-xs-12 col-md-6 ">                            
                                    <div class="form-group">
                                        <label class="text-uppercase"><?php echo lang('menu_varietyname');?></label>
                                        <input name="variety_name" required class="form-control" placeholder="<?php echo lang('menu_variety');?>" type="text">
                                    </div>
                                </div>
                                <div class=" col-xs-12 ">  
                                 <div class="input-group">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-flat"><i class="fa fa-check"></i></button>
                                        <button type="submit" class="btn btn-primary btn-flat text-uppercase"><?php echo lang('menu_submit');?></button>
                                    </div>
                                 </div>
                                </div>
                            </div>
                           <?php echo form_close();?>
                        </div>
                    </div>
                     <div class="ibox">
                         <div class="ibox-title bg-muted no-borders">
                             <h3 class="text-muted text-uppercase"><?php echo lang('menu_varietiesfor').' <a href="'.base_url('client/crops/details/').$cropInfo->field_crop_id.'"><span class="text-navy"> '.$cropInfo->crop.'</span></a>';?></h3>
                         </div>
                        <div class="ibox-content white-bg no-borders b-r-xs font-bold">
                            <div class="row">
                                <div class=" col-xs-12 ">
                                    <div class="table-responsive">
                                    <?php if( !empty($varieties)): ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><?php echo lang('menu_varietyname');?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                     <?php   foreach($varieties as $value): ?>
                                                <tr>
                                                    <td class="text-navy text-capitalize"><?php echo $value['variety_name'];?>
                                                        <span class="pull-right">
                                                            <a href="javascript: deletevariety( <?php echo $value['variety_id'];?> )"  class="text-danger"><?php echo lang('menu_delete');?></a> | 
                                                            <a href="javascript: modifyvariety( <?php echo $value['variety_id'];?> )"class="text-warning"><?php echo lang('menu_modify');?></a>
                                                        </span>
                                                    </td>
                                                </tr>
                                             <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    <?php else : ?>
                                        <span class="text-danger"><?php echo lang('menu_empty');?>  </span>
                                 <?php   endif; ?>
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
</body>
<script>
     function modifyvariety( key ){
        swal({
            title: 'Modify variety?',
            input: 'text',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            inputPlaceholder: 'Enter Variety Name',
            inputValidator: (value) => {
                return !value && 'You need to write something!'
                },
            showLoaderOnConfirm: true,
            preConfirm: ( variety ) => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('client/crops/modifyvariety');?>',
                        type: 'post',
                        data: {'variety_id' : key, 'variety_name' : variety },
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
  
  
      function deletevariety( key ){
        swal({
            title: 'Delete Variety?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('client/crops/deletevariety');?>',
                        type: 'post',
                        data: {'variety_id' : key },
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
    }
    
    
$(document).ready(function() {    
         $('form#addvariety').each( function(){
        var form = $( this );
        form.submit( function(e){
            e.preventDefault();
            var data =  form.serialize();
            swal({
            title: 'Add variety?',
            showCancelButton: true,
            confirmButtonText: 'Yes Add',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('client/crops/addvariety');?>',
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
</html>
