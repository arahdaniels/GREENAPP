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
                <div class="col-md-3">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                <strong>142</strong> Projects
                            </td>
                            <td>
                                <strong>22</strong> Followers
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong>61</strong> Comments
                            </td>
                            <td>
                                <strong>54</strong> Articles
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>154</strong> Tags
                            </td>
                            <td>
                                <strong>32</strong> Friends
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <small>Sales in last 24h</small>
                    <h2 class="no-margins">206 480</h2>
                    <div id="sparkline1"></div>
                </div>


            </div>
            <div class="row">

                <div class="col-lg-4">

                    <div class="ibox">
                        <div class="ibox-content">
                                <h3><?php echo $profile->firstname.' '.$profile->middlename.' '.$profile->lastname;?></h3> 

                            <p class="small">
                                <?php echo $profile->about;?>
                            </p>


                        </div>
                    </div>  
               <div class="ibox float-e-margin">  
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
                                            <span class="label label-info"><i class="fa fa-users"></i></span> Cras ornare tristique.
                                        </div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="2">
                                                <div class="dd-handle">
                                                    <span class="pull-right"> 12:00 pm </span>
                                                    <span class="label label-info"><i class="fa fa-cog"></i></span> Vivamus vestibulum nulla nec ante.
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="3">
                                                <div class="dd-handle">
                                                    <span class="pull-right"> 11:00 pm </span>
                                                    <span class="label label-info"><i class="fa fa-bolt"></i></span> Nunc dignissim risus id metus.
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="4">
                                                <div class="dd-handle">
                                                    <span class="pull-right"> 11:00 pm </span>
                                                    <span class="label label-info"><i class="fa fa-laptop"></i></span> Vestibulum commodo
                                                </div>
                                            </li>
                                        </ol>
                                    </li>

                                    <li class="dd-item" data-id="5">
                                        <div class="dd-handle">
                                            <span class="label label-warning"><i class="fa fa-users"></i></span> Integer vitae libero.
                                        </div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="6">
                                                <div class="dd-handle">
                                                    <span class="pull-right"> 15:00 pm </span>
                                                    <span class="label label-warning"><i class="fa fa-users"></i></span> Nam convallis pellentesque nisl.
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="7">
                                                <div class="dd-handle">
                                                    <span class="pull-right"> 16:00 pm </span>
                                                    <span class="label label-warning"><i class="fa fa-bomb"></i></span> Vivamus molestie gravida turpis
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="8">
                                                <div class="dd-handle">
                                                    <span class="pull-right"> 21:00 pm </span>
                                                    <span class="label label-warning"><i class="fa fa-child"></i></span> Ut aliquam sollicitudin leo.
                                                </div>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        <div class=" hr-line-dashed"></div>
                        <a><?php echo lang('menu_viewall');?></a>
                    </div>
                </div>  
                </div>

                <div class="col-lg-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h2>
                                2,160 results found for: <span class="text-navy">“Admin Theme”</span>
                            </h2>
                            <small>Request time  (0.23 seconds)</small>

                            <div class="search-form">
                                <?php $attr = array();
                                echo form_open(base_url('client/esearch'),$attr)?>
                                    <div class="input-group">
                                        <input type="text" placeholder="Admin Theme" name="search" class="form-control input-lg">
                                        <div class="input-group-btn">
                                            <button class="btn btn-lg btn-primary" type="submit">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                <?php echo form_close();?>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="search-result">
                                <h3><a href="#">INSPINIA IN+ Admin Theme</a></h3>
                                <a href="#" class="search-link">www.inspinia.com/inspinia</a>
                                <p>
                                    Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites
                                    still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                </p>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="search-result">
                                <h3><a href="#">WrapBootstrap - Bootstrap Themes & Templates</a></h3>
                                <a href="#" class="search-link">https://wrapbootstrap.com/‎</a>
                                <p>
                                    WrapBootstrap is a marketplace for premium Bootstrap themes and templates. Impress your clients and visitors while using a single, rock-solid foundation.
                                </p>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="search-result">
                                <h3><a href="#">WrapBootstrap | Facebook</a></h3>
                                <a href="#" class="search-link">https://www.facebook.com/wrapbootstrap‎</a>
                                <p>
                                    WrapBootstrap. 13672 likes · 508 talking about this. Marketplace for premium Bootstrap themes and templates. https://wrapbootstrap.com/
                                </p>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="search-result">
                                <h3><a href="#">Wrapbootstrap - Quora</a></h3>
                                <a href="#" class="search-link">www.quora.com/Wrapbootstrap‎‎</a>
                                <p>
                                    If you are familiar with using any other HTML/CSS themes or WordPress themes then you shouldn't have any problems. If you have some experience using the ...
                                </p>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="search-result">
                                <h3><a href="#">Newspaper Template - Wrapbootstrap Free download ...</a></h3>
                                <a href="#" class="search-link">https://wrapbootstrap.com/‎‎</a>
                                <p>
                                    What's black, white and red all over? The answer is Newspaper. A stylish magazine/news style theme inspired by black and white newsprint. The theme is.
                                </p>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="search-result">
                                <h3><a href="#">Admin Themes Wrapbootstrap</a></h3>
                                <a href="#" class="search-link">https://wrapbootstrap.com/themes/admin‎‎</a>
                                <p>
                                    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                </p>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-white" type="button"><i class="fa fa-chevron-left"></i></button>
                                    <button class="btn btn-white">1</button>
                                    <button class="btn btn-white  active">2</button>
                                    <button class="btn btn-white">3</button>
                                    <button class="btn btn-white">4</button>
                                    <button class="btn btn-white">5</button>
                                    <button class="btn btn-white">6</button>
                                    <button class="btn btn-white">7</button>
                                    <button class="btn btn-white" type="button"><i class="fa fa-chevron-right"></i> </button>
                                </div>
                            </div>
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
        $(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange', function (e){
        $('body').hasClass('fullscreen-video') ? $('body').removeClass('fullscreen-video') : $('body').addClass('fullscreen-video')
    }); 
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
