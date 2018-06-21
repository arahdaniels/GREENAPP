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
                         <h2 class="text-navy"><?php echo lang('menu_corporateupdate');?></h2>
                            <div class="hr-line-solid text-navy"></div>
                           <?php if( isset($action)):?>
                                <div class="alert <?php echo $class;?>">
                                    <?php echo $message;?>
                                </div>
                            <?php endif;
                            if(! empty($corporate)):
                                $attr = array('class'=>'form-horizontals','method'=>'post'); 
                                    echo form_open(base_url('admin/users/corpomodify/'.$corporate->company_key),$attr);?>
                            <input type="hidden" name="c_key" value="<?php echo $corporate->company_key;?>" />
                            <input type="hidden" name="p_key" value="<?php echo $corporate->user_id;?>" />
                            <div class="row">
                                    <div class="col-sm-12"><h5>Contact Person</h5></div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" value="<?php echo $corporate->firstname;?>" name="firstname" placeholder="First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" value="<?php echo $corporate->lastname;?>" name="lastname" placeholder="Last Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input disabled class="form-control" value="<?php echo $corporate->email;?>" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" disabled readonly value="<?php echo $corporate->mobile;?>" placeholder="Mobile">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" disabled readonly value="<?php echo $corporate->username;?>" placeholder="Username">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input disabled readonly value="Cannot be changed here" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-12"><h5>Corporate Office Details</h5></div>
                                 <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo $corporate->company_name;?>" name="company_name" placeholder="Name">
                                 </div>
                                <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo $corporate->company_reg_number;?>" name="company_reg_number" placeholder="Company Reg. Number">
                                 </div>
                             <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo $corporate->company_business_licence;?>" name="company_business_licence" placeholder="Business Licence">
                                 </div>
                                <div class="form-group col-md-6">
                                     <input class="form-control" name="company_tin" value="<?php echo $corporate->company_tin;?>" placeholder="Company TIN">
                                 </div>
                                 <div class="form-group col-md-6">
                                     <input value="<?php echo $corporate->company_tax_clearence;?>" class="form-control" name="company_tax_clearence" placeholder="Company Tax Clearence">
                                 </div>
                                <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo $corporate->company_fax;?>" name="company_fax" placeholder="Company FAX">
                                 </div>
                             <div class="form-group col-md-6">
                                     <input class="form-control" name="company_phone" value="<?php echo $corporate->company_phone;?>" placeholder="Company Phone">
                                 </div>
                                <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo $corporate->company_landphone;?>" name="company_landphone" placeholder="Company Land Phone">
                                 </div> 
                             <div class="form-group col-md-6">
                                     <input class="form-control" value="<?php echo $corporate->company_email;?>" name="company_email" placeholder="Company Email">
                                 </div>
                             <div class="form-group col-md-6">
                                 <select name="company_type" class="form-control">
                                     <?php if( ! empty($company_types)): 
                                            foreach ($company_types as $key => $row) { ?>
                                        <option <?php if($corporate->company_type == $row['btype_id']) echo 'selected';?> value="<?php echo $row['btype_id'];?>"><?php echo $row['btype'];?></option>
                                    <?php } endif; ?>
                                 </select>
                                 </div>
                             <div class="form-group col-md-12">
                                 <textarea class="form-control" name="company_primary_address" placeholder="Company Primary Address"><?php echo $corporate->company_primary_address;?></textarea>
                                 </div>
                            </div>                             
                            <div class="row" >
                                        <div class="form-group">
                                            <div class="col-sm-8">
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="submit" class="btn btn-block btn-primary text-uppercase"><?php echo lang('menu_update');?></button>
                                            </div>
                                      </div>
                            </div>
                            <?php echo form_close();
                            endif;?>
                    </div>
            <?php  ?>
        </div>
<?php include('footer.php');?>
 <script>     
     $(document).ready(function() { 
     });
</script>
</body>
</html>
