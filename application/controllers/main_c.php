<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_c extends CI_Controller {

	/// homepage
	public function index()
	{
		$this->load->model('ads_m');
		$data['results'] = $this->ads_m->get_ads() ;
		$data['title'] = 'Home' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('home_v', $data) ;
		$this->load->view('footer_v') ;
	}

	/// error
	public function error()
	{
		$data['title'] = 'Error' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('error_v', $data) ;
		$this->load->view('footer_v') ;
	}

} /////////////////////////