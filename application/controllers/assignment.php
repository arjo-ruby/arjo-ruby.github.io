<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Assignment extends CI_Controller
{

    /**
     *Assignment page responsible to render all aspects of assignment
     */
    private $cat_id;
    private $sub;
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('encrypt');
        $this->load->library('session');
        $this->load->library('self_function');
        $this->load->model('services_model');
        $this->load->model('assignment_model');
        $this->load->model('home_model');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('security');
    }

    //slug will store subject name
    //page contains value of page. It varies from 1 to ...
    //class is only required for teacher side. determines class of teacher he has choosen in home page
    //section is also required for teacher side. determines section of teacher he has choosen in home page
    public function index($slug = '', $page = 1)
    {
        log_message('debug', 'assignment:index=' . $slug . ' Page: ' . $page);

        //checking for url tampering
        if (!is_numeric($page)) redirect_back(); //a helper function to redirect to previous url

        //checking for url tampering
        if ($page < 1) $page = 1;

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

        //data passed to view
        $this->data['subject'] = $this->sub;
        $this->data['cat_id'] = $this->cat_id;
        $this->data['cur_page_index'] = $page;
        log_message('debug', $this->cat_id . ' = ' . $this->sub);

        //get assignment data from model
        $this->data['assignment'] = $this->assignment_model->get_assignment_8($this->cat_id, $page);

        //get list of all students
        $this->data['subject'] = $this->home_model->get_subject();

        //current subject
        $this->data['cur_subject'] = $this->sub;

        //set header view.
        $this->load->view('header',$this->data);

        if ($this->self_function->is_student()) {
            $this->load->view('assignment_student', $this->data);
        } else if ($this->self_function->is_teacher()) {
            $this->load->view('assignment_teacher', $this->data);
        }

        $this->load->view('footer');
        log_message('debug', 'index of assignment complete');
    }

    //uploads file and inserts post data
    public function do_upload($slug = '', $assign_id, $page = 1)
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');

        $assign_id = substr($assign_id, 3);

        log_message('debug', 'inside do upload');
        log_message('debug', 'assignment:do_upload=' . $slug . " assign_id " . $assign_id . " page " . $page);

        //temporary configuration file for file. for more infor read file upload in codeignitor webpage.
        //as of now only support .doc files

        //file name convention is stu_{assign|notes}_{id of user}_{assignment_id)}.{extension}
        $config['file_name'] = 'stu_assign_' . $this->session->userdata('id') . '_' . $assign_id . '.doc';

        //if notes then send notes as parameter instead of assignment
        $config['upload_path'] = $this->self_function->get_save_path('assignment');
        $config['allowed_types'] = 'doc';

        //in KB
        $config['max_size'] = '2048';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['max_filename'] = '30';
        $config['remove_spaces'] = True;
        $config['overwrite'] = True;

        //log_message('debug', 'Assignment.do_upload upload path' . $config['upload_path']);
        if (!is_numeric($assign_id)) {
            redirect('./home');
        }
        $this->load->library('upload', $config);

        //try to upload
        if (!$this->upload->do_upload()) {
            //setting msg
            $this->self_function->set_flashdata(false, $this->upload->display_errors());
            log_message('debug', $this->upload->display_errors());

            redirect('assignment/'.$slug);

            //$this->self_function->redirect_to('assignment/'.$this->sub);

        } else {

            //set msg
            $this->self_function->set_flashdata(true, 'File uploaded successfully');

            //insert data in model
            $this->assignment_model->insert_assign($assign_id);

            //display normal stuff
            redirect('assignment/'.$slug);

            //$this->self_function->redirect_to('assignment/'.$this->sub);

        }
    }

    public function new_assignment($slug=''){
        //if not logged in redirect to signin page
        if (!$this->session->userdata('isLoggedIn')||!$this->self_function->is_teacher()) redirect_back();

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
        //current subject
        $data['cur_subject'] = $this->sub;;

        $this->load->view('header', $data);
        $this->load->view('assignment_new',$data);
        $this->load->view('footer');
    }
}