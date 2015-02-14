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

// set_item : this function will be executed when we select an item
function set_item(item) {
    console.log(item);
    // change input value
    $('#inputEmail').val(get_push_elem(item));
    // hide proposition list
    $('#email_list_id').hide();
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

function get_push_elem(item) {
    var eid = $('#inputEmail').val();
    var eArray = eid.split('>');
    var temp = '';
    for (var i = 0; i < eArray.length; i++) {
        console.log('for@get_push_elem: ' + eArray[i]);
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
    console.log('get_push_elem ' + temp)
    return temp;
}

function isemail(emailAddress) {
    console.log('isemail ' + emailAddress);
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
}

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
            $("mail_content_container").html('');
            var table_structre='<table class="table table-bordered table-hover"><colgroup><col span="1" style="width: 1%;"><col span="1" style="width: 30%;"><col span="1" style="width: 15%;"><col span="1" style="width: 5%;"></colgroup><tr><td colspan="4"><select class="select"><option>Reply all</option><option>Reply</option><option>Delete</option><option>Forward</option></select><button class="btn-primary">Go</button><span class="pull-right"><a>‹ Newer</a> 1 - 50 of about 90 <a> Older ›</a></span></td></tr><tbody id="tbody">';
            var elem="";
            for (var i = 0, len = objJSON.length; i < len; ++i) {
                var msg = objJSON[i];

                if (msg.seen = 0)
                    elem=elem+'<tr class="unread">'
                else
                    elem=elem+'<tr>'
                var cell1 = "<td><input type=\"checkbox\"></td>";
                var cell2 = "<td><a id='"+msg.thread_id+"' OnClick='thread(this);' >" + msg.subject + "</a></td>";
                var cell3 = "<td>"+msg.sender_reciever+"</td>";
                var cell4 = "<td>"+msg.day_time+"</td>";
                elem=elem+cell1+cell2+cell3+cell4+"</tr>"
            }
            var html_content=table_structre+elem+'</tbody></table>';
            console.log(html_content);
            $("#mail_content_container").html(html_content);
        }
    }
    console.log(page);
    switch (page) {
        case 'sent':
            xmlhttp.open("GET", "<?php echo base_url('mail/get_sent') ?>", true);
            xmlhttp.send();
            break;
        case 'starred':
            xmlhttp.open("GET", "<?php echo base_url('mail/get_starred') ?>", true);
            xmlhttp.send();
            break;
        case 'inbox':
            xmlhttp.open("GET", "<?php echo base_url('mail/get_inbox') ?>", true);
            xmlhttp.send();
            break;
        case 'draft':
            xmlhttp.open("GET", "<?php echo base_url('mail/get_draft') ?>", true);
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
            $("#mail_content_container").empty();
            var content = xmlhttp.responseText;
            var objJSON = JSON.parse(content);
            var title=objJSON.thread_name;
            var title_html='<div class="message"><div class="QuickLinks"><a>Back to inbox</a></div><div class="messageHead"><h2><strong>'+title+'</strong></h2></div></div>';
            $("#mail_content_container").append(title_html);
            for (var i = 0, len = objJSON.ddata.length; i < len; ++i) {
                var msg = objJSON.ddata[i];
                
                var html_body="<div class=\"message\"><div class=\"QuickLinks\"><a></a><span class=\"pull-right\"><a id='"+msg.messenger+"' OnClick='forward(this)' >Forward</a>|<a id='"+msg.messenger+"' OnClick='delete(this)' >Delete</a>|<a  id='"+msg.messenger+"' OnClick='reply(this)' >Reply</a>|<a  id='"+msg.messenger+"' OnClick='reply_all(this)' >Reply All</a></span></div><div class=\"messageHead\"><div class=\"messageTime pull-right\">"+msg.utc_time+"</div>From:<span class=\"sender\">"+msg.email+"</span><br>To:<span class=\"recepient\">"+msg.to+"</span><br></div><div class=\"messageBody\">"+msg.txt+"</div></div>";
                $("#mail_content_container").append(html_body);
                
            }
            var reply_html='<div class="QuickReply">QuickReply</div><div class="reply"><div>To:<span class="recepient"><br><form><div class="form-group"><textarea class="form-control" id="exampleSubject" rows = 5></textarea></div><div class="form-group"><button type="submit" class="btn btn-default btn-primary">Send</button> <button type="submit" class="btn btn-default btn-primary">Save as Draft</button></div></form></div></div>';
            $("#mail_content_container").append(reply_html);
        }
    }
    xmlhttp.open("GET", "<?php echo base_url('mail/thread/"+tthread+"') ?>", true);
    xmlhttp.send();
}

$("#sent_mail").click(function () {
    $("#to_from").text("To");
    load_data('sent');
});

$("#inbox").click(function () {
    $("#to_from").text("From");
    load_data('inbox');
});

$("#starred").click(function () {
    $("#to_from").text("From");
    load_data('starred');
});

$("#draft").click(function () {
    $("#to_from").text("To");
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
            var email = $("#inputEmail").val();
            var title = $("#title").val();
            var sub = $("#exampleSubject").val();
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
                        $('#loginModal').modal('toggle');
                        $("#inputEmail").val('');
                        $("#title").val('');
                        $("#exampleSubject").val('');
                        $("#alert_success_button").val('mail sent successfully');
                        $("#alter_success").show();
                    }
                }
            });

        });
    });
});