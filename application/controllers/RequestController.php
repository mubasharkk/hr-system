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

        // check if user is logged in
        // load request model
        $this->load->model('requests');
    }
    
    function index (){
        
        if(!$this->users->isAuthorized()){
            redirect('login');
        }               
                        
        // get all requests list
        $requests = $this->requests->getAll();
        
        // view html header
        $this->load->view('header');
        // show list of requests
        $this->load->view('requests_list', array('requests' => $requests));
        // show html footer
        $this->load->view('footer');
        
        
    }
    
    public function addRequest() {
        
        $hidden = array();

        $this->form_validation->set_rules('display_name', 'Display Name', 'required');
        
        $this->form_validation->set_rules('cnic_number', 'CNIC Number', 'required|exact_length[15]');        
        $this->form_validation->set_rules('office_loc', 'Office Location', 'required');        
        $this->form_validation->set_rules('employee_type', 'Employee Type', 'required');        
        $this->form_validation->set_rules('manager_name', 'Office Location', 'required');        
        $this->form_validation->set_rules('phone', 'Phone (Landline)', 'required');        
        $this->form_validation->set_rules('phone_mobile', 'Phone (Mobile)', 'numeric');        
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required|regex_match[/^[0-3]?[0-9].[0-3]?[0-9].(?:[0-9]{2})?[0-9]{2}$/]');        
        $this->form_validation->set_rules('mail', 'Email', 'valid_email');        
        
        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'office_id' => $this->input->post('office_loc'),
                'display_name' => $this->input->post('display_name'),
                'mail' => $this->input->post('mail'),
                'user_type' => $this->input->post('employee_type'),
                'landline' => $this->input->post('phone'),
                'mobile_phone' => $this->input->post('phone_mobile'),
                'manager_name' => $this->input->post('manager_name'),
                'cnic_number' => $this->input->post('cnic_number'),
                'dob' => $this->input->post('dob'),
                'phone_ext' => $this->input->post('phone_ext'),
            );

            $this->requests->create($data);

            redirect('requests/');
        }


        $this->load->view('header');
        $this->load->view('request_add_form', array('hidden' => $hidden));
        $this->load->view('footer');
    }    
    
    public function reviewRequest($reqId) {
        
        if(!$this->users->isAuthorized()){
            redirect('login');
        }               
                        
        if(!intval($reqId)) redirect ('requests/list');
        
        $request = $this->requests->getById($reqId);
        
        $hidden = array('req_id' => $reqId);

        $this->form_validation->set_rules('display_name', 'Display Name', 'required');
        
        $this->form_validation->set_rules('cnic_number', 'CNIC Number', 'required|exact_length[15]');        
        $this->form_validation->set_rules('office_loc', 'Office Location', 'required');        
        $this->form_validation->set_rules('employee_type', 'Employee Type', 'required');        
        $this->form_validation->set_rules('manager_name', 'Office Location', 'required');        
        $this->form_validation->set_rules('phone', 'Phone (Landline)', 'required');        
        $this->form_validation->set_rules('phone_mobile', 'Phone (Mobile)', 'integer');        
        $this->form_validation->set_rules('mail', 'Email', 'valid_email');        
        
        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'office_id' => $this->input->post('office_loc'),
                'display_name' => $this->input->post('display_name'),
                'mail' => $this->input->post('mail'),
                'user_type' => $this->input->post('employee_type'),
                'landline' => $this->input->post('phone'),
                'mobile_phone' => $this->input->post('phone_mobile'),
                'manager_name' => $this->input->post('manager_name'),
                'cnic_number' => $this->input->post('cnic_number'),
                'phone_ext' => $this->input->post('phone_ext'),
            );

            $this->requests->create($data);

            redirect('requests/');
        }


        $this->load->view('header');
        $this->load->view('request_review_form', array('hidden' => $hidden, 'req' => $request));
        $this->load->view('footer');
    }    
}
