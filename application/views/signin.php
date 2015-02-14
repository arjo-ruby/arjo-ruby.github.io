<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>








<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign In | WizIndia</title>


    <link rel="shortcut icon" href="<?php echo base_url('assets/ico/favicon.ico') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap_debo.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/email_page.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/base_style_debo.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sign_in.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/landing-page.css') ?>"/>

    <!-- Custom Google Web Font -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- <style type="text/css"></style> -->

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WizIndia</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="http://wizindia.org/">About</a>
                </li>
                <li><a href="http://wizindia.org/#services">Services</a>
                </li>
                <li><a href="http://wizindia.org/#get-social">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="intro-header">

    <div class="container">
        <?php
        if ($this->session->flashdata('msg') != '' && $this->session->flashdata('success') === false) {
            echo '<div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" 
              aria-hidden="true">
              &times;
              </button>' . $this->session->flashdata('msg') . '
              </div>';
        } else if ($this->session->flashdata('msg') != '' && $this->session->flashdata('success') === true) {
            echo '<div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" 
              aria-hidden="true">
              &times;
              </button>' . $this->session->flashdata('msg') . '
              </div>';
        }
        //print_r($msg);
        ?>
        <?php

        $attributes = array('class' => 'form-signin', 'role' => 'form');
        echo form_open('signin/login_user', $attributes) ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="pass" required>
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>


        <!-- <a href="#theSignModal" data-toggle="modal"><h4>New User ?</h4></a> -->
        </form>

    </div>

</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <li><a href="#home">Home</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li><a href="http://wizindia.org/">About</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li><a href="http://wizindia.org/#services">Services</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li><a href="http://wizindia.org/#get-social">Contact</a>
                    </li>
                </ul>
                <p class="copyright text-muted small">WizIndia &copy; 2014. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="theSignModal" role="dialog" aria-hidden="true" data-backdrop='false'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header regSheet">
                <h4>Sign Up with WizIndia</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">

                        <label for="exampleInputEmail1">Username</label>
                        <input type="email" class="form-control" id="exampleInputEmail" placeholder="username" required><br>

                        <label for="exampleInputPass">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="password" required>

                    </div>

                    <br>

                    <div class="form-inline">

                        <label for="exampleInputFirst"></label>
                        <input class="form-control" id="exampleInputFirst" placeholder="First Name" required>

                        <label for="exampleInputLast"></label>
                        <input class="form-control" id="exampleInputLast" placeholder="Last Name" required>
                    </div>

                    <br>

                    <div class="form-inline">

                        <label for="classNum"></label>
                        <input class="form-control" id="classNum" placeholder="Class No." required>

                        <label for="secNum"></label>
                        <input class="form-control" id="secNum" placeholder="Section" required>

                        <label for="rollNum"></label>
                        <input class="form-control" id="rollNum" placeholder="Roll No." required>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-default" id="theButtons">Register</button>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-modalmanager.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-modal.js') ?>"></script>


</body>
</html>