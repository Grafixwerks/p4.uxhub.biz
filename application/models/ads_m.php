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


} // close class Ads_m