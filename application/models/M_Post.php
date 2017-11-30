<?php

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

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Post extends CI_Model {   
    public function selectAllPost($email)
    {
        return $this->db->where('email =', $email)->get('post')->result_array();
    }

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

    public function showLike($idpost)
    {
        return $this->db->where('idpost =', $idpost)->get('hati')->result_array();
    }

    public function cekButtonLike($idpost, $email)
    {
        $this->db->select();
        $this->db->from('hati');
        $this->db->where('idpost =', $idpost);
        $this->db->where('email =', $email);
        $jum = $this->db->count_all_results();

        if ($jum>0)
            return true;
        else
            return false;
    }

    public function countLike($idpost)
    {
        $hasil['jum'] = 0;
        $this->db->select();
        $this->db->from('hati');
        $this->db->where('idpost', $idpost);
        $hasil['jum'] = $this->db->count_all_results();
        return $hasil;
    }

    public function countComment($idpost)
    {
        $hasil['jum'] = 0;
        $this->db->select();
        $this->db->from('comment');
        $this->db->where('idpost', $idpost);
        $hasil['jum'] = $this->db->count_all_results();
        return $hasil;
    }
    public function insertLike($idpost,$email)
    {
        $data = array (
            'idpost' => $idpost,
            'email' => $email
        );

        $this->db->insert('hati',$data);
    }

    public function seeLikers($idpost)
    {
        return $this->db->where('idpost', $idpost)
        ->get('hati')->result_array();
    }

    public function deleteLike($idpost, $email)
    {
        $data = array (
            'idpost' => $idpost,
            'email'=> $email
        );
        $this->db->where($data);
        $this->db->delete('hati');
    }

    public function insertComment($idpost,$email,$isi)
    {
        $data = array (
            'idpost' => $idpost,
            'email' => $email,
            'comment' => $isi
        );

        $this->db->insert('comment',$data);
    }

    public function deleteComment($idcomment)
    {
        $this->db->where('idcomment', $idcomment);
        $this->db->delete('comment');
    }

    public function deletePost($idpost)
    {
        $this->db->where('idpost', $idpost);
        $this->db->delete('post');
    }

    public function selectLikers($idpost)
    {
        return $this->db->where('idpost',$idpost)->get('hati')->result_array();
    }

    public function selectComment($idpost)
    {
        return $this->db->where('idpost',$idpost)->get('comment')->result_array();
    }

}