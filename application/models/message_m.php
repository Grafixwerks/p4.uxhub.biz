<?php
class Message_m extends CI_Model {
	

	public function new_reply()
	{
		$data = array (
			'from'		=> $this->session->userdata('user_id') ,
			'to'		=> $this->input->post('to') ,
			'subject'	=> $this->input->post('subject') ,
			'message'	=> $this->input->post('message') ,
		) ;
		$query = $this->db->insert('messages' , $data) ;
		if ($query) {
			return true ;
		} else {
			return false ;
		}
	}



} // close class Message_m