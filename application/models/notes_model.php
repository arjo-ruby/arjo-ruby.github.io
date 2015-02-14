<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Notes_model extends CI_Model
{

    var $details;

    public function __construct()
    {
        $this->load->database();
        $this->load->library('self_function');

    }

    function get_notes_8($sub = 0, $page = 1)
    {
        log_message('debug', 'model:get_notes' . ' ' . $sub . ' ' . $page);
        if ($this->self_function->is_student()) {

            $db_stmt = "notes.notes_id, notes.txt from notes where class = " . $this->session->userdata('class') . " and ( notes.section = '" . $this->self_function->get_all_section() . "' or notes.section = '" . $this->session->userdata('section') . "') and cat_id= " . $sub . " and utc_valid > UNIX_TIMESTAMP() order by notes_id limit 8 offset " . ($page - 1) * 8;

            log_message('debug', $db_stmt);
            $this->db->select($db_stmt, FALSE);
            return $this->db->get()->result();
        } else if ($this->self_function->is_student()) {
            log_message('debug', 'model:get_subject=teacher');
        }
    }

}