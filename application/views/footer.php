<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="refoot">
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4 colum col-sm-push-1">
              <p class="col-xs-7 col-xs-pull-1"> <i class="fa fa-phone"></i> +1-501-791-1428 </p>
              <p class="col-xs-4 col-xs-pull-2"><i class="fa fa-home"></i> Wizindia</p>
            </div>
            <div class="col-xs-4 colum"> WIzIndia &copy; 2015 All Rights Reserved </div>
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
<script type="text/javascript" src="<?php echo base_url('assets/js/docs.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datepicker.js') ?>"></script>

<!-- custom scrollbars plugin -->
<script
    src="<?php echo base_url('assets/malihu-custom-scrollbar-plugin-2.x/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
<script>
    (function ($) {
        $(window).load(function () {
            $(".content, .sidecon").mCustomScrollbar();
        });
    })(jQuery);
</script>


<script>
    (function($) {
        $(window).load(function() {
            $(".serv_holder").mCustomScrollbar();
        });
    })(jQuery);
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("button[id^=but]").click(function () {
            console.log(this.id);
            $var = $('#myForm').attr('action');
            console.log($var);
            $('#myForm').attr('action', $var + "/" + this.id);
            $var = $('#myForm').attr('action');
            console.log($var);
        });
    });

    $(document).ready(function () {
        $("#calender_box").click(function () {
            console.log('click click');
            window.location.href = "./calendar";
        });
    });


</script>

<script type="text/javascript">
    $(function () {
        $('#dp1').datepicker();
        $('#dp2').datepicker();
    });
</script>
</body>
</html>