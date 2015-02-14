<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Email Page </title>


    <link rel="shortcut icon" href="<?php echo base_url('assets/ico/favicon.ico') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap_debo.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/email_page.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/email_thread.css') ?>">

</head>

<body>
<header>
    <div class="controls">
        <h1>WizMail</h1>

        <button class="btn" id="therefreshButtons">Refresh</button>
        <!-- Single button -->
        <ul class="dropdown-menu" role="menu" aria-labelledby="theDropdown">
            <li><a href="#">Reply All</a></li>
        </ul>

    </div>
</header>

<div id="side">
    <a href="#theModal" class="btn" id="compose-button" data-toggle="modal">Compose</a>
    <ul class="nav nav-list">
        <li class="active" id="inbox"><a>Inbox</a></li>
        <!--<li id="starred"><a>Starred</a></li>-->
        <li id="sent_mail"><a>Sent Mail</a></li>
        <!--<li id="draft"><a>Drafts</a></li>-->

    </ul>
</div>
<div id="content">

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
        <div id="mail_content_container">
            <table class="table table-bordered table-hover">

                <colgroup>
                    <col span="1" style="width: 1%;">
                    <col span="1" style="width: 30%;">
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 5%;">
                </colgroup>

                <tr>
                    <td colspan="4">
                        <select class="select">
                            <option>Reply all</option>
                            <option>Reply</option>
                            <option>Delete</option>
                            <option>Forward</option>
                        </select>
                        <button class="btn-primary">Go</button>
                        <span class="pull-right"><a>‹ Newer</a> 1 - 50 of about 90 <a> Older ›</a></span></td>
                </tr>
                <tbody id='tbody'>
                </tbody>
            </table>
        </div>
    </div>

    <div class="" id="theGlyphs">

    </div>

    <footer>

        <hr>
        <h5 style="color:#625D5D;"><b> Wiz India Inc. &copy; </b></h5>


        <div class="modal fade" id="theModal" role="dialog" aria-hidden="true" data-backdrop='false'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Send Email</h4>
                    </div>
                    <div class="modal-body search">
                        <?php
                        $attributes = array('id' => 'loginForm');
                        echo form_open(base_url() . 'mail' . '/' . 'compose');
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">To</label><br>
                            <input type="email" class="form-control" id="inputEmail_modal" placeholder="Enter email" name="to" onkeyup="autocomplet_modal()"/>

                            <div class="email_list_id">
                                <ul id="email_list_id_modal" class="results"></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subject</label><br>
                            <input type="text" class="form-control" id="title" placeholder="Enter subject"
                                   name='title'/>
                        </div>
                        <div class="form-group">
                            <label for="exampleSubject">Message</label><br>
                            <textarea class="form-control" id="exampleSubject_modal" rows=12 name='subject'></textarea>
                        </div>
                        </form>
                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-default btn-primary" id="submit">Send</button>
                    </div>
                </div>
            </div>

        </div>

    </footer>

</div>


<!-- Bootstrap core JavaScript
   ================================================== -->


<script src="<?php
echo base_url('assets/js/jquery.min.js') ?>"></script>

<script src="<?php
echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<!-- Either use the compressed version (recommended in the production site) -->



<script type="text/javascript">

    var map = new Object();
    var thread_chosen='';
    var cur_page='inbox';
    var cur_page_no=1;

    function get_previous_page_no() {
        prev_page_no=get_current_page_no();
        if(prev_page_no<=1)
            prev_page_no=1;
        else
            prev_page_no=prev_page_no-1;
        return prev_page_no;
    }

    function get_next_page_no() {
        next_page_no=get_current_page_no();
        return parseInt(next_page_no)+1;
    }

    function get_current_page_no() {
        return cur_page_no;
    }

    function set_current_page_no(no) {
        cur_page_no=no;
    }

    function next_page() {
        load_data(cur_page, get_next_page_no());
        console.log('next_page');
    }

    function previous_page() {
        load_data(cur_page, get_previous_page_no());
        console.log('previous_page');
    }

    function update_page_no_range_displayer() {
        page_temp=get_current_page_no()-1;
        $("#page_no_range_displayer").html(((page_temp*20)+1)+' - ' + ((page_temp*20)+20));
    }

    function autocomplet() {
        var min_length = 1; // min caracters to display the autocomplete
        var keyword = get_key();
        if (keyword.length >= min_length) {

            var data = {
                "keyword": keyword
            };
            data = $(this).serialize() + "&" + $.param(data);
            $.ajax({
                url: '<?php echo base_url('mail/get_email_id') ?>',
                type: 'POST',
                data: data,
                success: function (data) {
                    if (data == null) {
                        $('#email_list_id').hide();
                    }
                    $('#email_list_id').show();

                    var objJSON = JSON.parse(data);
                    var elem = '';
                    for (var i = 0, len = objJSON.length; i < len; ++i) {
                        var msg = objJSON[i];
                        //console.log(msg);
                        elem = '<li onclick="set_item(\'' + msg.email + '\')" >' + msg.email + '</li>' + elem;
                    }
                    $('#email_list_id').html(elem);
                    //console.log(elem);
                }
            });
        } else {
            $('#email_list_id').hide();
        }
    }

    function autocomplet_modal() {
        var min_length = 1; // min caracters to display the autocomplete
        var keyword = get_key_modal();
        if (keyword.length >= min_length) {

            var data = {
                "keyword": keyword
            };
            data = $(this).serialize() + "&" + $.param(data);
            $.ajax({
                url: '<?php echo base_url('mail/get_email_id') ?>',
                type: 'POST',
                data: data,
                success: function (data) {
                    if (data == null) {
                        $('#email_list_id_modal').hide();
                    }
                    $('#email_list_id_modal').show();

                    var objJSON = JSON.parse(data);
                    var elem = '';
                    for (var i = 0, len = objJSON.length; i < len; ++i) {
                        var msg = objJSON[i];
                        //console.log(msg);
                        elem = '<li onclick="set_item_modal(\'' + msg.email + '\')" >' + msg.email + '</li>' + elem;
                    }
                    $('#email_list_id_modal').html(elem);
                    //console.log(elem);
                }
            });
        } else {
            $('#email_list_id_modal').hide();
        }
    }

    // set_item : this function will be executed when we select an item
    function set_item(item) {
        //console.log(item);
        // change input value
        $('#inputEmail').val(get_push_elem(item));
        // hide proposition list
        $('#email_list_id').hide();
    }

    // set_item : this function will be executed when we select an item
    function set_item_modal(item) {
        //console.log(item);
        // change input value
        $('#inputEmail_modal').val(get_push_elem_modal(item));
        // hide proposition list
        $('#email_list_id_modal').hide();
    }

    function get_key() {
        var eid = $('#inputEmail').val();
        var eArray = eid.split('>');
        var flag = false;
        var key = '';
        for (var i = 0; i < eArray.length; i++) {

            if (eArray[i][0] != '<' || (!isemail(eArray[i].substr(1)))) {
                flag = true;
            }
            if (flag) {
                key = key + eArray[i];
            }

        }
        console.log('get_key ' + key);
        return key;
    }

    function get_key_modal() {
        var eid = $('#inputEmail_modal').val();
        var eArray = eid.split('>');
        var flag = false;
        var key = '';
        for (var i = 0; i < eArray.length; i++) {

            if (eArray[i][0] != '<' || (!isemail(eArray[i].substr(1)))) {
                flag = true;
            }
            if (flag) {
                key = key + eArray[i];
            }

        }
        console.log('get_key ' + key);
        return key;
    }

    function get_push_elem(item) {
        var eid = $('#inputEmail').val();
        var eArray = eid.split('>');
        var temp = '';
        for (var i = 0; i < eArray.length; i++) {
            //console.log('for@get_push_elem: ' + eArray[i]);
            if (eArray[i][0] == '<') {
                temp = temp + eArray[i] + '>';
            }
            else if (isemail(eArray[i])) {
                temp = temp + '<' + eArray[i] + '>';
            }
            else {
                temp = temp + '<' + item + '>';
            }
        }
        //console.log('get_push_elem ' + temp)
        return temp;
    }

    function get_push_elem_modal(item) {
        var eid = $('#inputEmail_modal').val();
        var eArray = eid.split('>');
        var temp = '';
        for (var i = 0; i < eArray.length; i++) {
            //console.log('for@get_push_elem: ' + eArray[i]);
            if (eArray[i][0] == '<') {
                temp = temp + eArray[i] + '>';
            }
            else if (isemail(eArray[i])) {
                temp = temp + '<' + eArray[i] + '>';
            }
            else {
                temp = temp + '<' + item + '>';
            }
        }
        //console.log('get_push_elem ' + temp)
        return temp;
    }

    function isemail(emailAddress) {
        //console.log('isemail ' + emailAddress);
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(emailAddress);
    }

    function load_data(page, page_no) {
        if (typeof page_no === 'undefined') { page_no = '1'; }

        set_current_page_no(page_no);
        console.log("load_data("+page+", "+page_no+")")

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
                $("mail_content_container").html('');
                var table_structre='<table class="table table-bordered table-hover"><colgroup><col span="1" style="width: 1%;"><col span="1" style="width: 30%;"><col span="1" style="width: 15%;"><col span="1" style="width: 5%;"></colgroup><tr><td colspan="4"><!--<select class="select"><option>Reply all</option><option>Reply</option><option>Delete</option><option>Forward</option></select><button class="btn-primary">Go</button>--><span class="pull-right"><a id="previous_page" OnClick="previous_page()">‹ Newer</a><div id="page_no_range_displayer"> 1 - 50</div><a id="next_page" OnClick="next_page()"> Older ›</a></span></td></tr><tbody id="tbody">';
                var elem="";
                for (var i = 0, len = objJSON.length; i < len; ++i) {
                    var msg = objJSON[i];

                    if (msg.seen = 0)
                        elem=elem+'<tr class="unread">'
                    else
                        elem=elem+'<tr>'
                    var cell1 = "<td><input type=\"checkbox\"></td>";
                    var cell2 = "<td><a id='"+msg.thread_id+"' OnClick='thread(this);' >" + msg.subject + "</a></td>";
                    formatted_sender_reciever=underscore_formatter_row_disp(msg.sender_reciever);
                    console.log(formatted_sender_reciever);
                    var cell3 = "<td>"+formatted_sender_reciever+"</td>";
                    var cell4 = "<td>"+msg.day_time+"</td>";
                    elem=elem+cell1+cell2+cell3+cell4+"</tr>"
                }
                var html_content=table_structre+elem+'</tbody></table>';
                //console.log(html_content);
                $("#mail_content_container").html(html_content);
                update_page_no_range_displayer();
            }
        }
        //console.log(page);
        switch (page) {
            case 'sent':
                xmlhttp.open("GET", "<?php echo base_url('mail/get_sent') ?>"+'/'+page_no, true);
                xmlhttp.send();
                break;
            case 'starred':
                xmlhttp.open("GET", "<?php echo base_url('mail/get_starred') ?>"+'/'+page_no, true);
                xmlhttp.send();
                break;
            case 'inbox':
                xmlhttp.open("GET", "<?php echo base_url('mail/get_inbox') ?>"+'/'+page_no, true);
                xmlhttp.send();
                break;
            case 'draft':
                xmlhttp.open("GET", "<?php echo base_url('mail/get_draft') ?>"+'/'+page_no, true);
                xmlhttp.send();
                break;
        }
    }

    function inbox_count() {
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
                if (objJSON.count != 0)
                    document.getElementById("inbox").innerHTML = '<a>inbox(' + objJSON.count + ')</a>';
                else
                    document.getElementById("inbox").innerHTML = '<a>inbox</a>';
            }
        }
        xmlhttp.open("GET", "<?php echo base_url('mail/get_count_inbox') ?>", true);
        xmlhttp.send();
    }

    function draft_count() {
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
                if (objJSON.count != 0)
                    document.getElementById("draft").innerHTML = '<a>draft(' + objJSON.count + ')</a>';
                else
                    document.getElementById("draft").innerHTML = '<a>draft</a>';
            }
        }
        xmlhttp.open("GET", "<?php echo base_url('mail/get_count_draft') ?>", true);
        xmlhttp.send();
    }

    function thread(el) {

        //console.log($(el).attr('id'));
        var id=$(el).attr('id');
        thread_loader(id);
        update_seen(id);
    }

    function update_seen(tthread){
        console.log('update_seen '+tthread);
        var xmlhttp;
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                inbox_count();
                console.log('insidee final update_seen '+tthread);
            }
        }
        xmlhttp.open("GET", "<?php echo base_url('mail/seen/"+tthread+"') ?>", true);
        xmlhttp.send();
    }

    function thread_loader(tthread) {
        var xmlhttp;
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                map = new Object(); 
                $("#mail_content_container").empty();
                thread_chosen=tthread;
                var content = xmlhttp.responseText;
                var objJSON = JSON.parse(content);
                var title=objJSON.thread_name;
                var title_html='<div class="message"><div class="QuickLinks"><a>Back to inbox</a></div><div class="messageHead"><h2><strong>'+title+'</strong></h2></div></div>';
                $("#mail_content_container").append(title_html);
                for (var i = 0, len = objJSON.ddata.length; i < len; ++i) {
                    var msg = objJSON.ddata[i];
                    
                    var html_body="<div class=\"message\"><div class=\"QuickLinks\"><a></a><span class=\"pull-right\"><a id='"+i+"' OnClick='forward(this)' >Forward</a>|<a id='"+i+"' OnClick='deleter(this)' >Delete</a>|<a  id='"+i+"' OnClick='reply(this)' >Reply</a>|<a  id='"+i+"' OnClick='reply_all(this)' >Reply All</a></span></div><div class=\"messageHead\"><div class=\"messageTime pull-right\">"+msg.utc_time+"</div>From:<span class=\"sender\" id='"+i+"_sender'>"+msg.email+"</span><br>To:<span class=\"recepient\" id='"+i+"_reciever'>"+msg.to+"</span><br></div><div class=\"messageBody\" id='"+i+"_content'>"+msg.txt+"</div></div>";
                    $("#mail_content_container").append(html_body);
                    map[i]=msg.messenger;
                    
                }
                var reply_html='<div class="QuickReply">QuickReply</div><div class="reply"><div><form id="thread_former" method="post" accept-charset="utf-8" ><div class="form-group"><strong>To</strong></br><input type="text" class="form-control" id="inputEmail" placeholder="Enter email" name="to" onkeyup="autocomplet()"/><div class="email_list_id"><ul id="email_list_id" class="results"></ul></div></div><div class="form-group"><textarea class="form-control" id="exampleSubject" name="body" rows=12></textarea></div><div class="form-group"><button id="inner_submit" class="btn btn-default btn-primary">Send</button><button id="draft_inner" class="btn btn-default btn-primary">Save as Draft</button></div></form></div></div>';
                $("#mail_content_container").append(reply_html);
                $("#inner_submit").hide()
                $("#draft_inner").hide();
            }
        }
        xmlhttp.open("GET", "<?php echo base_url('mail/thread/"+tthread+"') ?>", true);
        xmlhttp.send();
    }

    function forward(msg)
    {
        $("#mmessenger").val();
        var id=$(msg).attr('id');
        var from=$("#"+id+"_content").clone().html();
        $("#exampleSubject").val(from);
        $("#inputEmail").val('');
        $("#thread_former").append('<input type="hidden" name="mmessenger" id="mmessenger" value="'+map[id]+'" />');
        $("#inner_submit").show()
        //$("#draft_inner").show();
    }

    function deleter(msg)
    {
        var id=$(msg).attr('id');
        var dataString = 'mmessenger=' + map[id];
        
        $.ajax({
                url: '<?php echo base_url('mail/deleter') ?>',
                type: 'POST',
                data: dataString,
                success: function (data) {
                    thread_loader(thread_chosen);
                    console.log(data);
                }
            });
        
        console.log(id+thread_chosen);
    }

    function reply(msg)
    {
        $("#mmessenger").val();
        var id=$(msg).attr('id');
        var to=$("#"+id+"_sender").clone().html();
        to=underscore_formatter(to);
        $("#inputEmail").val(to);
        $("#exampleSubject").val('');
        $("#thread_former").append('<input type="hidden" name="mmessenger" id="mmessenger" value="'+map[id]+'" />');
        $("#inner_submit").show()
        //$("#draft_inner").show();
    }

    function reply_all(msg)
    {
        $("#mmessenger").val();
        var id=$(msg).attr('id');
        var to=$("#"+id+"_sender").clone().html()+"_"+$("#"+id+"_reciever").clone().html();
        to=underscore_formatter(to);
        $("#inputEmail").val(to);
        $("#exampleSubject").val('');
        $("#thread_former").append('<input type="hidden" name="mmessenger" id="mmessenger" value="'+map[id]+'" />');
        $("#inner_submit").show()
        //$("#draft_inner").show();
    }

    function underscore_formatter(inp)
    {
        //console.log('underscore_formatter: '+inp);
        var arr=inp.split('_');
        var arrayLength = arr.length;
        var formatted_string='';
        for (var i = 0; i < arrayLength; i++)
        {
            if(arr[i]!='')
                formatted_string=formatted_string+'<'+arr[i]+'>';
        }
        //console.log('underscore_formatter return : '+formatted_string);
        return formatted_string;
    }

    function underscore_formatter_row_disp(inp)
    {
        //console.log('underscore_formatter: '+inp);
        var arr=inp.split('_');
        var arrayLength = arr.length;
        var formatted_string='';
        for (var i = 0; i < arrayLength; i++)
        {
            if(arr[i]!='')
                formatted_string=formatted_string+' '+arr[i]+' ';
        }
        //console.log('underscore_formatter return : '+formatted_string);
        return formatted_string;
    }

    $("#sent_mail").click(function () {
        $("#to_from").text("To");
        cur_page='sent';
        load_data('sent');
    });

    $("#inbox").click(function () {
        $("#to_from").text("From");
        cur_page='inbox';
        load_data('inbox');
    });

    $("#starred").click(function () {
        $("#to_from").text("From");
        cur_page='starred';
        load_data('starred');
    });

    $("#draft").click(function () {
        $("#to_from").text("To");
        cur_page='draft';
        load_data('draft');
    });

    $(window).load(function () {
        //console.log('inbox on load')
        load_data('inbox');
        inbox_count();
        draft_count();
    });

    $(document).ready(function () {
        $(function () {
            $("#submit").click(function () {
                event.preventDefault();
                
                var email = $("#inputEmail_modal").val();
                var title = $("#title").val();
                var sub = $("#exampleSubject_modal").val();

                var dataString = 'email=' + email + '&title=' + title + '&sub=' + sub;
                console.log(dataString);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('mail/compose') ?>",
                    data: dataString,
                    success: function (data) {
                        //do something here when you got the response
                        //console.log(data);
                        if (data != null) {
                            $('#theModal').modal('toggle');
                            $("#inputEmail_modal").val('');
                            $("#title").val('');
                            $("#exampleSubject_modal").val('');
                            $("#alert_success_button").val('mail sent successfully');
                            $("#alter_success").show();
                        }
                    }
                });

            });
        });
    });
    $(document).ready(function () {
        
        $(document).on('click', '#inner_submit', function() {
        event.preventDefault();
        console.log('inner_submit');
        var to = $("#inputEmail").val();
        var mmessenger = $("#mmessenger").val();
        var body = $("#exampleSubject").val();

        var dataString = 'to=' + to + '&mmessenger=' + mmessenger + '&body=' + body;
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('mail/inner') ?>",
            data: dataString,
            success: function (data) {
                //do something here when you got the response
                //console.log(data);
                if (data != null) {
                    console.log(data);
                    thread_loader(thread_chosen);
                    }
                }
            });
        });
    });
</script>


</body>
</html>