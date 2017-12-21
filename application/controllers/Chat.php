<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$models=array(
			'M_User'=>'user',
			'M_Post'=>'post',
			'M_Friends'=>'friends',
			'M_Chat'=>'chat'
		);
        $this->load->model($models);
	}

	public function index(){
		if($this->session->userdata["logged_in"]["access"]==1){
			$email = $this->session->userdata["logged_in"]["email"];
			$data["title"]="Chat";
			$data["profile"]=$this->user->selectUser($email);
			$id=$data["profile"][0]["ID_USER"];

			$data["friends"]=$this->friends->selectFriends($id);
			$data["friendsRequest"]=$this->friends->friendsRequest($id);
			$data["container"]=array("chat/chat");
			$data["passedData"]=array("aa");
			$this->load->view('template/template',$data);
		}else{
			redirect("Dashboard/index");
		}	
	}

	public function checkRoom(){
		$post=$this->input->post();
		$idUser=$post["idUser"];
		$idFriend=$post["idFriend"];
		$room=$this->chat->getRoom($idUser,$idFriend);
		echo json_encode($room);
	}

	public function createRoom(){
		$post=$this->input->post();
		$idUser=$post["idUser"];
		$idFriend=$post["idFriend"];
		$this->chat->insertRoom(1);
		$room=$this->chat->getLastRoom();
		$this->chat->insertUserRoom($idUser,$idFriend,$room[0]["ID_ROOM"]);
		echo "success";

	}

	public function sendChat(){
		$post=$this->input->post();
		$idUser=$post["idUser"];
		$idRoom=$post["idRoom"];
		$contentChat=$post["contentChat"];
		//$extraContent=$post["extraContent"];
		$this->chat->insertChat($idUser,$idRoom,$contentChat);
		echo "success";		
	}

	public function getChat(){
		$post=$this->input->post();
		$tampung=array();
		$idRoom=$post["idRoom"];
		$chat=$this->chat->getChat($idRoom);
		echo json_encode($chat);
	}


}