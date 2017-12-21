<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$models=array(
			'M_User'=>'user',
			'M_Post'=>'post',
			'M_Friends'=>'friends',
			'M_Groups'=>'groups'
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
			$data["groups"]=$this->groups->getOwnedGroups($id);
			$data["friends"]=$this->friends->selectFriends($id);
			$data["friendsRequest"]=$this->friends->friendsRequest($id);
			$data["passedData"]=array("groups/owned",$data["profile"],$data["groups"]);
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
		$data["friendsRequest"]=$this->friends->friendsRequest($id);
		$data["friends"]=$this->friends->selectFriends($id);
		$data["passedData"]=array("groups/discover",$data["profile"]);
		$data["container"]=array("groups/groups_template");
		$this->load->view('template/template',$data);
	}

	public function createGroup(){
		$post=$this->input->post();
		$param["idUser"]=$post["idUser"];
		$param["nameGroup"]=$post["nameGroup"];
		$this->groups->createGroup($param);
		$groups=$this->groups->getLastGroup();
		$this->groups->joinGroup($param["idUser"],$groups[0]["ID_GROUP"]);
		echo "success";
	}
}
?>