<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
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
        $this->load->model('profile_model');
        $this->load->helper('form');

        // Create an instance of the sign model
        $this->load->model('signin_model');
    }

    public function index()
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        $data['data']=$this->profile_model->get_profile();
        $this->load->view('header');
        $this->load->view('profile', $data);
        $this->load->view('footer');
    }

    public function edit()
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        $data['data']=$this->profile_model->get_profile();
        $this->load->view('header');
        $this->load->view('profile_edit', $data);
        $this->load->view('footer');
    }

    public function update()
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        $query=$this->profile_model->update_details($this->input->post('interest'), $this->input->post('hobies'), $this->input->post('favorite_subject'), $this->input->post('least_favorite_subject'), $this->input->post('recognitions'), $this->input->post('teacher_remark'));
        $this->set_flashdata($query);
        redirect(base_url('profile'));
    }

    function set_flashdata($flag)
    {
        if($flag===true)
            $this->self_function->set_flashdata(true, 'Profile updated :)');
        else
            $this->self_function->set_flashdata(false, "Profile cpuld not be updated :'(. Check Internet Connection");
    }
}