<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    private $sub;
    private $cat_id;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('encrypt');
        $this->load->library('session');
        $this->load->library('self_function');
        $this->load->model('gallery_model');
    }

    public function index()
    {
        $this->validator();
        
        $data['data']= $this->gallery_model->get_links();

        $this->load->view('header');
        
        $this->load->view('gallery', $data);
        
        $this->load->view('footer');
    }

    private function validator()
    {
        //if not logged in redirect to signin page
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
    }
}