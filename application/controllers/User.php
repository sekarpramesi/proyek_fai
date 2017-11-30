<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$models=array(
			'M_User'=>'user'
		);
		$this->load->model($models);
	}

	public function index(){
		$email = $this->session->userdata('emailnow');
		$data["title"]="Newsfeed";
		$data["profile"]=$this->user->selectUser($email);
		$data["container"]=array("newsfeed/newsfeed");
		//var_dump($data["profile"]);
		$this->load->view('template/template',$data);
	}

	public function profile()
	{
		/*if ($this->session->userdata('emailnow'))
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
		}*/
		if($this->session->userdata('emailnow')){
			$email = $this->session->userdata('emailnow');
			$data["title"]="Profile";
			$data["profile"]=$this->user->selectUser($email);
			$data["container"]=array("profile/profile");
			//var_dump($data["profile"]);
			$this->load->view('template/template',$data);			
		}
		else
		{
			redirect("User/index");
		}
	}

	public function edit(){
	}

	
	public function newsfeed()
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

			$param['post'] = $this->mod->fetchPost($config["per_page"],$page,$emailother);

			$param['post'] = $this->mod->fetchAllFriendPost($config["per_page"],$page,$param['initeman']);
			$param["links"] = $this->pagination->create_links();
			$param["halaman"] = $this->pagination->cur_page;

			//tampilkan like pada post
			for ($i = 0; $i < count($param['post']); $i++)
			{
				$post = $param['post'][$i];

				$param['liked'][$post['idpost']] = $this->mod->cekButtonLike($post['idpost'],$emailnow);


				$param['comment'][$post['idpost']] = $this->mod->selectComment($post['idpost']);


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
/*
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

			//likers
			$param['likers'] = [];
			foreach ($param['post'] as $p)
			{
				$temp = $this->mod->seeLikers($p['idpost']);
				array_push($param['likers'], $temp);

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

			//
			redirect("Cont/explore");


			$this->load->view('newsfeed',$param);

		}
		else
		{
			redirect("Cont/login");
		}
	}*/
}