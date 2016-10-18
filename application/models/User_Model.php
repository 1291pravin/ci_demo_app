<?php

class User_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_data($data) {
        $data['insert_ts'] = date('Y-m-d h:i:s');
        $this->db->insert('tbl_user', $data);
    }

    public function validateEmailPassword($email, $password) {
        $this->db->where('email', $email);
        $password = md5($password);
        $this->db->where('password', $password);
        $this->db->from('tbl_user');
        $this->db->select('id');
        $query = $this->db->get();
        $count = $query->num_rows();
        if ($count == 0) {
            return false;
        } else {
            $result = $query->result();
            return $result[0]->id;
        }
    }

}
