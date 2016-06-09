<?php
class user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->library('ion_auth');
		$this->load->database();
		$this->load->model('user_model');
		
	}
	
	function index()
	{
		$this->register();
	}

    function register()
    {
		//set validation rules
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|alpha_dash');
		$this->form_validation->set_rules('jobs', 'Occupation', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
		
		//validate form input
		if ($this->form_validation->run() == FALSE)
        {
			// fails
			$this->load->view('user_registration_view');
        }
		else
		{
			$username = $this->input->post('email');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$additional_data = array(
				'first_name' => $this->input->post('fname'),
				'last_name' => $this->input->post('lname')
			);
			$group = array('2');
			
			
			// insert form data into database
			if ($this->ion_auth->register($username, $password, $email, $additional_data, $group))
			{
				// send email
				if ($this->user_model->sendEmail())
				{
					// successfully sent mail
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
					redirect('user/register');
				}
				else
				{
					// error
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!</div>');
					redirect('user/register');
				}
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
				redirect('user/register');
			}
		}
	}
}