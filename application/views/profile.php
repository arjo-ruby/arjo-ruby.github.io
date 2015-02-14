<div class="row col-md-12">

    <div class="btn-group" style="float: right;">
        <a href="<?php echo base_url('profile/edit'); ?>"><button type="button" class="btn btn-primary">Edit</button></a>
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
    <div class="row">
        <div class="col-xs-6 col-md-2">
            <a href="#" class="thumbnail"> <img src="<?php echo base_url('assets/img/profile_pic.png') ?>" alt="..."> </a>
        </div>
        <div class="col-xs-6 col-md-10">
            <div class="col-md-4">
                <h4>Name: <?php echo ucwords($this->session->userdata('name')); ?></h4>
            </div>
            <div class="col-md-4">
                <h4>Class: <?php echo $this->self_function->class_to_roman($this->session->userdata('class')); ?></h4>
            </div>
            <div class="col-md-4">
                <h4>ID: <?php echo $this->session->userdata('email'); ?></h4>
            </div>
            <div class="col-md-4">
                <h4>Grade: <?php echo $data->grade; ?></h4>
            </div>
            <div class="col-md-6">
                <h4>Roll No: <?php echo $data->roll_no; ?></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-6">
            <div class="row">
                <div class="col-md-4">Interests</div>
                <div class="col-md-8"><?php echo $data->interest; ?></div>
            </div>
            <div class="row">
                <div class="col-md-4">Hobies</div>
                <div class="col-md-8"><?php echo $data->hobies; ?></div>
            </div>
            <div class="row">
                <div class="col-md-4">Favorite Subject</div>
                <div class="col-md-8"><?php echo $data->favorite_subject; ?></div>
            </div>
            <div class="row">
                <div class="col-md-4">Least Fav Subject</div>
                <div class="col-md-8"><?php echo $data->least_favorite_subject; ?></div>
            </div>
        </div>
        <div class="col-xs-6 col-md-6">
            <div class="row">
                <div class="col-md-4">Recognitions</div>
                <div class="col-md-8"><?php echo $data->recognitions; ?></div>
            </div>
            <div class="row">
                <div class="col-md-4">Teacher's remark</div>
                <div class="col-md-8"><?php echo $data->teacher_remark; ?></div>
            </div>
        </div>
    </div>
</div>