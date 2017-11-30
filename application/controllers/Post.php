<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->load->model('db','mod');
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

		$this->load->helper("form");
		$this->load->helper("url");
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library("pagination");
        $this->load->model('db','mod');
	}
}