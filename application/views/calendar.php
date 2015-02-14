<?php







$cMonth = $month;
$cYear = $year;

$prev_year = $cYear;
$next_year = $cYear;
$prev_month = $cMonth - 1;
$next_month = $cMonth + 1;

if ($prev_month == 0) {
    $prev_month = 12;
    $prev_year = $cYear - 1;
}
if ($next_month == 13) {
    $next_month = 1;
    $next_year = $cYear + 1;
}

$timestamp = mktime(0, 0, 0, $cMonth, 1, $cYear);
$maxday = date("t", $timestamp);
$thismonth = getdate($timestamp);
$startday = $thismonth['wday'];
?>


<!DOCTYPE html>
<html>
<head>
    <title>Calendar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap_debo.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style_mobi.css') ?>" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<div class="container">
    <h1 align=center><b><?php echo $monthNames[$cMonth - 1] . ' ' . $cYear; ?></b></h1>
    <a href="<?php echo base_url('calendar/' . $next_year . '/' . $monthNames[$next_month - 1]); ?>"
       class="btn-success btn pull-right">Next</a>
    <a href="<?php echo base_url('calendar/' . $prev_year . '/' . $monthNames[$prev_month - 1]); ?>"
       class="btn-success btn pull-left">Previous</a>
    <br/><br/>

    <table class="table table-bordered">

        <tr>
            <td align=center width="14.28%"><font color="#FF0000"><b>Sunday</b></font></td>
            <td align=center width="14.28%"><b>Monday</b></td>
            <td align=center width="14.28%"><b>Tuesday</b></td>
            <td align=center width="14.28%"><b>Wednesday</b></td>
            <td align=center width="14.28%"><b>Thursday</b></td>
            <td align=center width="14.28%"><b>Friday</b></td>
            <td align=center width="14.28%"><font color="#FF0000"><b>Saturday</b></font></td>
        </tr>
        <?php

        for ($i = 0; $i < ($maxday + $startday); $i++) {
            if (($i % 7) == 0) echo "<tr>";
            if ($i < $startday) echo "<td align=right width=\"14.28%\"></td>";
            else echo "<td align=right width=\"14.28%\">" . ($i - $startday + 1) . "<div class='dots'><ul id='" . ($i - $startday + 1) . "'></ul></div></td>";
            if (($i % 7) == 6) echo "</tr>";
        }

        ?>

        <table>
            <tr>
                <td align=center width="14.28%">Assignment
                    <div class="dots">
                        <ul>
                            <li class="orange"></li>
                        </ul>
                    </div>
                </td>
                <td align=center width="14.28%">Quiz
                    <div class="dots">
                        <ul>
                            <li class="blue"></li>
                        </ul>
                    </div>
                </td>
                <td align=center width="14.28%">Notes
                    <div class="dots">
                        <ul>
                            <li class="darkgreen"></li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>


    </table>

    <script type="text/javascript" src="<?php
    echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script type="text/javascript">
        function load_data(page) {
            var xmlhttp;
            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    var content = xmlhttp.responseText;
                    var objJSON = JSON.parse(content);
                    //var temp=JSON.stringify(objJSON,0,2);

                    for (var i = 0, len = objJSON.length; i < len; ++i) {
                        var msg = objJSON[i];
                        console.log(msg);
                        switch (page) {
                            case 'notes':
                                $("ul#" + msg).append("<li class='darkgreen'></li>");
                                break;
                            case 'assignment':
                                $("ul#" + msg).append("<li class='orange'></li>");
                                break;
                        }
                    }
                }
            }
            console.log(page);
            switch (page) {
                case 'notes':
                    xmlhttp.open("GET", "<?php
      echo base_url("calendar/get_notes/$cYear/$month_name") ?>", true);
                    xmlhttp.send();
                    break;
                case 'assignment':
                    xmlhttp.open("GET", "<?php
      echo base_url("calendar/get_assign/$cYear/$month_name") ?>", true);
                    xmlhttp.send();
                    break;
            }
        }

        $(document).ready(function () {
            load_data('notes');
            load_data('assignment');

        });

    </script>
</body>

</html>