<?php
 
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
		// Ver Luego si va aca o en CI_Controller
		$this->load->library('session');
        $this->load->model('User_model');
		$this->load->helper('url_helper');
    } 

    // List Users
    function index()
    {
        $data['users'] = $this->User_model->get_all_users();
		$data['title'] = 'User List';
		$data['subtitle'] = 'All Users';
		$this->load->view('templates/header', $data);	
        $this->load->view('user/index',$data);
		$this->load->view('templates/footer', $data);		
		
    }

    // Add a new user 
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('first_name','First Name','min_length[2]|max_length[60]|required');
		$this->form_validation->set_rules('last_name','Last Name','min_length[2]|max_length[60]|required');
		$this->form_validation->set_rules('email','Email','max_length[100]|valid_email|required|is_unique[users.email]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'dob' => date("Y-m-d", strtotime($this->input->post('dob'))),
				'email' => $this->input->post('email'),
				'favorite_color' => $this->input->post('favorite_color'),
            );
            
            $user_id = $this->User_model->add_user($params);

			$this->session->set_flashdata('message', 'User created successfully');         
			$this->session->set_flashdata('color', 'success');         							
            redirect('user/index',$data);
        }
        else
        {
		$data['validate_user'] = true;
		$data['dob_format'] = true;
		$data['color_format'] = true;
		$data['title'] = 'Add User';	
		$this->load->view('templates/header', $data);	
        $this->load->view('user/add',$data);
		$this->load->view('templates/footer', $data);				
        }
    }  

    //Edit User
    function edit($idx)
    {   
        $user = $this->User_model->get_user($idx);
        
        if(isset($user['idx']))
        {
            $this->load->library('form_validation');

			if ($this->input->post('email') != $user['email']) { $is_unique = '|is_unique[users.email]'; } else { $is_unique = ''; }

			$this->form_validation->set_rules('first_name','First Name','min_length[2]|max_length[60]|required');
			$this->form_validation->set_rules('last_name','Last Name','min_length[2]|max_length[60]|required');
			$this->form_validation->set_rules('email','Email','max_length[100]|valid_email|required'.$is_unique);
			if($this->form_validation->run())     
            {   
                $params = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'dob' => date("Y-m-d", strtotime($this->input->post('dob'))),
					'email' => $this->input->post('email'),
					'favorite_color' => $this->input->post('favorite_color'),
                );

                $this->User_model->update_user($idx,$params);   
				$this->session->set_flashdata('message', 'User updated successfully');         
				$this->session->set_flashdata('color', 'success');         				
                redirect('user/index');
            }
            else
            {   
                $data['user'] = $user;
    			$data['title'] = 'Edit User ';
				$data['subtitle'] = $data['user']['first_name'].' '.$data['user']['last_name'];
    			$data['validate_user'] = true;
				$data['dob_format'] = true;		
				$data['color_format'] = true;						
				$this->load->view('templates/header', $data);
				$this->load->view('user/edit',$data);
				$this->load->view('templates/footer', $data);	
            }
        }
        else
            show_error('The user does not exist.');
    } 

   // Delete User
    function remove($idx)
    {
        $user = $this->User_model->get_user($idx);

        if(isset($user['idx']))
        {
            $this->User_model->delete_user($idx);
            redirect('user/index');
        }
        else
            show_error('The user does not exist.');
    }
	

	
}
