<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$models=array(
			'M_User'=>'user',
			'M_Post'=>'post',
			'M_Friends'=>'friends'
		);
		$this->load->model($models);
	}
}
?>