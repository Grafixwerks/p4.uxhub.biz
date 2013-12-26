<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ad_c extends CI_Controller {

	// view one ad
	public function ad($ad_id)
	{
		$this->load->library('typography');
		$this->load->model('ads_m');
		$data['results'] = $this->ads_m->one_ad($ad_id) ;
		$data['title'] = 'Ad' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('ad_v', $data) ;
		$this->load->view('footer_v') ;
	}

	// create ad
	public function create()
	{
		$data['title'] = 'Create Ad' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('create_v', $data) ;
		$this->load->view('footer_v') ;
	}


	// edit ad
	public function edit($ad_id)
	{
		$data['title'] = 'Edit Ad' ;
		$this->load->model('ads_m');
		$data['results'] = $this->ads_m->one_ad($ad_id) ;
		$this->load->view('header_v', $data) ;
		$this->load->view('edit_ad_v', $data) ;
		$this->load->view('footer_v') ;
	}

	// create ad validation
	public function ad_validation()
	{
		$this->load->library('form_validation') ;
		$this->form_validation->set_rules('headline', 'Headline', 'required|trim|xss_clean|max_length[100]') ;
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean|max_length[5000]') ;
		$this->form_validation->set_rules('location', 'Location', 'required|trim|xss_clean|max_length[30]') ;
		$this->form_validation->set_rules('level', 'Level', 'required|trim|xss_clean|max_length[20]') ;
		$this->form_validation->set_rules('type', 'Type', 'required|trim|xss_clean|max_length[20]') ;
		$this->form_validation->set_rules('hours', 'Hours', 'required|trim|xss_clean|max_length[10]') ;
		$this->form_validation->set_rules('on_site', 'On-site', 'required|trim|xss_clean|max_length[10]') ;
		// if passes validation 
		if ($this->form_validation->run() == TRUE) {
			$this->load->model('ads_m');
			
			if ($this->ads_m->new_ad() ) {
				redirect('/dashboard') ;	
				
			} else redirect('/error') ;	

		} else {
		$data['title'] = 'Create Ad' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('create_v', $data) ;
		$this->load->view('footer_v') ;
			}
	}

	// create ad validation
	public function edit_ad_validation()
	{
		$this->load->library('form_validation') ;
		$this->form_validation->set_rules('headline', 'Headline', 'required|trim|xss_clean|max_length[100]') ;
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean|max_length[5000]') ;
		$this->form_validation->set_rules('location', 'Location', 'required|trim|xss_clean|max_length[30]') ;
		$this->form_validation->set_rules('level', 'Level', 'required|trim|xss_clean|max_length[20]') ;
		$this->form_validation->set_rules('type', 'Type', 'required|trim|xss_clean|max_length[20]') ;
		$this->form_validation->set_rules('hours', 'Hours', 'required|trim|xss_clean|max_length[10]') ;
		$this->form_validation->set_rules('on_site', 'On-site', 'required|trim|xss_clean|max_length[10]') ;
		// if passes validation 
		if ($this->form_validation->run() == TRUE) {
			$this->load->model('ads_m');
			
			if ($this->ads_m->edit_ad() ) {
				redirect('/dashboard') ;	
				
			} else redirect('/error') ;	

		} else {
		$data['title'] = 'Create Ad' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('create_v', $data) ;
		$this->load->view('footer_v') ;
			}
	}

	// Delete an ad
	public function delete($ad_id)
	{
		if ( ($this->session->userdata('is_logged_in')) == NULL ) {
			redirect('/') ;
		}
		$this->load->model('ads_m');
		$this->ads_m->delete_ad($ad_id) ;
		redirect('dashboard') ;
	}

} /////////////////////