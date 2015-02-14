<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Notice extends CI_Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('encrypt');
        $this->load->library('session');
        $this->load->library('self_function');
        $this->load->model('notice_model');
        $this->load->helper('security');
        $this->load->helper('form');
        $this->data['error'] = '';
        $this->data['msg'] = '';
    }

    public function index($year = '', $month = '')
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('/signin');
        else if ($this->self_function->is_teacher()) {
            $this->load->view('header');
            $this->load->view('notice', $this->data);
            $this->load->view('footer');
        } else if ($this->self_function->is_student()) {
            redirect('/home');
        }
    }

    public function insert()
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('/signin');
        else {
            $class = $this->input->post('class');
            $section = $this->input->post('section');
            $txt = $this->input->post('text');

            if ($this->is_null_input($class, $section, $txt, $this->input->post('show_time'), $this->input->post('last_time'))) {
                redirect_back();
            }

            log_message('debug', 'insert notice: ' . $this->input->post('show_time') . $this->input->post('last_time') . $this->input->post('class') . $this->input->post('section') . $txt);

            $utc_in = $this->self_function->get_utc_from_date($this->input->post('show_time'));
            $utc_valid = $this->self_function->get_utc_from_date($this->input->post('last_time'));

            if ($this->is_valid_input($class, $section, $utc_in, $utc_valid) && $this->notice_model->insert_notice($class, $section, $txt, $utc_in, $utc_valid)) {
                redirect('/home');
            } else {
                //log_message('debug',$this->db->last_query());
                redirect_back();
            }
        }
    }

    function is_valid_input($class, $section, $utc_in, $utc_valid)
    {
        log_message('debug', $class . ' ' . $section . ' ' . $utc_in . ' ' . $utc_valid);

        if (!is_numeric($class) || !is_numeric($utc_in) || !is_numeric($utc_valid)) {
            $this->self_function->set_flashdata(false, 'Invalid Input');
            return false;
        }
        if ($utc_in < time()) {
            $this->self_function->set_flashdata(false, '"Valid From" date must be greater than today\'s date');
            return false;
        }
        if ($utc_in >= $utc_valid) {
            $this->self_function->set_flashdata(false, '"Valid From" date must be greater than "Valid Till');
            return false;
        }
        if ($class <= 0 && $class > 12) {
            $this->self_function->set_flashdata(false, 'Invalid Input');
            return false;
        }
        if (!ctype_upper($section)) {
            $this->self_function->set_flashdata(false, 'Invalid Input');
            return false;
        }
        $this->self_function->set_flashdata(true, 'Notice inserted successfully');
        return true;
    }

    function is_null_input($class, $section, $text, $date_from, $date_till)
    {
        if ($class == '' || $section == '' || $text == '' || $date_from == '' || $date_till = '') {
            $this->self_function->set_flashdata(false, 'All Input must be filled');
            return true;
        }
        return false;
    }
}
