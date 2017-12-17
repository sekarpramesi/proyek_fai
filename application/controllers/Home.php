<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$models=array(
			'M_User'=>'user'
		);
        $this->load->model($models);
	}

	public function index(){
		if($this->input->cookie('keepUserEmail',true)!="") {
			$email = $this->input->cookie('keepUserEmail',true);
			$status=$this->user->selectUser($email);
			if($status>0){
				if($status[0]["VERIFICATION"]==1){

					if($status[0]["COMPLETION"]==1){
						$data=array("email"=>$email,"access"=>"1");
						$this->session->set_userdata("logged_in",$data);
						redirect('User/index');
					}else{
						$data=array("email"=>$email,"access"=>"0");
						$this->session->set_userdata("logged_in",$data);
						redirect('Dashboard/index');
					}
				}
				
			}else{
				delete_cookie('keepUserEmail');
				$this->load->view('landing');
			}
		}
		else if($this->input->cookie('keepUserEmail',true)==""){
			$this->load->view('landing');
		}	
	}

	public function register(){
		$post=$this->input->post();

		$param["firstName"]=$post["txtFirstName"];
		$param["lastName"]=$post["txtLastName"];
		$param["email"]=$post["txtEmail"];
		$param["password"]=$post["txtPassword"];
		$param["confPassword"]=$post["txtConfPassword"];

		$this->form_validation->set_rules('txtFirstName','First Name','required|alpha');
		$this->form_validation->set_rules('txtLastName', 'Last Name', 'required|alpha');
		$this->form_validation->set_rules('txtEmail', 'E-mail', 'required|valid_email');
		$this->form_validation->set_rules('txtPassword', 'Password', 'required|min_length[6]|regex_match[/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/]');
		$this->form_validation->set_rules('txtConfPassword', 'Confirm Password', 'required|min_length[6]|regex_match[/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/]|matches[txtPassword]');

		if ($this->form_validation->run() == true){
			$this->user->insertUser($param);
			$this->session->set_flashdata('notif',"Registration successful! Please check your email inbox to verify your account");
		}else{
			$this->session->set_flashdata('errors',validation_errors());
		}	
	}

	public function login(){
		$post=$this->input->post();
		$email=$post["txtEmail"];

		$this->form_validation->set_rules('txtEmail', 'E-mail', 'valid_email|required');
		$this->form_validation->set_rules('txtPassword', 'Password', 'required');

		if($this->form_validation->run()==true){
			$status=$this->user->selectUser($email);

			if($status>0){
				if($status[0]["VERIFICATION"]==1){

					if($status[0]["COMPLETION"]==1){
						$data=array("email"=>$email,"access"=>"1");
						$this->session->set_userdata("logged_in",$data);
						$cookie = array('name' => 'keepUserEmail', 'value' => $this->session->userdata["logged_in"]["email"], 'expire' => 60*60*24);
						$this->input->set_cookie($cookie);
						redirect('User/index');
					}else{
						$data=array("email"=>$email,"access"=>"0");
						$this->session->set_userdata("logged_in",$data);
						$cookie = array('name' => 'keepUserEmail', 'value' => $this->session->userdata["logged_in"]["email"], 'expire' => 60*60*24);
						$this->input->set_cookie($cookie);
						redirect('Settings/index');
					}
				}else{
					$this->load->view('landing');
				}
			}
		}else{
			$this->load->view('landing');
		}

	}

///form validation checker//////
	
	public function userVerification($content){
		if($this->user->selectUser($content)){
			$user=$this->user->selectUser($content);
			return $this->checkVerification($user);
		}else{
			echo $this->form_validation->set_message('callback_userVerification','This account does not exist');
			return false;
		}		
	}

	public function checkVerification($param){
		var_dump($param);
		if($param[0]["VERIFICATION"]==1){
			$email=$param[0]["EMAIL_USER"];
			$password=$this->input->post('txtPassword');
			$data=array($email,$password);
			return checkPassword($data);
		}else{
			echo $this->form_validation->set_message('callback_userVerification','Your account is not verified!');
			return false;			
		}
	}

	public function checkPassword($param){
		var_dump($param);
		if($this->user->validation($param)>0){
			return true;
		}else{
			echo $this->form_validation->set_message('callback_userVerification','Invalid password!');
			return false;
		}
	}




//////

	public function login2(){
		if($this->session->userdata('emailnow')==""){
			$berhasil = false;
			$salahpass = false;

			$this->form_validation->set_rules('tuserlogin', 'E-mail atau No. HP', 'required');
			$this->form_validation->set_rules('tpasslogin', 'Password', 'required|min_length[6]');

			$userlogin = $this->input->post('tuserlogin');
			$passlogin = $this->input->post('tpasslogin');

			$hasil = $this->user->selectUser($userlogin);

			if ($this->form_validation->run() == true)
			{
				foreach ($hasil as $row)
				{
					if ($userlogin == $row['EMAIL_USER'])//|| $userlogin == $row['nohp'])
					{
						if ($passlogin == $row['PASSWORD_USER'])
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

					$this->load->view("landing");

				}
				else if ($berhasil==false && $salahpass==false)
				{
					$this->session->set_flashdata('notif','Email atau No. HP tidak terdaftar');
					$this->load->view("landing");
				}
				else if ($berhasil==true && $salahpass==false) //BERHASIL LOGIN
				{
					$this->session->set_userdata("emailnow",$userlogin);
					redirect('Newsfeed/index');

				}
			}
			else
			{
				$this->session->set_flashdata('notif',validation_errors());

				$this->load->view("landing");
			}
		}
		else
		{
			if ($this->session->userdata('emailnow'))
			{
				redirect("User/index");
			}
			else
			{
				$this->load->view("landing");
			}
		}
	}
//TODO [2] : Implement register functions
	public function register2()
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

	public function logout(){
		$this->session->sess_destroy();
		delete_cookie('keepUserEmail');
		$this->session->set_flashdata('notif','Logout berhasil!');
		redirect("Home/index");
	}

}