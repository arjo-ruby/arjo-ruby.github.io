<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller
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

        // Create an instance of the sign model
        $this->load->model('signin_model');
    }

    public function index()
    {
        if ($this->session->userdata('isLoggedIn')) redirect('./home');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email Address', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $this->load->view('signin');

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('./signin');
    }

    function login_user()
    {

        // Grab the email and password from the form POST
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');

        log_message('debug', print_r($email . ' ' . $pass, TRUE));

        //Ensure values exist for email and pass, and validate the user's credentials
        if ($email && $pass && $this->signin_model->validate_user($email, $pass) === TRUE) {
            // If the user is valid, redirect to the main view
            redirect('/home');
        } else {
            // Otherwise show the login screen with an error message.
            $this->self_function->set_flashdata(false, 'Username or Password is wrong');
            redirect('/signin');
        }
    }

}