<?php
class Ads_m extends CI_Model {
	
	// Get all ads
	function get_ads() {
		$this->db->select('ad_id, headline, date, location, level, type, hours, on_site');
		$this->db->from('ads');
		$this->db->order_by("date", "desc");
		$qAds =  $this->db->get() ;
		return $qAds->result();
		}
	
	// Get one ad by id
	function one_ad($ad_id) {
		$this->db->select('*');
		$this->db->from('ads');
		$this->db->where('ads.ad_id', $ad_id); 
		$this->db->join('users', 'users.user_id = ads.user_id');
		$q_ad =  $this->db->get() ;
		return $q_ad->result();
		}

	// Get ads by user_id
	function get_adz($user_id) {
		$this->db->select('ad_id, headline, date, location, level, type, hours, on_site');
		$this->db->from('ads');
		$this->db->where('ads.user_id', $user_id); 
		$this->db->order_by("date", "desc");
		$qAds =  $this->db->get() ;
		return $qAds->result();
		}

	// new ad
	public function new_ad()
	{
		$data = array (
			'headline'		=> $this->input->post('headline') ,
			'description'		=> $this->input->post('description') ,
			'user_id'		=> $this->session->userdata('user_id') ,
			'location'		=> $this->input->post('location') ,
			'level'		=> $this->input->post('level') ,
			'type'		=> $this->input->post('type') ,
			'hours'		=> $this->input->post('hours') ,
			'on_site'		=> $this->input->post('on_site') ,
		) ;
		$query = $this->db->insert('ads' , $data) ;
		if ($query) {
			return true ;
		} else {
			return false ;
		}
	}

	// edit ad
	public function edit_ad()
	{
		$data = array (
			'ad_id'			=> $this->input->post('ad_id') ,
			'headline'		=> $this->input->post('headline') ,
			'description'	=> $this->input->post('description') ,
			'user_id'		=> $this->session->userdata('user_id') ,
			'location'		=> $this->input->post('location') ,
			'level'			=> $this->input->post('level') ,
			'type'			=> $this->input->post('type') ,
			'hours'			=> $this->input->post('hours') ,
			'on_site'		=> $this->input->post('on_site')
		) ;
		$this->db->where('ad_id', $this->input->post('ad_id'));
		if ($this->db->update('ads' , $data) ) {
			return true ;
		}
	}




	// delete 1 ad
	public function delete_ad($ad_id) {
		$data = array (
			'user_id'	=> $this->session->userdata('user_id') ,
			'ad_id'	=> $ad_id ,
		) ;
		$query = $this->db->delete('ads' , $data) ;
		if ($query) {
			return true ;
		} else {
			redirect('error') ;
		}
	}


} // close class Ads_m



