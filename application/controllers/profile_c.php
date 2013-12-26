<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_c extends CI_Controller {
	// Logged in user profile page
	public function index()
	{
		//  check if logged in 
		if ( ($this->session->userdata('is_logged_in') == NULL) ) {
			redirect('/') ;
		}
		$this->load->model('users_m');
		$data['results'] = $this->users_m->get_user($this->session->userdata('user_id')) ;	
		$data['title'] = "User Profile" ;
		$this->load->view('header_v', $data) ;
		$this->load->view('user_v', $data) ;
		$this->load->view('footer_v') ;
	}

	// User profile page
	public function user($user_id)
	{
		$this->load->model('users_m');
		$data['results'] = $this->users_m->get_user($user_id) ;	
		$data['title'] = "User Profile" ;
		$this->load->view('header_v', $data) ;
		$this->load->view('user_v', $data) ;
		$this->load->view('footer_v') ;
	}

	// User dashboard page
	public function dashboard() {
		if ( ($this->session->userdata('is_logged_in') == NULL) ) {
			redirect('/') ;
		}
		$this->load->model('ads_m');
		$this->load->model('message_m');
		$user_id = $this->session->userdata('user_id') ;
		$data['results'] = $this->ads_m->get_adz($user_id) ;	
		$data['inbox'] = $this->message_m->get_messages() ;
		$data['title'] = "Account Dashboard" ;
		$this->load->view('header_v', $data) ;
		$this->load->view('dashboard_v', $data) ;
		$this->load->view('footer_v') ;
	}


} /////////////////////