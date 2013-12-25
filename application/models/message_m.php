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

	public function get_messages() {
		$data = array (
			'to'	=> $this->session->userdata('user_id')
		) ;	
		$this->db->join('users', 'users.user_id = messages.from');
		$q_message = $this->db->get_where('messages' , $data) ;
		return $q_message->result();
	}


//	public function get_message($message_id) {
//		$data = array (
//			'message_id'	=> $message_id
//		) ;	
//		$this->db->join('users', 'users.user_id = messages.from');
//		$q_message = $this->db->get_where('messages' , $data) ;
//		return $q_message->result();
//	}


	// Get one message by message_id
	public function one_message($message_id) {
		$this->db->select('*');
		$this->db->from('messages');
		$this->db->where('messages.message_id', $message_id); 
		$this->db->join('users', 'users.user_id = messages.from');
		$q_ad =  $this->db->get() ;
		return $q_ad->result();
		}






	// delete 1 message
	public function delete_message($message_id) {
		$data = array (
			'to'	=> $this->session->userdata('user_id') ,
			'message_id'	=> $message_id ,
		) ;
		$query = $this->db->delete('messages' , $data) ;
		if ($query) {
			return true ;
		} else {
			redirect('error') ;
		}
	}






} // close class Message_m