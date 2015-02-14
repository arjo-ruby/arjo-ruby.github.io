<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Profile_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->library('self_function');
    }

    function get_profile()
    {
	    $db_stmt = "class, section, grade, roll_no, interest, hobies, favorite_subject, least_favorite_subject, recognitions, teacher_remark
	    	from student
	    	where stu_id=".$this->session->userdata('id');

	    log_message('debug', $db_stmt);
	    $this->db->select($db_stmt, FALSE);
	    return $this->db->get()->row();
	}

	function update_details($interest, $hobies, $favorite_subject, $least_favorite_subject, $recognitions, $teacher_remark)
	{
		$db_stmt="update student set interest='".$interest."', hobies='".$hobies."', favorite_subject='".$favorite_subject."', least_favorite_subject='".$least_favorite_subject."', recognitions='".$recognitions."', teacher_remark='".$teacher_remark."' where stu_id=".$this->session->userdata('id');
        $this->db->query($db_stmt, FALSE);
        //$temp = $this->db->get()->result();
        log_message('debug', "update: " . $this->db->last_query());
        return true;
	} 
}