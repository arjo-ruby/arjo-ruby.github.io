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
        <?php echo form_open(base_url() . 'wizquiz' . '/' . 'insert_question_individual'); ?>
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
                        <label>Subject</label>
                        <input type='text' name="subject" class="form-control"
                               value="<?php echo $cur_subject; ?>" readonly required/>
                    </div>
                </div>
            </div>
        </div>
        </br></br>


        <div class="form-group">
            <label for="exampleQuestion">Question</label>
            <textarea class="form-control" id="exampleQuestion" rows=4 name="question" placeholder="Write Question Text here" required></textarea>
        </div>
        <div class="form-group">
            <label for="option_a">Option A</label>
            <textarea class="form-control" id="option_a" rows=2 name="option_a" placeholder="Write Option Text here" required></textarea>
        </div>
        <div class="form-group">
            <label for="option_b">Option B</label>
            <textarea class="form-control" id="option_b" rows=2 name="option_b" placeholder="Write Option Text here" required></textarea>
        </div>
        <div class="form-group">
            <label for="option_c">Option C</label>
            <textarea class="form-control" id="option_c" rows=2 name="option_c" placeholder="Write Option Text here" required></textarea>
        </div>
        <div class="form-group">
            <label for="option_d">Option D</label>
            <textarea class="form-control" id="option_d" rows=2 name="option_d" placeholder="Write Option Text here" required></textarea>
        </div>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <label for="sel1">Correct Answer</label>
                    <select class="form-control" name="correct_option">
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                </div>
            </div>
            <div class='col-sm-6'>
                <div class="form-group">
                    <label for="sel1">Difficulty</label>
                    <select class="form-control" name="level">
                        <option value="1">Easy</option>
                        <option value="2">Medium</option>
                        <option value="3">Hard</option>
                    </select>
                </div>
            </div>
        </div>
        <input type="text" name="temp0" value="<?php echo $this->encrypt->encode($cur_subject_id); ?>" hidden>
        <input type="text" name="temp1" value="<?php echo $this->encrypt->encode($cur_subject); ?>" hidden>
        <input type="text" name="temp2" value="<?php echo $this->encrypt->encode('just to confuse hacker'); ?>" hidden>
        <button type="submit" class="btn btn-default">Submit</button>

        <br>
        </form>
    </div>

</div>

<script>
</script>

<div class="container">
</div>