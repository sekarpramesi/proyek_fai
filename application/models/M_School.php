<?php
/**
+M_School (school)
	-school //info tentang sekolah
	-user_school //hubungan antar user dan sekolah,detail tentang riwayat sekolah

**/
defined('BASEPATH') OR exit('No direct script access allowed');

class M_School extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
      $this->load->database();
	}
}