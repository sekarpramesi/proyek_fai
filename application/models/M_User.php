<?php
/**
+M_User (user)
    -user //info tentang user
    -relationship //hubungan antar user,siapa yang melakukan action(friend request,declined,blocked,dll)
**/
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    //Punya Niya
    //validation
    public function validation($param){
         $data=array("EMAIL_USER"=>$param["email"],"PASSWORD_USER"=>$param["password"]);
         $query=$this->db->get_where('users',$data);
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    //CRUD
    public function selectUser($param){
        $data=array();
        if(preg_match('/\b[^\d\W_]+\b/',$param)){
            $data=array("EMAIL_USER"=>$param);
        }else{
            $data=array("ID_USER"=>$param);
        }
        $query=$this->db->get_where('users',$data);

        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }
    }

    public function insertUser($param)
    {
        $data = array (
            'EMAIL_USER' => $param['email'],
            'PASSWORD_USER' => $param['password'],
            'FIRST_NAME_USER' => $param['firstName'],
            'LAST_NAME_USER' => $param['lastName'],
        );
        $this->db->insert('users',$data);
        return $this->db->affected_rows();
    }

    public function updateUser($param,$type){
         $data=array();
        if($type=="personalinfo"){
            $data=array(
                'FIRST_NAME_USER' => $param['firstName'],
                'LAST_NAME_USER' => $param['lastName'],
                'ADDRESS_USER'=>$param['address'],
                'ZIPCODE_USER'=>$param['zipcode'],
                'BIO_USER'=>$param['bio']
            );
        }else if($type=="completion"){
            $data=array("COMPLETION"=>1);
        }
        $this->db->where('EMAIL_USER',$param["email"]);
        $this->db->update('users',$data);
        return $this->db->affected_rows();

    }


    //end punya niya//






    //Punya Moudy

    public function insertUser1($param)
    {
        $data = array (
            'email' => $param['email'],
            'password' => $param['pass'],
            'namadepan' => $param['namadepan'],
            'namabelakang' => $param['namabelakang'],
            'nohp' => $param['nohp'],
            'alamat' => $param['alamat'],
            'kodepos' => $param['kodepos'],
            'negara' => $param['negara'],
            'jabatan' => $param['jabatan'],
            'perusahaan' => $param['perusahaan'],
            'bioperusahaan' => $param['bioperusahaan'],
            'biouser' => $param['biouser'],
            'private' => 'false',
            'photo' => 'default.jpeg'
        );
        $this->db->insert('user',$data);
    }

    public function updateUser1($param)
    {
        $data = array (
            'alamat' => $param['alamat'],
            'kodepos' => $param['kodepos'],
            'negara' => $param['negara'],
            'jabatan' => $param['jabatan'],
            'perusahaan' => $param['perusahaan'],
            'bioperusahaan' => $param['bioperusahaan'],
            'biouser' => $param['biouser'],
            'private' => $param['private'],
            'photo' => $param['photo'],
            'music' => $param['music']
        );

        $this->db->where('email',$param['email']);
        $this->db->update('user',$data);
    }

    public function updateUser2($emailnow, $param)
    {
        $data = array (
            'password' => $param['password'],
            'namadepan' => $param['namadepan'],
            'namabelakang' => $param['namabelakang'],
            'nohp' => $param['nohp']
        );
        $this->db->where('email',$param['email']);
        $this->db->update('user',$data);
    }

    /*public function selectUser()
    {
        return $this->db->get('user')->result_array();
    }*/

    public function selectUserFriend($email)
    {
        $this->db->where('email !=', $email);
        return $this->db->get('user')->result_array();
    }

    public function selectProfile($email)
    {
       return $this->db->where('email', $email)->get('user')->row_array();
    }

    public function selectFriend($email)
    {
        return $this->db->where('emailuser', $email)->get('userandfriend')->result_array();
    }

    public function selectFriendReq($email)
    {
        return $this->db->where('friend', $email)->get('userandfriend')->result_array();
    }

    public function deleteFriendReq($email, $emailfriend)
    {
        $this->db->where('emailuser',$email);
        $this->db->where('friend',$emailfriend);
        $this->db->delete('userandfriend');
    }

    public function ceksudahteman($email,$emailfriend)
    {
        return $this->db->where('emailuser',$email)->where('friend',$emailfriend)->get('userandfriend')->row_array();
    }

    public function insertFriend($email,$emailfriend)
    {
        $data = array (
            'emailuser' => $email,
            'friend' => $emailfriend
        );
        $this->db->insert('userandfriend',$data);
    }

    public function insertFriend2($email,$emailfriend)
    {
        $data = array (
            'emailuser' => $emailfriend,
            'friend' => $email
        );
        $this->db->insert('userandfriend',$data);
    }

}