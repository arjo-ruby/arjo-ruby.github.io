<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Self_function
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->config->load('self_config');

    }

    public function is_student()
    {
        if ($this->CI->session->userdata('offset') == $this->CI->config->item('student'))
            return true;
        return false;
    }

    public function is_teacher()
    {
        if ($this->CI->session->userdata('offset') == $this->CI->config->item('teacher'))
            return true;
        return false;
    }

    public function is_admin()
    {
        if ($this->CI->session->userdata('offset') == $this->CI->config->item('admin'))
            return true;
        return false;
    }

    public function get_all_class()
    {
        return $this->CI->config->item('all_class');
    }

    public function get_all_section()
    {
        return $this->CI->config->item('all_section');
    }

    public function redirect_to($addr = '')
    {
        log_message('debug', 'Self_function.redirect_to(): ' . base_url() . 'index.php/' . $addr);
        redirect(base_url() . 'index.php/' . $addr);
    }

    //all three paremeters must not contain trailling /.

    public function download_helper($old_name, $new_name, $old_folder_name)
    {
        if (copy($this->CI->config->item('root_folder_file') . '/' . $old_folder_name . '/' . $old_name, $this->CI->config->item('temp_directory') . '/' . $new_name)) {
            return base_url($this->CI->config->item('temp_directory_link') . '/' . $new_name);
        }
        return false;
    }

    public function get_save_path($args = '')
    {
        return $this->CI->config->item('root_folder_file') . '/' . $args . '/';
    }

    /*wizmail*/

    public function get_normal_id()
    {
        return $this->CI->config->item('normal');
    }

    public function get_deleted_id()
    {
        return $this->CI->config->item('deleted');
    }

    public function get_draft_id()
    {
        return $this->CI->config->item('draft');
    }

    public function get_starred_id()
    {
        return $this->CI->config->item('starred');
    }

    public function get_read_id()
    {
        return $this->CI->config->item('read');
    }

    public function get_unread_id()
    {
        return $this->CI->config->item('unread');
    }

    public function mail_get_subject($sub, $comment)
    {
        return "<strong>" . $sub . "</strong>  " . $comment;
    }

    public function get_disp_time($utc)
    {
        if(is_numeric($utc))
            return date('d/m/Y', $utc);
        else
            return $utc;        
    }

    public function get_disp_name($first_name, $last_name)
    {
        return $first_name . " " . $last_name;
    }

    /*wizmail ends*/

    /*wizquiz starts*/

    public function adjust_level()
    {
        $level = $this->CI->session->userdata('level');
        $counter = $this->CI->session->userdata('counter');

        if ($level == $this->get_level_easy() and $counter >= $this->CI->config->item('easytomedium')) {
            $this->CI->session->set_userdata('level', $this->get_level_medium());
            $this->CI->session->set_userdata('counter', 0);
        } elseif ($level == $this->get_level_medium() and $counter >= $this->CI->config->item('mediumtohard')) {
            $this->CI->session->set_userdata('level', $this->get_level_hard());
            $this->CI->session->set_userdata('counter', 0);
        } elseif ($level == $this->get_level_medium() and $counter <= $this->CI->config->item('mediumtoeasy')) {
            $this->CI->session->set_userdata('level', $this->get_level_easy());
            $this->CI->session->set_userdata('counter', 0);
        } elseif ($level == $this->get_level_hard() and $counter <= $this->CI->config->item('hardtomedium')) {
            $this->CI->session->set_userdata('level', $this->get_level_medium());
            $this->CI->session->set_userdata('counter', 0);
        }
    }

    public function get_level_easy()
    {
        return $this->CI->config->item('easy_level');
    }

    public function get_level_medium()
    {
        return $this->CI->config->item('medium_level');
    }

    public function get_level_hard()
    {
        return $this->CI->config->item('hard_level');
    }

    public function get_total_quiz_question()
    {
        return $this->CI->config->item('total_ques');
    }

    public function get_level_starting()
    {
        return $this->get_level_easy();
    }

    public function get_point_starting()
    {
        return $this->CI->config->item('point_starting');
    }

    public function get_point_correct()
    {
        $level = $this->CI->session->userdata('level');

        if ($level == $this->get_level_easy()) {
            return $this->CI->config->item('point_correct_easy');
        } else if ($level == $this->get_level_medium()) {
            return $this->CI->config->item('point_correct_medium');
        } else if ($level == $this->get_level_hard()) {
            return $this->CI->config->item('point_correct_hard');
        }
    }

    public function get_point_wrong()
    {
        $level = $this->CI->session->userdata('level');

        if ($level == $this->get_level_easy()) {
            return $this->CI->config->item('point_wrong_easy');
        } else if ($level == $this->get_level_medium()) {
            return $this->CI->config->item('point_wrong_medium');
        } else if ($level == $this->get_level_hard()) {
            return $this->CI->config->item('point_wrong_hard');
        }
    }

    public function get_quiz_delay_time()
    {
        return $this->CI->config->item('quiz_dealy_time');
    }

    public function get_start_quiz_delay_time()
    {
        return $this->CI->config->item('quiz_start_dealy_time');
    }
    //********************************************//

    /*wizquiz ends*/

    public function get_utc_from_date($str = "")
    {
        $dtime = DateTime::createFromFormat("d-n-Y", $str);
        return $dtime->getTimestamp();
    }

    public function set_flashdata($success = false, $msg = '')
    {
        $this->CI->session->set_flashdata(array(
            'success' => $success,
            'msg' => $msg
        ));
    }

    public function is_seen($seen)
    {
        if($seen==get_seen_offset())
            return true;
        return false;
    }

    public function is_unseen($seen)
    {
        if($seen==get_unseen_offset())
            return true;
        return false;
    }

    public function get_seen_offset()
    {
        return $this->CI->config->item('seen');
    }

    public function get_unseen_offset()
    {
        return $this->CI->config->item('seen');
    }

    public function get_disp_grade_utc($utc)
    {
        if($utc==null || $utc=='' || !is_numeric($utc))
            return "<strong>Didn't Submit</strong>";
        else
            return $utc;

    }

    public function set_css_error_class($val)
    {
        log_message('debug','the val is: ---'.$val.'---');
        if($val==null || $val=='' || !is_numeric($val))
            return 'class="submitted_n"';
        else
            return $val;
    }

    public function class_to_roman($class)
    {
        switch($class)
        {
            case 1:
                return 'I';
                break;
            case 2:
                return 'II';
                break;
            case 3:
                return 'III';
                break;
            case 4:
                return 'IV';
                break;
            case 5:
                return 'V';
                break;
            case 6:
                return 'VI';
                break;
            case 7:
                return 'VII';
                break;
            case 8:
                return 'VIII';
                break;
            case 9:
                return 'IX';
                break;
            case 10:
                return 'X';
                break;
            case 11:
                return 'XI';
                break;
            case 12:
                return 'XII';
                break;
        }
    }

    public function get_forum_title_length()
    {
        return $this->CI->config->item('forum_title_length');
    }

    public function format_notification_no_span($var=0)
    {
        if(is_numeric($var) && $var >0)
            return '('.$var.')';
        else
            return '';
    }

    public function ur_verifier($url='')
    {
        if(!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_weblink_delete_offset()
    {
        return $this->CI->config->item('weblink_delete_offset');
    }

    public function get_weblink_normal_offset()
    {
        return $this->CI->config->item('weblink_normal_offset');
    }

    public function get_weblink_max_leng_description()
    {
        return $this->CI->config->item('weblink_maxlen_description');
    }
}

?>