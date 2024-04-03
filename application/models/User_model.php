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

    public function get_users()
    {
        return $this->db->get('userdetails')->result_array();
    }

    public function insert_user($data)
    {
        // Hash the password using MD5 and take the first 10 characters
        $data['password'] = substr(md5($data['password']), 0, 10);

        if ($this->db->insert('userdetails', $data)) {
            return $this->db->insert_id();
        } else {
            return false; // Return false if insertion fails
        }
    }


    public function get_user($id)
    {
        $query = $this->db->get_where('userdetails', array('id' => $id));
        return $query->row_array(); // Return row as array
    }

    public function update_user($id, $data)
{
    // Hash the password before updating it in the database if it's provided
    if (isset($data['password'])) {
        $data['password'] = substr(md5($data['password']), 0, 10);
    }

    $this->db->where('id', $id);
    return $this->db->update('userdetails', $data);
}


    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('userdetails');
    }
}

?>