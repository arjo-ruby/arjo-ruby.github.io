<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" context="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="<?php echo base_url('assets/ico/favicon.ico') ?>">

    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/bootstrap-modal.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/bootstrap-modal-bs3patch.css') ?>" rel="stylesheet" type="text/css"/>
    <!--  file not found in code <link href="theme.css" rel="stylesheet"> -->
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/datepicker.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/malihu-custom-scrollbar-plugin-2.x/jquery.mCustomScrollbar.css') ?>"
          rel="stylesheet"/>

    <!-- link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet" -->
    <style>
    .navbar .navbar-inner {
    padding: 0;
}

.navbar .nav {
    margin: 0;
    display: table;
    width: 100%;
}

.navbar .nav li {
    display: table-cell;
    width: 13%;
    float: none;
}



.navbar .nav li:first-child a {
    border-left: 0;
    border-radius: 3px 0 0 3px;
}

.navbar .nav li:last-child a {
    border-right: 0;
    border-radius: 0 3px 3px 0;
}
.refoot{ background:#000; color:#999; padding:15px 0 2px; margin-top:50px;}
    </style>

    <title>WizIndia</title>
</head>

<body>
<div class="jumbotron top">
    <div class="container">
        <div class="name">Welcome<span></br><?php echo ucwords($this->session->userdata('name')); ?></span></div>
        <div class="navbar-header pull-right">
            <img name="" src="<?php echo base_url('assets/img/school.png') ?>" width="50" height="50" alt=""/>
            <a href="<?php echo base_url('profile') ?>"><img src="<?php echo base_url('assets/img/profile_pic.png') ?>" width="50" height="50" class="img-thumbnail img-circle" style="border: 5px"></a>
            <a href="<?php echo base_url('signin/logout') ?>" class="btn btn-default btn-sm">Log Out</a>
        </div>
    </div>
</div>
<div class="container">

    <!-- Static navbar -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                        class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span></button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('about'); ?>">About us</a></li>
                    <li><a  target="_blank" href="<?php echo base_url('mail'); ?>">WizMail</a></li>
                    <?php if(isset($cur_subject) && $this->self_function->is_student()) { ?>
                    <li><a href="<?php echo base_url('services/'.$cur_subject); ?>">Services</a></li>
                    <?php }else if(isset($cur_subject) && $this->self_function->is_teacher()) {?>
                    <li><a href="<?php echo base_url('services/'.$cur_subject.'/'.$this->session->userdata('class').'/'.$this->session->userdata('section')); ?>">Services</a></li>
                    <?php }?>
                    <li><a href="<?php echo base_url('gallery'); ?>">Gallery</a></li>
                    <li><a href="<?php echo base_url('reach'); ?>">Reach us</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </div>
</div>