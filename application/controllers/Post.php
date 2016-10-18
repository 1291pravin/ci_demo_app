<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    function __construct() {
        parent::__construct();
        $user_id = $this->session->user_id;
        if (!$user_id) {
            redirect('/user/login');
            exit;
        }
    }

    public function index() {
        $user_id = $this->session->user_id;
        $this->load->model('post_model');
        $this->load->library('pagination');
        $config['per_page'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['base_url'] = site_url('post/index');
        $config['total_rows'] = $this->db->where('user_id', $user_id)->count_all_results('tbl_posts');
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';        
        $this->pagination->initialize($config);
        $page_no = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $result = $this->post_model->getPosts($user_id, $config["per_page"], $page_no);
        $this->data['posts'] = $result;
    }

    public function create() {
        $this->applyValidation();
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $post = $this->input->post();
            $this->load->model('post_model');
            $user_id = $this->session->user_id;
            $data = ['title' => $post['title'], 'content' => $post['content'], 'user_id' => $user_id];
            $this->post_model->addPost($data);
            $this->session->set_flashdata('success', 'Post Added Successfully');
            redirect(site_url('/post/index'));
            exit;
        }
    }

    public function edit($id) {
        $result = $this->hasAccess($id);
        $this->applyValidation();
        $this->data['post'] = $result;
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $post = $this->input->post();
            $user_id = $this->session->user_id;
            $data = ['title' => $post['title'], 'content' => $post['content'], 'user_id' => $user_id];
            $this->post_model->updatePost($data, $id);
            $this->session->set_flashdata('success', 'Post Updated Successfully');
            redirect(site_url('/post/index'));
            exit;
        }
    }

    public function delete($id) {
        $this->hasAccess($id);
        $this->load->model('post_model');
        $this->post_model->delete($id);
        $this->session->set_flashdata('success', 'Post Deleted Successfully');
        redirect(site_url('/post/index'));
        exit;
    }
    
    public function view($id) {
        $result = $this->hasAccess($id);
        $this->data['post'] = $result;
        $this->applyValidation();
        
    }

    private function hasAccess($id) {
        $user_id = $this->session->user_id;
        $this->load->model('post_model');
        $result = $this->post_model->getPost($id, $user_id);
        if (!$result) {
            show_404();
            exit;
        }
        return $result;
    }

    private function applyValidation() {
        $this->load->library(['form_validation']);
        $this->form_validation->set_rules('title', 'Post Title', 'required|min_length[6]|max_length[255]');
        $this->form_validation->set_rules('content', 'Post Content', 'trim|required|max_length[2048]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
    }

}
