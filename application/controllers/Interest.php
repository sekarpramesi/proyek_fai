<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interest extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('db','mod');
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
}