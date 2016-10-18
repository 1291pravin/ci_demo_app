<?php

class Post_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getPosts($user_id, $per_page, $page_number) {
        $limit = $per_page;
        $offset = $page_number > 0 ? ($page_number - 1) * $per_page : 0;
        $this->db->where('user_id', $user_id)->limit($limit)->offset($offset);
        $query = $this->db->get('tbl_posts');
        $return_data = [];
        foreach ($query->result() as $row) {
            $return_data[] = $row;
        }
        return $return_data;
    }

    public function addPost($data) {
        $data['insert_ts'] = date('Y-m-d h:i:s');
        $this->db->insert('tbl_posts', $data);
    }

    public function getPost($id, $user_id) {
        $this->db->where('id', $id)->where('user_id', $user_id);
        $query = $this->db->get('tbl_posts');
        $return_data = [];
        foreach ($query->result() as $row) {
            $return_data = $row;
        }
        return $return_data;
    }

    public function updatePost($data, $id) {
        $this->db->where('id', $id)->update('tbl_posts', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id)->delete('tbl_posts');
    }
    

}
