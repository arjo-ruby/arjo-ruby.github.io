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
        <?php echo form_open(base_url() . 'notice' . '/' . 'insert'); ?>
        <div>
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <label>Valid From</label>
                            <input type='text' class="form-control" id="dp1" data-date="12-02-2012"
                                   data-date-format="dd-mm-yyyy" name="show_time" placeholder="click to set the day from which notice will be shown" readonly required/>
                    <span class="input-group-addon" name="show_time"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>

                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class="input-group date">
                            <label>Valid Till</label>
                            <input type='text' class="form-control" id="dp2" data-date="12-02-2012"
                                   data-date-format="dd-mm-yyyy" name="last_time" placeholder="click to set the day till which notice will be shown" readonly required/>
                    <span class="input-group-addon" name="show_time"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div>
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <label>Class</label>
                        <input type='text' name="class" class="form-control"
                               value="<?php echo $this->session->userdata('class'); ?>" readonly required/>
                    </div>
                </div>
                <div class='col-sm-6'>
                    <div class="form-group">
                        <label>Section</label>
                        <input type='text' name="section" class="form-control"
                               value="<?php echo $this->session->userdata('section'); ?>" readonly required/>
                    </div>
                </div>
            </div>
        </div>
        </br></br>


        <div class="form-group">
            <label for="exampleSubject">Notice</label>
            <textarea class="form-control" id="exampleSubject" rows=12 name="text" required></textarea>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>

        <br>
        </form>
    </div>

</div>


<div class="container">
</div>

