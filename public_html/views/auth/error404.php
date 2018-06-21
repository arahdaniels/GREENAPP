<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo config_item('application_name').' Error';?></title>

    <link href="<?php echo $this->config->item('resources');?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo $this->config->item('resources');?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('resources');?>css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        <h1>500</h1>
        <h3 class="font-bold">Method Inactive</h3>

        <div class="error-desc">
            <?php $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url('app'); ?>
            The server encountered something unexpected that didn't allow it to complete the request. We apologize.<br/>
            You can go back to main page: <br/><a href="<?php echo $referer;?>" class="btn btn-primary m-t">Previeus Page</a>        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo $this->config->item('resources');?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $this->config->item('resources');?>js/bootstrap.min.js"></script>

</body>

</html>
