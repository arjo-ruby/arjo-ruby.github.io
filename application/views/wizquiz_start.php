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
    
    <h2>Instructions</h2>
    <!--
    <ul>
        <li>The WizQuiz is a self adaptive test.</li>
        <li>There will be total 15 question to answer.</li>
        <li>2 minutes i.e. 120 seconds will be provided for each question.</li>
        <li>Unanswered Question will taken as wrong answer.</li>
        <li>The more Tougher the question the more points you will get</li>
    </ul>
    -->
    
    <table class="table table-condensed">
        <tr><td><strong>The WizQuiz is a self adaptive test.</strong></td></tr>
        <tr><td><strong>There will be total 15 question to answer.</strong></td></tr>
        <tr><td><strong>2 minutes i.e. 120 seconds will be provided for each question.</strong></td></tr>
        <tr><td><strong>Unanswered Question will taken as wrong answer.</strong></td></tr>
        <tr><td><strong>The more Tougher the question the more points you will get</strong></td></tr>
        <tr><td style="color: red;"><strong>Remember you can not come back to previous question.</strong></td></tr>
    </table>
    <?php
        echo form_open(base_url() . 'wizquiz' . '/' . $cur_subject);
    ?>
        <label>Click on Start button to take quiz.</label></br>
        <input type="text" name="temp" value="<?php echo $val; ?>" hidden>
        <input class="btn btn-default" type="submit" value="Start">
    </form>

</div>