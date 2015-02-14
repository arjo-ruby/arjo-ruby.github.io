<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Calendar extends CI_Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('encrypt');
        $this->load->library('session');
        $this->load->library('self_function');
        $this->load->model('calendar_model');
        $this->load->helper('security');
        $this->data['error'] = '';
        $this->data['msg'] = '';
    }

    public function index($year = '', $month = '')
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('/signin');
        else if ($this->self_function->is_student()) {
            $data['monthNames'] = Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            if ($year == null || $month == null || !is_numeric($year) || !in_array($month, $data['monthNames'])) {
                $data['year'] = date("Y");
                $data['month'] = date("m");
            } else {
                $data['year'] = $year;
                $data['month'] = array_search($month, $data['monthNames']) + 1;
            }
            $data['month_name'] = $data['monthNames'][$data['month'] - 1];
            $this->load->view('calendar', $data);
        } else if ($this->self_function->is_teacher()) {
            redirect('/home');
        }
    }

    public function get_assign($year = '', $month = '')
    {

        if (!$this->session->userdata('isLoggedIn')) redirect('/signin');
        else if ($this->self_function->is_student()) {
            $data['monthNames'] = Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            if ($year == null || $month == null || !is_numeric($year) || !in_array($month, $data['monthNames'])) {
                $data['year'] = date("Y");
                $data['month'] = date("m");
            } else {
                $data['year'] = $year;
                $data['month'] = array_search($month, $data['monthNames']) + 1;
            }

            $ar = array();
            $temp = $this->calendar_model->get_assignment_date($data['monthNames'][$data['month'] - 1] . ', ' . $data['year']);
            foreach ($temp as $day) {
                $ar[] = $day->date;
                log_message('debug', $day->date);
            }
            $data['json'] = json_encode($ar);
            $this->load->view('json', $data);
        } else if ($this->self_function->is_teacher()) {
            redirect('/home');
        }
    }

    public function get_notes($year = '', $month = '')
    {

        if (!$this->session->userdata('isLoggedIn')) redirect('/signin');
        else if ($this->self_function->is_student()) {
            $data['monthNames'] = Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            if ($year == null || $month == null || !is_numeric($year) || !in_array($month, $data['monthNames'])) {
                $data['year'] = date("Y");
                $data['month'] = date("m");
            } else {
                $data['year'] = $year;
                $data['month'] = array_search($month, $data['monthNames']) + 1;
            }

            $ar = array();
            $temp = $this->calendar_model->get_notes_date($data['monthNames'][$data['month'] - 1] . ', ' . $data['year']);
            foreach ($temp as $day) {
                $ar[] = $day->date;
                log_message('debug', $day->date);
            }
            $data['json'] = json_encode($ar);
            $this->load->view('json', $data);
        } else if ($this->self_function->is_teacher()) {
            redirect('/home');
        }
    }
}
