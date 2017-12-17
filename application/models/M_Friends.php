<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Friends extends CI_Model {

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }   
    public function selectFriends($idUser){
   		$this->db->select('u.*');
   		$this->db->from('users u');
		  $this->db->join('relationship r ','(r.ID_USER_PAIR=u.ID_USER and r.ID_USER='.$idUser.') or (r.ID_USER_PAIR='.$idUser.' and r.ID_USER=u.ID_USER) and r.STATUS_RELATIONSHIP=2');
        return $this->db->get()->result_array();       
    }
    public function friendsSuggestions($idUser){
      $this->db->SELECT("u.ID_USER,u.FIRST_NAME_USER,u.LAST_NAME_USER,u.PHOTO_USER");
      $this->db->FROM("users u");
      $this->db->WHERE("NOT EXISTS ( SELECT ID_USER 
                      FROM relationship r
                     WHERE r.ID_USER=u.ID_USER
                       AND r.STATUS_RELATIONSHIP = 2
                       AND r.ID_USER_PAIR=".$idUser."
                  )
                 AND NOT EXISTS ( SELECT ID_USER 
                      FROM relationship r2
                     WHERE r2.ID_USER_PAIR = u.ID_USER
                       AND r2.STATUS_RELATIONSHIP = 2
                       AND r2.ID_USER =".$idUser."
                  )
                 AND u.ID_USER !=".$idUser);
      return $this->db->get()->result_array();                
    }

    public function countMutualFriends($idUser,$idFriend){
      $this->db->select("distinct count(F.ID_USER_PAIR)");
      $this->db->from("relationship as F");
      $this->db->join("users as U","F.ID_USER = U.ID_USER and F.STATUS_RELATIONSHIP=2","inner");
      $this->db->where("(U.ID_USER=".$idUser.") or (U.ID_USER=".$idUser.")"); 
      $this->db->group_by("F.ID_USER_PAIR");
      return $this->db->get()->result_array(); 
    }

    public function friendsRequest(){

    }

}

?>