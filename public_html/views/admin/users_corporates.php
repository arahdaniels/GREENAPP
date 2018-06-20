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
                         <h2 class="text-navy"><?php echo lang('menu_corporates');?></h2>
                            <div class="hr-line-solid text-navy"></div>
                          <div class="table-responsive">
                              <table id="corporates-list" class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th><?php echo lang('menu_companyname');?></th>
                                <th><?php echo lang('menu_companytype');?></th>
                                <th><?php echo lang('menu_clients');?></th>
                                <th><?php echo lang('menu_companyphone');?></th>
                                <th><?php echo lang('menu_options');?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if( !empty($corporates)):
                                        foreach ($corporates as $key => $row) { ?>
                                            <tr class="gradeX">
                                                <td><?php echo $row['company_name'];?></td>
                                                <td><?php echo $row['btype'];?></td>
                                                <td><?php echo $row['clients'];?></td>
                                                <td><?php echo $row['company_phone'];?></td>
                                                <td class="center"><a href="<?php echo base_url('admin/users/corpodetails/'.$row['company_key']);?>">open</a> | <a href="<?php echo base_url('admin/users/corpomodify/'.$row['company_key']);?>">modify</a></td>
                                            </tr>
                                       <?php  }
                                endif; ?>
                            </table>
                        </div>
                    </div>
            <?php  ?>
        </div>
        </div>
<?php include('footer.php');?>
<script src="<?php echo $this->config->item('resources');?>js/plugins/dataTables/datatables.min.js"></script>
 <script>
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
     });
</script>
</body>
</html>
