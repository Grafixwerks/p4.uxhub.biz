<?php
class Users_m extends CI_Model {
	
	public function can_log_in() {
		
		$this->db->where('email' , $this->input->post('email')) ;
		$pw = $this->input->post('password') ;
		// add salt
		$pw = md5($pw) ;
		$pw .= 'MoD52R6038j6mD' ;
		$pw = md5($pw) ;
		$this->db->where('pw' , $pw) ;
		$query = $this->db->get('users') ;
		
		if ( $query->num_rows() == 1 ) {
			$row = $query->row() ;
			$data = array(
				'f_name'		=> $row->f_name ,
				'l_name'		=> $row->l_name ,
				'email'			=> $row->email ,
				'user_id'		=> $row->user_id ,
				'bio'			=> $row->bio ,
				'pic'			=> $row->pic ,
				'city'			=> $row->city ,
				'state'			=> $row->state ,
				'website'		=> $row->website ,
				'is_logged_in'	=> 1 
				) ;
			$this->session->set_userdata($data);
			return true ;
		} else {
			return false ;
		}
	}

	public function add_temp_user($confirm_code) {
		$pw = $this->input->post('password') ;
		// add salt
		$pw = md5($pw) ;
		$pw .= 'MoD52R6038j6mD' ;
		$pw = md5($pw) ;	
		$data = array (
			'f_name' => $this->input->post('f_name') ,
			'l_name' => $this->input->post('l_name') ,
			'email' => $this->input->post('email') ,
			'pw' => $pw ,
			'pic' => 'unk-user.png' ,
			'confirm_code' => $confirm_code 
		) ;
		
		$query = $this->db->insert('temp_users' , $data) ;
		if ($query) {
			return true ;
		} else {
			return false ;
		}
	}

	// check confirmation code from email against temp_users
	public function is_code_valid($confirm_code) {
		$this->db->where('confirm_code' , $confirm_code ) ;
		$query = $this->db->get('temp_users') ;
		if ( $query->num_rows() == 1 ) {
			return true ;
		} else {
			return false ;
		}
	}

	// Check if confirm code matches temp_users
	public function add_user($confirm_code) {
		$this->db->where('confirm_code' , $confirm_code ) ;
		$temp_user = $this->db->get('temp_users') ;
		if ( $temp_user ) {
			// pull out row from query and put into array 
			$row = $temp_user->row() ;
			$data = array(
				'f_name' => $row->f_name ,
				'l_name' => $row->l_name ,
				'email' => $row->email ,
				'pw' => $row->pw ,
				'pic' => 'unk-user.png' 
			) ;
			// insert temp_users data into users
			$did_add_user = $this->db->insert('users' , $data) ;
			
		// if new user added to users, delete data from temp_users
		} if ($did_add_user) {
			$this->db->where('confirm_code' , $confirm_code) ;
			$this->db->delete('temp_users') ;
			// pull out user id
			$this->db->where('email' , $data['email'] ) ;
			$query = $this->db->get('users') ;
			$row = $query->row() ;
			$data = array(
				'f_name' => $row->f_name ,
				'l_name' => $row->l_name ,
				'email' => $row->email ,
				'user_id' => $row->user_id 
			) ;
			return $data ;
			
		} return false ;
	}

	// take data from 2nd form add to users
	public function add_user_info($pic) {
		if ( $pic == '' ) {
			$pic = 'unk-user.png' ;
		}
		$user_id = $this->session->userdata('user_id') ;
		$data = array (
			'bio'		=> $this->input->post('bio') ,
			'pic'		=> $pic ,
			'city'		=> $this->input->post('city') ,
			'state'		=> $this->input->post('state') ,
			'website'	=> $this->input->post('website') ,
		) ;
		$this->db->where('user_id' , $user_id ) ;
		$query = $this->db->update('users' , $data) ;
		if ($query) {
			$this->session->set_userdata($data);
			return true ;
		} else {
			return false ;
		}
	}

	// take data profile update form add to users
	public function update_user($pic) {
		$user_id = $this->session->userdata('user_id') ;
		if ( $pic == NULL ) {
			$data = array (
				'f_name' 	=> $this->input->post('f_name') ,
				'l_name' 	=> $this->input->post('l_name') ,
				'email' 	=> $this->input->post('email') ,
				'bio'		=> $this->input->post('bio') ,
				'city'		=> $this->input->post('city') ,
				'state'		=> $this->input->post('state') ,
				'website'	=> $this->input->post('website') 
			) ;
		} else {
			$data = array (
				'f_name' 	=> $this->input->post('f_name') ,
				'l_name' 	=> $this->input->post('l_name') ,
				'email' 	=> $this->input->post('email') ,
				'bio'		=> $this->input->post('bio') ,
				'pic' => $pic ,
				'city'		=> $this->input->post('city') ,
				'state'		=> $this->input->post('state') ,
				'website'	=> $this->input->post('website') 
			) ;	
		}
		$this->db->where('user_id' , $user_id ) ;
		$query = $this->db->update('users' , $data) ;
		if ($query) {
			$this->session->set_userdata($data);
			return true ;
		} else {
			return false ;
		}
	}

	function get_user($user_id) {
		$this->db->from('users');
		$this->db->where('users.user_id', $user_id); 
		//$this->db->join('tweets', 'tweets.user_id = users.user_id', 'left');
		$query =  $this->db->get() ;
		return $query->result();
		}

	function get_all_user() {
		$this->db->from('users');
		$query =  $this->db->get() ;
		return $query->result();
		}

	function get_dashboard() {
		$user_id = $this->session->userdata('user_id') ;
		$this->db->from('users');
		$this->db->where('users.user_id', $user_id);
		$this->db->order_by("date", "desc"); 
		$this->db->join('tweets', 'tweets.user_id = users.user_id');
		$query =  $this->db->get() ;
		return $query->result();
		}

} // close class Users_m