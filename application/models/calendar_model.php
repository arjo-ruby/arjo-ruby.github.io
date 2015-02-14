<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Calendar_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->library('self_function');
    }

    public function get_assignment_date($monthyear)
    {
        $db_stmt = "FROM_UNIXTIME(utc_in,'%e') as date from assignment where class = " . $this->session->userdata('class') . " and ( section = '" . $this->self_function->get_all_section() . "' or assignment.section = '" . $this->session->userdata('section') . "') and FROM_UNIXTIME(utc_in,'%M, %Y') = '" . $monthyear . "'";
        $this->db->select($db_stmt, FALSE);
        log_message('debug', $db_stmt);
        return $this->db->get()->result();
    }

    public function get_notes_date($monthyear)
    {
        $db_stmt = "FROM_UNIXTIME(utc_in,'%e') as date from notes where class = " . $this->session->userdata('class') . " and ( section = '" . $this->self_function->get_all_section() . "' or notes.section = '" . $this->session->userdata('section') . "') and FROM_UNIXTIME(utc_in,'%M, %Y') = '" . $monthyear . "'";
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }

    public function get_assign_count($cat_id)
    {
        $db_stmt = "count(assign_id) as count
                    from assignment
                    where class = ".$this->session->userdata('class')." and
                    (
                        section = '".$this->session->userdata('section')."' or section = '".$this->self_function->get_all_section()."'
                    ) and
                    cat_id= ".$cat_id." and
                    assign_id not in
                        (
                            select assign_id
                            from assign_seen_student
                            where student_id = ".$this->session->userdata('id')."
                        )";
        $this->db->select($db_stmt, FALSE);
        log_message('debug', $db_stmt);
        return $this->db->get()->row();
    }

    public function get_notes_count($cat_id)
    {
        $db_stmt = "count(notes_id) as count
                    from notes
                    where class = ".$this->session->userdata('class')." and
                    (
                        section = '".$this->session->userdata('section')."' or section = '".$this->self_function->get_all_section()."'
                    ) and
                    cat_id= ".$cat_id." and
                    notes_id not in
                        (
                            select notes_id
                            from notes_seen_student
                            where student_id = ".$this->session->userdata('id')."
                        )";
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->row();
    }
}