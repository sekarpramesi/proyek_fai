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

    public function insertChat($idUser,$idRoom,$contentChat){
        $data=array(
            "ID_ROOM"=>$idRoom,
            "ID_USER"=>$idUser,
            "CONTENT_CHAT"=>$contentChat,
            "TYPE_CHAT"=>1);
        $this->db->insert('chat_message',$data);
        return $this->db->affected_rows();

    }
    public function getChat($idRoom){
        return $this->db->get_where('chat_message',array("ID_ROOM"=>$idRoom))->result_array();
    }
    public function getRoom($idUser,$idFriend){
        $this->db->SELECT("r.ID_ROOM");
        $this->db->FROM("user_room r");
        $this->db->WHERE("r.ID_USER IN (".$idUser.",".$idFriend.")");
        $this->db->group_by("r.ID_ROOM");
        $this->db->HAVING("COUNT(*) = 
        (
          SELECT COUNT(*)
          FROM user_room x
          WHERE x.ID_ROOM = r.ID_ROOM
          GROUP BY x.ID_ROOM
        )");
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }        
    }

    public function getLastRoom(){
        $this->db->order_by("TIMESTAMP_CREATED_ROOM",'DESC');
        $query=$this->db->get("chat_room",1);
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }       
    }
    public function insertRoom($typeRoom){
        $this->db->insert('chat_room',array("TYPE_ROOM"=>$typeRoom));
        return $this->db->affected_rows();
    }

    public function insertUserRoom($idUser,$idFriend,$idRoom){
        $data =array(
                array(
                'ID_USER'=>$idUser, 
                'ID_ROOM'=>$idRoom
                ),
                array(
                'ID_USER'=>$idFriend, 
                'ID_ROOM'=>$idRoom
                )
        );
        $this->db->insert_batch('user_room', $data);          
    }

}