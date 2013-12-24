<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ad_c extends CI_Controller {
	// view one ad
	public function ad($ad_id)
	{
		$this->load->model('ads_m');
		$data['results'] = $this->ads_m->one_ad($ad_id) ;
		$data['title'] = 'Ad' ;

		$this->load->view('header_v', $data) ;
		$this->load->view('ad_v', $data) ;
		$this->load->view('footer_v') ;
	}






} /////////////////////


	// Edit a tweet
