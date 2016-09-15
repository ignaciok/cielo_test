<?php
 
class User_model extends CI_Model
{
    function __construct()
    {
       parent::__construct();
	   $this->load->database();
    }
    
    // Get User by idx
    function get_user($idx)
    {
        return $this->db->get_where('users',array('idx'=>$idx))->row_array();
    }
    
    // Get all Users
    function get_all_users()
    {
        return $this->db->get('users')->result_array();
    }
    
    // Count all Users
    function count_all_users()
    {
        return $this->db->count_all('users');
    }	
	
    // Get Users with limit
    function get_x_users($limit_perpage, $offset)
    {
        $this->db->limit($limit_perpage, $offset);
		return $this->db->get('users')->result_array();
    }
	
	
    // Add New User
    function add_user($params)
    {
		
        $this->db->insert('users',$params);
        return $this->db->insert_id();
    }


    // Update User
    function update_user($idx,$params)
    {
        $this->db->where('idx',$idx);
        $response = $this->db->update('users',$params);
        if($response)
        {
            return "User updated successfully";
        }
        else
        {
            return "An error has occurred updating the user";
        }
    }
    
    // Delete User
    function delete_user($idx)
    {
        $response = $this->db->delete('users',array('idx'=>$idx));
        if($response)
        {
            return "User has beeen deleted successfully";
        }
        else
        {
            return "An error occurred while deleting the user";
        }
    }
}

?>