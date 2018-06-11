<?php include('header.php');?>

    <link href="<?php echo $this->config->item('resources');?>css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

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
                            <strong><?php echo lang('menu_results');?></strong>
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
                </div>

                <div class="col-lg-8">
                   <!-- <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            
                            <figure>
                                <iframe width="560" height="315" src="<?php echo $video->edu_videos_url;?>?modestbranding=1" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen style="width: 100%; height:300px;"></iframe>
                                <!--<iframe src="http://www.youtube.com/embed/bwj2s_5e12U" frameborder="0" allowfullscreen="" data-aspectratio="0.8211764705882353" style="width: 100%; height:300px;"></iframe>
                            </figure>
                        </div>
                    </div> -->
                    
                    <div class="ibox float-e-margins">
                        <div class="ibox-title bg-primary text-uppercase">
                            <h5><?php echo lang('menu_videodescription');?></h5>
                        </div>
                        <div class="ibox-content profile-content">
                            <h4><strong><?php echo $video->edu_video;?></strong></h4>
                            <p><?php echo $video->edu_videos_details;?></p>
                        </div>
                    </div>
                </div>

            </div>

            </div>  

        </div>
    
    <!-- Modal -->
<div id="watchvideo" class="modal fade b-r-xs draggable" role="dialog">
    <div class="modal-dialog bg-primary" role="document" style="margin-bottom: -100px;">
      <div style="margin-bottom: 30px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><?php echo lang('menu_close');?> <b><i class="fa fa-close"></i></b></button>
        <h4 class="modal-title text-uppercase" id="exampleModalLabel">New message</h4>
      </div>
    <!-- Modal content--> 
    <div class="modal-content" style="background: transparent;">
        <div class="modal-body " style="padding: 0px 0px 0px 0px;  margin: -10px -10px -33px -10px;">           
            <iframe id="videocontainer"  style="width: 100%; height: 300px;" src="" frameborder="0" allowfullscreen></iframe>
      </div>
    </div> 
  </div>  
</div> 
<?php include('footer.php');?>
<script src="<?php echo $this->config->item('resources');?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/nestable/jquery.nestable.js"></script>
<script src="<?php echo $this->config->item('resources');?>js/plugins/video/responsible-video.js"></script> 
<script src="<?php echo $this->config->item('resources');?>js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script> 
        $(document).ready(function() {
             
             // activate Nestable for list 2
             $('#myvideos').nestable({
                 group: 1
             }).nestable('collapseAll');
       
             $('#nestable-menu').on('click', function (e) {
                 var target = $(e.target),
                         action = target.data('action');
                 if (action === 'expand-all') {
                     $('.dd').nestable('expandAll');
                 }
                 if (action === 'collapse-all') {
                     $('.dd').nestable('collapseAll');
                 }
             });
            
            $('.summernote').summernote();

            $('button#update-about').click( function (){
                    var html =  $('.summernote').summernote('code');
                    var data = {'about' : html, 'types' : 'about'};
                    $.ajax({
                        url: '<?php echo base_url('client/settings');?>',
                        type: 'post',
                        data: data,
                        success: function(){
                            window.document.location.href = document.URL;
                        }
                    });
            });
            
            $('form#personal-details').submit( function(e){
                //e.preventDefault();
                var formdata = $( this ).serialize();
            });

            var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
            var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

            var data1 = [
                { label: "Data 1", data: d1, color: '#17a084'},
                { label: "Data 2", data: d2, color: '#127e68' }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [48, 48, 60, 39, 56, 37, 30]
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65, 59, 40, 51, 36, 25, 40]
                    }
                ]
            };

            var lineOptions = {
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

        });
    </script>

</body>

</html>
