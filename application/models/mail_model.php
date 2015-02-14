<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mail_model extends CI_Model
{

    var $details;

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
        $this->load->library('self_function');
    }

    //all qil return 20 rows only
    
    function get_inbox($page = 1)
    {
        log_message('debug', 'model:get_inbox_mail_20' . ' ' . $page);

        $db_stmt = "threads.thread_id as thread_id, threads.name, mail_msg.msg_id, mail_msg.text, mail_msg.utc, mail_msg.from_id, user.email, user.first_name
        from
        ( select max(mail_msg. msg_id) as msg_id 
            from mail_msg, threads, recipients 
            where ( recipients.status=" . $this->self_function->get_normal_id() . " or recipients.status=" . $this->self_function->get_starred_id() . " ) and to_id=" . $this->session->userdata('id') . " and mail_msg.msg_id=recipients.msg_id and threads.thread_id=mail_msg.thread_id 
            group by mail_msg.thread_id 
            limit 20 
            offset " . (20 * ($page - 1)) . " ) as m1,
    threads, mail_msg, user
    where m1.msg_id=mail_msg.msg_id and threads.thread_id=mail_msg.thread_id and user.id=mail_msg.from_id
    order by utc DESC";

        $this->db->select($db_stmt, FALSE);
        $temp = $this->db->get()->result();
        log_message('debug', "inbox: " . $this->db->last_query());
        return $temp;
    }

    function get_sent($page = 1)
    {
        $db_stmt = "threads.thread_id as thread_id, threads.name, mail_msg.msg_id, mail_msg.text, mail_msg.utc 
        from 

        ( select max(mail_msg. msg_id) as msg_id 
            from mail_msg, threads 
            where ( mail_msg.status=" . $this->self_function->get_normal_id() . " or mail_msg.status=" . $this->self_function->get_starred_id() . " or mail_msg.status=" . $this->self_function->get_draft_id() . " ) and from_id=" . $this->session->userdata('id') . " and threads.thread_id=mail_msg.thread_id 
            group by mail_msg.thread_id 
            limit 20 
            offset " . (20 * ($page - 1)) . " ) as m1,
    threads, mail_msg 
    where m1.msg_id=mail_msg.msg_id and threads.thread_id=mail_msg.thread_id
    order by utc DESC";
        log_message('debug', 'get_sent ' . $db_stmt);
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    function get_draft($page = 1)
    {
        $db_stmt = "threads.thread_id as thread_id, threads.name, mail_msg.msg_id, mail_msg.text, mail_msg.utc 
        from 
        
        ( select max(mail_msg. msg_id) as msg_id 
            from mail_msg, threads 
            where mail_msg.status=" . $this->self_function->get_draft_id() . " and from_id=" . $this->session->userdata('id') . " and threads.thread_id=mail_msg.thread_id 
            group by mail_msg.thread_id 
            limit 20 
            offset " . (20 * ($page - 1)) . " ) as m1,
    threads, mail_msg 
    where m1.msg_id=mail_msg.msg_id and threads.thread_id=mail_msg.thread_id
    order by utc DESC";
        log_message('debug', $db_stmt);
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    //under thought as process of starred is not defined
    function get_starred($page = 1)
    {
        $db_stmt = "threads.*, mail_msg. msg_id, mail_msg.text, mail_msg.utc from mail_msg, threads, user where from_id=" . $this->session->userdata('id') . " and mail_msg.status=" . $this->self_function->get_starred_id() . " and threads.thread_id=mail_msg.thread_id  group by thread_id having max(utc) limit 20 offset " . (20 * ($page - 1));
        log_message('debug', $db_stmt);
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    function get_emailId($key = '')
    {
        $db_stmt = "email, first_name,  last_name from user where email like '" . $key . "%' or first_name like '" . $key . "%'";
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    function get_thread_data($thread_id = '')
    {
        $db_stmt = "msg_id, from_id, text, first_name, email, utc
            from user, mail_msg
            where
                user.id=mail_msg.from_id and
                thread_id=".$thread_id." and
                mail_msg.status!=".$this->self_function->get_deleted_id()." and
                (from_id=".$this->session->userdata('id')." or
                    msg_id in(select msg_id from recipients where to_id=".$this->session->userdata('id').")
                )
            order by msg_id";

        //log_message('debug',$db_stmt);
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    function get_thread_name($thread_id = '')
    {
        $db_stmt = "name from threads where thread_id=".$thread_id;

        //log_message('debug',$db_stmt);
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    function get_recipients($msg_id = "")
    {
        $db_stmt = "to_id, first_name, email, status from recipients, user where to_id=user.id and msg_id= " . $msg_id;
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    function insert_new($to_arr, $title, $sub)
    {
        log_message('debug', 'insert_reply: ' . $title . ' ' . $sub . ' == ' . print_r($to_arr));
        $this->db->trans_begin();
        $data = array('thread_id' => 0, 'name' => $title);
        $db_ret = $this->db->insert('threads', $data);
        if ($this->db->trans_status() === false) {

            // error, so rollback changes and exit:
            $this->db->trans_rollback();
            return array('error' => $this->db->_error_message());
        }

        $thread_id = $this->db->insert_id();

        //log_message('debug','insert_new thread id: '.$thread_id);
        $data = array('from_id' => $this->session->userdata('id'), 'thread_id' => $thread_id, 'father' => 0, 'text' => $sub, 'status' => $this->self_function->get_normal_id());
        $this->db->set('utc', 'UNIX_TIMESTAMP()', FALSE);
        $db_ret = $this->db->insert('mail_msg', $data);
        if ($this->db->trans_status() === false) {

            // error, so rollback changes and exit:
            $this->db->trans_rollback();
            return array('error' => $this->db->_error_message());
        }

        $msg_id = $this->db->insert_id();

        log_message('debug', 'insert_new thread id: ' . $msg_id);

        foreach ($to_arr as $to_email) {

            //log_message('debug','insert_new individual email: '.$to_email);

            $this->db->select('id');
            $this->db->from('user');
            $this->db->where('email', $to_email);

            $result = $this->db->get()->result();

            //log_message('debug','insert_new last query: '.$this->db->last_query());

            $to = $result[0]->id;

            if ($this->db->trans_status() === false) {

                // error, so rollback changes and exit:
                $this->db->trans_rollback();
                return array('error' => $this->db->_error_message());
            }

            $data = array('rec_id' => 0, 'msg_id' => $msg_id, 'to_id' => $to, 'status' => $this->self_function->get_normal_id(), 'offset' => $this->self_function->get_unread_id());
            $db_ret = $this->db->insert('recipients', $data);

            //log_message('debug','insert_new insert reception last query: '.$this->db->last_query());

            if ($this->db->trans_status() === false) {

                // error, so rollback changes and exit:
                $this->db->trans_rollback();
                return array('error' => $this->db->_error_message());
            }
        }
        $this->db->trans_commit();
        return true;
    }

    function insert_new_inner($to_arr, $sub, $msg_id)
    {
        $this->db->trans_begin();

        $this->db->select('thread_id');
        $query = $this->db->get_where('mail_msg', array('msg_id' => $msg_id))->result();
        if ($this->db->trans_status() === false) {
            return $this->db->_error_message();
        }

        $thread_id = $query[0]->thread_id;

        //log_message('debug','insert_new thread id: '.$thread_id);
        $data = array('from_id' => $this->session->userdata('id'), 'thread_id' => $thread_id, 'father' => $msg_id, 'text' => $sub, 'status' => $this->self_function->get_normal_id());
        $this->db->set('utc', 'UNIX_TIMESTAMP()', FALSE);
        $db_ret = $this->db->insert('mail_msg', $data);
        if ($this->db->trans_status() === false) {

            // error, so rollback changes and exit:
            $this->db->trans_rollback();
            //return array('error' => $this->db->_error_message());
            return $this->db->_error_message();
        }

        $msg_id = $this->db->insert_id();

        log_message('debug', 'insert_new thread id: ' . $msg_id);

        foreach ($to_arr as $to_email) {

            if($to_email!='')
            {
                log_message('debug','insert_new individual email: '.$to_email);

                $this->db->select('id');
                $this->db->from('user');
                $this->db->where('email', $to_email);

                $result = $this->db->get()->result();

                //log_message('debug','insert_new last query: '.$this->db->last_query());

                $to = $result[0]->id;

                if ($this->db->trans_status() === false) {

                    // error, so rollback changes and exit:
                    $this->db->trans_rollback();
                    //return array('error' => $this->db->_error_message());
                    return $this->db->_error_message();
                }

                $data = array('rec_id' => 0, 'msg_id' => $msg_id, 'to_id' => $to, 'status' => $this->self_function->get_normal_id(), 'offset' => $this->self_function->get_unread_id());
                $db_ret = $this->db->insert('recipients', $data);

                //log_message('debug','insert_new insert reception last query: '.$this->db->last_query());

                if ($this->db->trans_status() === false) {

                    // error, so rollback changes and exit:
                    $this->db->trans_rollback();
                    //return array('error' => $this->db->_error_message());
                    return $this->db->_error_message();
                }
            }
        }
        $this->db->trans_commit();
        return true;
    }

    function get_inbox_count()
    {
        $db_stmt = "count(m1.msg_id) as count
        from
        ( select max(mail_msg. msg_id) as msg_id 
            from mail_msg, threads, recipients 
            where ( recipients.offset = ".$this->self_function->get_unread_id()." ) and to_id=" . $this->session->userdata('id') . " and mail_msg.msg_id=recipients.msg_id and threads.thread_id=mail_msg.thread_id 
            group by mail_msg.thread_id ) as m1";

        $this->db->select($db_stmt, FALSE);
        $temp = $this->db->get()->result();
        log_message('debug', "inbox_count: " . $this->db->last_query());
        return $temp;
    }

    public function get_draft_count()
    {
        $db_stmt = "count(m1.msg_id) as count
        from
        ( select max(mail_msg. msg_id) as msg_id 
            from mail_msg, threads 
            where mail_msg.status=" . $this->self_function->get_draft_id() . " and from_id=" . $this->session->userdata('id') . " and threads.thread_id=mail_msg.thread_id 
            group by mail_msg.thread_id) as m1";

        $this->db->select($db_stmt, FALSE);
        $temp = $this->db->get()->result();
        log_message('debug', "inbox_count: " . $this->db->last_query());
        return $temp;
    }

    function seen($thread_id)
    {
        $db_stmt="update recipients set offset=".$this->self_function->get_seen_offset()." where to_id= ".$this->session->userdata('id')." and msg_id in ( select msg_id from mail_msg where thread_id = ".$thread_id.")";
        $this->db->query($db_stmt, FALSE);
        //$temp = $this->db->get()->result();
        log_message('debug', "seen: " . $this->db->last_query());
        return true;
    }

    function deleter($msg_id)
    {
        $db_stmt="update recipients set status=".$this->self_function->get_deleted_id()." where to_id= ".$this->session->userdata('id')." and msg_id =".$msg_id;
        $this->db->query($db_stmt, FALSE);
        //$temp = $this->db->get()->result();
        log_message('debug', "seen: " . $this->db->last_query());

        $db_stmt="update mail_msg set status=".$this->self_function->get_deleted_id()." where from_id= ".$this->session->userdata('id')." and msg_id =".$msg_id;
        $this->db->query($db_stmt, FALSE);
        log_message('debug', "seen: " . $this->db->last_query());
        return true;
    }
}
