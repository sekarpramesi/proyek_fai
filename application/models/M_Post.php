<?php
<<<<<<< HEAD
/**
+M_Post (post)
	-post //info tentang post, siapa yang membuat post
	-post_like //hubungan antar post dan like
	-post_share //post yang dishare (dianggap sebagai objek baru)
	-comment //info tentang comment, siapa yang membuat comment dan terdapat pada post mana

**/
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Post extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
      $this->load->database();
	}
=======
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Post extends CI_Model {   
    public function selectAllPost($email)
    {
        return $this->db->where('email =', $email)->get('post')->result_array();
    }

    public function selectAllFriendPost($email)
    {
        //emailku ini array
        for ($i=0; $i < count($email); $i++)
        {
            if ($i>=1)
            {
                $this->db->or_where('email', $email[$i]);
            }
            else
            {
                $this->db->where('email', $email[$i]);
            }
        }
        return $this->db->get('post')->result_array();
    }

    public function selectLastPost($email)
    {
        $this->db->where('email', $email);
        $this->db->order_by('idpost','desc');
        $this->db->limit(1);
        return $this->db->get('post')->row_array();
    }

    public function selectLastPostAll()
    {
        $this->db->order_by('idpost','desc');
        $this->db->limit(1);
        return $this->db->get('post')->row_array();
    }

    public function insertPost($isipost, $email, $waktu, $pic)
    {
        $data = array(
                'email' => $email,
                'isipost' => $isipost,
                'pic' => $pic
        );
        $this->db->set('waktu', 'NOW()', FALSE);
        $this->db->insert('post',$data);
    }

    public function insertSharedPost($isipost, $email, $share)
    {
        $data = array(
                'email' => $email,
                'isipost' => $isipost,
                'share' => $share,
        );
        $this->db->set('waktu', 'NOW()', FALSE);
        $this->db->insert('post',$data);
    }
>>>>>>> c9cc946429310cc71068797e9c358930298f7cd9
}