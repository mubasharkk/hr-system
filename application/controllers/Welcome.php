<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

        $users = $this->users->getAll();


        $this->load->view('header');
        $this->load->view('main', array('users' => $users));
        $this->load->view('footer');
    }

    public function insertUser($uid = NULL) {

        $user = (object) array(
                    'display_name' => NULL,
                    'username' => NULL,
                    'mail' => NULL,
        );

        $hidden = array();

        if (!empty($uid)) {
            $this->form_validation->set_rules('uid', NULL, 'required');

            $hidden['uid'] = $uid;

            $user = $this->users->getById($uid);
        } else {
            $this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');            
            $this->form_validation->set_rules('mail', 'Email', 'is_unique[users.mail]');            
        }


        $this->form_validation->set_rules('display_name', 'Display Name', 'required');
        
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[16]');        
        
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == TRUE) {


            if($this->input->post('uid')) {
                $data = array(
                    'username' => $this->input->post('username'),
                    'display_name' => $this->input->post('display_name'),
                    'mail' => $this->input->post('mail'),
                    'password' => $this->input->post('password'),
                );

                $this->users->update($this->input->post('uid'), $data);
            } else {
                $data = array(
                    'username' => $this->input->post('username'),
                    'display_name' => $this->input->post('display_name'),
                    'mail' => $this->input->post('mail'),
                    'password' => $this->input->post('password'),
                );

                $this->users->create($data);
            }

            redirect('/');
        }


        $this->load->view('header');
        $this->load->view('user_add_form', array('user' => $user, 'hidden' => $hidden));
        $this->load->view('footer');
    }

}
