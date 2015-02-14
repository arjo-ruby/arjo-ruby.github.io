<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Notice_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->library('self_function');
    }

    function insert_notice($class, $section, $txt, $utc_in, $utc_valid)
    {
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'class' => $class,
            'section' => $section,
            'txt' => $txt,
            'utc_in' => $utc_in,
            'utc_valid' => $utc_valid
        );
        $this->db->insert('notice', $data);
        if ($this->db->affected_rows() == 0)
            return false;
        return true;
    }

    function get_notice()
    {
        if ($this->self_function->is_student()) {
            $db_stmt = "txt, utc_in from notice where (class=" . $this->self_function->get_all_class() . " or (class=" . $this->session->userdata('class') . " and(section = '" . $this->self_function->get_all_section() . "' or section='" . $this->session->userdata('section') . "'))) and UNIX_TIMESTAMP() < utc_valid";
            $this->db->select($db_stmt, FALSE);
            log_message('debug', 'model:get_notice= ' . $db_stmt);
            return $this->db->get()->result();
        } else if ($this->self_function->is_teacher()) {
            $db_stmt = "class, section, txt, utc_in from notice where UNIX_TIMESTAMP()< utc_valid";
            $this->db->select($db_stmt, FALSE);
            log_message('debug', 'model:get_notice= ' . $db_stmt);
            return $this->db->get()->result();
        }
    }

}