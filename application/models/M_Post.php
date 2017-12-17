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

      //punya Niya
    public function getPost($idUser){
        $this->db->select('users.FIRST_NAME_USER,users.PHOTO_USER,users.LAST_NAME_USER,post.*');
        $this->db->from('post,users');
        $this->db->where('post.ID_USER = users.ID_USER AND users.ID_USER='.$idUser);
        $this->db->order_by('post.TIMESTAMP_POST','desc');
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }
    }

    public function getAllPost($idUser){
        $this->db->select('users.FIRST_NAME_USER,users.PHOTO_USER,users.LAST_NAME_USER,post.*');
        $this->db->from('post,users');
        $this->db->where('post.ID_USER = users.ID_USER AND
            (post.ID_USER in (SELECT ID_USER_PAIR FROM relationship where ID_USER='.$idUser.' AND STATUS_RELATIONSHIP=2) OR
            post.ID_USER in (SELECT ID_USER FROM relationship where ID_USER='.$idUser.'))');
        $this->db->order_by('post.TIMESTAMP_POST','desc');
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function getAllComment(){
        $this->db->select('users.FIRST_NAME_USER,users.LAST_NAME_USER,users.PHOTO_USER,comment_post.*');
        $this->db->from('users,comment_post');
        $this->db->where('users.ID_USER=comment_post.ID_USER');
        $this->db->order_by('comment_post.TIMESTAMP_COMMENT_POST','desc');
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function getPostComment($idPost){
        $this->db->select('users.FIRST_NAME_USER,users.LAST_NAME_USER,users.PHOTO_USER,comment_post.*');
        $this->db->from('users,comment_post');
        $this->db->where('users.ID_USER=comment_post.ID_USER and comment_post.ID_POST='.$idPost);
        $this->db->order_by('comment_post.TIMESTAMP_COMMENT_POST','desc');
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }
    }

    public function countPostStats(){

    }

    //CRUD FUNCTIONS POST//
    public function insertPost($isipost, $idUser) //,$pic)
    {
        $data = array(
                'ID_USER' => $idUser,
                'CONTENT_POST' => $isipost,
                //'pic' => $pic
        );
        $this->db->insert('post',$data);
        return $this->db->affected_rows();
    }
    //END CRUD FUNCTIONS//

    //CRUD FUNCTION COMMENT//
    public function insertComment($idpost,$iduser,$isi)
    {
        $data = array (
            'ID_POST' => $idpost,
            'ID_USER' => $iduser,
            'CONTENT_COMMENT_POST' => $isi
        );

        $this->db->insert('comment_post',$data);
    }
    //END CRUD FUNCTIONS//
    //end punya niya//






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