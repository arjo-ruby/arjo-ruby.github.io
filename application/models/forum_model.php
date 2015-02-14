<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Forum_model extends CI_Model
{

    var $details;

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
        $this->load->library('self_function');

    }

    function get_forum_8($sub = 0, $page = 1, $class = '', $section = '')
    {
        log_message('debug', 'model:get_forum' . ' ' . $sub . ' ' . $page);
        if ($this->self_function->is_student()) {

            $db_stmt = "topic_id, title, txt, email, utc from topic, user where cat_id = " . $sub . " and class=" . $this->session->userdata('class') . " and (section='" . $this->session->userdata('section') . "' or section= '" . $this->self_function->get_all_section() . "') and user.id=topic.ask_id order by topic_id DESC limit 8 offset " . ($page - 1) * 8;
            log_message('debug', $db_stmt);
            $this->db->select($db_stmt, FALSE);
            return $this->db->get()->result();
        } else if ($this->self_function->is_teacher()) {
            $db_stmt = "topic_id, title, txt, email, utc from topic, user where cat_id = " . $sub . " and class=" . $this->session->userdata('class') . " and (section='" . $this->session->userdata('section') . "' or section= '" . $this->self_function->get_all_section() . "') and user.id=topic.ask_id order by topic_id DESC limit 8 offset " . ($page - 1) * 8;
            log_message('debug', $db_stmt);
            $this->db->select($db_stmt, FALSE);
            return $this->db->get()->result();
        }
    }

    function get_tags($topic_id)
    {
        $db_stmt="forum_tags.forum_tag_name as tag_name from forum_tags, forum_tag_refer where forum_tags.forum_tag_id= forum_tag_refer.forum_tag_id and forum_tag_refer.topic_id=".$topic_id;
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    function get_count_comment($topic_id)
    {
        $db_stmt="count(reply_id) as count from reply where reply.topic_id=".$topic_id;
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    function insert_reply($topic_id, $data)
    {
        log_message('debug', 'insert_reply: ' . $topic_id . ' ' . $data);
        $data = array(
            'reply_id' => 0,
            'topic_id' => $topic_id,
            'user_id' => $this->session->userdata('id'),
            'txt' => $data,
            'offset' => 0
        );
        //log_message('debug','lalalal: '.print_r($data));
        $this->db->set('UTC', 'UNIX_TIMESTAMP()', FALSE);
        $db_ret = $this->db->insert('reply', $data);
        log_message('debug', $this->db->last_query());
        if ($db_ret) {
            return 'Data Insertion Error';
        }
    }

    function insert_topic($cat_id, $title, $data)
    {
        log_message('debug', 'insert_topic: ' . $cat_id . ' ' . $data);
        $data = array(
            'topic_id' => 0,
            'class' => $this->session->userdata('class'),
            'section' => 'Z',
            'cat_id' => $cat_id,
            'ask_id' => $this->session->userdata('id'),
            'title' => $title,
            'txt' => $data,
            'open' => 0
        );
        log_message('debug', 'topic: ' . print_r($data));
        $this->db->trans_start();
        $this->db->set('UTC', 'UNIX_TIMESTAMP()', FALSE);
        $db_ret = $this->db->insert('topic', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        if (!$db_ret) {
            return 'Data Insertion Error';
        } else
            return $insert_id;
    }

    function get_forum_topic($topic_id)
    {
        $db_stmt = "utc, email, title, txt, open from topic, user where topic_id = " . $topic_id . " and user.id = ask_id";
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    function get_all_comment_topic($topic_id)
    {
        $db_stmt = "reply_id, user_id, txt, utc, reply.offset, email from user, reply where topic_id =" . $topic_id . " and user.id=reply.user_id";
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    function get_title($data)
    {
        return strtok($data, '.');
    }
}