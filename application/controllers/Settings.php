<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

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

	public function index(){
		if($this->session->userdata["logged_in"]["access"]==1){
			$email = $this->session->userdata["logged_in"]["email"];
			$data["title"]="Settings";
			$data["profile"]=$this->user->selectUser($email);
			$id=$data["profile"][0]["ID_USER"];
			$data["friends"]=$this->friends->selectFriends($id);
			$data["friendsRequest"]=$this->friends->friendsRequest($id);
			$data["passedData"]=array("account/personal_information",$data["profile"],$data["friends"]);
			$data["container"]=array("account/template_account");
			$this->load->view('template/template',$data);
		}else{
			redirect("Dashboard/index");
		}					
	}
}