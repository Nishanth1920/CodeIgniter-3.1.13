<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->helper('form');

        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('login'); // Redirect to the login page if not logged in
        }
    }

    public function index()
    {
        // Check if the user is logged in before loading the view
        if ($this->session->userdata('logged_in')) {
            $data['users'] = $this->user_model->get_users();
            $this->load->view('user/index', $data);
        } else {
            redirect('login'); // Redirect to the login page if not logged in
        }
    }

    public function create()
    {
        // $this->load->view('theme/header');
        $this->load->view('user/adduser');
    }

    public function store()
    {
        // Load form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');

        // Run validation
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, redirect back to the form with validation errors
            $this->load->view('user/adduser');
        } else {
            // Validation passed, proceed with storing data
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'age' => $this->input->post('age'),
                'gender' => $this->input->post('gender'),
                'password' => $this->input->post('password'), // Remove the extra $
            );
            $this->user_model->insert_user($data);
            redirect('user');
        }
    }





    public function edit($id)
    {
        $data['user'] = $this->user_model->get_user($id);
        $this->load->view('user/edit', $data);
    }

    public function update($id)
    {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            // 'mobile' => $this->input->post('mobile'),
            'age' => $this->input->post('age'),
            'gender' => $this->input->post('gender'),
            'password' => $this->input->post('password'),
        );
        $this->user_model->update_user($id, $data);
        redirect('user');
    }

    public function delete($id)
    {
        $this->user_model->delete_user($id);
        redirect('user/index');
    }
}
?>