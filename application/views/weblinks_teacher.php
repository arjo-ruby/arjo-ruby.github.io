<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row col-md-11 col-md-offset-1">
    <div class="btn-group col-md-offset-10">
        <button type="button" class="btn btn-primary"><?php echo $cur_subject; ?></button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span></button>
        <ul class="dropdown-menu" role="menu">
            <?php
            foreach ($subject as $subject_item):
                echo '<li><a href="' . base_url() . 'weblinks/' . $subject_item->sub . '">' . $subject_item->sub . '</a></li>';
            endforeach
            ?>
        </ul>
    </div>
    <div class="pull-left">
        <a href="<?php echo base_url(). 'weblinks/add/' . $cur_subject ?>"><button type="button" class="btn btn-primary pull-left">Add Links</button></a></br></br>
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
    <!-- Jumbotron  -->
    <div class="jumbotron" style="background-color: #fffffg;" id="classlinks">
        <h2>Some Important links</h2>
        <?php
        if($data!=null && count($data)!=0)
        {
        ?>
            <table class="table table-condensed">
                <?php 
                foreach($data as $links)
                {
                    echo '<tr><td><strong><a target="_blanks" href="'.$links->url.'">'.$links->description.'</a></strong><span class="pull-right"><a href="'. base_url(). 'weblinks/deleter/' . urlencode(base64_encode($this->encrypt->encode($links->link_id))) . '/' . $cur_subject. '">Delete</a></span></td></tr>';
                }
                ?>
            </table>
        <?php
        }
        else
        {
            echo '<p></br>No weblinks on this category for this subject</p>';
        }
        ?>
    </div>

</div>