<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_c extends CI_Controller {
	// ad reply
	public function ad_reply($ad_id)
	{
		$this->load->model('ads_m');
		$data['results'] = $this->ads_m->one_ad($ad_id) ;
		$data['title'] = 'Reply to Ad' ;

		$this->load->view('header_v', $data) ;
		$this->load->view('ad_reply_v', $data) ;
		$this->load->view('footer_v') ;
	}

	// send new message 
	public function reply_validation() {
		$this->load->library('form_validation') ;
		$this->form_validation->set_rules('subject', 'Subject', 'required|trim|xss_clean|max_length[100]|strip_tags') ;
		$this->form_validation->set_rules('message', 'Message', 'required|trim|xss_clean|max_length[2000]|strip_tags') ;
		$this->form_validation->set_rules('to', 'to', 'required|trim|xss_clean|max_length[11]|strip_tags') ;
		// if passes validation 
		if ($this->form_validation->run() == TRUE) {
			$this->load->model('message_m');
			
			if ($this->message_m->new_reply() ) {
				redirect('/message-sent') ;	
				
			} else redirect('/error') ;	

		} else {
		redirect('/error') ;	
			}
	}

	// confirm message sent
	public function confirm()
	{
		$data['title'] = 'Message sent' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('confirm_v') ;
		$this->load->view('footer_v') ;
	}

	// view-message
	public function view($message_id)
	{
		$this->load->model('message_m');
		$data['results'] = $this->message_m->one_message($message_id) ;
		$data['title'] = 'Message' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('message_v') ;
		$this->load->view('footer_v') ;
	}

	// message-reply
	public function reply($message_id)
	{
		$this->load->model('message_m');
		$data['results'] = $this->message_m->one_message($message_id) ;
		$data['title'] = 'Message' ;
		$this->load->view('header_v', $data) ;
		$this->load->view('reply_v') ;
		$this->load->view('footer_v') ;
	}


	// Delete 1 message
	public function delete($message_id)
	{
		if ( ($this->session->userdata('is_logged_in')) == NULL ) {
			redirect('/') ;
		}
		$this->load->model('message_m');
		$this->message_m->delete_message($message_id) ;
		redirect('dashboard') ;
	}



} /////////////////////

