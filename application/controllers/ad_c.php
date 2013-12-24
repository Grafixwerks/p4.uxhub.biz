<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ad_c extends CI_Controller {
	// Logged in user profile page
	public function index($ad_id)
	{
		$this->load->model('ads_m');
		$data['results'] = $this->ads_m->get_tweet($tweet_id) ;

		$this->load->view('header_v', $data) ;
		$this->load->view('ad_v', $data) ;
		$this->load->view('footer_v') ;
	}


} /////////////////////


	// Edit a tweet
