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
    <?php
    $attributes = array('class' => 'form-horizontal', 'role' => 'form');
    echo form_open_multipart('profile/update', $attributes);
    ?>
        <div class="row">
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail"> <img src="<?php echo base_url('assets/img/profile_pic.png') ?>" alt="..."> </a>
            </div>
            <div class="col-xs-6 col-md-10">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Name" value="<?php echo ucwords($this->session->userdata('name')); ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">class</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Name" value="<?php echo ucwords($this->session->userdata('class')); ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="IDTR8054685" value="<?php echo ucwords($this->session->userdata('email')); ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Grade</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="A" value="<?php echo $data->grade; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-6 control-label">Roll No</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="A+" value="<?php echo $data->roll_no; ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-6">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Interests</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3"  name="interest" placeholder="A+" value="<?php echo $data->interest; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Hobies</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3" name="hobies" placeholder="A+" value="<?php echo $data->hobies; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Favorite Subject</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3" name="favorite_subject" placeholder="A+" value="<?php echo $data->favorite_subject; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Lease Fav Subject</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3" name="least_favorite_subject" placeholder="A+" value="<?php echo $data->least_favorite_subject; ?>">
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-6">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Recognitions</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="3" name="recognitions"><?php echo $data->recognitions; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Teacher's remark</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="3" name="teacher_remark"><?php echo $data->teacher_remark; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-default navbar-btn pull-right">Submit</button>

        </div>
    </form>
</div>