<?php include('header.php');?>
<link href="<?php echo $this->config->item('resources');?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <div class="wrapper wrapper-content">
            <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-lg-10">
                        <h2 class="text-uppercase text-navy"><?php echo lang('menu_users');?></h2>
                        <ol class="breadcrumb text-navy">
                            <li> 
                                <a href="<?php echo base_url('admin/users/overview');?>"><?php echo lang('menu_overview');?></a>
                            </li>
                            <li> 
                                <a href="<?php echo base_url('admin/users/corporates');?>"><?php echo lang('menu_corporates');?></a>
                            </li>
                        </ol>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            <div class="row  border-bottom white-bg dashboard-header">

                    <div class="col-md-3">
                        <?php corporate_menu(); users_menu();?>
                    </div>
                    <div class="col-md-9">
                         <h2 class="text-navy"><?php echo lang('menu_corporateregistration');?></h2>
                            <div class="hr-line-solid text-navy"></div>
                           <?php if( isset($action)):?>
                                <div class="alert <?php echo $class;?>">
                                    <?php echo $message;?>
                                </div>
                            <?php endif;?>
                            <?php $attr = array('class'=>'form-horizontals','method'=>'post'); 
                                    echo form_open(base_url('admin/users/corporegister'),$attr);?>
                            <div class="row">
                                    <div class="col-sm-12"><h5>Contact Person</h5></div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" value="<?php echo set_value('firstname');?>" name="firstname" placeholder="First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" value="<?php echo set_value('lastname');?>" name="lastname" placeholder="Last Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" value="<?php echo set_value('email');?>" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" value="<?php echo set_value('phone');?>" name="mobile" placeholder="Mobile">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="username" value="<?php echo set_value('username');?>" placeholder="Username">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-12"><h5>Corporate Office Details</h5></div>
                                 <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo set_value('company_name');?>" name="company_name" placeholder="Name">
                                 </div>
                                <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo set_value('company_reg_number');?>" name="company_reg_number" placeholder="Company Reg. Number">
                                 </div>
                             <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo set_value('company_business_licence');?>" name="company_business_licence" placeholder="Business Licence">
                                 </div>
                                <div class="form-group col-md-6">
                                     <input class="form-control" name="company_tin" value="<?php echo set_value('company_tin');?>" placeholder="Company TIN">
                                 </div>
                                 <div class="form-group col-md-6">
                                     <input value="<?php echo set_value('company_tax_clearence');?>" class="form-control" name="company_tax_clearence" placeholder="Company Tax Clearence">
                                 </div>
                                <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo set_value('company_fax');?>" name="company_fax" placeholder="Company FAX">
                                 </div>
                             <div class="form-group col-md-6">
                                     <input class="form-control" name="company_phone" value="<?php echo set_value('company_phone');?>" placeholder="Company Phone">
                                 </div>
                                <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo set_value('company_landphone');?>" name="company_landphone" placeholder="Company Land Phone">
                                 </div> 
                             <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo set_value('company_email');?>" name="company_email" placeholder="Company Email">
                                 </div>
                             <div class="form-group col-md-6">
                                 <select name="company_type" class="form-control">
                                     <?php if( ! empty($company_types)): 
                                            foreach ($company_types as $key => $row) { ?>
                                        <option value="<?php echo $row['btype_id'];?>"><?php echo $row['btype'];?></option>
                                    <?php } endif; ?>
                                 </select>
                                 </div>
                             <div class="form-group col-md-12">
                                 <textarea class="form-control" name="company_primary_address" placeholder="Company Primary Address"><?php echo set_value('company_primary_address');?></textarea>
                                 </div>
                            </div>                             
                            <div class="row" >
                                        <div class="form-group">
                                            <div class="col-sm-8">
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="submit" class="btn btn-block btn-primary text-uppercase"><?php echo lang('menu_submit');?></button>
                                            </div>
                                      </div>
                            </div>
                            <?php echo form_close();?>
                    </div>
            <?php  ?>
        </div>
<?php include('footer.php');?>
<script src="<?php echo $this->config->item('resources');?>js/plugins/dataTables/datatables.min.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
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
         $('#corporates-list').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
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
