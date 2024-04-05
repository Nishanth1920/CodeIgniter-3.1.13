<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function get_user_by_username($username)
    {
        $query = $this->db->get_where('userdetails', array('username' => $username));
        return $query->row(); // Return the first row as object
    }

    public function get_users_with_mobile()
    {
        // Perform a join query to fetch user details along with their mobile numbers
        $this->db->select('userdetails.*, usernumber.mobile');
        $this->db->from('userdetails');
        $this->db->join('usernumber', 'usernumber.num_id = userdetails.id', 'left');
        return $this->db->get()->result_array();
    }


    public function insert_user($user_data, $usernumber_data)
    {
        // Hash the password using MD5 and take the first 10 characters
        $user_data['password'] = substr(md5($user_data['password']), 0, 10);

        // Insert user details into userdetails table
        if ($this->db->insert('userdetails', $user_data)) {
            $user_id = $this->db->insert_id();

            // Insert mobile number into usernumber table only if it's provided
            if (isset($usernumber_data['mobile'])) {
                $usernumber_data['num_id'] = $user_id;
                // Set the num_id to the user_id

                if (!$this->db->insert('usernumber', $usernumber_data)) {
                    // If insertion into usernumber fails, delete the inserted user from userdetails table
                    $this->db->where('id', $user_id);
                    $this->db->delete('userdetails');
                    return false;
                }
            }

            return $user_id;
        } else {
            return false; // Return false if insertion into userdetails fails
        }
    }


    public function get_user($id)
{
    // Select user details and mobile number using a join query
    $this->db->select('userdetails.*, usernumber.mobile');
    $this->db->from('userdetails');
    $this->db->join('usernumber', 'usernumber.num_id = userdetails.id', 'left');
    $this->db->where('userdetails.id', $id);
    $query = $this->db->get();
    
    // Check if a record is found
    if ($query->num_rows() > 0) {
        return $query->row_array(); // Return user details as an array
    } else {
        return false; // Return false if user not found
    }
}


    public function update_user($id, $data,$usernumber_data)
{
    // echo("hello");
    // exit;

    // Hash the password before updating it in the database if it's provided
    if (isset($data['password'])) {
        $data['password'] = substr(md5($data['password']), 0, 10);
    }

    // Check if mobile number is provided for update
    if (isset($usernumber_data['mobile'])) {
        // Update mobile number in usernumber table
        // $data1 = array(
        //     'mobile' => $usernumber_data['mobile']
        // );
        
        $this->db->where('num_id', $id);
        $this->db->update('usernumber', $usernumber_data);
    }

    // Update user details in userdetails table
    $this->db->where('id', $id);
    return $this->db->update('userdetails', $data);
}



    public function delete_user($id)
    {
        // Check if there are related records in usernumber table
        $this->db->where('num_id', $id);
        $this->db->from('usernumber');
        $num_rows = $this->db->count_all_results();

        if ($num_rows > 0) {
            // Delete related records in usernumber table first
            $this->db->where('num_id', $id);
            $this->db->delete('usernumber');
        }

        // Delete the user from userdetails table
        $this->db->where('id', $id);
        return $this->db->delete('userdetails');
    }

}

?>