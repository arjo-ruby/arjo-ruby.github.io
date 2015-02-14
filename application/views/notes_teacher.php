<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row col-md-12">

    <div class="btn-group">
        <button type="button" class="btn btn-primary">Subject</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>
    <div class="btn-group col-md-offset-4">
        <button type="button" class="btn btn-primary">Add Note</button>

    </div>
    <div class="btn-group col-md-offset-4">
        <button type="button" class="btn btn-primary">Class</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>
</div>


</div>
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
    <div class="wraper">
        <div class="serv_holder">
            <div class="class">Note</div>
            <hr/>
            <div class="note_left col-md-3">
                <div class="box"><a href="#"><img src="images/notes.png" width="128" height="128"
                                                  style="margin:0 auto; width:128px; display:block;"/></a> <h5
                        class="text-center">h5. Bootstrap heading</h5></div>
            </div>
            <div class="note_left col-md-3">
                <div class="box"><a href="#"><img src="images/notes.png" width="128" height="128"
                                                  style="margin:0 auto; width:128px; display:block;"/></a> <h5
                        class="text-center">h5. Bootstrap heading</h5></div>
            </div>
            <div class="note_left col-md-3">
                <div class="box"><a href="#"><img src="images/notes.png" width="128" height="128"
                                                  style="margin:0 auto; width:128px; display:block;"/></a><h5
                        class="text-center">h5. Bootstrap heading</h5></div>
            </div>
            <div class="note_left col-md-3">
                <div class="box"><a href="#"><img src="images/notes.png" width="128" height="128"
                                                  style="margin:0 auto; width:128px; display:block;"/></a> <h5
                        class="text-center">h5. Bootstrap heading</h5></div>
            </div>
            <div class="note_left col-md-3">
                <div class="box"><a href="#"><img src="images/notes.png" width="128" height="128"
                                                  style="margin:0 auto; width:128px; display:block;"/></a><h5
                        class="text-center">h5. Bootstrap heading</h5></div>
            </div>
            <div class="note_left col-md-3">
                <div class="box"><a href="#"><img src="images/notes.png" width="128" height="128"
                                                  style="margin:0 auto; width:128px; display:block;"/></a><h5
                        class="text-center">h5. Bootstrap heading</h5></div>
            </div>
            <div class="note_left col-md-3">
                <div class="box"><a href="#"><img src="images/notes.png" width="128" height="128"
                                                  style="margin:0 auto; width:128px; display:block;"/></a><h5
                        class="text-center">h5. Bootstrap heading</h5></div>
            </div>
            <div class="note_left col-md-3">
                <div class="box"><a href="#"><img src="images/notes.png" width="128" height="128"
                                                  style="margin:0 auto; width:128px; display:block;"/></a><h5
                        class="text-center">h5. Bootstrap heading</h5></div>
            </div>
        </div>
        <div class="clb"></div>
        <div class="row">
            <table width="60%" border="0" align="center" cellpadding="0" cellspacing="1">
                <tr>
                    <td width="35%" bgcolor="#FFFFFF">
                        <button type="button" class="btn btn-primary glyphicon glyphicon-chevron-left active"></button>
                    </td>
                    <td width="46%" bgcolor="#FFFFFF">
                        <button type="button" class="btn btn-primary">View More</button>
                    </td>
                    <td width="19%" align="center" bgcolor="#FFFFFF">
                        <button type="button"
                                class="btn btn-primary  glyphicon glyphicon-chevron-right active"></button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>