<?php

// Контроллер
class controller {

    protected $user;
    protected $page;

    function __construct() {
        $this->user = new user;
        $this->page = new page($this->user);
    }

    public function index() {
        require 'methods/' . __FUNCTION__ . '.php';
    }

    public function login() {
        require 'methods/' . __FUNCTION__ . '.php';
    }

    public function logout() {
        require 'methods/' . __FUNCTION__ . '.php';
    }

    public function notfound() {
        require 'methods/' . __FUNCTION__ . '.php';
    }

    public function phones() {
        require 'methods/' . __FUNCTION__ . '.php';
    }
    
    public function add_phone() {
        require 'methods/' . __FUNCTION__ . '.php';
    }
    
    public function edit_phone() {
        require 'methods/' . __FUNCTION__ . '.php';
    }
    
    public function delete_phone() {
        require 'methods/' . __FUNCTION__ . '.php';
    }
    
    public function refs() {
        require 'methods/' . __FUNCTION__ . '.php';
    }
    
    public function ref() {
        require 'methods/' . __FUNCTION__ . '.php';
    }
    
    public function add_ref_item() {
        require 'methods/' . __FUNCTION__ . '.php';
    }
    
    public function edit_ref_item() {
        require 'methods/' . __FUNCTION__ . '.php';
    }
    
    public function status() {
        require 'methods/' . __FUNCTION__ . '.php';
    }
    
    public function delete_ref_item() {
        require 'methods/' . __FUNCTION__ . '.php';
    }
}
