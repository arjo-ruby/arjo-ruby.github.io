<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Wizquiz_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
        $this->load->library('self_function');
    }


    function insert_seen_question($ques_id = '')
    {

        $data = array(
            'ques_id' => $ques_id,
            'user_id' => $this->session->userdata('id')
        );
        $this->db->insert('seen_question', $data);
        log_message('debug', $this->db->last_query());
        return true;
    }

    function insert_question($cat_id, $question, $option_a, $option_b, $option_c, $option_d, $answer, $level)
    {

        $data = array(
            'ques_id' => 0,
            'cat_id' => $cat_id,
            'class' => $this->session->userdata('class'),
            'ques_txt' => $question,
            'option1' => $option_a,
            'option2' => $option_b,
            'option3' => $option_c,
            'option4' => $option_d,
            'answer' => $answer,
            'ques_level' => $level
        );
        $this->db->insert('question', $data);
        log_message('debug', $this->db->last_query());
        return true;
    }

    function get_question($cat_id)
    {
        $temp = false;

        $this->db->trans_begin();
        $db_stmt = " ques_id, ques_txt, option1, option2, option3, option4, answer from
            question where ques_level=" . $this->session->userdata('level') . " and
            cat_id=".$cat_id." and
            class=".$this->session->userdata('class')." and
            ques_id not in 
                (
                    select ques_id
                    from seen_question
                    where user_id=" . $this->session->userdata('id') . "
                )
            limit 1";
        log_message('debug', "get_question: " . $db_stmt);
        $this->db->select($db_stmt, FALSE);

        $temp = $this->db->get()->result();
        if ($this->db->trans_status() === false) {

            // error, so rollback changes and exit:
            $this->db->trans_rollback();
            return array('error' => $this->db->_error_message());
        }

        $data = array(
            'ques_id' => $temp[0]->ques_id,
            'user_id' => $this->session->userdata('id')
        );
        $this->db->insert('seen_question', $data);

        log_message('debug', $this->db->last_query());

        if ($this->db->trans_status() === false) {

            // error, so rollback changes and exit:
            $this->db->trans_rollback();
            return array('error' => $this->db->_error_message());
        }
        $this->db->trans_commit();
        return $temp;
    }

    function insert_grade($cat_id, $grade)
    {
        $data = array(
            'wizquiz_grade_id' => 0,
            'user_id' => $this->session->userdata('id'),
            'grade' => $grade,
            'cat_id' => $cat_id
        );

        $this->db->set('UTC', 'UNIX_TIMESTAMP()', FALSE);
        $db_ret = $this->db->insert('wizquiz_gradebook', $data);
        log_message('debug', $this->db->last_query());
        if ($db_ret) {
            return 'could not insert';
        }
    }
}