<?php
// application/controllers/Login.php

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model'); // Load the user model
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            // Form validation passed, attempt to authenticate user
            $username = $this->input->post('username');
            $password = $this->input->post('password');
    
            // Hash the entered password using MD5
            $hashed_password = substr(md5($password), 0, 10);
    
            // Fetch user details from the database
            $user = $this->user_model->get_user_by_username($username);
    
            if ($user) {
                // User found, verify password
                if ($hashed_password === $user->password) {
                    // Password is correct, set session data
                    $userdata = array(
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($userdata);
                    
                    // Redirect to the dashboard or any other page
                    redirect('user');
                } else {
                    // Incorrect password
                    $this->session->set_flashdata('error', 'Invalid password.');
                    redirect('login');
                }
            } else {
                // User not found
                $this->session->set_flashdata('error', 'User not found.');
                redirect('login');
            }
        }
    }
    public function logout() {
        $this->session->sess_destroy(); // Destroy all session data
        redirect('login'); // Redirect to the login page
    }
}


?>
