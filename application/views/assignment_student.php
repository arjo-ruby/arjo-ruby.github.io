<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row col-md-11 col-md-offset-1">

    <div class="btn-group col-md-offset-10">
        <button type="button" class="btn btn-primary"><?php echo $cur_subject; ?></button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span></button>
        <ul class="dropdown-menu" role="menu">
            <?php
            foreach ($subject as $subject_item):
                echo '<li><a href="' . base_url() . 'assignment/' . $subject_item->sub . '">' . $subject_item->sub . '</a></li>';
            endforeach


            ?>
            <?php
            log_message('debug', 'assignment:view' . ' ' . $cur_page_index . ' ' . $cur_subject);
            ?>
        </ul>
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
        <div class="serv_holder" style="line-height:300px">
            <div class="class">class 6/A</div>
            <div class="assingment"><a href="#">Assingment Name</a></div>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td bgcolor="#fff">
                        <table border="0" cellspacing="1" cellpadding="0" class="table">
                            <tr>
                                <th width="22%" align="left" bgcolor="#FFFFFF">Assingment Name</th>
                                <th width="23%" align="left" bgcolor="#FFFFFF">Starting Date</th>
                                <th width="23%" align="left" bgcolor="#FFFFFF">Submission Date</th>
                                <th width="32%" bgcolor="#FFFFFF" align="center">update status</th>
                            </tr>


                            <?php
                            //print_r($assignment);
                            foreach ($assignment as $a_item) {

                                echo '<tr>';
                                echo '<td align="left" bgcolor="#FFFFFF"><a href="' . $this->self_function->download_helper('tea_assign_' . $a_item->assign_id . '.doc', 'Assignment ' . $a_item->txt . ' ' . do_hash($a_item->assign_id) . '.doc', 'assignment') . '"><strong>' . $a_item->txt . '</strong></a></td>';
                                echo '<td align="left" bgcolor="#FFFFFF">' . date('d/m/Y', $a_item->utc_in) . '</td>';
                                echo '<td align="left" bgcolor="#FFFFFF"'.$this->self_function->set_css_error_class($a_item->submit_date).'>'.$this->self_function->get_disp_time($this->self_function->get_disp_grade_utc($a_item->submit_date)).'</td>';

                                if ($a_item->submit_date == '') {
                                    echo '<td align="left" bgcolor="#FFFFFF" class="submitted_n"><button class="btn btn-default" data-toggle="modal" data-target="#responsive" id="but' . $a_item->assign_id . '">upload</button></td>';
                                } else
                                    echo '<td align="left" bgcolor="#FFFFFF" class="submitted">submitted</td>';
                            }
                            ?>

                            <!---------------testing  ------------>


                            <!-- Modal -->
                            <div id="responsive" class="modal fade" tabindex="-1" data-width="760"
                                 style="display: none;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Upload Assignment</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="span7 text-center">


                                        <div class="span7 text-center" id='file_form_upl'>
                                            <?php
                                            $attributes = array('class' => 'form', 'id' => 'myForm');
                                            echo form_open_multipart('assignment/' . $cur_subject . '/do_upload', $attributes);
                                            ?>
                                            <input type="file" name="userfile" size="20"/>
                                        </div>
                                        <br/>


                                        <input type="submit" value="upload"/>

                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                </div>
                            </div>


                            <!---------------testing  ------------>

                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
