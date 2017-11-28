<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('db','mod');
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

}