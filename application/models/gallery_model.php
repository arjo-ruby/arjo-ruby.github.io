<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_model extends CI_Model
{

    private $details;

    public function __construct()
    {
        $this->load->database();
        $this->load->library('self_function');
    }

    function get_links()
    {
        $db_stmt = "gallery_id, url, description
            from gallery_links
            where (class= ".$this->session->userdata('class')." or class = ".$this->self_function->get_all_class().") and
                (section='".$this->session->userdata('section')."' or section='".$this->self_function->get_all_section()."')
                and offset=".$this->self_function->get_weblink_normal_offset();

        log_message('debug', $db_stmt);
        $this->db->select($db_stmt, FALSE);
        return $this->db->get()->result();
    }
}