<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <div class="footer">
            <div class="pull-right">
                <?php echo lang('menu_cslogan');?>
            </div>
            <div>
                <strong>Copyright</strong> Japtechnologies Ltd &copy; 2012 - <?php echo date('Y');?>
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="<?php echo $this->config->item('resources');?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>  
    <script src="<?php echo $this->config->item('resources');?>js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/plugins/footable/footable.all.min.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/inspinia.js"></script>
    
    <script src="<?php echo $this->config->item('resources');?>js/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/plugins/toastr/toastr.min.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/scripts/sweetalert.js"></script>
    <script> 
    $(document).ready(function () {
        $('.footable').footable();
        <?php if(isset($updatesuccessifully)){ ?>     
                toastr.options = {
                    closeButton: true,
                    debug: false,
                    showDuration: "0",
                    hideDuration: "0",
                    timeOut: "0",
                    extendedTimeOut: "0",
                    progressBar: true,
                    preventDuplicates: true,
                    positionClass: "toast-bottom-right",
                    onclick: null
                };
            toastr.success( '<?php echo $updatemessage;?>' ,'Update Information!');
          <?php   }?>
              
              <?php if(isset($updatefailed)){ ?>     
                toastr.options = {
                    closeButton: true,
                    debug: false,
                    showDuration: "0",
                    hideDuration: "0",
                    timeOut: "0",
                    extendedTimeOut: "0",
                    progressBar: true,
                    preventDuplicates: true,
                    positionClass: "toast-bottom-right",
                    onclick: null
                };
            toastr.error( '<?php echo $updatemessage;?>' ,'Update Information!');
          <?php   }?>

    });
    
    </script>