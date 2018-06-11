<?php include('header.php');?>
  <link href="<?php echo $this->config->item('resources');?>css/plugins/footable/footable.core.css" rel="stylesheet">
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

                <div class="col-lg-4">
                    <?php
                    videoCategories($categories);?>  
              <!-- <div class="ibox float-e-margin">  
                   <div class="ibox-title bg-primary text-uppercase">
                            <h5><?php echo lang('menu_myvideos');?></h5>
                        </div>
                    <div class="ibox-content"> 
                        <div id="nestable-menu">                            
                           <button type="button" data-action="collapse-all" class="btn btn-warning btn-sm pull-left">Collapse All</button>
                          <button type="button" data-action="expand-all" class="btn btn-primary btn-sm pull-right">Expand All</button>
                        </div>
                        <div class="clearfix"></div><br/>
                        <div class="dd" id="myvideos">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">
                                            <span class="label label-info"><i class="fa fa-users"></i></span> Livestock
                                        </div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="2">
                                                <div class="dd-handle">
                                                    <span class="label label-info"><i class="fa fa-cog"></i></span> Sheep
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="3">
                                                <div class="dd-handle">
                                                    <span class="label label-info"><i class="fa fa-bolt"></i></span> Cows
                                                </div>
                                            </li>
                                        </ol>
                                    </li>

                                    <li class="dd-item" data-id="5">
                                        <div class="dd-handle">
                                            <span class="label label-warning"><i class="fa fa-users"></i></span> Crops
                                        </div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="6">
                                                <div class="dd-handle">
                                                    <span class="label label-warning"><i class="fa fa-users"></i></span> Onions
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="7">
                                                <div class="dd-handle">
                                                    <span class="label label-warning"><i class="fa fa-bomb"></i></span> Watermelon
                                                </div>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        <div class=" hr-line-dashed"></div>
                        <a><?php echo lang('menu_viewall');?></a>
                    </div>
                </div> -->  
                </div>
                <div class="col-lg-8">
                    <div class="ibox"> 
                        <div class="ibox-title bg-primary text-uppercase">
                            <h5><?php echo $category->edu_category.' | '.lang('menu_videos').' | '.$category->totalvideos;?></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="project-list">
                                <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">
                                <table class="table footable table-stripped" data-page-size="10" data-filter=#filter-hover>
                                   <thead>
                                        <tr>
                                            <th><?php echo lang('menu_video');?></th>
                                            <th><?php echo lang('menu_type');?></th>
                                            <th><?php echo lang('menu_options');?></th>
                                        </tr> 
                                        </thead>
                                       <tbody>
                                        <?php if(!empty($videos)){
                                            foreach ($videos as $key => $value) {?>                                           
                                                <tr>
                                                    <td>
                                                        <a href="<?php echo base_url('client/vdetails/'.$value['edu_videos_key']);?>"><?php echo $value['edu_video'];?></a>                                                        
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url('client/typesvideos/'.$value['edu_types_key']);?>"><?php echo $value['edu_types'];?></a>                                                        
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url('client/vdetails/'.$value['edu_videos_key']);?>"> <?php echo lang('menu_watch');?> </a>
                                                    </td>
                                                </tr>   
                                          <?php  }
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
    <!-- Modal -->
<div id="watchvideo" class="modal fade animated fadeIn draggable" role="dialog">
    <div class="modal-dialog bg-primary" role="document" style="margin-bottom: -100px;">
      <div style="margin-bottom: 30px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><?php echo lang('menu_close');?> <b><i class="fa fa-close"></i></b></button>
        <h4 class="modal-title text-uppercase" id="modallabel">New message</h4>
      </div>
    <!-- Modal content--> 
    <div class="modal-content animated fadeIn" style="background: transparent;">
        <div class="modal-body " style="padding: 0px 0px 0px 0px;  margin: -10px -10px -33px -10px;">           
            <iframe id="videocontainer"  style="width: 100%; height: 300px;" src="" frameborder="0" allowfullscreen></iframe>
      </div>
    </div> 
  </div>  
</div> 
<?php include('footer.php');?>
<script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/footable/footable.all.min.js"></script>
    <script> 
        $(document).ready(function() {
            $('.footable').footable();  
        });
    </script>

</body>

</html>
