<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cont extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("form");
		$this->load->helper("url");
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library("pagination");
        $this->load->model('db','mod');
	}

	public function register()
	{
		if ($this->input->post("btnreg1"))
		{
			$this->form_validation->set_rules('tnamadepan', 'Nama Depan', 'required|alpha');
			$this->form_validation->set_rules('tnamabelakang', 'Nama Belakang', 'required|alpha');
			$this->form_validation->set_rules('temail', 'E-mail', 'required|valid_email');
			$this->form_validation->set_rules('tnohp', 'No hp', 'required|numeric');
			$this->form_validation->set_rules('tpass', 'Password', 'required|min_length[6]|regex_match[/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/]');
			$this->form_validation->set_rules('tkonfpass', 'Confirm Password', 'required|min_length[6]|regex_match[/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/]|matches[tpass]');

			if ($this->form_validation->run() == true)
			{
				$this->session->set_userdata('namadepan',$param['namadepan']);
				$this->session->set_userdata('namabelakang',$param['namabelakang']);
				$this->session->set_userdata('email',$param['email']);
				$this->session->set_userdata('nohp',$param['nohp']);
				$this->session->set_userdata('pass',$param['pass']);

				$this->load->view("register2");
			}
			else
			{
				$this->session->set_flashdata('notif',validation_errors());
				$this->load->view("register1");
			}
		}
		else if ($this->input->post("btnreg2"))
		{
			$this->form_validation->set_rules('talamat','Alamat','required');
			$this->form_validation->set_rules('tkodepos','Kode Pos','required|numeric');
			$this->form_validation->set_rules('cbnegara','Negara','required');
			$this->form_validation->set_rules('tjabatan','Jabatan','required');
			$this->form_validation->set_rules('tperusahaan','Perusahaan','required');

			if ($this->form_validation->run() == true)
			{
				$param['namadepan'] = $this->session->userdata('namadepan');
				$param['namabelakang'] = $this->session->userdata('namabelakang');
				$param['email'] = $this->session->userdata("email");
				$param['nohp'] = $this->session->userdata('nohp');
				$param['pass'] = $this->session->userdata('pass');

				$param['alamat'] = $this->input->post('talamat');
				$param['kodepos'] = $this->input->post('tkodepos');
				$param['negara'] = $this->input->post('cbnegara');
				$param['jabatan'] = $this->input->post('tjabatan');
				$param['perusahaan'] = $this->input->post('tperusahaan');
				$param['bioperusahaan'] = $this->input->post('tbioperusahaan');
				$param['biouser'] = $this->input->post('tbiouser');

				$this->mod->insertUser($param);
				redirect("Cont/login");
			}
			else
			{
				$this->session->set_flashdata('notif',validation_errors());
				$this->load->view("register2");
			}
		}
		else
		{
			$this->load->view("register1");
		}
	}

	public function login()
	{
		if ($this->input->post("btnreg"))
		{
			redirect("Cont/register");
		}
		else if ($this->input->post("btnlogin"))
		{
			$berhasil = false;
			$salahpass = false;

			$this->form_validation->set_rules('tuserlogin', 'E-mail atau No. HP', 'required');
			$this->form_validation->set_rules('tpasslogin', 'Password', 'required|min_length[6]');

			$userlogin = $this->input->post('tuserlogin');
			$passlogin = $this->input->post('tpasslogin');

			$hasil = $this->mod->selectUser();

			if ($this->form_validation->run() == true)
			{
				foreach ($hasil as $row)
				{
					if ($userlogin == $row['email'] || $userlogin == $row['nohp'])
					{
						if ($passlogin == $row['password'])
						{
							$berhasil = true;
						}
						else
						{
							$salahpass = true;
						}
						break;
					}
				}

				if ($berhasil==false && $salahpass==true)
				{
					$this->session->set_flashdata('notif','Password salah');
					$this->load->view("login");
				}
				else if ($berhasil==false && $salahpass==false)
				{
					$this->session->set_flashdata('notif','Email atau No. HP tidak terdaftar');
					$this->load->view("login");
				}
				else if ($berhasil==true && $salahpass==false) //BERHASIL LOGIN
				{
					$this->session->set_userdata("emailnow",$userlogin);
					$this->myProfile();
				}
			}
			else
			{
				$this->session->set_flashdata('notif',validation_errors());
				$this->load->view("profile");
			}
		}
		else
		{
			if ($this->session->userdata('emailnow'))
			{
				redirect("Cont/myProfile");
			}
			else
			{
				$this->load->view("login");
			}
		}
	}

	public function myProfile()
	{
		if ($this->session->userdata('emailnow'))
		{
			$email = $this->session->userdata('emailnow');
			$this->session->unset_userdata('emailother');
			$param['profile'] = $this->mod->selectProfile($email);
			$profile = $param['profile'];

			$param['header'] = "<h3>Welcome ".$profile['namadepan'] ." ".$profile['namabelakang']."!</h3>";

			//PAGINATION
			$config = array();
			$config["base_url"] = base_url()."index.php/Cont/myProfile";
			$config["total_rows"] = $this->mod->postRecordCount($email);
			$config["per_page"] = 7;
			$config["uri_segment"] = 3;
			$config['num_tag_open'] = ' <li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item disabled"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['attributes'] = array('class' => 'page-link');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$param['post'] = $this->mod->fetchPost($config["per_page"],$page,$email);
			$param["links"] = $this->pagination->create_links();
			$param["halaman"] = $this->pagination->cur_page;

			//tampilkan like pada post
			for ($i = 0; $i < count($param['post']); $i++)
			{
				$post = $param['post'][$i];
				$param['liked'][$post['idpost']] = $this->mod->cekButtonLike($post['idpost'],$email);
				$param['comment'][$post['idpost']] = $this->mod->selectComment($post['idpost']);
				$param['countlike'][$i] = $this->mod->countLike($post['idpost']);
				$param['countcomment'][$i] = $this->mod->countComment($post['idpost']);
			}

			//likers
			$param['likers'] = [];
			foreach ($param['post'] as $p)
			{
				$temp = $this->mod->seeLikers($p['idpost']);
				array_push($param['likers'], $temp);
			}

			//notif friendreq sudah benar
			$param['notifikasi'] = 0;
			$friendreq = $this->mod->selectFriendReq($email);
			for ($i=0; $i < count($friendreq); $i++) {
				$cekfriend = $this->mod->ceksudahteman($email,$friendreq[$i]['emailuser']);
				if ($friendreq[$i]['friend']!=$cekfriend['emailuser'])
				{
					$param['notifikasi']++;
				}
			}

			//notif acc, rej, like, comm
			$param['notiflain'] = $this->mod->selectNotif($email);
			$param['notifikasi'] += count($param['notiflain']);
			//
			$param['skill'] = $this->mod->selectSkill($email);
			$this->load->view("profile", $param);
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function navbar()
	{
		if ($this->session->userdata('emailnow'))
		{
			if ($this->input->post("btnlogout"))
			{
				$this->session->sess_destroy();
				$this->session->set_flashdata('notif','Logout berhasil!');
				redirect("Cont/login");
			}
			else if ($this->input->post("btnExplore"))
			{
				redirect("Cont/explore");
			}
			else if ($this->input->post("btnMyProfile"))
			{
				$this->session->unset_userdata('emailother');
				redirect("Cont/myProfile");
			}
			else if ($this->input->post("btnNotif"))
			{
				redirect("Cont/notification");
			}
			else if ($this->input->post("btnNewsfeed"))
			{
				redirect("Cont/newsfeed");
			}
			else if ($this->input->post("btnChat"))
			{
				redirect("Cont/chat2");
			}
		}
		else
		{
			redirect("Cont/login");
		}
	}

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

	public function newsfeed()
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");
			$param['status'] = [];
			$param['initeman'] = [];
			$teman = $this->mod->selectFriend($emailnow);
			foreach ($teman as $t)
			{
				$cekteman = $this->mod->ceksudahteman($t['friend'], $emailnow);
				if ($t['friend']==$cekteman['emailuser'])
				{
					array_push($param['initeman'],$t['friend']);
				}
			}

			//PAGINATION
			$config = array();
			$config["base_url"] = base_url()."index.php/Cont/newsfeed";
			$config["total_rows"] = $this->mod->allFriendPostRecordCount($param['initeman']);
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;
			$config['num_tag_open'] = ' <li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item disabled"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['attributes'] = array('class' => 'page-link');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$param['post'] = $this->mod->fetchAllFriendPost($config["per_page"],$page,$param['initeman']);
			$param["links"] = $this->pagination->create_links();
			$param["halaman"] = $this->pagination->cur_page;

			//tampilkan like pada post
			for ($i = 0; $i < count($param['post']); $i++)
			{
				$post = $param['post'][$i];

				$param['liked'][$post['idpost']] = $this->mod->cekButtonLike($post['idpost'],$emailnow);
				$param['comment'][$post['idpost']] = $this->mod->selectComment($post['idpost']);
				$param['countlike'][$i] = $this->mod->countLike($param['post'][$i]['idpost']);
				$param['countcomment'][$i] = $this->mod->countComment($param['post'][$i]['idpost']);
			}

			//likers
			$param['likers'] = [];
			foreach ($param['post'] as $p)
			{
				$temp = $this->mod->seeLikers($p['idpost']);
				array_push($param['likers'], $temp);
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

			$this->load->view('newsfeed',$param);
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function chat2()
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");
			$this->session->unset_userdata("idchatnow");

			//notif friendreq sudah benar
			$param['notifikasi'] = 0;
			$param['notifreq'] = [];
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

			$param['newchat'] = false;
			$param['judulchat'] = [];
			$param['idchat'] = [];
			$param['photo'] = [];

			//PAGINATION
			$config = array();
			$config["base_url"] = base_url()."index.php/Cont/chat2";
			$config["total_rows"] = $this->mod->AllChatRoomRecordCount($emailnow);
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$config['num_tag_open'] = ' <li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item disabled"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['attributes'] = array('class' => 'page-link');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$param['allidchat'] = $this->mod->fetchAllChatRoom($config["per_page"],$page,$emailnow);

			$param["links"] = $this->pagination->create_links();
			$param["halaman"] = $this->pagination->cur_page;


			$param['lasttime'] = [];
			foreach ($param['allidchat'] as $id)
			{
				$param['listfriend'] = [];
				$temp  = $this->mod->selectChatUser($id['idchat'], $emailnow);
				foreach ($temp as $t)
				{
					array_push($param['listfriend'],$t['email']);
				}

				$temp = $this->mod->selectJudulChatRoom($id['idchat']);
				$judul = implode(", ",$param['listfriend']);
				array_push($param['judulchat'], $judul);
				array_push($param['idchat'], $id['idchat']);

				$temp = $this->mod->selectLastChatTime($id['idchat']);
				array_push($param['lasttime'], $temp['waktu']);

				//ambil photo
                if (count($param['listfriend'])==1)
                {
                    $femail = $param['listfriend'][0];
                    $profile = $this->mod->selectProfile($femail);
                    if ($profile['photo']!='' && $profile['photo']!=null)
                        array_push($param['photo'], $profile['photo']);
                    else
                        array_push($param['photo'], 'default.jpeg');
                }
                else
                {
                    array_push($param['photo'], 'group.png');
                }
			}

			$this->load->view('chat',$param);
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function edit()
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");
			if ($this->input->post("btnedit"))
			{
				$hasil = $this->mod->selectProfile($emailnow);

				$param["private"] = $hasil['private'];
				$param["alamatuser"] =$hasil['alamat'];
				$param["kodeposuser"] =$hasil['kodepos'];
				$param["negarauser"] =$hasil['negara'];
				$param["jabatanuser"] =$hasil['jabatan'];
				$param["perusahaanuser"] = $hasil['perusahaan'];
				$param["bioperuser"] = $hasil['bioperusahaan'];
				$param["biouser"] =$hasil['biouser'];
				$param['photo'] = $hasil['photo'];
				$param['music'] = $hasil['music'];

				$this->load->view("editprofile",$param);
			}
			else if ($this->input->post("btnsaveprof"))
			{
				$param['indexlike'] = 0;
				$param['liked'] = false;

				$hasil = $this->mod->selectProfile($emailnow);

				$this->form_validation->set_rules('talamat','Alamat','required');
				$this->form_validation->set_rules('tkodepos','Kode Pos','required|numeric');
				$this->form_validation->set_rules('cbnegara','Negara','required');
				$this->form_validation->set_rules('tjabatan','Jabatan','required');
				$this->form_validation->set_rules('tperusahaan','Perusahaan','required');

				if ($this->form_validation->run() == true)
				{
					$hasil['alamat'] = $this->input->post('talamat');
					$hasil['kodepos'] = $this->input->post('tkodepos');
					$hasil['negara'] = $this->input->post('cbnegara');
					$hasil['perusahaan'] = $this->input->post('tperusahaan');
					$hasil['bioperusahaan'] = $this->input->post('tbioperusahaan');
					$hasil['biouser'] = $this->input->post('tbiouser');
					$checked = $this->input->post('checkPrivate');
					if ($checked=='private')
							$hasil['private'] = 'true';
					else
							$hasil['private'] = 'false';

					//upload photo
                    //$this->load->library('upload');
                    $hasil['photo'] = $this->uploadphoto($hasil);
                    $hasil['music'] = $this->uploadmusic($hasil);
					$this->mod->updateUser($hasil);
				}
				redirect("cont/myProfile");
			}
			else if ($this->input->post("btneditacc"))
			{
				$hasil = $this->mod->selectProfile($emailnow);

				$param["emailuser"] = $hasil['email'];
				$param["passuser"]  = $hasil['password'];
				$param["namadepanuser"] = $hasil['namadepan'];
				$param["namabelakanguser"] = $hasil['namabelakang'];
				$param["nohpuser"] =$hasil['nohp'];

				$this->load->view("editacc",$param);
			}
			else if ($this->input->post("btnsaveacc"))
			{
				$param['indexlike'] = 0;
				$param['liked'] = false;
				$hasil = $this->mod->selectProfile($emailnow);

				$this->form_validation->set_rules('tnamadepan', 'Nama Depan', 'required|alpha');
				$this->form_validation->set_rules('tnamabelakang', 'Nama Belakang', 'required|alpha');
				$this->form_validation->set_rules('temail', 'E-mail', 'required|valid_email');
				$this->form_validation->set_rules('tnohp', 'No hp', 'required|numeric');
				$this->form_validation->set_rules('tpass', 'Password', 'required|min_length[6]|regex_match[/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/]');
				$this->form_validation->set_rules('tkonfpass', 'Confirm Password', 'required|min_length[6]|regex_match[/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/]|matches[tpass]');

				if ($this->form_validation->run() == true)
				{
					$hasil['email'] = $this->input->post('temail');
					$hasil['password'] = $this->input->post('tpass');
					$hasil['namadepan'] = $this->input->post('tnamadepan');
					$hasil['namabelakang'] = $this->input->post('tnamabelakang');
					$hasil['nohp'] = $this->input->post('tnohp');

					$this->mod->updateUser2($param['emailnow'],$hasil);
				}

				redirect("cont/myProfile");
			}
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function uploadphoto($hasil)
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'mp3|jpeg|jpg|png|JPG';
        $config['file_name'] =  $hasil['namadepan'].$hasil['namabelakang'];
        $config['max_size'] = '0';
        $config['overwrite'] = 'true';

        $this->load->library('upload', $config);
        //$this->upload->initialize($config);

        if ( ! $this->upload->do_upload("photo"))
        {
            $param["error"] = $this->upload->display_errors();
            return $hasil['photo'];
        }
        else
        {
            $te = $this->upload->data();
            return $te["file_name"];
            //$hasil['photo'] = $te["file_name"];
        }
    }

    public function uploadmusic($hasil)
    {
        $_FILES['music']['type'] = str_replace('\"' , '' , $_FILES['user_file']['type'] );

        $_FILES['music']['type'] = str_replace('"' , '' , $_FILES['user_file']['type'] );

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'mp3';
        $config['file_name'] =  $hasil['namadepan'].$hasil['namabelakang']."music";
        $config['max_size'] = '0';
        $config['max_filename'] = '0';
        $config['overwrite'] = 'true';

        $this->load->library('upload', $config);
        //$this->upload->initialize($config);

        if ( ! $this->upload->do_upload("music"))
        {
            $param["error"] = $this->upload->display_errors();
            echo $param["error"];
            return $param["error"];
            //return $hasil['music'];
        }
        else
        {
            $te = $this->upload->data();
            return $te["file_name"];
            //$hasil['music'] = $te["file_name"];
        }
    }

	public function post()
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");
			if ($this->input->post("btnpost"))
			{
				//cekteman
				$param['status'] = [];
				$param['initeman'] = [];
				$teman = $this->mod->selectFriend($emailnow);
				foreach ($teman as $t)
				{
					$cekteman = $this->mod->ceksudahteman($t['friend'], $emailnow);
					if ($t['friend']==$cekteman['emailuser'])
					{
						array_push($param['initeman'],$t['friend']);
					}
				}

				$waktu = date('Y-m-d H:i:s');
				$isipost = $this->input->post('tpost');
				$word = explode(' ',$isipost);

				$i = 0;
				$listemail = [];
				foreach ($word as $w)
				{
					if (strpos($w,"@")!== false)
					{
						$nama = substr($w,1);
						$hasil = $this->mod->selectEmailbyNama($nama);
						$email = $hasil['email'];
						$cek = false;
						foreach ($param['initeman'] as $ini)
						{
							if ($email==$ini)
							{
								array_push($listemail, $email);
								$cek=true;
								break;
							}
						}
						if ($cek)
						{
							$nama = $hasil['namadepan'];
							$path = base_url();
							$path .= "index.php/cont/profileUserLain/".$i;
							if (count($hasil)>0)
							{
								$a = "<a href='$path'>"."@".$nama."</a>";
								$isipost = str_replace($w, $a, $isipost);
							}
							$i++;
							break;
						}
					}
				}

				//attach image
                $lastpost = $this->mod->selectLastPostAll();
				$idlast=$lastpost['idpost']+1;
                $config['upload_path'] = './uploads/post/';
                $config['allowed_types'] = 'jpeg|jpg|png|JPG';
                $config['file_name'] =  'post'.$idlast.'_';
                $config['max_size'] = '0';
                $config['overwrite'] = 'false';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload("attach"))
                {
                    $param["error"] = $this->upload->display_errors();
                    $pic = '';
                }
                else
                {
                    $te = $this->upload->data();
                    $pic = $te["file_name"];
                }
                //

				$this->mod->insertPost($isipost, $emailnow, $waktu, $pic);

				$param['post'] = $this->mod->selectAllPost($emailnow);
				redirect("Cont/myProfile");
			}
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function profileUserLain($i, $klikend=[])
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");
			$listemail = $this->session->userdata("listemail");
			$emailother = $listemail[$i];
			$this->session->set_userdata("emailother", $emailother);
			$param['userlain'] = true;
			$param['indexlike'] = 0;
			$param['notif'] = "";
			$param['header'] = "";
			$param['buttonadd'] = "";
			$param['profile'] = $this->mod->selectProfile($emailother);

			//PAGINATION
			$config = array();
			$config["base_url"] = base_url()."index.php/Cont/profileUserLain";
			$config["total_rows"] = $this->mod->postRecordCount($emailother);
			$config["per_page"] = 7;
			$config["uri_segment"] = 3;
			$config['num_tag_open'] = ' <li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item disabled"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['attributes'] = array('class' => 'page-link');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$param['post'] = $this->mod->fetchPost($config["per_page"],$page,$emailother);
			$param["links"] = $this->pagination->create_links();
			$param["halaman"] = $this->pagination->cur_page;

			//tampilkan like pada post
			for ($i = 0; $i < count($param['post']); $i++)
			{
				$post = $param['post'][$i];

				$param['liked'][$post['idpost']] = $this->mod->cekButtonLike($post['idpost'],$emailnow);

				$param['comment'][$post['idpost']] = $this->mod->selectComment($post['idpost']);

				$param['countlike'][$i] = $this->mod->countLike($param['post'][$i]['idpost']);
				$param['countcomment'][$i] = $this->mod->countComment($param['post'][$i]['idpost']);
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

			$param['klikend'] = $klikend;

			//untuk private dan send Message
			//cekteman
			$param['status'] = [];
			$param['initeman'] = [];
			$teman = $this->mod->selectFriend($emailnow);
			foreach ($teman as $t)
			{
				$cekteman = $this->mod->ceksudahteman($t['friend'], $emailnow);
				if ($t['friend']==$cekteman['emailuser'])
				{
					array_push($param['initeman'],$t['friend']);
				}
			}

			$param['cek'] = false;
			foreach ($param['initeman'] as $ini)
			{
				if ($emailother==$ini)
				{
					$param['cek'] = true;
					break;
				}
			}
			$param['skill'] = $this->mod->selectAllSkill($emailother);
			$this->load->view("profile", $param);
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function message()
	{
		if ($this->session->userdata('emailnow'))
		{
			if ($this->input->post("btnSendMsg"))
			{
				$emailnow = $this->session->userdata("emailnow");
				$emailother = $this->session->userdata("emailother");

				$param['newchat'] = false;
				$semua = $this->mod->selectAllChat($emailnow);
				$ketemu = false;
				foreach ($semua as $chat)
				{
					$chat2 = $this->mod->searchChat($chat['idchat'],$chat['email']);
					foreach ($chat2 as $c2)
					{
							if ($emailother==$c2['email'])
							{
									$idc = $chat['idchat'];
									$ketemu=true;
									break;
							}
					}
				}

				if ($ketemu)
				{
					redirect("Cont/openChatRoom/$idc");
				}
				else
				{
					$param['listfriend'] = [];
					$judulchat = $emailother;
					$this->mod->insertChatRoom($judulchat);
					$temp = $this->mod->selectIDChatRoom();
					$idchatnow = $temp['idchatnow'];
					$this->mod->insertChatUser($idchatnow,$emailnow);
					$this->mod->insertChatUser($idchatnow,$emailother);
					$this->session->set_userdata("idchatnow", $idchatnow);
					$param['allchats'] = [];
					$temp  = $this->mod->selectChatUser($idchatnow, $emailnow);
					foreach ($temp as $t)
					{
						array_push($param['listfriend'],$t['email']);
					}
					redirect("Cont/openChatRoom/$idchatnow");
				}
			}
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function skillPage()
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");
			//notif friendreq sudah benar
			$param['notifikasi'] = 0;
			$param['notifreq'] = [];
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
			$param['skill'] = $this->mod->selectALLSkill($emailnow);
			//endorser
			$param['endorser'] = [];
			foreach ($param['skill'] as $sk)
			{
				$temp = $this->mod->seeEndorser($sk['idskill']);
				array_push($param['endorser'], $temp);
			}
			$this->load->view("skill",$param);
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function skill()
	{
		if ($this->session->userdata('emailnow'))
		{
			if ($this->input->post("btnSkill"))
			{
				redirect("Cont/skillPage");
			}

			$listemail = [];
			//endorse things
			$allskill = $this->mod->selectAllSkill2();
			$klikend = false;
			$param['klikend'] = [];
			$end = false;
			$i=0;
			foreach ($allskill as $skill)
			{
				$id = $skill['idskill'];
				$email = $skill['email'];
				array_push($listemail, $email);
				if ($this->input->post('btnendorse'.$id))
				{
					$this->mod->insertEndorse($id, $param['emailnow']);
					$jum = $this->mod->countEndorse($id);
					$this->mod->updateJumlahEnd($id,$jum);
					$temp = $this->mod->selectEmailbyIdSkill($id);
					$emaildia =$temp['email'];
					$param['klikend'][$id] = true;
					$klikend = true;
					$end=true;
					break;
				}
				else if ($this->input->post('btnunendorse'.$id))
				{
					$this->mod->deleteEndorse($id, $param['emailnow']);
					$jum = $this->mod->countEndorse($id);
					$this->mod->updateJumlahEnd($id,$jum);
					$temp = $this->mod->selectEmailbyIdSkill($id);
					$emaildia =$temp['email'];
					$end=true;
					break;
				}
				$temp = $this->mod->cekEndorser($param['emailnow'],$id);
				if (count($temp)>0)
					$param['klikend'][$id] = true;
				else
					$param['klikend'][$id] = false;

				$i++;
			}

			if ($end)
			{
				$this->profileUserLain($i, $param['klikend']);
			}
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function addFriend()
	{
		if ($this->session->userdata('emailnow'))
		{
			$param['notif']="";
			$param['klikadd']= false;
			$param['indexadd']="";
			$param['emailfriend']="";
			$emailnow = $this->session->userdata("emailnow");
			$param['user'] = $this->mod->selectUserFriend($emailnow);
			//klik add
			for ($i=0; $i<count($param['user']); $i++)
			{
				if ($this->input->post("btnaddfriend".$i))
				{
					$row = $param['user'][$i];

					$param['indexadd'] = $i;
					$param['indexadd2'][$i] =  $row['email'];
					$param['emailfriend'] = $row['email'];
					$param['notif'] = $param['emailfriend']." added!";
					$param['klikadd']=true;
					$this->mod->insertFriend($emailnow,$param['emailfriend']);
					break;
				}
			}

			$teman = $this->mod->selectFriend($emailnow);
			//cekteman
			$param['lastpost'] = [];
			$param['status'] = [];

			for ($i=0; $i < count($param['user']); $i++)
			{
				$row = $param['user'][$i];
				$param['lastpost'][$i] = $this->mod->selectLastPost($row['email']);
				$param['status'][$row['email']] = 'tidak';
			}

			foreach ($teman as $t)
			{
				$cekteman = $this->mod->ceksudahteman($t['friend'], $$emailnow);
				if ($t['friend']==$cekteman['emailuser'])
				{
					$param['status'][$t['friend']] = 'ya';
				}
				else
				{
					$param['status'][$t['friend']] = 'belum';
				}
			}

			//cek accept sama Reject
			$friendreq = $this->mod->selectFriendReq($emailnow);
			foreach ($friendreq as $f)
			{
				//Accept
				if ($this->input->post("btnaccept".$f["id"]))
				{
					$this->mod->insertFriend2($f["emailuser"],$f["friend"]);
					$isi = $f["emailuser"] . " menerima permintaan pertemanan anda.";
					$this->mod->insertNotif($f["friend"],$isi,'accept');
				}
				//reject
				else if ($this->input->post("btnreject".$f["id"]))
				{
					$this->mod->deleteFriendReq($f["emailuser"],$f["friend"]);
					$isi = $f["emailuser"] . " menolak permintaan pertemanan anda.";
					$this->mod->insertNotif($f["friend"],$isi,'reject');
				}
			}

			//notif friendreq sudah benar
			$param['notifikasi'] = 0;
			$param['notifreq'] = [];
			$friendreq = $this->mod->selectFriendReq($emailnow);
			for ($i=0; $i < count($friendreq); $i++) {
				$cekfriend = $this->mod->ceksudahteman($emailnow,$friendreq[$i]['emailuser']);
				if ($friendreq[$i]['friend']!=$cekfriend['emailuser'])
				{
					$prof = $this->mod->selectProfile($friendreq[$i]['emailuser']);
					array_push($param['notifreq'],$prof['email'].' menambahkan kamu menjadi teman ');
					$param['notifikasi']++;
				}
			}
			//notif acc, rej, like, comm
			$param['notiflain'] = $this->mod->selectNotif($emailnow);
			$param['notifikasi'] += count($param['notiflain']);
			//
			redirect("Cont/explore");
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function likeCommentPost($v='prof')
	{
		if ($this->session->userdata('emailnow'))
		{
			$param['cek'] = false;
			$param['header'] = "";
			$param['listlikers'] = [];
			$param['liked'] = [];
			$param['indexlike'] = 0;

			$emailnow = $this->session->userdata("emailnow");
			if ($this->session->userdata('emailother'))
			{
				$emailother = $this->session->userdata("emailother");
				$param['profile'] = $this->mod->selectProfile($emailother);
				$param['post'] = $this->mod->selectAllPost($emailother);
				$profile = $param['profile'];
			}
			else
			{
				$param['profile'] = $this->mod->selectProfile($emailnow);
				$param['post'] = $this->mod->selectAllPost($emailnow);
				$profile = $param['profile'];
			}

			if ($v=='prof')
			{
				$param['post'] = $this->mod->selectAllPost($emailnow);
			}
			else //v='nf'
			{
				//cekteman
				$param['status'] = [];
				$param['initeman'] = [];
				$teman = $this->mod->selectFriend($emailnow);
				foreach ($teman as $t)
				{
					$cekteman = $this->mod->ceksudahteman($t['friend'], $emailnow);
					if ($t['friend']==$cekteman['emailuser'])
					{
						array_push($param['initeman'],$t['friend']);
					}
				}

				$param['post'] = $this->mod->selectAllFriendPost($param['initeman']);
			}

			$param['header'] = "<h3>Welcome ".$profile['namadepan'] ." ".$profile['namabelakang']."!</h3>";

			//likesamacommentnya
			$listemail = [];
			for ($i = 0; $i < count($param['post']); $i++)
			{
				$p = $param['post'][$i];
				array_push($listemail, $p['email']);
				if ($this->input->post("btnlikepost".$p['idpost']))
				{
					$this->mod->insertLike($p['idpost'],$emailnow);
					$isi = $emailnow . " menyukai post anda.";
					$this->mod->insertNotif($p['email'],$isi,'like');
					break;
				}
				else if ($this->input->post("btnunlikepost".$p['idpost']))
				{
					$this->mod->deleteLike($p['idpost'],$emailnow);
					break;
				}
				else if ($this->input->post("btncommentpost".$p['idpost']))
				{
					$comment = $this->input->post('tcomment'.$p['idpost']);
					if ($comment!="")
					{
						$this->mod->insertComment($p['idpost'],$emailnow,$comment);
						$isi = $emailnow . " berkomentar pada post anda.";
						$this->mod->insertNotif($p['email'],$isi,'like');
					}
					break;
				}
				else if ($this->input->post("btndelpost".$p['idpost']))
				{
					$this->mod->deletePost($p['idpost']);
					break;
				}
				else if ($this->input->post("btnsharepost".$p['idpost']))
				{
					$potongemail = explode('@',$param['emailnow']);
					$email1 = $potongemail[0];
					$path = base_url() . "index.php/cont/profileUserLain/".$i;

					$hasil = $this->mod->selectNamabyEmail($p['email']);

					$isipost = $p['isipost'];
					$email = $emailnow;
					$share = "Shared from ";
					$share .= "<a href='$path'>"."@".$hasil['namadepan']."</a>";
					$this->mod->insertSharedPost($isipost, $email, $share);
					break;
				}
				else
				{
					$semuacomment = $this->mod->selectComment($p['idpost']);
					foreach ($semuacomment as $listcomment)
					{
						if ($this->input->post("btndelcom".$listcomment['idcomment']))
						{
							$this->mod->deleteComment($listcomment['idcomment']);
						}
					}
				}
			}

			if ($v=='prof')
			{
					redirect("Cont/myProfile");
			}
			else //v='nf'
			{
					redirect("Cont/newsfeed");
			}
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function chat()
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");
			$param['header'] = "";
			if ($this->input->post('btnNewChat'))
			{
				$param['newchat'] = true;
				$param['profileteman'] = [];
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

				//cekteman
				$param['status'] = [];
				$param['initeman'] = [];
				$teman = $this->mod->selectFriend($emailnow);
				foreach ($teman as $t)
				{
					$cekteman = $this->mod->ceksudahteman($t['friend'], $emailnow);
					if ($t['friend']==$cekteman['emailuser'])
					{
						array_push($param['profileteman'], $this->mod->selectProfile($t['friend']));

					}
				}
				//
				$this->load->view('chat',$param);
			}
			else if ($this->input->post('btnMakeChat'))
			{
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

				//mulai buat chatroom
				$param['listfriend'] = $this->input->post('listfriend');
				if (!empty($param['listfriend']))
				{
					$judulchat = implode(", ",$param['listfriend']);
					$this->mod->insertChatRoom($judulchat);
					$temp = $this->mod->selectIDChatRoom();
					$idchatnow = $temp['idchatnow'];
					$this->mod->insertChatUser($idchatnow,$emailnow);
					foreach ($param['listfriend'] as $selected)
					{
						$this->mod->insertChatUser($idchatnow,$selected);
					}
				}
				$this->session->set_userdata('idchatnow',$idchatnow);
				$param['idchatnow'] = $idchatnow;
				$param['allchats'] = [];
				$this->load->view('chatroom',$param);
			}
			else if ($this->input->post('btnSendChat'))
			{
				$emailnow = $this->session->userdata("emailnow");
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

				//urusan chat
				$id = $this->session->userdata("idchatnow");
				$param['listfriend'] = [];

				$temp  = $this->mod->selectChatUser($id, $emailnow);
				foreach ($temp as $t)
				{
					array_push($param['listfriend'],$t['email']);
				}
				$waktu = date('Y-m-d H:i:s');
				$pesan = $this->input->post('txtchat');

				$idpesan = $this->mod->selectLastIDPesan();
				$idpesan = $idpesan['idpesan']+1;
				//attach image
                $config['upload_path'] = './uploads/pesan/';
                $config['allowed_types'] = 'jpeg|jpg|png|JPG';
                $config['file_name'] = 'pesan'.$idpesan."_";
                $config['max_size'] = '0';
                $config['overwrite'] = 'false';

                $this->load->library('upload', $config);
                //$this->upload->initialize($config);

                if ( ! $this->upload->do_upload("attach"))
                {
                    $param["error"] = $this->upload->display_errors();
                    $pic = '';
                }
                else
                {
                    $te = $this->upload->data();
                    $pic = $te["file_name"];
                    //$hasil['photo'] = $te["file_name"];
                }
                //

                $this->mod->insertPesan($id,$pesan, $emailnow,$waktu, $pic);

				$param['allchats'] = $this->mod->selectPesan($id);

				redirect("Cont/openChatRoom/$id");
			}
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function delChat()
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");
			$id = $this->session->userdata('idchatnow');
			$param['allchats'] = $this->mod->selectPesan($id);
			foreach ($param['allchats'] as $chat)
			{
				if ($this->input->post('btndelchat'.$chat['idpesan']))
				{
					$this->mod->deletePesan($chat['idpesan']);
					break;
				}
			}

			redirect("Cont/openChatRoom/$id");
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function openChatRoom($id)
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");
			$this->session->set_userdata('idchatnow',$id);
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

			//urusan chatrom
			$param['listfriend'] = [];
			$temp  = $this->mod->selectChatUser($id, $emailnow);

			$param['photo'] = [];
            $prof = $this->mod->selectProfile($emailnow);
            array_push($param['photo'],$prof['photo']);
			foreach ($temp as $t)
			{
				array_push($param['listfriend'],$t['email']);
				$prof = $this->mod->selectProfile($t['email']);
				array_push($param['photo'],$prof['photo']);
			}
			$param['allchats'] = $this->mod->selectPesan($id);

			$this->load->view('chatroom',$param);
		}
		else
		{
			redirect("Cont/login");
		}
	}

	public function addSkill()
	{
		if ($this->session->userdata('emailnow'))
		{
			$emailnow = $this->session->userdata("emailnow");
			//addSkill
			$namaskill = $this->input->post('tnamaskill');
			if ($namaskill!="")
			{
				$this->mod->insertSkill($emailnow,$namaskill);
			}

			$param['skill'] = $this->mod->selectAllSkill($emailnow);

			//delskill
			foreach ($param['skill'] as $sk)
			{
				if ($this->input->post('btndelskill'.$sk['idskill']))
				{
					$this->mod->deleteSkill($sk['idskill']);
				}
			}

			redirect("Cont/skillPage");
			}
		else
		{
			redirect("Cont/login");
		}
	}
}
