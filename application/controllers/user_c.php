<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_c extends CI_Controller {

	// Sign in form page
	public function index() {
		//$this->load->helper('form');
		$data['title'] = 'Sign in' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('sign_in_v', $data) ;
		$this->load->view('footer_v') ;
	}

	// Sign in form validation
	public function sign_in_validation() {
		$this->load->library('form_validation') ;
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|xss_clean|callback_validate_credentials') ;
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim') ;
		// if passes validation go to home page
		if ($this->form_validation->run() == TRUE) {
			redirect('/') ;
		} else {
			$data['title'] = 'Sign in' ;
			$this->load->view('header_v', $data) ;
			$this->load->view('sign_in_v', $data) ;
			$this->load->view('footer_v') ;
			}
	}

	// Sign in, check email/pw in users table
	public function validate_credentials()
	{
		$this->load->model('users_m');
		// Call function to check email/pw
		if ( $this->users_m->can_log_in() ) {
			return true ;
		} else {
			$this->form_validation->set_message('validate_credentials','Incorrect username/password.') ;
			return false ;
		}
	}

	// Log out: destroy session and redirect to home page
	public function sign_out() {
		$this->session->sess_destroy() ;
		redirect($_SERVER['HTTP_REFERER']) ;
	}

	// Join form page
	public function join() {
		//$this->load->helper('form');
		$data['title'] = 'Join' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('join_v', $data) ;
		$this->load->view('footer_v') ;
	}

	// join form validation, add to users, send email with confirmation code
	public function join_validation() {
		$this->load->library('form_validation') ;
		$this->form_validation->set_rules('f_name', 'First name', 'required|trim|xss_clean|strip_tags|max_length[30]') ;
		$this->form_validation->set_rules('l_name', 'Last name', 'required|trim|xss_clean|strip_tags|max_length[30]') ;
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|xss_clean|is_unique[users.email]|max_length[100]') ;
		$this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[100]') ;
		$this->form_validation->set_rules('c_password', 'Confirm Password', 'required|trim|matches[password]|max_length[100]') ;
		
		$this->form_validation->set_message('is_unique', 'That email address already has an account.' ) ;
		
		if ($this->form_validation->run() == TRUE) {
			// generate a random key for email link
			$confirm_code = md5(uniqid()) ;
			
			$this->load->library('email', array('mailtype'=>'html')) ;
			$this->load->model('users_m') ;
			// build email
			$this->email->from('andy@grafixwerks.com', 'Andy Pearson') ;
			$this->email->to($this->input->post('email')) ;
			$this->email->subject('Confirm your Holy Tweet account.') ;
			$message = '<p>Thank you for joining Holy Tweet!</p>' ;
			$message .= '<p><a href="'.base_url().'/confirm/'.$confirm_code.'">Click here</a> to confirm your account.</p>' ;
			$this->email->message($message) ;
			
			// send user an email if temp_user added
			if ($this->users_m->add_temp_user($confirm_code) ) {
				if ($this->email->send() ) {
					//echo 'msg sent' ;
				} else {
					echo 'fail' ;
				}			
			} else echo 'no luck adding user' ;	
			
			redirect('join-success') ;
		} else {
			$data['title'] = 'Join' ;
			$this->load->view('header_v', $data) ;
			$this->load->view('join_v', $data) ;
			$this->load->view('footer_v') ;
			}
	}

	// Join success page, Join form successfully submitted, user in temp_users
	public function join_success() {
		$data['title'] = 'Join Success' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('join_success_v', $data) ;
		$this->load->view('footer_v') ;
	}

	// Check confirm_code from email against temp_users, add to users, send to user to 2nd form
	public function register_user($confirm_code) {
		$this->load->model('users_m') ;
		// check if confirm_code is in temp_users
		if ($this->users_m->is_code_valid($confirm_code)) {
			// pull data out of temp_users, put into users and delete from temp_users
			if ($user_data = $this->users_m->add_user($confirm_code) ) {
				$data = array(
					'f_name' => $user_data['f_name'] ,
					'l_name' => $user_data['l_name'] ,
					'email' => $user_data['email'] ,
					'user_id' => $user_data['user_id'] ,
					'is_logged_in' => 1
				) ;
				// set session logged in
				$this->session->set_userdata($data) ;
				redirect('user_c/confirm_registration') ;
			} else echo 'failed to add user' ;
		} else {
			//echo 'bogus' ;
		}
		
	}

	// Email confirmation code success page, has form to comlete profile
	public function confirm_registration() {
		//$this->load->helper('form');
		$data['title'] = 'Registration confirmed' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('confirm_registration_v', $data) ;
		$this->load->view('footer_v') ;
	}

	// Validate data from confirmation code success page form and insert into users table
	public function data_validation() {
		$this->load->library('form_validation') ;
		$this->form_validation->set_rules('city', 'City', 'required|trim|xss_clean|strip_tags|max_length[30]') ;
		$this->form_validation->set_rules('state', 'State', 'required|trim|xss_clean|alpha|exact_length[2]') ;
		$this->form_validation->set_rules('website', 'Website', 'trim|xss_clean|prep_url|strip_tags|max_length[50]') ;
		$this->form_validation->set_rules('bio', 'Bio', 'required|trim|xss_clean|strip_tags|max_length[1000]') ;
		$this->form_validation->set_message('alpha', 'Please choose a state.' ) ;
		if ($this->form_validation->run() == TRUE) {
		/////////////////////////////////////////////
		// configure image upload
		$config['upload_path'] = './images/user/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']	= '1024';
		$config['encrypt_name']	= 'TRUE';
		// image upload for user profile picture
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);
		}
		else
		{	
			//$data['error'] = '';
			$data = array('upload_data' => $this->upload->data());
			$image_data = $this->upload->data() ;
		
			// set up image resize
			$config['image_library'] = 'gd2';
			$config['source_image'] = $image_data['full_path'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 130;
			$config['height'] = 130;
			$this->load->library('image_lib', $config); 
			// resize image
			$this->image_lib->resize();
			// grab image name to send to db
			$pic = $image_data['file_name'] ;
			//$this->load->view('upload_success', $data);
		}
		//////////////////////////////
			$this->load->model('users_m');
			$this->users_m->add_user_info($pic) ;
			redirect('/') ;
		} else {
			//$this->load->helper('form');
			$data['title'] = 'Registration confirmed' ;
			$this->load->view('header_v', $data) ;
			$this->load->view('confirm_registration_v', $data) ;
			$this->load->view('footer_v') ;
			}
	}

	// Process logged in user profile edit
	public function update_user_validation() {
		$this->load->library('form_validation') ;
		$this->form_validation->set_rules('f_name', 'First name', 'required|trim|xss_clean|strip_tags|max_length[30]') ;
		$this->form_validation->set_rules('l_name', 'Last name', 'required|trim|xss_clean|strip_tags|max_length[30]') ;
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|xss_clean|max_length[100]') ;
		$this->form_validation->set_rules('city', 'City', 'required|trim|xss_clean|strip_tags|max_length[30]') ;
		$this->form_validation->set_rules('state', 'State', 'required|trim|xss_clean|alpha|exact_length[2]') ;
		$this->form_validation->set_rules('website', 'Website', 'trim|xss_clean|prep_url|strip_tags|max_length[50]') ;
		$this->form_validation->set_rules('bio', 'Bio', 'required|trim|xss_clean|strip_tags|max_length[1000]') ;
		$this->form_validation->set_message('alpha', 'Please choose a state.' ) ;
		//$pic = 'unk-user.png' ;
		// Validate data 
		if ($this->form_validation->run() == TRUE) {
		// configure image upload
		$config['upload_path'] = './images/user/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']	= '1024';
		$config['encrypt_name']	= 'TRUE';
		// image upload for user profile picture
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);
		}
		else
		{	
			//$data['error'] = '';
			$data = array('upload_data' => $this->upload->data());
			$image_data = $this->upload->data() ;

			// set up image resize
			$config['image_library'] = 'gd2';
			$config['source_image'] = $image_data['full_path'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 130;
			$config['height'] = 130;
			$this->load->library('image_lib', $config); 
			// resize image
			$this->image_lib->resize();
			// grab image name to send to db
			$pic = $image_data['file_name'] ;
			//$this->load->view('upload_success', $data);
		}
			// send form info to db
			$this->load->model('users_m');
			//$this->users_m->update_user($pic) ;
			redirect('/profile') ;
		} else {
			//$this->load->helper('form');
			$data['title'] = 'Registration confirmed' ;
			$this->load->view('header_v', $data) ;
			$this->load->view('confirm_registration_v', $data) ;
			$this->load->view('footer_v') ;
			}
	}

	// Update profile page
	public function update_profile() {
if ( ($this->session->userdata('is_logged_in')) == NULL ) {
	redirect('/') ;
}
		//$this->load->helper('form');
		$data['title'] = 'Update Profile' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('update_profile_v', $data) ;
		$this->load->view('footer_v') ;
	}

}  // Close class user_c