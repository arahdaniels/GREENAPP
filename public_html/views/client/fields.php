<?php include('header.php');?>
        <div class="wrapper wrapper-content">
            <div class="container-fluid">
                 <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2 class="text-uppercase"><?php echo lang('menu_agriculture');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('client/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                         <li>
                            <a href="<?php echo base_url('client/fields');?>" style="text-transform: capitalize;"><?php echo lang('menu_fields');?></a>
                        </li>
                        <li class="active">
                            <strong><?php echo lang('menu_overview');?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
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
                <div class="col-sm-3">
                    <?php fieldMenu();?>
                    <?php fieldCropsMenu();?>
                </div>
                <div class="col-sm-9">
                    <?php fields($fields);?>
                </div>
            </div>
                
            </div>

        </div>
      <?php include('footer.php');?>
</body>
<script>
$(document).ready(function() {    
         $('form#addfield').each( function(){
        var form = $( this );
        form.submit( function(e){
            e.preventDefault();
            var data =  form.serialize();
            swal({
            title: 'Add Field?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('client/agriculture/addfield');?>',
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
$('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('app/countrystate/states');?>',
                    data:'country_id='+ countryID,
                    beforeSend: function(){
                        $('#state').html('<option value="">Please wait...</option>');
                    },
                    success:function(html){
                        $('#state').html(html);
                    }
                }); 
            }else{
                $('#state').html('<option value="">Select country first</option>');
            }
        });
 $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('app/countrystate/citylocations');?>',
                    data:'city_id='+ stateID,
                    beforeSend: function(){
                        $('#city-location').html('<option value="">Select city first</option>');
                    },
                    success:function(html){
                        $('#city-location').html(html);
                    }
                }); 
            }else{
                $('#city-location').html('<option value="">Select country first</option>');
            }
        });
    function deletefield( key ){
        swal({
            title: 'Remove Field?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: '<?php echo base_url('client/agriculture/deletefield');?>',
                        type: 'post',
                        data: {'field_id' : key },
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = '<?php echo base_url('client/agriculture/fields');?>';
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
