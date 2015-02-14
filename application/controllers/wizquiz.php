<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Wizquiz extends CI_Controller
{

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
        $this->load->model('wizquiz_model');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->data['error'] = '';
        $this->data['msg'] = '';
    }

    public function index($slug = '')
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('/signin');
        if ($this->self_function->is_teacher()) $this->teacher_side($slug);
        else if ($this->session->userdata('level')) $this->quizzer($slug);
        else
        {
            $date = new DateTime();

            if($this->input->post('temp'))
            {
                log_message('debug','inside if of index function');
                $old_timestamp=$this->encrypt->decode($this->input->post('temp'));
                if($old_timestamp==''|| !is_numeric($old_timestamp)) redirect_back();
                if($old_timestamp+$this->self_function->get_start_quiz_delay_time() < $date->getTimestamp())
                {
                    $this->self_function->set_flashdata(false, 'You took too much time to decide. Please try again');
                    redirect_back();
                }
                $this->quizzer($slug);
            }
            else
            {
                log_message('debug','inside else of index function');
                $data['cur_subject']=$slug;
                $data['val']=$this->encrypt->encode($date->getTimestamp());
                $this->load->view('header', $data);
                $this->load->view('wizquiz_start', $data);
                $this->load->view('footer');
            }
        }
    }

    function teacher_side($slug='')
    {
        log_message('debug', 'Wizquiz:teacher_side=' . $slug);
        
        $this->cat_id=$this->slug_subject_other_input_validator($slug); //retruns category id of slug if everything is normal.
        $data['cur_subject']=$slug;
        $data['cur_subject_id']=$this->cat_id;
        $this->load->view('header');
        $this->load->view('wizquiz_insert_individual', $data);
        $this->load->view('footer');
    }

    public function insert_question_individual()
    {
        $cat_id=$this->encrypt->decode($this->input->post('temp0'));
        $this->sub=$this->encrypt->decode($this->input->post('temp1'));
        $question=$this->input->post('question');
        $option_a=$this->input->post('option_a');
        $option_b=$this->input->post('option_b');
        $option_c=$this->input->post('option_c');
        $option_d=$this->input->post('option_d');
        $answer=$this->input->post('correct_option');
        $level=$this->input->post('level');
        $this->sanity_maintainer($question, $option_a, $option_b, $option_c, $option_d, $answer, $level);
        log_message('debug','initialising process of insertion');
        if($this->wizquiz_model->insert_question($cat_id, $question, $option_a, $option_b, $option_c, $option_d, $answer, $level))
            $this->self_function->set_flashdata(true, 'Question inserted Successfully');
        else
            $this->self_function->set_flashdata(false, 'Oops, Something went wrong');
        redirect('wizquiz/'.$this->sub);
    }

    function quizzer($slug = '')
    {
        log_message('debug', 'Wizquiz:index=' . $slug);
        if (!$this->session->userdata('isLoggedIn')) redirect('/signin');
        else if ($this->self_function->is_student()) {
            if (!$this->session->userdata('level')) {
                $temp = $this->services_model->get_cat_id($slug);
                if (sizeof($temp) == 0) redirect('./home');
                if ($this->cat_id === 0) redirect('./home');
                $this->set_wizquiz_session($slug, $temp['cat_id']);
            }

            $this->log_wizquiz_session();
            if ($this->is_finished())
            {
                $this->final_page();
            }
            else
            {

                $this->data['question'] = $this->wizquiz_model->get_question($this->session->userdata('cat_id'));

                $date = new DateTime();
                $this->data['timestamp'] = $date->getTimestamp();

                if ($this->data['question'] === false)
                    redirect('/home');

                $this->load->view('wizquiz', $this->data);
            }
        } else if ($this->self_function->is_teacher()) {
            $this->self_function->set_flashdata(false, 'Teachers are not allowed to take test');
            redirect_back(); //a helper function to redirect to previous url
        }
    }

    public function taken()
    {
        log_message('debug', 'taken@wizquiz');
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        else {

            //log_message('debug', 'wizquiz_taken encoded@ ques_id: '.$this->input->post('temp1').' time: '.$this->input->post('temp2').' cor_ans: '.$this->input->post('temp3').' ans: '.$ans);

            $time = $this->encrypt->decode(base64_decode($this->input->post('temp2')));
            $cor_ans = $this->encrypt->decode(base64_decode($this->input->post('temp3')));
            $ans = $this->input->post('ans');

            log_message('debug', 'wizquiz_taken@ time: ' . $time . ' cor_ans: ' . $cor_ans . ' ans: ' . $ans);

            $flag = false;
            $date = new DateTime();
            if ($cor_ans === $ans && $this->check_robot($time, $date->getTimestamp()) === true) $flag = true;

            if ($flag === true)
                log_message('debug', 'taken@wizquiz flag: true');
            else
                log_message('debug', 'taken@wizquiz flag: false');
            $this->adjust_point($flag);
            $this->adjust_counter($flag);
            $this->self_function->adjust_level();
            $this->adjust_total_remaining_ques();
            redirect('/wizquiz');
        }
    }

    function final_page()
    {
        $this->wizquiz_model->insert_grade($this->session->userdata('cat_id'), $this->session->userdata('point'));
        
        $data['point'] = $this->session->userdata('point');
        $this->load->view('header');
        $this->load->view('wizquiz_finished', $data);
        $this->load->view('footer');

        $this->unset_wizquiz_session();
    }

    function set_wizquiz_session($sub, $cat_id)
    {

        //level represents current level of user
        //counter represents question answered correctly in a row for the current level. if level is reset it is set to 0
        //cat_id represent id of subject
        //subject represents subject name
        //point represents total point earned so far.
        //total_remaining ques represents remaining ques to be answered
        $this->session->set_userdata(array(
            'level' => $this->self_function->get_level_starting(),
            'counter' => 0, 'total_remaining_ques' => $this->self_function->get_total_quiz_question(),
            'cat_id' => $cat_id, 'subject' => $sub,
            'point' => $this->self_function->get_point_starting()));
    }

    function unset_wizquiz_session()
    {
        $this->session->unset_userdata(array('level' => '', 'counter' => '', 'total_remaining_ques' => '', 'cat_id' => '', 'subject' => '', 'point' => ''));
    }

    function log_wizquiz_session()
    {
        log_message('debug', 'level: ' . $this->session->userdata('level'));
        log_message('debug', 'counter: ' . $this->session->userdata('counter'));
        log_message('debug', 'total_remaining_ques: ' . $this->session->userdata('total_remaining_ques'));
        log_message('debug', 'cat_id: ' . $this->session->userdata('cat_id'));
        log_message('debug', 'subject: ' . $this->session->userdata('subject'));
        log_message('debug', 'point: ' . $this->session->userdata('point'));
    }

    function adjust_point($flag = 'false')
    {
        $point=0;
        if ($flag) $point = $this->self_function->get_point_correct();
        else $point = $this->self_function->get_point_wrong();
        $point = $this->session->userdata('point') + $point;
        $this->session->set_userdata('point', $point);
    }

    function adjust_counter($flag = 'false')
    {
        if ($flag) $counter = $this->session->userdata('counter') + 1;
        else if ($this->session->userdata('counter') >= 0) $counter = -1;
        else $counter = $this->session->userdata('counter') - 1;
        $this->session->set_userdata('counter', $counter);
    }

    function adjust_total_remaining_ques()
    {
        $temp = $this->session->userdata('total_remaining_ques') - 1;
        $this->session->set_userdata('total_remaining_ques', $temp);
    }

    function is_finished()
    {
        if ($this->session->userdata('total_remaining_ques') == 0) return true;
        else return false;
    }

    function check_robot($send_time, $rec_time)
    {
        if ($rec_time > $send_time + $this->self_function->get_quiz_delay_time()) return false;
        else return true;
    }

    //checks if the passed parameter if normal. if any attempt to hack is taken, it takes neccesary steps.
    function slug_subject_other_input_validator($slug='')
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('/signin');
        $temp = $this->services_model->get_cat_id($slug);
        if (sizeof($temp) == 0) redirect('./home');
        if ($temp['cat_id'] == 0) redirect('./home');
        return $temp['cat_id'];
    }

    function sanity_maintainer($question, $option_a, $option_b, $option_c, $option_d, $answer, $level)
    {
        log_message('debug','qizquiz: sanity maintainer');
        if (!$this->session->userdata('isLoggedIn')) redirect('/signin');
        if(!$this->self_function->is_teacher())
        {
            $this->self_function->set_flashdata(false, 'You don\'t have permission to be here');
            redirect_back();
        }
        else if(!(ctype_alpha($answer)&& ($answer=='a' || $answer=='b' || $answer=='c' ||$answer=='d')))
        {
            $this->self_function->set_flashdata(false, 'The answer to question is weird');
            redirect_back();
        }
        else if(!($level=='1' || $level==='2' || $level==='3'))
        {
            $this->self_function->set_flashdata(false, 'Level to question is weird');
            redirect_back();        
        }
    }
}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
