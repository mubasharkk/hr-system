<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RequestController
 *
 * @author mubasharkk
 */
class RequestController extends CI_Controller{
    
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('requests');
    }
    
    function index (){
        
        
        $requests = $this->requests->getAll();
        
        $this->load->view('header');
        $this->load->view('requests_list', array('requests' => $requests));
        $this->load->view('footer');
        
        
    }
    
    public function addRequest() {
        
        $hidden = array();

        $this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');            
        $this->form_validation->set_rules('mail', 'Email', 'is_unique[users.mail]');            
        $this->form_validation->set_rules('display_name', 'Display Name', 'required');
        
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[16]');        
        
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == TRUE) {


            $data = array(
                'username' => $this->input->post('username'),
                'display_name' => $this->input->post('display_name'),
                'mail' => $this->input->post('mail'),
                'password' => $this->input->post('password'),
            );

            $this->users->create($data);

            redirect('requests/');
        }


        $this->load->view('header');
        $this->load->view('request_add_form', array('hidden' => $hidden));
        $this->load->view('footer');
    }    
}
