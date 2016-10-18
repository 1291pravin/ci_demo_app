<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AddView {

    protected $ci;

    public function __construct() {
        global $CI;
        $this->ci = $CI;
    }

    public function appendView() {
        if (!isset($this->ci->page_loded)) {
            $data = isset($this->ci->data) ? $this->ci->data : [];
            $this->ci->load->view('common/header.php');
            $this->ci->load->view('common/menu');
            $class = $this->ci->router->fetch_class();
            $method = $this->ci->router->fetch_method();           
            $this->ci->load->view($class . '/' . $method,$data);
            $this->ci->load->view('common/footer');
        }
    }

}
