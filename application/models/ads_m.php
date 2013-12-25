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
		//$this->load->library('typography');
		$this->db->select('*');
		$this->db->from('ads');
		$this->db->where('ads.ad_id', $ad_id); 
		$this->db->join('users', 'users.user_id = ads.user_id');
		$q_ad =  $this->db->get() ;
		return $q_ad->result();
		}


//
//
//	function get_user($user_id) {
//		$this->db->from('users');
//		$this->db->where('users.user_id', $user_id); 
//		$this->db->join('tweets', 'tweets.user_id = users.user_id', 'left');
//		$query =  $this->db->get() ;
//		return $query->result();
//		}



} // close class Ads_m