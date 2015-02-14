<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller
{

    /**
     * Sign in page
     */
    private $cat_id;
    private $sub;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('encrypt');
        $this->load->library('session');
        $this->load->model('services_model');
        $this->load->model('notes_model');
        $this->load->model('home_model');
        $this->load->library('self_function');
        $this->load->helper('security');
    }

    public function index($slug = '', $page = 1)
    {
        log_message('debug', 'Notes:index=' . $slug);

        if (!is_numeric($page)) redirect('./home');

        if ($page < 1) $page = 1;

        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        else {
            $this->sub = $slug;
            $temp = $this->services_model->get_cat_id($this->sub);
            if (sizeof($temp) == 0) redirect('./home');
            if ($temp['cat_id'] == 0) {
                redirect('./home');
            }

            $this->cat_id = $temp['cat_id'];
            $data['cat_id'] = $this->cat_id;
            $data['cur_page_index'] = $page;
            log_message('debug', $this->cat_id . ' = ' . $this->sub);

            $data['notes'] = $this->notes_model->get_notes_8($this->cat_id, $page);
            $data['subject'] = $this->home_model->get_subject();
            $data['cur_subject'] = $this->sub;

            $this->load->view('header', $data);

            if ($this->self_function->is_student()) {
                $this->load->view('notes_student', $data);
            } else if ($this->self_function->is_teacher()) {
                $this->load->view('notes_teacher', $data);
            }

            $this->load->view('footer');
        }
    }
}