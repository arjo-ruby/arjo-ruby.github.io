<div class="row col-md-11 col-md-offset-1">
    <div class="btn-group col-md-offset-10">
        <button type="button" class="btn btn-primary"><?php echo $cur_subject; ?></button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span></button>
        <ul class="dropdown-menu" role="menu">
            <?php
            foreach ($subject as $subject_item):
                echo '<li><a href="' . base_url() . 'gradebook/' . $subject_item->sub . '">' . $subject_item->sub . '</a></li>';
            endforeach
            ?>
        </ul>
    </div>
</div>
<div class="container">
    <div class="wraper">
        <div class="serv_holder">
            <div class="class">GradeBook</div>


            <ul id="myTab" class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#home" role="tab" id="home-tab" data-toggle="tab" aria-controls="home">Assignment</a>
                </li>
                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Wizquiz</a>
                </li>
                <li role="presentation"><a href="#messages" role="tab" id="messages-tab" data-toggle="tab" aria-controls="messages">Class</a>
                </li>
            </ul>



            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledBy="home-tab">
                    <?php
                    if(count($grade_assignment)!=0)
                    {
                    ?>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
                            <thead>
                                <tr>
                                    <th bgcolor="#FFFFFF">Assignment Name</th>
                                    <th bgcolor="#FFFFFF">Submission date</th>
                                    <th bgcolor="#FFFFFF">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($grade_assignment as $assign)
                                {
                                    echo '<tr>
                                        <td align="left" bgcolor="#FFFFFF">'.$assign->txt.'</td>
                                        <td align="left" bgcolor="#FFFFFF"'.$this->self_function->set_css_error_class($assign->utc).'>'.$this->self_function->get_disp_time($this->self_function->get_disp_grade_utc($assign->utc)).'</td>
                                        <td align="left" bgcolor="#FFFFFF">'.$assign->grade.'</td>
                                        </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    else
                    {
                        echo "<p></br>No gradebook on this category for this subject</p>";
                    }
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledBy="profile-tab">
                    <?php
                    if(count($grade_wizquiz)!=0)
                    {
                    ?>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
                            <thead>
                                <tr>
                                    <th bgcolor="#FFFFFF">Wizquiz No.</th>
                                    <th bgcolor="#FFFFFF">Submission date</th>
                                    <th bgcolor="#FFFFFF">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach($grade_wizquiz as $wizquiz)
                                {
                                    echo '<tr>
                                        <td align="left" bgcolor="#FFFFFF">'.$i.'</td>
                                        <td align="left" bgcolor="#FFFFFF"'.$this->self_function->set_css_error_class($wizquiz->utc).'>'.$this->self_function->get_disp_time($this->self_function->get_disp_grade_utc($wizquiz->utc)).'</td>
                                        <td align="left" bgcolor="#FFFFFF">'.$wizquiz->grade.'</td>
                                        </tr>';
                                    $i=$i+1;
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    else
                    {
                        echo "<p></br>No gradebook on this category for this subject</p>";
                    }
                    ?>    
                </div>
                <div role="tabpanel" class="tab-pane fade" id="messages" aria-labelledBy="messages-tab">
                    <?php
                    if($grade_classroom!=false && count($grade_classroom)!=0)
                    {
                    ?>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
                            <thead>
                                <tr>
                                    <th bgcolor="#FFFFFF">Clasroom Name</th>
                                    <th bgcolor="#FFFFFF">Submission date</th>
                                    <th bgcolor="#FFFFFF">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($grade_classroom as $classroom)
                                {
                                    echo '<tr>
                                        <td align="left" bgcolor="#FFFFFF">'.$classroom->txt.'</td>
                                        <td align="left" bgcolor="#FFFFFF"'.$this->self_function->set_css_error_class($classroom->utc).'>'.$this->self_function->get_disp_time($this->self_function->get_disp_grade_utc($classroom->utc)).'</td>
                                        <td align="left" bgcolor="#FFFFFF">'.$classroom->grade.'</td>
                                        </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    else
                    {
                        echo "<p></br>No gradebook on this category for this subject</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>