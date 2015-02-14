<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row col-md-10 col-md-offset-1">

    <div class="btn-group col-md-offset-9">
        <a href="<?php echo base_url('forum/ask/' . $cur_subject); ?>" type="button" class="btn btn-primary">Got a ?</a>

    </div>
</div>

<?php

//print_r($forum_topic);
//print_r($forum_reply);
?>
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
        <div class="serv_holder" style="height:100px;">
            <?php if (count($forum_topic)!=0){?>
            <div class="topic_name"><?php echo $forum_topic[0]->title; ?></div>
            <div class="">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $forum_topic[0]->txt; ?></div>
            <?php
            echo '<div class="group">';
            for($i=0; $i< count($tags); $i=$i+1) {
                echo '<a href"" class="btn btn-default">'.$tags[$i]->tag_name.'</a>';
            }
            echo '</div>';
            ?>
            <div class="topic_author" style="float: right;"><?php echo $forum_topic[0]->email; ?>
              <div>
                <?php echo $forum_topic[0]->utc; ?>
              </div>
            </div>
            <hr/>

            <?php
            foreach ($forum_reply as $f_item) {
                echo '<div class="media col-md-11">';
                echo '<a class="pull-right" href="#">';
                echo '<img class="media-object" src="' . base_url('assets/img/profile_pic.png') . '" alt="..." width="50px">';
                echo '<p class="pull-right">' . date('d/m/Y', $f_item->utc) . '</p>';
                echo '</a>';
                echo '<div class="media-body">';
                echo '<h4 class="media-heading"><a href="#">' . $f_item->email . '</a></h4>';
                echo $f_item->txt;
                echo '</div>';
                echo '</div>';
            }

            ?>

        </div>
        <div class="col-md-12">
            <blockquote>
                <p>Your Response</p>
            </blockquote>
            <?php echo form_open(base_url() . 'forum' . '/' . 'reply' . '/' . $cur_subject . '/' . $topic_id); ?>
            <div style="margin:5px 0">
                <textarea class="form-control" rows="3" name="reply_txt" placeholder="Text input"></textarea>
            </div>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
            </form>
        </div>
        <?php } ?>
    </div>
</div>