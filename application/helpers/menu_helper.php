<?php

function createMenu() {
    $menus[] = ['label' => 'home', 'link' => '/welcome/index'];
    if (isLoggedIn()) {
        $menus[] = ['label' => 'My Post', 'link' => '/post/index'];
        $menus[] = ['label' => 'Add Post', 'link' => '/post/create'];
        $menus[] = ['label' => 'Logout', 'link' => '/user/logout'];
    } else {
        $menus[] = ['label' => 'Register', 'link' => '/user/register'];
        $menus[] = ['label' => 'Login', 'link' => '/user/login'];
    }
    return $menus;
}

function isLoggedIn() {
    $CI = &get_instance();
    $CI->load->library('session');
    if (isset($_SESSION['is_logged_in']) && !empty($_SESSION['is_logged_in'])) {
        return TRUE;
    }
    return false;
}

function addActiveClass($menu_link) {
    $CI = get_instance();
    $class = $CI->router->fetch_class();
    $method = $CI->router->fetch_method();
    $link = '/' . $class . '/' . $method;
    return ($link == $menu_link) ? 'active' : '';
}
