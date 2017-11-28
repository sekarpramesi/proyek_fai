<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {
	public function explore()
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");

			//update jumlah like comment post
			$param['user'] = $this->mod->selectUserFriend($emailnow);
			for ($i=0; $i < count($param['user']); $i++)
			{
				$row = $param['user'][$i];
				$post = $this->mod->selectAllPost($row['email']);
				$totalpost = count($post);
				$totallike= 0;
				$totalcomment = 0;
				foreach ($post as $p)
				{
					$totallike += ($this->mod->countLike($p['idpost']))['jum'];
					$totalcomment += ($this->mod->countComment($p['idpost']))['jum'];
				}
				$this->mod->insertTotal3($row['email'], $totallike, $totalcomment, $totalpost);
			}

			$keyword = $this->input->post('keyword');

			//PAGINATION
			$config = array();
			$config["base_url"] = base_url()."index.php/Cont/explore";
			$config["per_page"] = 8;
			$config["uri_segment"] = 3;
			$config['num_tag_open'] = ' <li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item disabled"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['attributes'] = array('class' => 'page-link');
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			if ($keyword!='')
			{
				$temp = $this->mod->fetchUserFriendSortedSearch($config["per_page"],$page,$emailnow, 'totallike', 'desc', $keyword);
				$config["total_rows"] = count($temp);
			}
			else
			{
				$config["total_rows"] = $this->mod->UserFriendRecordCount($emailnow);
			}


			$this->pagination->initialize($config);

			if ($keyword!='')
			{
				if ($this->input->post('btnsort'))
				{
					$orderby = $this->input->post('cbfilter');
					$sort = $this->input->post('cbsort');

					$param['user'] = $this->mod->fetchUserFriendSortedSearch($config["per_page"],$page,$emailnow, $orderby, $sort, $keyword);
				}
				else
				{
					$param['user'] = $this->mod->fetchUserFriendSortedSearch($config["per_page"],$page,$emailnow, 'totallike', 'desc', $keyword);
				}
			}
			else
			{
				if ($this->input->post('btnsort'))
				{
					$orderby = $this->input->post('cbfilter');
					$sort = $this->input->post('cbsort');

					$param['user'] = $this->mod->fetchUserFriendSorted($config["per_page"],$page,$emailnow, $orderby, $sort);
				}
				else
				{
					$param['user'] = $this->mod->fetchUserFriendSorted($config["per_page"],$page,$emailnow, 'totallike', 'desc');
				}
			}

			$param["links"] = $this->pagination->create_links();
			$param["halaman"] = $this->pagination->cur_page;

			$teman = $this->mod->selectFriend($emailnow);

			//cekteman
			$param['lastpost'] = [];
			$param['status'] = [];

			$param['totallike'] = [];
			$param['totalcomment'] = [];
			$param['totalpost'] = [];
			for ($i=0; $i < count($param['user']); $i++)
			{
				$row = $param['user'][$i];
				$param['lastpost'][$i] = $this->mod->selectLastPost($row['email']);
				$param['status'][$row['email']] = 'tidak';
				$post = $this->mod->selectAllPost($row['email']);
				$totalpost = count($post);
				$totallike= 0;
				$totalcomment = 0;
				foreach ($post as $p)
				{
					$totallike += ($this->mod->countLike($p['idpost']))['jum'];
					$totalcomment += ($this->mod->countComment($p['idpost']))['jum'];
				}
				$param['totallike'][$i] = $totallike;
				$param['totalcomment'][$i] = $totalcomment;
				$param['totalpost'][$i] = $totalpost;
				$this->mod->insertTotal3($row['email'], $totallike, $totalcomment, $totalpost);
			}

			foreach ($teman as $t)
			{
				$cekteman = $this->mod->ceksudahteman($t['friend'], $emailnow);
				if ($t['friend']==$cekteman['emailuser'])
				{
					$param['status'][$t['friend']] = 'ya';
				}
				else
				{
					$param['status'][$t['friend']] = 'belum';
				}
			}

			//notif friendreq sudah benar
			$param['notifikasi'] = 0;
			$friendreq = $this->mod->selectFriendReq($emailnow);
			for ($i=0; $i < count($friendreq); $i++) {
				$cekfriend = $this->mod->ceksudahteman($emailnow,$friendreq[$i]['emailuser']);
				if ($friendreq[$i]['friend']!=$cekfriend['emailuser'])
				{
					$param['notifikasi']++;
				}
			}

			//notif acc, rej, like, comm
			$param['notiflain'] = $this->mod->selectNotif($emailnow);
			$param['notifikasi'] += count($param['notiflain']);
			//
			$this->load->view('explore', $param);
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function notification()
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");
			$param['filterfriendreq'] = [];
			$param['friendreq']=[];
			//notif friendreq sudah benar
			$param['notifikasi'] = 0;
			$param['notifreq'] = [];
			$friendreq = $this->mod->selectFriendReq($emailnow);
			for ($i=0; $i < count($friendreq); $i++) {
				$cekfriend = $this->mod->ceksudahteman($emailnow,$friendreq[$i]['emailuser']);
				if ($friendreq[$i]['friend']!=$cekfriend['emailuser'])
				{
					array_push($param['filterfriendreq'], $friendreq[$i]);
					$prof = $this->mod->selectProfile($friendreq[$i]['emailuser']);
					array_push($param['notifreq'],$prof['email'].' menambahkan kamu menjadi teman ');
					$param['notifikasi']++;
				}
			}

			//PAGINATION
			$config = array();
			$config["base_url"] = base_url()."index.php/Cont/notification";
			$config["total_rows"] = $this->mod->allNotifRecordCount($emailnow);
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$config['num_tag_open'] = ' <li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item disabled"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['attributes'] = array('class' => 'page-link');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$param['notiflain'] = $this->mod->fetchNotif($config["per_page"],$page,$emailnow);

			$param["links"] = $this->pagination->create_links();
			$param["halaman"] = $this->pagination->cur_page;

			//notif acc, rej, like, comm
			$param['notifikasi'] += count($param['notiflain']);
			//
			$this->load->view('notifikasi',$param);
		}
		else
		{
			redirect("Cont/login");
		}
	}
}