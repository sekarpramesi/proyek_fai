<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Groups extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
      $this->load->database();
	}

	public function getOwnedGroups($idUser){
		$this->db->SELECT("*"); 
		$this->db->from("groups g");
		$this->db->join("user_groups u","u.ID_GROUP=g.ID_GROUP and u.ID_USER=".$idUser);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return 0;
		}
	}

	public function getDiscoverGroups(){

	}

	public function createGroup($param){
		$data=array(
			"ID_USER"=>$param["idUser"],
			"NAME_GROUP"=>$param["nameGroup"]
		);
        $this->db->insert('groups',$data);
        return $this->db->affected_rows();    
	}

	public function editGroup(){

	}

	public function deleteGroup(){

	}

	public function joinGroup($idUser,$idGroup){
		$data=array(
			"ID_USER"=>$idUser,
			"ID_GROUP"=>$idGroup
		);
        $this->db->insert('user_groups',$data);
        return $this->db->affected_rows();   		
	}

	public function getLastGroup(){
        $this->db->order_by("TIMESTAMP_GROUP",'DESC');
        $query=$this->db->get("groups",1);
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }   		
	}

	public function inviteFriends(){

	}

	public function declineInvitation(){

	}


}