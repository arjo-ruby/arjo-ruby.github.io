<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Services_model extends CI_Model
{

    var $details;

    public function __construct()
    {
        $this->load->database();
        $this->config->load('self_config');

    }

    function get_cat_id($sub)
    {
        $query = $this->db->get_where('category', array('sub' => $sub));
        return $query->row_array();
    }

}