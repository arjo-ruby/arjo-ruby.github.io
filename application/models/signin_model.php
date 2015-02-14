<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Signin_model extends CI_Model
{

    private $details;

    public function __construct()
    {
        $this->load->database();
    }

    function validate_user($email = '', $password = '')
    {
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $login = $this->db->get()->result();


        // The results of the query are stored in $login.
        // If a value exists, then the user account exists and is validated
        if (is_array($login) && count($login) == 1) {
            // Set the users details into the $details property of this class
            $this->details = $login[0];
            // Call set_session to set the user's session vars via CodeIgniter

            $this->set_session();
            log_message('debug', 'TRUE returning');
            return true;
        } else {
            log_message('debug', 'false returning');
            return false;
        }
    }

    function set_session()
    {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.


        $this->session->set_userdata(array(
                'name' => $this->details->first_name . ' ' . $this->details->last_name,
                'email' => $this->details->email,
                'isLoggedIn' => true,
                'id' => $this->details->id,
                'offset' => $this->details->offset
            )
        );
    }
}