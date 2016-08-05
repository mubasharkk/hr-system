<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author mubasharkk
 */
class HomeController extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
    }
    
    
    function index(){
        
        if($this->users->isAuthorized()){
            redirect('requests');
        }
        
        
        
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

            $this->form_validation->set_message('username', 'Username or Password is invalid!');
            
        if ($this->form_validation->run() == TRUE) {
            
            
            $user = $this->users->checkLogin(
                    $this->input->post('username'),
                    $this->input->post('password'));
            
            if($user){
                
                $this->session->set_userdata((array) $user);
                
                redirect('requests');
            }

        }        
        
        $this->load->view('header');
        $this->load->view('user_login');
        $this->load->view('footer');
        
    }
    
    function logout(){
        
        $this->session->sess_destroy();

        redirect('login');
    }
}
