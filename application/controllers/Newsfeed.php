<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsfeed extends CI_Controller {

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
			$data["title"]="Newsfeed";
			$data["profile"]=$this->user->selectUser($email);
			$id=$data["profile"][0]["ID_USER"];
			$data["friends"]=$this->friends->selectFriends($id);
			$data["friendsSuggestions"]=$this->friends->friendsSuggestions($id);
			$data["passedData"]=array($this->post->getAllPost($data["profile"][0]["ID_USER"]),$this->post->getAllComment(),$data["profile"][0],$data["friendsSuggestions"]);
			$data["container"]=array("newsfeed/newsfeed");
			$this->load->view('template/template',$data);
		}else{
			redirect("Dashboard/index");
		}	
	}
}