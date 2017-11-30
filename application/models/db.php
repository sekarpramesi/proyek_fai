<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db extends CI_Model {

    public function __construct()
    {
            parent::__construct();
      $this->load->database();
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
