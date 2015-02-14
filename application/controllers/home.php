<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

    /**
     * Sign in page
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('encrypt');
        $this->load->library('session');
        $this->load->library('self_function');
        $this->load->model('home_model');
        $this->load->model('notice_model');
        $this->load->model('calendar_model');
    }

    public function index()
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        else {
            if ($this->self_function->is_student()) {
                $this->set_student();

            } else if ($this->self_function->is_teacher()) {

            }
            $data['subject'] = $this->home_model->get_subject();
            $data['count'] = $this->get_subject_unseen_count($data['subject']);
            $data['notice'] = $this->notice_model->get_notice();
            $data['year'] = date("Y");
            $data['month'] = date("m");
            $this->load->view('header');
            $this->load->view('home', $data);
            $this->load->view('footer');
        }
    }

    function get_subject_unseen_count($data)
    {
        $ar=array();
        if($this->self_function->is_student())
        {
            foreach ($data as $sub) {
                $ar[$sub->sub]=$this->calendar_model->get_notes_count($sub->cat_id)->count + $this->calendar_model->get_assign_count($sub->cat_id)->count;
            }
        }
        else if($this->self_function->is_teacher())
        {
            foreach ($data as $sub) {
                $ar[$sub->sub]=0;
            }
        }

        return $ar;
    }

    function counter_formatter($count)
    {
        if($count==0 || $count =='' || $count ==null)
            return '';
        else
            return $count;
    }

    function set_student()
    {
        $temp = $this->home_model->get_class_sec();
        $this->session->set_userdata('class', $temp['0']->class);
        $this->session->set_userdata('section', $temp['0']->section);
        log_message('debug', 'inside set_student');
    }

    function format_notification_no_span($var=0)
    {
        if(is_numeric($var))
            return '('.$var.')';
        else
            return '';
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */