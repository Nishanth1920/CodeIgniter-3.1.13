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
        // // Check if the user is logged in before loading the view
        if ($this->session->userdata('logged_in')) {
        // $data['users'] = $this->user_model->get_users();
        // Fetch users along with their mobile numbers
        $data['users'] = $this->user_model->get_users_with_mobile();

        //     // Display success message if it exists
            $data['success_message'] = $this->session->flashdata('success_message');

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
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[2]'); // Add password validation rule
        $this->form_validation->set_rules('age', 'Age', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
    
        // Run validation
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, redirect back to the form with validation errors
            $this->load->view('user/adduser');
        } else {
            
            $user_data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'age' => $this->input->post('age'),
                'gender' => $this->input->post('gender'),
                'password' => $this->input->post('password'),
            );
    
            // Prepare data for insertion into usernumber table
            $usernumber_data = array(
                'mobile' => $this->input->post('mobile'),
            );
    
            // Insert user data into database
            $user_id = $this->user_model->insert_user($user_data, $usernumber_data);
    
            if ($user_id) {
                // Set success message
                $this->session->set_flashdata('success_message', 'Record added successfully.');
            } else {
                // Set error message
                $this->session->set_flashdata('error_message', 'Failed to add record.');
            }
    
            // Redirect to user listing page
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
        // Get the username before updating
        $old_user = $this->user_model->get_user($id);
        $old_username = $old_user['username'];

        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'age' => $this->input->post('age'),
            'gender' => $this->input->post('gender'),
            'password' => $this->input->post('password'),
            
        );
        $usernumber_data = array(
            'mobile' => $this->input->post('mobile'),
        );
        $this->user_model->update_user($id, $data,$usernumber_data);

        // Set success message with username
        $this->session->set_flashdata('success_message', 'Record "' . $old_username . '" updated successfully.');

        redirect('user');
    }

    public function delete($id)
    {
        // Get the username before deleting
        $user = $this->user_model->get_user($id);
        $username = $user['username'];

        $this->user_model->delete_user($id);

        // Set success message with username
        $this->session->set_flashdata('success_message', 'Record "' . $username . '" deleted successfully.');

        redirect('user');
    }

}
?>