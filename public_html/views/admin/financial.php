<?php include('header.php');?>

        <div class="wrapper wrapper-content">
            <div class="container">
                <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2><?php echo lang('menu_financial');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('admin/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                        <li>
                            <a style="text-transform: capitalize;"><?php echo lang('menu_financial');?></a>
                        </li>
                        <li class="active">
                            <strong><?php echo lang('menu_overview');?></strong>
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
            </div>
            <div class="row">

                <div class="col-lg-3">

                    <div class="ibox">
                        <div class="ibox-content text-primary">
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                     <div class="ibox">
                        <div class="ibox-title bg-primary text-uppercase">                            
                            <h3><i class="fa fa-money"></i>&nbsp;<?php echo lang('menu_addcurrency'); ?></h3>
                        </div> 
                        <div class="ibox-content">
                           <?php $attr = array('method'=>'post'); echo form_open(base_url('admin/financial'),$attr);?>
                            <div class="form-group">
                               <!-- <label><?php echo lang('menu_country'); ?></label>-->
                                <select name="currency_localization" class="form-control">
                                    <?php if(!empty($localization)){
                                          foreach ($localization as $key => $value) { ?>
                                    <option class="text-capitalize" value="<?php echo $value['localization_id'];?>"><span class="text-capitalize"><?php echo $value['locale'].' | '.$value['language'];?></span></option>
                                           <?php    }
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input required name="currency" class="form-control" placeholder="<?php echo lang('menu_currency'); ?>" />
                            </div>
                            <div class="form-group">
                                <input required name="currency_cunit" class="form-control" placeholder="<?php echo lang('menu_currencycunit'); ?>" />
                            </div>
                            <div class="form-group">
                                <input required name="currency_symbol" class="form-control" placeholder="<?php echo lang('menu_currencysymbol'); ?>" />
                            </div>
                            
                            <div class="form-group">
                                <h5><?php echo lang('menu_currencysymbolposition');?></h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><?php echo lang('menu_left');?></label>
                                        <input class="" type="radio" value="<?php echo lang('menu_left');?>" required name="currency_symbol_position"  />
                                    </div>
                                    <div class="col-sm-6">
                                        <label><?php echo lang('menu_right');?></label>
                                        <input type="radio" value="<?php echo lang('menu_right');?>" required name="currency_symbol_position"   />
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block text-uppercase"><?php echo lang('menu_submit'); ?></button>
                        <?php echo form_close();?>
                        </div>
                    </div>
                        <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> <i class="fa fa-money"></i> <?php echo lang('menu_currencies');?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo lang('menu_localization');?></th>
                                            <th><?php echo lang('menu_currency');?></th>
                                            <th><?php echo lang('menu_currencysymbol');?></th>
                                            <th><?php echo lang('menu_currencysymbolposition');?></th>
                                            <th><?php echo lang('menu_currencycunit');?></th>
                                            <th><?php echo lang('menu_option');?></th>
                                        </tr> 
                                        </thead>
                                        <tbody>
                                       <?php if(!empty($currencies)){
                                            $i =1;
                                                foreach ($currencies as $key => $value) { ?> 
                                                     <tr>                                                         
                                                        <td><?php echo $i;?></td>
                                                        <td class="text-capitalize"><?php echo $value['locale'].' | '.$value['language'];?></td>
                                                        <td><?php echo $value['currency'];?></td>
                                                        <td><?php echo $value['currency_symbol'];?></td>
                                                        <td><?php echo $value['currency_symbol_position'];?></td>
                                                        <td><?php echo $value['currency_cunit'];?></td>
                                                        <td>
                                                            <a class="text-danger" href="javascript:removecurrency( <?php echo $value['currency_id'];?> );"><?php echo lang('menu_remove');?></a></td>
                                                    </tr>
                                           <?php $i++;}
                                       } ?>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            </div>

        </div>
      <?php include('footer.php');?>
<script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <script>
        
        function removecurrency( key ){
                    $.ajax({
                        url: '<?php echo base_url('admin/financial/removecurrency');?>',
                        type: 'post',
                        data: {'key' : key},
                        success: function( result ){
                            alert( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           alert( xhr.status + ' ' + xhr.statusText ); 
                        }
                    });
            }
            
        $(document).ready(function() {
      
         
        });
    </script>

</body>

</html>
