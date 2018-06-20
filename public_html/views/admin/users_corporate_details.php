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
                         <h2 class="text-navy"><?php echo lang('menu_corporateinformation');?></h2>
                            <div class="hr-line-solid text-navy"></div>
                           
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
