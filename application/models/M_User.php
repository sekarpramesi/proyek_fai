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
    public function selectUser($param){
        $data=array(
            'EMAIL_USER'=>$param
        );
        return $this->db->get_where('user',$data)->result_array();
    }
    //Punya Moudy

    public function insertUser($param)
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

    public function updateUser($param)
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