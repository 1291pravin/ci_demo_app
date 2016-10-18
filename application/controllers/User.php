<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    

    /*
     * Registration Page for User to Register.
     */

    public function register() {
        $this->load->library(['form_validation']);
        $this->load->database();
        $this->form_validation->set_rules('firstName', 'First Name', 'required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $post = $this->input->post();
            $data = ['first_name' => $post['firstName'], 'last_name' => $post['lastName'], 'email' => $post['email'], 'password' => md5($post['password'])];
            $this->load->model('user_model');
            $this->user_model->insert_data($data);
            redirect(site_url('/user/thankyou'));
            exit;
        }
    }

    /*
     * Thank you page for user. This page is called after User Registration is successfull.
     */

    public function thankyou() {
        
    }

    /*
     * Loging Page for User.
     */

    public function login() {
        $this->load->library(['form_validation']);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $post = $this->input->post();
            $this->load->model('user_model');
            $result = $this->user_model->validateEmailPassword($post['email'], $post['password']);            
            if ($result) {
                $this->session->set_userdata(['is_logged_in' => 1, 'email' => $post['email'], 'user_id' => $result]);
                redirect(site_url('/post/index'));
                exit;
            } else {
                $this->page_loded = true;
                $data = ['error' => 'User Name and Password Do Not Match'];
                $this->load->view('common/header.php');
                $this->load->view('common/menu');
                $this->load->view(__CLASS__ . '/' . __FUNCTION__, $data);
                $this->load->view('common/footer');
            }
        }
    }

    public function logout() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect(site_url('welcome/index'));
    }

}
