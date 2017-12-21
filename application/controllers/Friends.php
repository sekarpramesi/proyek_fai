<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends CI_Controller {

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

	public function addFriend($idFriend){
		$email=$this->session->userdata['logged_in']['email'];
		$user=$this->user->selectUser($email);
		$idUser=$user[0]["ID_USER"];
		$this->friends->addFriend($idUser,$idFriend);
		redirect('Newsfeed/index');
	}

	public function blockFriend($idFriend){
		$email=$this->session->userdata['logged_in']['email'];
		$user=$this->user->selectUser($email);
		$idUser=$user[0]["ID_USER"];
		var_dump($this->friends->blockFriend($idUser,$idFriend));
		redirect('User/friends');
	}

	public function acceptFriend($idFriend){
		$email=$this->session->userdata['logged_in']['email'];
		$user=$this->user->selectUser($email);
		$idUser=$user[0]["ID_USER"];
		
		$this->friends->acceptFriend($idUser,$idFriend);
		$this->chat->insertRoom(1);
		$room=$this->chat->getLastRoom();
		$this->chat->insertUserRoom($idUser,$idFriend,$room[0]["ID_ROOM"]);
		redirect('Newsfeed/index');
	}


	public function declineFriend($idRelationship){
		$this->friends->declineFriend($idRelationship);
		redirect('Newsfeed/index');		
	}
}
?>