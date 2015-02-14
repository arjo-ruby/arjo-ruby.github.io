<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class mail extends CI_Controller
{

    /**
     * Sign in page
     */
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
        $this->load->model('mail_model');

        $this->load->helper('form');
        $this->data['error'] = '';
        $this->data['msg'] = '';
    }

    public function index()
    {

        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        else {

            //$this->data['all_msg']=$this->mail_model->get_inbox_mail_20('inbox');
            //log_message('debug','contoller: inbox '.' '.print_r($this->data['msg']));
            $this->load->view('mail', $this->data);
        }
    }

    public function compose()
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');

        $to = $this->input->post('email');
        $title = $this->input->post('title');
        $subject = $this->input->post('sub');
        $ar['success'] = false;

        log_message('debug', 'compose: ' . $to . $title . $subject);

        $response = $this->mail_model->insert_new($this->get_mail_recipients($to), $title, $subject);
        if ($response === true) {
            $ar['success']=true;
            $ar['data']='successfully data insereted';
        } else {
            $ar['success']=false;
            $ar['data']=$response;
        }

        $this->data['json'] = json_encode($ar);
        $this->load->view('json', $this->data);
    }

    public function get_email_id()
    {
        $key = $this->input->post('keyword');
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        $data['json'] = json_encode($this->get_disp_emailId($this->mail_model->get_emailId($key)));
        $this->load->view('json', $data);
    }

    public function thread($id = '')
    {
        $temp_id=$id;
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        $id=$this->encrypt->decode(base64_decode(urldecode($id)));
        if(!$this->check_thread_id($id))
            redirect('mail');
        
        $temp= array(
            'thread_name' => $this->get_disp_thread_name($this->mail_model->get_thread_name($id)),
            'ddata'=> $this->get_disp_thread($this->mail_model->get_thread_data($id))
            );

        $data['json']=json_encode($temp);
        $this->load->view('json', $data);
    }

    public function get_inbox($page = 1)
    {
        log_message('debug', 'get_inbox '.$page);
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');

        $data['json'] = json_encode($this->get_disp_inbox($this->mail_model->get_inbox($page)), JSON_HEX_QUOT | JSON_HEX_TAG);

        //log_message('debug',print_r($temp));
        $this->load->view('json', $data);
    }

    public function get_sent($page = 1)
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');

        $data['json'] = json_encode($this->get_disp_sent($this->mail_model->get_sent($page)), JSON_HEX_QUOT | JSON_HEX_TAG);

        //log_message('debug',print_r($temp));
        $this->load->view('json', $data);
    }

    public function get_draft($page = 1)
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');

        $data['json'] = json_encode($this->get_disp_sent($this->mail_model->get_draft($page)), JSON_HEX_QUOT | JSON_HEX_TAG);

        //log_message('debug',print_r($temp));
        $this->load->view('json', $data);
    }

    public function get_starred($page = 1)
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');

        $data['json'] = json_encode($this->get_disp_sent($this->mail_model->get_starred($page)), JSON_HEX_QUOT | JSON_HEX_TAG);

        //log_message('debug',print_r($temp));
        $this->load->view('json', $data);
    }

    public function get_count_inbox()
    {
        $temp = $this->mail_model->get_inbox_count();
        $tmp_ar['count'] = $temp[0]->count;
        $data['json'] = json_encode($tmp_ar);
        $this->load->view('json', $data);
    }

    public function get_count_draft()
    {
        $temp = $this->mail_model->get_draft_count();
        $tmp_ar['count'] = $temp[0]->count;
        $data['json'] = json_encode($tmp_ar);
        $this->load->view('json', $data);
    }

    public function compose_inner()
    {
        if (!$this->session->userdata('isLoggedIn')) redirect('./signin');
        $to = $this->input->post('to');
        $msg_id = $this->encrypt->decode(base64_decode(urldecode($this->input->post('mmessenger'))));
        $body = $this->input->post('body');
        $ar['success']=false;

        log_message('debug', 'compose: ' . $to . $msg_id . $body);
        $response = $this->mail_model->insert_new_inner($this->get_mail_recipients($to), $body, $msg_id);
        if ($response === true) {
            $ar['success']=true;
            $ar['data']='successfully data insereted';
        } else {
            $ar['success']=false;
            $ar['data']=$response;
        }

        log_message('debug', 'compose: ' . print_r($response));
        $this->data['json'] = json_encode($ar);
        $this->load->view('json', $this->data);
    }

    public function seen($id = '')
    {
        $msg_id = $id=$this->encrypt->decode(base64_decode(urldecode($id)));
        $ar['success']=false;
        if($msg_id!='')
            $ar['success']=$this->mail_model->seen($msg_id);
        $data['json']=json_encode($ar);
        $this->load->view('json',$data);
    }

    public function deleter()
    {
        $msg_id = $this->encrypt->decode(base64_decode(urldecode($this->input->post('mmessenger'))));
        $ar['success']=false;
        if($msg_id!='')
            $ar['success']=$this->mail_model->deleter($msg_id);
        $data['json']=json_encode($ar);
        $this->load->view('json',$data);
    }

    function get_disp_thread($mail_msg = null)
    {
        if ($mail_msg == null) {
            return '';
        }

        $temp = array();

        //log_message('debug',"get_disp_sent()");
        //log_message('debug',print_r($mail_msg));
        foreach ($mail_msg as $msg) {

            //log_message('debug',"inside for each of msg");
            //log_message('debug',print_r($msg));
            $msg_id=$msg->msg_id;
            $name=$msg->first_name;
            $email=$msg->email;
            $from_id=$msg->from_id;
            $to=$this->get_sender_reciever($msg->msg_id);
            $txt=$msg->text;
            $utc=$msg->utc;

            $temp[] = $this->convert_array_thread($msg_id, $name, $email, $from_id, $utc, $to, $txt);
        }

        //log_message('debug',print_r($temp));
        return $temp;;
    }

    function get_disp_thread_name($mail_msg=null)
    {
        if ($mail_msg == null) {
            return '';
        }
        return $mail_msg[0]->name;        
    }

    function convert_array_thread($msg_id, $name, $email, $from_id, $utc, $to, $txt)
    {
        return array(
            'messenger' => urlencode(base64_encode($this->encrypt->encode($msg_id))),
            'name' => $name,
            'email' => $email,
            'from'  =>urlencode(base64_encode($this->encrypt->encode($from_id))),
            'utc_time' => $utc,
            'to' => $to,
            'txt' => $txt);
    }

    function get_disp_sent($mail_msg = null)
    {
        if ($mail_msg == null) {
            return '';
        }

        $temp = array();

        //log_message('debug',"get_disp_sent()");
        //log_message('debug',print_r($mail_msg));
        foreach ($mail_msg as $msg) {

            //log_message('debug',"inside for each of msg");
            //log_message('debug',print_r($msg));
            $subject = $this->self_function->mail_get_subject($msg->name, $msg->text);
            $time = $this->self_function->get_disp_time($msg->utc);
            $sender_reciever = $this->get_sender_reciever($msg->msg_id);

            $temp[] = $this->convert_array($msg->thread_id, $sender_reciever, $subject, $time);
        }

        //log_message('debug',print_r($temp));
        return $temp;
    }

    function get_disp_inbox($mail_msg = null)
    {
        if ($mail_msg == null) {
            return '';
        }

        $temp = array();

        //log_message('debug',"get_disp_sent()");
        //log_message('debug',print_r($mail_msg));
        foreach ($mail_msg as $msg) {

            //log_message('debug',"inside for each of msg");
            //log_message('debug',print_r($msg));
            $subject = $this->self_function->mail_get_subject($msg->name, $msg->text);
            $time = $this->self_function->get_disp_time($msg->utc);
            $sender_reciever = $msg->email;

            $temp[] = $this->convert_array($msg->thread_id, $sender_reciever, $subject, $time);
        }

        //log_message('debug',print_r($temp));
        return $temp;
    }

    function get_disp_emailId($emailId = null)
    {
        if ($emailId == null) {
            return '';
        }
        foreach ($emailId as $mail_id) {

            //log_message('debug',"inside for each of mail_id");
            //log_message('debug',print_r($mail_id));
            $email = $mail_id->email;
            $name = $this->self_function->get_disp_name($mail_id->first_name, $mail_id->last_name);

            $temp[] = $this->convert_array_emailId($email, $name);
        }

        //log_message('debug',print_r($temp));
        return $temp;
    }

    function get_sender_reciever($msg_id = 0)
    {

        $temp = '';
        $recepients_user = $this->mail_model->get_recipients($msg_id);
        foreach ($recepients_user as $rec) {
            $temp = $rec->email . '_' . $temp;
            log_message('debug', 'get_sender_reciever: msg_id= ' . $msg_id . ' === ' . $rec->email);
        }
        return $temp;
    }

    function convert_array($thread_id = '', $sender_reciever = '', $subject = '', $time = '', $recipients_id = '', $seen = '')
    {
        return array('sender_reciever' => $sender_reciever, 'subject' => $subject, 'day_time' => $time, 'thread_id' => urlencode(base64_encode($this->encrypt->encode($thread_id))), 'recipients_id' => $recipients_id, 'seen' => $seen);
    }

    function convert_array_emailId($email = '', $name = '')
    {
        return array('email' => $email, 'name' => $name);
    }

    function get_mail_recipients($str)
    {
        $ar = explode('>', $str);
        for ($i = 0; $i + 1 < count($ar); $i++) {
            if(substr($ar[$i], 1)!='')
                $ar[$i] = substr($ar[$i], 1);
            log_message('debug', 'get_recep str: ' . $ar[$i]);
        }
        //log_message('debug','get_recep str: '.$str.' :val: '.print_r($ar));
        return $ar;
    }

    function check_thread_id($id=''){
        if($id==0||$id==''||!is_numeric($id)) return false;
        return true;
    }
}
