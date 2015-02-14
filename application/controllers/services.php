<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller
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
        $this->load->library('self_function');
    }

    public function index($slug = '', $class = '', $section = '')
    {
        log_message('debug', 'Services:index=' . $slug);

        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        else {
            $this->sub = $slug;
            $temp = $this->services_model->get_cat_id($this->sub);
            if (sizeof($temp) == 0)
                redirect('./home');
            if ($temp['cat_id'] == 0) {
                redirect('./home');
            }

            if ($this->self_function->is_teacher()) {
                log_message('debug', 'class: ' . $class . ' section: ' . $section);
                if (!is_numeric($class) || !ctype_upper($section))
                    redirect_bback();
                else
                    $this->set_class_section($class, $section);
            }

            $this->cat_id = $temp['cat_id'];
            $data['cur_subject'] = $this->sub;
            $data['cat_id'] = $this->cat_id;
            log_message('debug', $this->cat_id . ' = ' . $this->sub);


            $this->load->view('header', $data);
            $this->load->view('services', $data);
            $this->load->view('footer_service');
        }
    }

    function set_class_section($class, $section)
    {
        $this->session->set_userdata(array('class' => $class, 'section' => $section));
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */