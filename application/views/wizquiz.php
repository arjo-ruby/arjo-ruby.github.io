<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Question </title>

    <link rel="stylesheet" type="text/css" href="<?php
    echo base_url('assets/css/bootstrap_debo.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php
    echo base_url('assets/css/email_page.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php
    echo base_url('assets/css/base_style.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php
    echo base_url('assets/css/TimeCircles.css') ?>"/>

    <!-- consult this website
      http://git.wimbarelds.nl/TimeCircles/readme.php

      Circle countdown timer.

      Just javascript calls needed binding the submit button.

      CSS has been pre-styled and included !!
     -->

</head>

<body>


<nav class="navbar" role="navigation" id="theHeaderFix">
    <div class="container">
        <div class="navbar-header pull-right">
            <!--
                           <a class="navbar-brand logo-nav" href="#" id = "classRoom">
                               <img src="images/logo2.jpg" class="img-thumbnail">
                           </a> -->

            

        </div>

        <!-- /.navbar-collapse -->
    </div>
</nav>


<div class="container">
    <div class="wraper">

        <div class="serv_holder">
            <div class="class"><?php
                echo $this->session->userdata('subject'); ?></div>


            <!-- <div class="time">Timer: 00:05</div> -->

            <div id="DateCountdown" data-timer="120" style="width: 200px; float: right;"></div>

            <div class="qus">

                <?php
                //$hiddden = array('time' => $this->encrypt->encode($timestamp), 'ques' => $this->encrypt->encode($question[0]->ques_id));

                //array for holding time stamp.
                //form is passed hidden array as argument to gnerate a hidden field for containing the TimeStamp, field name
                //will be timestamp with the passed time stamp value.
                $attributes = array('id' => 'former');

                echo form_open(base_url() . 'wizquiz' . '/' . 'taken', $attributes); ?>


                <h1><?php
                    echo $question[0]->ques_txt; ?>
                </h1>
                </br></br>
                <p>
                    <input name="ans" type="radio" value="a"/>&nbsp;<?php
                    echo $question[0]->option1; ?></p>

                <p><input name="ans" type="radio" value="b"/>&nbsp;<?php
                    echo $question[0]->option2; ?></p>

                <p><input name="ans" type="radio" value="c"/>&nbsp;<?php
                    echo $question[0]->option3; ?></p>

                <p><input name="ans" type="radio" value="d"/>&nbsp;<?php
                    echo $question[0]->option4; ?></p>


                <p>

                <div class="example" data-timer="60">
                    <input name="" type="submit" value="Submit"/>
                </div>
                </p>

                <input name="temp2" id="temp2" value="<?php echo base64_encode($this->encrypt->encode($timestamp)); ?>"
                       hidden>

                <input name="temp3" id="temp3"
                       value="<?php echo base64_encode($this->encrypt->encode($question[0]->answer)); ?>" hidden>


                </form>
            </div>


        </div>

    </div>
</div>

<?php

//echo print_r($question);


?>
<div class="container">
</div>

<footer id="genericFooter">
    <hr>
    <h5><b> Wiz India Inc. &copy; </b></h5>

</footer>


<!-- Bootstrap core JavaScript
   ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="<?php
echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php
echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php
echo base_url('assets/js/bootstrap-modalmanager.js') ?>"></script>
<script type="text/javascript" src="<?php
echo base_url('assets/js/bootstrap-modal.js') ?>"></script>
<script type="text/javascript" src="<?php
echo base_url('assets/js/docs.min.js') ?>"></script>

<script type="text/javascript" src="<?php
echo base_url('assets/js/TimeCircles.js') ?>"></script>

<script type="text/javascript">

    $("#DateCountdown").data('timer', 120).removeData('date').removeAttr('data-date').TimeCircles({total_duration: 120, count_past_zero: false, time: { Days: {show: false}, Hours: {show: false}, Minutes: {show: false}}}).rebuild().restart();

    jQuery(function ($) {
        $(document).bind("contextmenu", function (e) {
            return false;
        });
    });

    $(document).ready(function () {
        setTimeout(function () {
            $("#former").submit();
        }, 120000);

    });
</script>

</body>
</html>