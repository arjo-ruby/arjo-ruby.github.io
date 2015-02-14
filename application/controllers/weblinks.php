<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Weblinks extends CI_Controller
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
        $this->load->model('weblinks_model');
        $this->load->model('services_model');
        $this->load->model('home_model');
    }

    public function index($slug='')
    {
        $this->validation_check_set_slug($slug);

        $data['data']=$this->weblinks_model->get_links($this->cat_id);
        $data['cur_subject']=$this->sub;

        //get list of all students
        $data['subject'] = $this->home_model->get_subject();

        $this->load->view('header', $data);
        if($this->self_function->is_student())
            $this->load->view('weblinks', $data);
        else if($this->self_function->is_teacher())
            $this->load->view('weblinks_teacher', $data);
        $this->load->view('footer');
    }

    public function add_disp_view($slug)
    {
        $data['cur_subject']=$slug;
        $this->validation_check_set_slug($slug);
        $this->permission_verifier();
        $this->load->view('header');
        $this->load->view('weblinks_add', $data);
        $this->load->view('footer');
    }

    public function deleter($weblink_id=-1, $slug='')
    {
        log_message('debug', 'weblink@delete:'.$slug);
        $this->validation_check_set_slug($slug);
        $this->permission_verifier();
        $link_id=$this->weblink_handle_linkid($weblink_id);
        $flag=$this->weblinks_model->delete_link($link_id);
        if($flag)
        {
            $this->self_function->set_flashdata(true,'Link deleted Successfully');
            redirect('weblinks/'.$this->sub);
        }
        else
        {
            $this->self_function->set_flashdata(true,'Link could not be deleted');
            redirect_back();
        }
    }

    public function add_data()
    {
        log_message('debug','weblink@add_data');
        $this->permission_verifier();
        $this->input_add_verifier_set_sub($this->input->post('subject'), $this->input->post('description'), $this->input->post('link'));
        $flag=$this->weblinks_model->insert_link($this->cat_id, $this->input->post('description'), $this->input->post('link'));
        if($flag)
        {
            $this->self_function->set_flashdata(true,'Link added Successfully');
            redirect('weblinks/'.$this->sub);
        }
        else
        {
            $this->self_function->set_flashdata(false,'Link could not be added due to some error');
            redirect_back();
        }
    }

    function weblink_handle_linkid($id)
    {
        log_message('debug',$id);
        $linkid=$this->encrypt->decode(base64_decode(urldecode($id)));
        log_message('debug', $linkid);
        if($linkid<=0)
        {
            //$this->self_function->set_flashdata(true,'');
            redirect_back();
        }
        else
            return $linkid;
    }

    function validation_check_set_slug($slug='')
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
    }

    function permission_verifier()
    {
        if(!$this->self_function->is_teacher())
        {
            $this->self_function->set_flashdata(false, 'You don\'t have permission');
            redirect_back(); 
        }
    }

    function input_add_verifier_set_sub($slug='', $description='', $link='', $timestamp='')
    {
        log_message('debug', 'weblink@input_add_verifier_set_sub: slug: '.$slug);
        $this->validation_check_set_slug($slug);
        if(strlen($description)<=0 || strlen($description)>=$this->self_function->get_weblink_max_leng_description())
        {
            $this->self_function->set_flashdata(false, 'Size of description is appropriate');
            redirect_back();
        }
        if(strlen($description)<=0 || !$this->self_function->ur_verifier($link))
        {
            $this->self_function->set_flashdata(false, 'Invalid Link');
            redirect_back();
        }

        /*
        *overlook timestamp for now
        if(!$this->self_function->timestamp_check($timestamp))
        {
            $this->self_function->set_flashdata(false, 'You took too long to decide. Please re try');
            redirect_back();
        }
        */
    }
}