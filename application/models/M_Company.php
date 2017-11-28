<?php
/**
+M_Company (company)
	-company //info tentang perusahaan
	-user_company //hubungan antar user dan perusahaan

**/
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Company extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
      $this->load->database();
	}
}