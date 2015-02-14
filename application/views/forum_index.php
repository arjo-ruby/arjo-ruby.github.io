<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row col-md-10 col-md-offset-1">

    <div class="btn-group">
        <button type="button" class="btn btn-primary"><?php echo $cur_subject; ?></button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span></button>
        <ul class="dropdown-menu" role="menu">
            <?php
            foreach ($subject as $subject_item):
                echo '<li><a href="' . base_url() . 'forum/' . $subject_item->sub . '">' . $subject_item->sub . '</a></li>';
            endforeach


            ?>
            <?php
            log_message('debug', 'forum:view' . ' ' . $cur_page_index . ' ' . $cur_subject);
            ?>
        </ul>
    </div>
    <div class="btn-group col-md-offset-9">
        <a type="button" class="btn btn-primary" href="<?php echo base_url('forum/ask/' . $cur_subject); ?>">Got a ?</a>
    </div>
    </br>
    </br>
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
        <div class="serv_holder" style="height:300px;">

            <?php
            foreach ($forum as $f_item) {
                echo '<div class="summary jumbotron">';
                echo '<h3>';
                echo '<a href="' . base_url() . 'forum' . '/' . 'topic' . '/' . $cur_subject . '/' . $f_item->topic_id . '">';
                echo $f_item->title;
                echo '</a> ';
                echo '</h3>';
                echo '<div class="group">';
                for($i=0; $i< count($tags[$f_item->topic_id]); $i=$i+1) {
                    echo '<a href"" class="btn btn-default">'.$tags[$f_item->topic_id][$i]->tag_name.'</a>';
                }
                echo '</div>';
                echo '<div class="started" style="text-align: right;">';
                echo $f_item->email;
                echo ' <span>('.$count_comment[$f_item->topic_id].' comments)</span><div>'.$this->self_function->get_disp_time($f_item->utc).'</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>

            <!--------
                     <div class="summary jumbotron">
                      <h3>
                        <a href="">Ttile to mysql</a>
                      </h3>
                      <div class="group">
                        <a href"t" class="btn btn-default">mysql</a>
                        <a href"t" class="btn btn-default">php</a>
                      </div>
                      <div class="started" style="text-align: right;">
                        hari_om
                      </div>
                    </div>
                ---------->
        </div>
    </div>
</div>