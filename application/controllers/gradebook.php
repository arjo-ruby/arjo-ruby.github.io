<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gradebook extends CI_Controller
{
    private $sub;
    private $cat_id;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('encrypt');
        $this->load->library('session');
        $this->load->library('self_function');
        $this->load->model('gradebook_model');
        $this->load->model('services_model');
        $this->load->model('home_model');
    }

    public function index($slug='')
    {
        //if not logged in redirect to signin page
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');

        //get category id from slug i.e. subject name
        $temp = $this->services_model->get_cat_id($slug);

        //if subject name is invalid then only no row will be returned
        if (sizeof($temp) == 0) redirect_back(); //a helper function to redirect to previous url

        //checking for worst case though not required
        if ($temp['cat_id'] == 0) {
            redirect_back(); //a helper function to redirect to previous url
        }

        //assign values to private variables    
        $this->sub = $slug;
        $this->cat_id = $temp['cat_id'];

        $data['grade_assignment']=$this->gradebook_model->get_grade_assignment($this->cat_id);
        $data['grade_wizquiz']=$this->gradebook_model->get_grade_wizquiz($this->cat_id);
        $data['grade_classroom']=$this->gradebook_model->get_grade_classroom($this->cat_id);

        $data['cur_subject']=$this->sub;

        //get list of all students
        $data['subject'] = $this->home_model->get_subject();

        $this->load->view('header', $data);
        $this->load->view('gradebook_student', $data);
        $this->load->view('footer');
    }
}