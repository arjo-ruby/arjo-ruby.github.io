<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Weblinks_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->library('self_function');
    }

    function get_links($cat_id)
    {
	    $db_stmt = "link_id, url, description
	    	from links
	    	where (class= ".$this->session->userdata('class')." or class = ".$this->self_function->get_all_class().") and
	    		(section='".$this->session->userdata('section')."' or section='".$this->self_function->get_all_section()."')
	    		and cat_id=".$cat_id."
	    		and offset=".$this->self_function->get_weblink_normal_offset();

	    log_message('debug', $db_stmt);
	    $this->db->select($db_stmt, FALSE);
	    return $this->db->get()->result();
	}

	function delete_link($id)
	{
		$data = array(
               'offset' => $this->self_function->get_weblink_delete_offset(),
            );

	    $this->db->where('link_id', $id);
	    $response=$this->db->update('links', $data); 
	    return $response;
	}

	function insert_link($cat_id, $desciption, $link)
	{
		$data = array(
            'cat_id' => $cat_id,
            'class' => $this->session->userdata('class'),
            'section' => $this->session->userdata('section'),
            'url' => $link,
            'description' => $desciption,
            'offset' => $this->self_function->get_weblink_normal_offset()
        );
        $db_ret = $this->db->insert('links', $data);
        log_message('debug', $this->db->last_query());
        if ($db_ret) {
            return true;
        }
        return false;
	}
}