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
        <?php echo form_open(base_url() . 'weblinks' . '/' . 'add_data'); ?>
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


        <div>
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <label>Web Link</label>
                        <input type='text' name="link" class="form-control"
                               value="" required/>
                    </div>
                </div>
                <div class='col-sm-6'>
                    <div class="form-group">
                        <label>Description</label>
                        <input type='text' name="description" value="" class="form-control" required/>
                    </div>
                </div>
            </div>
        </div>

        <input type='text' name='subject' value='<?php echo $cur_subject; ?>' hidden required/>

        <button type="submit" class="btn btn-default">Submit</button>

        <br/>
        </form>
    </div>

</div>


<div class="container">
</div>

