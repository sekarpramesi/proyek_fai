<?php
<<<<<<< HEAD
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

=======
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {
	public function __construct()
	{
	   parent::__construct();
       $this->load->database();
	}
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

    public function selectUser()
    {
        return $this->db->get('user')->result_array();
    }	
>>>>>>> c9cc946429310cc71068797e9c358930298f7cd9
}