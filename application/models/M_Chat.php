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

    public function insertChatRoom($judul)
    {
        $data = array (
            'judul' => $judul
        );

        $this->db->insert('chatroom',$data);
    }

    public function selectIDChatRoom()
    {
        $this->db->select_max('idchat', 'idchatnow');
        $query = $this->db->get('chatroom');
        return $query->row_array();
    }

    public function selectAllChatRoom($email)
    {
        return $this->db->select('idchat')->
        where('email',$email)->get('chatuser')->result_array();
    }

    public function selectJudulChatRoom($idchat)
    {
        return $this->db->where('idchat',$idchat)->get('chatroom')->row_array();
    }

    public function insertChatUser($idchat,$email)
    {
        $data = array (
            'idchat' => $idchat,
            'email' => $email
        );

        $this->db->insert('chatuser',$data);
    }

    public function selectChatUser($id,$email)
    {
        return $this->db->select('email')
        ->from('chatuser')
        ->where('idchat',$id)
        ->where('email !=', $email)
        ->get()->result_array();
    }

    public function selectAllChat($email)
    {
        return $this->db->where('email', $email)
        ->get('chatuser')->result_array();
    }

    public function searchChat($id, $email)
    {
        return $this->db->where('idchat', $id)
        ->where('email !=', $email)
        ->get('chatuser')->result_array();
    }

    public function insertPesan($idchat, $txt, $email, $waktu, $pic)
    {
        $data = array(
            'idchat' => $idchat,
            'email' => $email,
            'isipesan' => $txt,
            'pic' => $pic
        );
        $this->db->set('waktu', 'NOW()', FALSE);
        $this->db->insert('pesan',$data);
    }

    public function selectPesan($idchat)
    {
        return $this->db->where('idchat',$idchat)
        ->get('pesan')->result_array();
    }

    public function selectLastIDPesan()
    {
        return $this->db->limit(1)->get('pesan')->row_array();
    }

    public function deletePesan($idchat)
    {
        $this->db->where('idpesan',$idchat);
        $this->db->delete('pesan');
    }

    public function selectLastChatTime($idchat)
    {
        return $this->db->where('idchat',$idchat)
        ->limit(1)->get('pesan')->row_array();
    }
    
    public function AllChatRoomRecordCount($email)
    {
        return $this->db->where('email',$email)->count_all_results("chatuser");
    }

    public function fetchAllChatRoom($limit,$start,$email)
    {
        return $this->db->select('idchat')->
        where('email',$email)->limit($limit,$start)->get('chatuser')->result_array();
    }
}