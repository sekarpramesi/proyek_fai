<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {

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
			$data["title"]="Groups-My Groups";
			$data["profile"]=$this->user->selectUser($email);
			$id=$data["profile"][0]["ID_USER"];
			$data["tabStatus"]="mygroups";
			$data["friends"]=$this->friends->selectFriends($id);
			$data["passedData"]=array("groups/discover",$data["profile"]);
			$data["container"]=array("groups/groups_template");
			$this->load->view('template/template',$data);	
		}else{
			redirect("Dashboard/index");
		}		
	}

	public function discover(){
		$email = $this->session->userdata["logged_in"]["email"];
		$data["title"]="Groups-My Groups";
		$data["profile"]=$this->user->selectUser($email);
		$id=$data["profile"][0]["ID_USER"];
		$data["tabStatus"]="discover";
		$data["friends"]=$this->friends->selectFriends($id);
		$data["passedData"]=array("groups/discover",$data["profile"]);
		$data["container"]=array("groups/groups_template");
		$this->load->view('template/template',$data);
	}
}
?>