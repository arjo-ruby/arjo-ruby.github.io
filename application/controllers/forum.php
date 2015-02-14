<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Forum extends CI_Controller
{

    /**
     * Sign in page
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
        $this->load->model('home_model');
        $this->load->model('services_model');
        $this->load->model('forum_model');
        $this->load->helper('form');
        $this->data['error'] = '';
        $this->data['msg'] = '';
    }

    public function index($slug = '', $page = 1)
    {
        log_message('debug', 'assignment:index=' . $slug);

        if (!is_numeric($page))
            redirect('./home');

        if ($page < 1)
            $page = 1;

        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        else {
            $this->sub = $slug;
            $temp = $this->services_model->get_cat_id($this->sub);
            if (sizeof($temp) == 0)
                redirect('./home');
            if ($temp['cat_id'] == 0)
                redirect_back();

            $this->cat_id = $temp['cat_id'];
            $this->data['subject'] = $this->sub;
            $this->data['cat_id'] = $this->cat_id;
            $this->data['cur_page_index'] = $page;
            log_message('debug', $this->cat_id . ' = ' . $this->sub);


            

            $this->data['forum'] = $this->forum_model->get_forum_8($this->cat_id, $page);
            $this->data['tags'] = $this->get_tags_data($this->data['forum']);
            $this->data['count_comment'] = $this->get_count_comment_data($this->data['forum']);
            $this->data['subject'] = $this->home_model->get_subject();
            $this->data['cur_subject'] = $this->sub;
            $this->load->view('header', $this->data);
            if ($this->self_function->is_student()) {
                $this->load->view('forum_index', $this->data);
            } else if ($this->self_function->is_teacher()) {
                $this->load->view('forum_index', $this->data);
            }

            $this->load->view('footer');

        }
    }

    public function topic($sub = '', $topic_id = 0)
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');

        log_message('debug', $sub . ' = ' . $topic_id);
        if (!is_numeric($topic_id))
            redirect('./home');
        log_message('debug', 'topic is numeric');
        $temp = $this->services_model->get_cat_id($sub);
        if (sizeof($temp) == 0)
            redirect('./home');

        else {
            log_message('debug', 'subject paramter is valid');
            $this->sub = $sub;
            $this->cat_id = $temp['cat_id'];
            $this->data['cat_id'] = $this->cat_id;
            log_message('debug', $this->cat_id . ' = ' . $this->sub);
            if ($this->cat_id === 0) {
                redirect('./home');
            }

            

            $this->data['forum_topic'] = $this->forum_model->get_forum_topic($topic_id);
            $this->data['tags'] = $this->forum_model->get_tags($topic_id);
            $this->data['forum_reply'] = $this->forum_model->get_all_comment_topic($topic_id);
            $this->data['subject'] = $this->home_model->get_subject();
            $this->data['cur_subject'] = $this->sub;
            $this->data['topic_id'] = $topic_id;

            $this->load->view('header', $this->data);
            if ($this->self_function->is_student()) {
                $this->load->view('forum_topic', $this->data);
            } else if ($this->self_function->is_teacher()) {
                $this->load->view('forum_topic', $this->data);
            }

            $this->load->view('footer');
        }
    }

    public function reply($sub = '', $topic_id = 0)
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');

        log_message('debug', $sub . ' = ' . $topic_id);
        if (!is_numeric($topic_id))
            redirect('./home');
        log_message('debug', 'topic is numeric');
        $temp = $this->services_model->get_cat_id($sub);
        if (sizeof($temp) == 0)
            redirect('./home');

        else {
            log_message('debug', 'subject paramter is valid');
            $this->sub = $sub;
            $this->cat_id = $temp['cat_id'];
            $this->data['subject'] = $this->sub;
            $this->data['cat_id'] = $this->cat_id;
            log_message('debug', $this->cat_id . ' = ' . $this->sub);
            if ($this->cat_id === 0) {
                redirect('./home');
            }
            $data = $this->input->post('reply_txt');
            $this->forum_model->insert_reply($topic_id, $data);
            redirect(base_url() . 'forum' . '/' . 'topic' . '/' . $sub . '/' . $topic_id);
        }
    }

    public function ask($sub = '')
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');

        $temp = $this->services_model->get_cat_id($sub);
        if (sizeof($temp) == 0)
            redirect('./home');

        else {
            $this->data['subject'] = $this->home_model->get_subject();

            log_message('debug', 'subject paramter is valid');
            $this->sub = $sub;
            $this->cat_id = $temp['cat_id'];
            $this->data['cur_subject'] = $this->sub;
            $this->data['cat_id'] = $this->cat_id;
            log_message('debug', $this->cat_id . ' = ' . $this->sub);
            if ($this->cat_id === 0) {
                redirect('./home');
            }
            $this->load->view('header', $this->data);
            $this->load->view('forum_ask', $this->data);
            $this->load->view('footer');
        }
    }

    public function ask_insert($sub = '')
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');


        $temp = $this->services_model->get_cat_id($sub);
        if (sizeof($temp) == 0)
            redirect('./home');

        else {
            log_message('debug', 'subject paramter is valid');
            $this->sub = $sub;
            $this->cat_id = $temp['cat_id'];
            $this->data['cur_subject'] = $this->sub;
            $this->data['cat_id'] = $this->cat_id;
            log_message('debug', $this->cat_id . ' = ' . $this->sub);
            if ($this->cat_id === 0) {
                redirect('./home');
            }
            $data = $this->input->post('ask_txt');
            $title = $this->input->post('ask_topic');

            //handle error in inputs and it takes proper step regarding it.
            $this->error_input_validator();

            $topic_id = $this->forum_model->insert_topic($this->cat_id, $title, $data);
            if (is_numeric($topic_id)){
                $this->self_function->set_flashdata(success, 'Reply added to above topic');
                redirect(base_url() . 'forum' . '/' . 'topic' . '/' . $sub . '/' . $topic_id);
            }
            else {
                $this->self_function->set_flashdata(false, 'Reply could not added to above topic');
                redirect(base_url() . 'forum' . '/' . 'topic' . '/' . $sub . '/' . $topic_id);   
            }
        }
    }

    function error_input_validator()
    {
        if(strlen($this->input->post('ask_topic'))>$this->self_function->get_forum_title_length())
        {
            redirect('forum/ask/'.$cur_subject);
        }
    }

    function get_tags_data($data)
    {
        $ar = array();
        foreach ($data as $topic)
        {
            $ar[$topic->topic_id]=$this->forum_model->get_tags($topic->topic_id);
        }
        return $ar;
    }

    function get_count_comment_data($data)
    {
        $ar = array();
        foreach ($data as $topic)
        {
            $ar[$topic->topic_id]=$this->forum_model->get_count_comment($topic->topic_id)[0]->count;
        }
        return $ar;
    }
}