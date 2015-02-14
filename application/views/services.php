<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
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
            <div class="serv_nav">
                <ul class="rounder">

                    <li class="weblinks"><a href="<?php echo base_url() . 'weblinks/' . $cur_subject; ?>">WebLinks</a></li>
                    <li class="homework"><a href="<?php echo base_url() . 'forum/' . $cur_subject; ?>">Forum</a></li>
                    <li class="classnotes"><a href="<?php echo base_url() . 'notes/' . $cur_subject; ?>">Notes</a></li>
                    <li class="s_center"><a href="">centre</a></li>
                    <li class="projects"><a href="<?php echo base_url() . 'gradebook/' . $cur_subject; ?>">GradeBook</a></li>
                    <li class="assignments"><a href="<?php echo base_url() . 'assignment/' . $cur_subject; ?>">Assignmentsss</a></li>
                    <li class="wizQuiz"><a target="_blank" href="<?php echo base_url() . 'wizquiz/' . $cur_subject; ?>">WizQuiz</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>