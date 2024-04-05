<?php
// application/controllers/Login.php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model'); // Load the user model
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            // Form validation passed, check for empty input fields
            $username = $this->input->post('username');
            $password = $this->input->post('password');


            if (empty($username) || empty($password)) {
                // Input fields are empty
                $response = array('success' => false, 'error' => 'Input fields are empty.');
                echo json_encode($response);
            } else {
                // Hash the entered password using MD5
                $hashed_password = substr(md5($password), 0, 10);
                //     echo $hashed_password;
                // exit();

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

                        // Send success response
                        $response = array('success' => true);
                        echo json_encode($response);
                    } else {
                        // Incorrect password
                        $response = array('success' => false, 'error' => 'Invalid password.');
                        echo json_encode($response);
                    }
                } else {
                    // User not found
                    $response = array('success' => false, 'error' => 'User not found.');
                    echo json_encode($response);
                }
            }
        }
    }

    public function ajax_login()
    {
        // Call the index method for handling AJAX login requests
        $this->index();
    }

    public function logout()
    {
        $this->session->sess_destroy(); // Destroy all session data
        redirect('login'); // Redirect to the login page
    }
}
?>