<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Gradebook_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->library('self_function');
    }

    public function get_grade_assignment($cat_id)
    {
	    $db_stmt = "marks as grade, utc, assignment.txt, assignment.assign_id
	    	from assign_student, assignment
	    	where stu_id=".$this->session->userdata('id')." and
	    	assign_student.assign_id=assignment.assign_id and
	    	assignment.utc_valid < UNIX_TIMESTAMP() and
	    	assignment.cat_id=".$cat_id." and
	    	COALESCE(marks, '') != ''
	    	order by assignment.assign_id";

	    log_message('debug', $db_stmt);
	    $this->db->select($db_stmt, FALSE);
	    return $this->db->get()->result();
	}

	public function get_grade_wizquiz($cat_id)
    {
	    $db_stmt = "utc, grade
	    	from wizquiz_gradebook
	    	where user_id=".$this->session->userdata('id')." and
	    	cat_id=".$cat_id."
	    	order by wizquiz_grade_id";

	    log_message('debug', $db_stmt);
	    $this->db->select($db_stmt, FALSE);
	    return $this->db->get()->result();
	}

	public function get_grade_classroom($cat_id)
    {
    	return false;
	    $db_stmt = "";

	    log_message('debug', $db_stmt);
	    $this->db->select($db_stmt, FALSE);
	    return $this->db->get()->result();
	}
}