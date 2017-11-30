<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db extends CI_Model {

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

    public function selectUserFriend($email)
    {
        $this->db->where('email !=', $email);
        return $this->db->get('user')->result_array();
    }

    public function selectProfile($email)
    {
        return $this->db->where('email', $email)->get('user')->row_array();
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

    public function selectNotif($email)
    {
        return $this->db->where('email',$email)->get('notifikasi')->result_array();
    }

    public function insertNotif($email,$isi,$jenis)
    {
        $data = array (
            'email' => $email,
            'isinotif' => $isi,
            'jenis' => $jenis
        );

        $this->db->insert('notifikasi', $data);
    }

    public function selectAllSkill($email)
    {
        return $this->db
        ->where('email',$email)->get('skill')
        ->result_array();
    }

    public function selectAllSkill2()
    {
        return $this->db
        ->get('skill')
        ->result_array();
    }

    public function selectSkill($email)
    {
        return $this->db
        ->where('email',$email)
        ->order_by('jumend','desc')
        ->get('skill')
        ->result_array();
    }

    public function insertSkill($email, $namaskill)
    {
        $data = array (
            'email' => $email,
            'namaskill' => $namaskill,
            'jumend' => 0
        );

        $this->db->insert('skill', $data);
    }

    public function updateJumlahEnd($idskill, $jum)
    {
        $this->db->where('idskill',$idskill);
        $data = array (
                'jumend' => $jum
        );
        $this->db->update('skill',$data);
    }

    public function deleteSkill($idskill)
    {
        $this->db->where('idskill',$idskill);
        $this->db->delete('skill');
    }

    public function selectEmailbyIdSkill($idskill)
    {
        return $this->db->where('idskill', $idskill)
        ->get('skill')->row_array();
    }

    public function insertEndorse($idskill, $email)
    {
        $data = array (
            'idskill' => $idskill,
            'endorser' => $email
        );
        $this->db->insert('endorse', $data);
    }

    public function deleteEndorse($idskill,$email)
    {
        $this->db->where('idskill',$idskill);
        $this->db->where('endorser',$email);
        $this->db->delete('endorse');
    }

    public function seeEndorser($idskill)
    {
        return $this->db->where('idskill', $idskill)
        ->get('endorse')->result_array();
    }

    public function countEndorse($idskill)
    {
        return $this->db->where('idskill', $idskill)
        ->count_all_results('endorse');
    }

    public function cekEndorser($email, $idskill)
    {
        return $this->db->where('endorser', $email)
        ->where('idskill', $idskill)
        ->get('endorse')->row_array();
    }

    public function selectEmailbyNama($nama)
    {
        return $this->db->like('namadepan', $nama)
        ->get('user')->row_array();
    }

    public function selectNamabyEmail($email)
    {
        return $this->db->like('email', $email)
        ->get('user')->row_array();
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

    //PAGINATION
    public function postRecordCount($email)
    {
        return $this->db->where('email', $email)->count_all_results("post");
    }

    public function fetchPost($limit,$start,$email)
    {
        $this->db->where('email', $email);
        $this->db->limit($limit,$start);
        $query = $this->db->get("post");
        return $query->result_array();
    }

    public function allFriendPostRecordCount($email)
    {
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
        return $this->db->count_all_results("post");
    }

    public function fetchAllFriendPost($limit,$start,$email)
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
        $this->db->limit($limit,$start);
        return $this->db->get('post')->result_array();
    }

    public function allNotifRecordCount($email)
    {
        return $this->db->where('email',$email)->count_all_results("notifikasi");
    }

    public function fetchNotif($limit,$start,$email)
    {
        return $this->db->where('email',$email)->limit($limit,$start)->get('notifikasi')->result_array();
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

    public function UserFriendRecordCount($email)
    {
        return $this->db->where('email !=', $email)->count_all_results("user");
    }

    public function fetchUserFriend($limit,$start,$email)
    {
        return $this->db->where('email !=', $email)->limit($limit,$start)->get('user')->result_array();
    }

    public function fetchUserFriendSorted($limit,$start,$email,$orderby,$sort)
    {
        return $this->db->where('email !=', $email)
        ->order_by($orderby,$sort)
        ->limit($limit,$start)->get('user')->result_array();
    }

    public function fetchUserFriendSortedSearch($limit,$start,$email,$orderby,$sort,$key)
    {
        return $this->db->where('email !=', $email)
        ->like('namadepan ', $key)
        ->or_like('namabelakang ', $key)
        ->order_by($orderby,$sort)
        ->limit($limit,$start)->get('user')->result_array();
    }

    public function fetchUserFriendSorted2($email,$orderby,$sort)
    {
        return $this->db->where('email !=', $email)
        ->order_by($orderby,$sort)
        ->get('user')->result_array();
    }

    public function fetchUserFriendSortedSearch2($email,$orderby,$sort,$key)
    {
        return $this->db->where('email !=', $email)
        ->like('namadepan ', $key)
        ->or_like('namabelakang ', $key)
        ->order_by($orderby,$sort)
        ->get('user')->result_array();
    }

    public function insertTotal3($email, $totallike, $totalcomment, $totalpost)
    {
        $data = array (
            'totallike' => $totallike,
            'totalcomment' => $totalcomment,
            'totalpost' => $totalpost
        );

        $this->db->where('email', $email);
        $this->db->update('user',$data);
    }
}
