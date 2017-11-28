<?php
/**
	+M_Chat (chat)
		-chat_message //pesan pada chat
		-chat_room 		//room pada chat
		-user_chat_room //hubungan antar user dan room
**/
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Chat extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
      $this->load->database();
	}
}