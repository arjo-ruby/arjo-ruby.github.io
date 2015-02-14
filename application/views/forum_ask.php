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
    <!-- Jumbotron  -->
    <div class="jumbotron" style="background-color: #fffffg;" id="classNotes">
        <div class="btn-group">
            <button type="button" class="btn btn-primary"><?php echo $cur_subject; ?></button>
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span
                    class="caret"></span> <span class="sr-only">Toggle Dropdown</span></button>
            <ul class="dropdown-menu" role="menu">
                <?php
                foreach ($subject as $subject_item):
                    echo '<li><a href="' . base_url('forum/ask/' . $subject_item->sub) . '">' . $subject_item->sub . '</a></li>';
                endforeach


                ?>
                <?php

                ?>
            </ul>
        </div>
        </br></br>

        <?php echo form_open(base_url() . 'forum' . '/' . 'ask_insert' . '/' . $cur_subject); ?>
        <div class="form-group">
            <label for="exampleSubject">Topic</label>
            <textarea class="form-control" id="exampleTopic" name="ask_topic" rows=2 placeholder="Topic must be something short and clicky. The topic can not be more than <?php echo $this->self_function->get_forum_title_length(); ?> words"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleSubject">Body</label>
            <textarea class="form-control" id="exampleSubject" name="ask_txt" rows=12 placeholder="Describe the question"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Post</button>
        </form>
        <br>

    </div>

</div>


<div class="container">
</div>

