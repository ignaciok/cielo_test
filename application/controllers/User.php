<?php

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Session Lib used for messaging
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->helper('url_helper');
    }
    
    // List Users
    function index()
    {
		// Pagination
        $this->load->library('pagination');
        $config                = array();
        $config['total_rows']  = $this->User_model->count_all_users();
        $config['uri_segment'] = 3;
        $config["base_url"]    = base_url() . "index.php/user/index";
        $config['per_page']    = 5;
        // Bootstrap pagination class integration
        $config['full_tag_open']   = '<ul class="pagination">';
        $config['full_tag_close']  = '</ul>';
        $config['first_link']      = false;
        $config['last_link']       = false;
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link']       = '&laquo';
        $config['prev_tag_open']   = '<li class="prev">';
        $config['prev_tag_close']  = '</li>';
        $config['next_link']       = '&raquo';
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
		// End Bootstrap pagination class integration	
        $this->pagination->initialize($config);
        
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['pagination'] = $this->pagination->create_links();
        $data['users']      = $this->User_model->get_x_users($config['per_page'], $offset);
        $data['title']      = 'User List';
        $data['subtitle']   = 'All Users';
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
        
    }
    
    // Add a new user 
    function add()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('first_name', 'First Name', 'min_length[2]|max_length[60]|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'min_length[2]|max_length[60]|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|callback_check_date|required');
        $this->form_validation->set_rules('email', 'Email', 'max_length[100]|valid_email|required|is_unique[users.email]');
        $this->form_validation->set_message('is_unique', 'The e-mail is registered to another user');
        
        if ($this->form_validation->run()) {
            $params = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'dob' => date("Y-m-d", strtotime($this->input->post('dob'))),
                'email' => $this->input->post('email'),
                'favorite_color' => $this->input->post('favorite_color')
            );
            
            $user_id = $this->User_model->add_user($params);
            
            $this->session->set_flashdata('message', 'User created successfully');
            $this->session->set_flashdata('color', 'success');
            redirect('user/index', $data);
        } else {
            $data['validate_user'] = true;
            $data['dob_format']    = true;
            $data['color_format']  = true;
            $data['title']         = 'Add User';
            $this->load->view('templates/header', $data);
            $this->load->view('user/add', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    
    // Add a New user (Ajax)
    function add_ajax()
    {
        $this->load->library('form_validation');
        $data['validate_user']      = false;
        $data['validate_user_ajax'] = true;
        $data['dob_format']         = true;
        $data['color_format']       = true;
        $data['title']              = 'Add User';
        $data['subtitle']           = 'AJAX Version';
        $this->load->view('templates/header', $data);
        $this->load->view('user/add', $data);
        $this->load->view('templates/footer', $data);
    }
    
    // Add a new user via AJAX and return JSON
    function add_ajax_json()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('first_name', 'First Name', 'min_length[2]|max_length[60]|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'min_length[2]|max_length[60]|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|callback_check_date|required');
        $this->form_validation->set_rules('email', 'Email', 'max_length[100]|valid_email|required|is_unique[users.email]');
        $this->form_validation->set_message('is_unique', 'The e-mail is registered to another user');
        $this->form_validation->set_error_delimiters("\r\n", "\r\n");
        
        if ($this->form_validation->run()) {
            $params = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'dob' => date("Y-m-d", strtotime($this->input->post('dob'))),
                'email' => $this->input->post('email'),
                'favorite_color' => $this->input->post('favorite_color')
            );
            
            if ($user_id = $this->User_model->add_user($params)) {
                echo json_encode(array(
                    "status" => true
                ));
            } else {
                echo json_encode(array(
                    "status" => false,
                    "info" => 'The insert has failed'
                ));
            }
        } else {
            echo json_encode(array(
                "status" => false,
                "info" => "Form validation has failed: " . validation_errors()
            ));
        }
        
        
    }
    
    //Edit User
    function edit($idx)
    {
        $user = $this->User_model->get_user($idx);
        
        if (isset($user['idx'])) {
            $this->load->library('form_validation');
            
            
            $this->form_validation->set_rules('first_name', 'First Name', 'min_length[2]|max_length[60]|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'min_length[2]|max_length[60]|required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|callback_check_date|required');
            
            if ($this->input->post('email') != $user['email']) {
                $this->form_validation->set_rules('email', 'Email', 'max_length[100]|valid_email|required|is_unique[users.email]');
                $this->form_validation->set_message('is_unique', 'The e-mail is registered to another user');
            } else {
                $this->form_validation->set_rules('email', 'Email', 'max_length[100]|valid_email|required');
            }
            
            
            
            
            if ($this->form_validation->run()) {
                $params = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'dob' => date("Y-m-d", strtotime($this->input->post('dob'))),
                    'email' => $this->input->post('email'),
                    'favorite_color' => $this->input->post('favorite_color')
                );
                
                $this->User_model->update_user($idx, $params);
                $this->session->set_flashdata('message', 'User updated successfully');
                $this->session->set_flashdata('color', 'success');
                redirect('user/index');
            } else {
                $data['user']          = $user;
                $data['title']         = 'Edit User ';
                $data['subtitle']      = $data['user']['first_name'] . ' ' . $data['user']['last_name'];
                $data['validate_user'] = true;
                $data['dob_format']    = true;
                $data['color_format']  = true;
                $this->load->view('templates/header', $data);
                $this->load->view('user/edit', $data);
                $this->load->view('templates/footer', $data);
            }
        } else
            show_error('The user does not exist.');
    }
    
    // Delete User
    function remove($idx)
    {
        $user = $this->User_model->get_user($idx);
        
        if (isset($user['idx'])) {
            $this->User_model->delete_user($idx);
            redirect('user/index');
        } else
            show_error('The user does not exist.');
    }
    
    // Check date format	
    public function check_date($date)
    {
        $mdy = explode('/', $date);
        if ((sizeof($mdy) != 3) or !checkdate((int) $mdy[0], (int) $mdy[1], (int) $mdy[2])) {
            $this->form_validation->set_message('check_date', 'The date inside the {field} field is not valid.');
            return FALSE;
        }
        return TRUE;
    }
    
}
?>