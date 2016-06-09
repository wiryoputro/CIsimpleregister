<?php
class user_model extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	//send verification email to user's email id
	function sendEmail()
	{
		$admin_email = 'admin@go-jek.com';
		$from_email = 'system@go-jek.com';
		$subject = 'New User Registration';
		$message = 'Dear Admin,<br /><br />There is a new registered user, please take a review by clicking link below.<br /><br /> http://www.go-jek.com/user/approval/ <br /><br /><br />Thanks<br />System Admin';
		
		//configure email settings
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.yourdomain.com'; //smtp host name
		$config['smtp_port'] = '25'; //smtp port number
		$config['smtp_user'] = 'name@yourdomain.com';
		$config['smtp_pass'] = '********'; //$from_email password
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes
		$this->email->initialize($config);
		
		//send mail
		$this->email->from($from_email, 'Go-Jek');
		$this->email->to($admin_email);
		$this->email->subject($subject);
		$this->email->message($message);
		return $this->email->send();
	}
}