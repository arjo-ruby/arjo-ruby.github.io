<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row col-md-11 col-md-offset-1">
    
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
        <?php
        if($data!=null && count($data)!=0)
        {
        ?>
            <table class="table table-condensed">
                <?php 
                foreach($data as $links)
                {
                    echo '<tr><td><strong><a target="_blanks" href="'.$links->url.'">'.$links->description.'</a></strong></td></tr>';
                }
                ?>
            </table>
        <?php
        }
        else
        {
            echo '<p></br>No images for galelry</p>';
        }
        ?>
    </div>

</div>