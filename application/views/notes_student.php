<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row col-md-12">

    <div class="btn-group">
        <button type="button" class="btn btn-primary"><?php echo $cur_subject; ?></button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <?php
            foreach ($subject as $subject_item):
                echo '<li><a href="' . base_url() . 'notes/' . $subject_item->sub . '">' . $subject_item->sub . '</a></li>';
            endforeach


            ?>
            <?php
            log_message('debug', 'notes:view' . ' ' . $cur_page_index . ' ' . $cur_subject);
            ?>
        </ul>
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

    <div class="wraper">
        <div class="serv_holder">
            <div class="class">Note</div>
            <hr/>
                <?php
                foreach ($notes as $n_item)
                {
                    echo '<div class="note_left col-md-3">';
                    echo '<div class="box">';
                    echo '<a href="' . $this->self_function->download_helper('tea_notes_' . $n_item->notes_id . '.doc', 'Notes ' . $n_item->txt . ' ' . do_hash($n_item->notes_id) . '.doc', 'notes') . '">';
                    echo '<img src="' . base_url('assets/img/notes.png') . '" width="128" height="128" style="margin:0 auto; width:128px; display:block;" /></a>';
                    echo '<h5 class="text-center">' . $n_item->txt . '</h5>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            <div class="clb"></div>
        </div>
        <div class="clb"></div>
        <div class="row">
            <table width="60%" border="0" align="center" cellpadding="0" cellspacing="1">
                <tr>
                    <td width="35%" bgcolor="#FFFFFF"><a
                            href="<?php if ($cur_page_index > 1) echo base_url() . 'notes/' . $cur_subject . '/' . ($cur_page_index - 1); else echo ''; ?>">
                            <button type="button"
                                    class="btn btn-primary glyphicon glyphicon-chevron-left active"></button>
                        </a></td>
                    <td width="46%" bgcolor="#FFFFFF">
                        <button type="button" class="btn btn-primary">View More</button>
                    </td>
                    <td width="19%" align="center" bgcolor="#FFFFFF"><a
                            href="<?php echo base_url() . 'notes/' . $cur_subject . '/' . ($cur_page_index + 1); ?>">
                            <button type="button"
                                    class="btn btn-primary  glyphicon glyphicon-chevron-right active"></button>
                        </a></td>
                </tr>
            </table>
        </div>
    </div>
</div>