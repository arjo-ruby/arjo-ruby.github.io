<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model
{

    private $details;

    public function __construct()
    {
        $this->load->database();
        $this->load->library('self_function');
    }

    function get_class_sec()
    {

        $db_stmt = "class, section from student where stu_id = " . $this->session->userdata('id');
        $this->db->select($db_stmt, TRUE);
        return $this->db->get()->result();

    }

    function get_subject()
    {
        //log_message('debug','home_model: inside get_subject()');
        //log_message('debug',$this->session->userdata('offset').'------'.$this->config->item('student'));
        if ($this->self_function->is_student()) {
            $db_stmt = "category.cat_id, sub from subject, category where category.cat_id=subject.cat_id and
			class = " . $this->session->userdata('class');
            $this->db->select($db_stmt, FALSE);
            return $this->db->get()->result();
        } else if ($this->self_function->is_teacher()) {
            log_message('debug', 'model:get_subject=teacher');
            $db_stmt = "class, section, teacher.cat_id, sub from category, teacher where teacher.tea_id=" . $this->session->userdata("id") . " and category.cat_id=teacher.cat_id";
            $this->db->select($db_stmt, FALSE);
            return $this->db->get()->result();
        }
    }
}