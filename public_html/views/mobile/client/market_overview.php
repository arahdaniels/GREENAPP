<?php include('header.php');?>

        <div class="wrapper wrapper-content">
            <div class="container">
                  <div class="row  border-bottom bg-primary page-heading" style="margin-bottom: 30px;">
                <div class="col-lg-10">
                    <h2 class="text-uppercase"><?php echo lang('menu_market');?></h2>
                    <ol class="breadcrumb bg-primary">
                        <li>
                            <a href="<?php echo base_url('client/dashboard');?>"><?php echo lang('menu_dashboard');?></a>
                        </li>
                         <li>
                            <a href="<?php echo base_url('client/market');?>" style="text-transform: capitalize;"><?php echo lang('menu_market');?></a>
                        </li>
                        <li class="active">
                            <strong><?php echo lang('menu_manage');?></strong>
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

                <div class="col-lg-3">

                    <div class="ibox">
                        <div class="ibox-content">
                                <h3>About Alex Smith</h3>

                            <p class="small">
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't.
                                <br/>
                                <br/>
                                If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                anything embarrassing
                            </p>

                            <p class="small font-bold">
                                <span><i class="fa fa-circle text-navy"></i> Online status</span>
                                </p>

                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>Followers and friends</h3>
                            <p class="small">
                                If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                anything embarrassing
                            </p>
                            <div class="user-friends">
                                <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a1.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a4.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a5.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a6.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a7.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a8.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                <a href=""><img alt="image" class="img-circle" src="img/a1.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>Personal friends</h3>
                            <ul class="list-unstyled file-list">
                                <li><a href=""><i class="fa fa-file"></i> Project_document.docx</a></li>
                                <li><a href=""><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                                <li><a href=""><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                                <li><a href=""><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
                                <li><a href=""><i class="fa fa-file-powerpoint-o"></i> Presentation.pptx</a></li>
                                <li><a href=""><i class="fa fa-file"></i> 10_08_2015.docx</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>Private message</h3>

                            <p class="small">
                                Send private message to Alex Smith
                            </p>

                            <div class="form-group">
                                <label>Subject</label>
                                <input type="email" class="form-control" placeholder="Message subject">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" placeholder="Your message" rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary btn-block">Send</button>

                        </div>
                    </div>

                </div>

                <div class="col-lg-5">

                    <div class="social-feed-box">

                        <div class="pull-right social-action dropdown">
                            <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu m-t-xs">
                                <li><a href="#">Config</a></li>
                            </ul>
                        </div>
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="<?php echo $this->config->item('resources');?>img/a1.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    Andrew Williams
                                </a>
                                <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                default model text.
                            </p>

                            <div class="btn-group">
                                <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                                <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                                <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                            </div>
                        </div>
                        <div class="social-footer">
                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="<?php echo $this->config->item('resources');?>img/a1.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        Andrew Williams
                                    </a>
                                    Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words.
                                    <br/>
                                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> -
                                    <small class="text-muted">12.06.2014</small>
                                </div>
                            </div>

                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="<?php echo $this->config->item('resources');?>img/a2.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        Andrew Williams
                                    </a>
                                    Making this the first true generator on the Internet. It uses a dictionary of.
                                    <br/>
                                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> -
                                    <small class="text-muted">10.07.2014</small>
                                </div>
                            </div>

                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="<?php echo $this->config->item('resources');?>img/a3.jpg">
                                </a>
                                <div class="media-body">
                                    <textarea class="form-control" placeholder="Write comment..."></textarea>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="social-feed-box">

                        <div class="pull-right social-action dropdown">
                            <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu m-t-xs">
                                <li><a href="#">Config</a></li>
                            </ul>
                        </div>
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="<?php echo $this->config->item('resources');?>img/a6.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    Andrew Williams
                                </a>
                                <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                default model text.
                            </p>
                            <p>
                                Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                default model text.
                            </p>
                            <img src="<?php echo $this->config->item('resources');?>img/gallery/3.jpg" class="img-responsive">
                            <div class="btn-group">
                                <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                                <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                                <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                            </div>
                        </div>
                        <div class="social-footer">
                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="<?php echo $this->config->item('resources');?>img/a1.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        Andrew Williams
                                    </a>
                                    Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words.
                                    <br/>
                                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> -
                                    <small class="text-muted">12.06.2014</small>
                                </div>
                            </div>

                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="<?php echo $this->config->item('resources');?>img/a2.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        Andrew Williams
                                    </a>
                                    Making this the first true generator on the Internet. It uses a dictionary of.
                                    <br/>
                                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> -
                                    <small class="text-muted">10.07.2014</small>
                                </div>
                            </div>

                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="<?php echo $this->config->item('resources');?>img/a8.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        Andrew Williams
                                    </a>
                                    Making this the first true generator on the Internet. It uses a dictionary of.
                                    <br/>
                                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> -
                                    <small class="text-muted">10.07.2014</small>
                                </div>
                            </div>

                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="<?php echo $this->config->item('resources');?>img/a3.jpg">
                                </a>
                                <div class="media-body">
                                    <textarea class="form-control" placeholder="Write comment..."></textarea>
                                </div>
                            </div>

                        </div>

                    </div>




                </div>
                <div class="col-lg-4 m-b-lg">
                    <div id="vertical-timeline" class="vertical-container light-timeline no-margins">
                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-briefcase"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Meeting</h2>
                                <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the sale.
                                </p>
                                <a href="#" class="btn btn-sm btn-primary"> More info</a>
                                    <span class="vertical-date">
                                        Today <br>
                                        <small>Dec 24</small>
                                    </span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon blue-bg">
                                <i class="fa fa-file-text"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Send documents to Mike</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                <a href="#" class="btn btn-sm btn-success"> Download document </a>
                                    <span class="vertical-date">
                                        Today <br>
                                        <small>Dec 24</small>
                                    </span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon lazur-bg">
                                <i class="fa fa-coffee"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Coffee Break</h2>
                                <p>Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
                                <a href="#" class="btn btn-sm btn-info">Read more</a>
                                <span class="vertical-date"> Yesterday <br><small>Dec 23</small></span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon yellow-bg">
                                <i class="fa fa-phone"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Phone with Jeronimo</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                <span class="vertical-date">Yesterday <br><small>Dec 23</small></span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-comments"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <h2>Chat with Monica and Sandra</h2>
                                <p>Web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>
                                <span class="vertical-date">Yesterday <br><small>Dec 23</small></span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            </div>

        </div>
      <?php include('footer.php');?>
    <script>
        $(document).ready(function() {


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