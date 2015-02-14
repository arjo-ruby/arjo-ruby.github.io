<?php
if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


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
    <div class="row">
        <div class="col-xs-6 col-sm-3">
            <div class="box">
                <h1>Calendar</h1>

                <div style="overflow: auto">
                    <a href="<?php echo base_url('calendar'); ?>" target="_blank"><img src="<?php echo base_url('assets/img/blue-calendar-icon.jpg'); ?>" class="img-responsive"/></a>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <h1 class="main_title"><strong>Bulletin Board</strong></h1>

            <div class="content">
                <ul class="Bulletin">
                    <?php

                    if ($this->self_function->is_student()) {
                        foreach ($notice as $notice_item) {
                            echo '<li><a href="">' . $notice_item->txt . "&nbsp;&nbsp;" . $this->self_function->get_disp_time($notice_item->utc_in) . '</a></li>';
                        }
                    } else if ($this->self_function->is_teacher()) {
                        foreach ($notice as $notice_item) {
                            echo '<li><a href="">' . $notice_item->txt . "&nbsp;&nbsp;" . $this->self_function->get_disp_time($notice_item->utc_in) . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- Optional: clear the XS cols if their content doesn't match in height -->
        <div class="clearfix visible-xs"></div>
        <div class="col-xs-6 col-sm-3">
            <div class="box">
                <h1>Subjects</h1>

                <div class="sidecon">
                    <ul class="subj">
                        <?php
                        if ($this->self_function->is_student()) {
                            foreach ($subject as $subject_item) {
                                echo '<li><a href="./services/' . $subject_item->sub . '">' . $subject_item->sub . '<span> '.$this->self_function->format_notification_no_span($count[$subject_item->sub]).'</span></a></li>';
                            }
                        } else if ($this->self_function->is_teacher()) {
                            foreach ($subject as $subject_item) {
                                echo '<li><a href="./services/' . $subject_item->sub . '/' . $subject_item->class . '/' . $subject_item->section . '">' . $subject_item->sub . ' ' . $subject_item->class . ' ' . $subject_item->section . '<span> '.$this->self_function->format_notification_no_span($count[$subject_item->sub]).'</span></a></li>';
                            }

                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
