<?php
/**
+M_Interest (interest)
	-interest //info tentang interest
	-user_interest //hubungan antar user dan interest

**/
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Interest extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
      $this->load->database();
	}
}