<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Assignment_model extends CI_Model
{

    var $details;

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
        $this->load->library('self_function');

    }

    function get_assignment_8($sub = 0, $page = 1)
    {
        log_message('debug', 'model:get_assignment' . ' ' . $sub . ' ' . $page);
        if ($this->self_function->is_student()) {

            $db_stmt = "assign.assign_id , assign.txt , assign.utc_in, assign_student.utc as submit_date from 
                (
                    select assignment.assign_id , assignment.utc_in, assignment.txt from
                    assignment where
                    class =" . $this->session->userdata('class') . " and
                    (
                        section ='" . $this->config->item('all_section') . "' or section ='" . $this->session->userdata('section') . "') and
                        cat_id=" . $sub . " and utc_valid > UNIX_TIMESTAMP()
                    )
                    as assign left outer join assign_student on assign.assign_id=assign_student.assign_id
                    order by assign.assign_id DESC";

            log_message('debug', $db_stmt);
            $this->db->select($db_stmt, FALSE);
            return $this->db->get()->result();
        } else if ($this->self_function->is_teacher()) {
            log_message('debug', 'model:get_subject=teacher');
        }
    }

    function insert_assign($assign_id)
    {
        $data = array(
            'assign_id' => $assign_id,
            'stu_id' => $this->session->userdata('id')
        );
        $this->db->set('UTC', 'UNIX_TIMESTAMP()', FALSE);
        $db_ret = $this->db->insert('assign_student', $data);
        if ($db_ret) {
            return 'File was upload earlier';
        }
    }


}