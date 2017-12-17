<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$models=array(
			'M_User'=>'user',
			'M_Post'=>'post',
			'M_Friends'=>'friends'
		);
		$this->load->model($models);
	}

	public function index(){
		$email = $this->session->userdata["logged_in"]["email"];
		$data["title"]="Dashboard";
		$data["profile"]=$this->user->selectUser($email);
		$id=$data["profile"][0]["ID_USER"];
		$data["friends"]=$this->friends->selectFriends($id);
		$data["passedData"]=array("dashboard/personal_information",$data["profile"],$data["friends"]);
		$data["container"]=array("dashboard/template_dashboard");
		//var_dump($data["profile"]);
		$this->load->view('template/template',$data);		
	}

	public function account(){
		$email = $this->session->userdata["logged_in"]["email"];
		$data["title"]="Dashboard";
		$data["profile"]=$this->user->selectUser($email);
		$id=$data["profile"][0]["ID_USER"];
		$data["friends"]=$this->friends->selectFriends($id);
		$data["passedData"]=array("dashboard/personal_information",$data["profile"],$data["friends"]);
		$data["container"]=array("dashboard/template_dashboard");
		$this->load->view('template/template',$data);	
	}

	public function changePassword(){
		$email = $this->session->userdata["logged_in"]["email"];
		$data["title"]="Dashboard";
		$data["profile"]=$this->user->selectUser($email);
		$id=$data["profile"][0]["ID_USER"];
		$data["friends"]=$this->friends->selectFriends($id);
		$data["passedData"]=array("dashboard/change_password",$data["profile"],$data["friends"]);
		$data["container"]=array("dashboard/template_dashboard");
		$this->load->view('template/template',$data);	
	}

	public function interests(){
		$email = $this->session->userdata["logged_in"]["email"];
		$data["title"]="Dashboard";
		$data["profile"]=$this->user->selectUser($email);
		$id=$data["profile"][0]["ID_USER"];
		$data["friends"]=$this->friends->selectFriends($id);
		$data["passedData"]=array("dashboard/hobbies_and_interest",$data["profile"],$data["friends"]);
		$data["container"]=array("dashboard/template_dashboard");
		$this->load->view('template/template',$data);	
	}

	public function schoolCompany(){
		$email = $this->session->userdata["logged_in"]["email"];
		$data["title"]="Dashboard";
		$data["profile"]=$this->user->selectUser($email);
		$id=$data["profile"][0]["ID_USER"];
		$data["friends"]=$this->friends->selectFriends($id);
		$data["passedData"]=array("dashboard/education_and_employement",$data["profile"],$data["friends"]);
		$data["container"]=array("dashboard/template_dashboard");
		$this->load->view('template/template',$data);			
	}

	public function updateProfile(){
		$post=$this->input->post();
		$param["email"]=$this->session->userdata["logged_in"]["email"];
		$param["firstName"]=$post["txtFirstName"];
		$param["lastName"]=$post["txtLastName"];
		$param["address"]=$post["txtAddress"];
		$param["zipcode"]=$post["txtZipCode"];
		$param["bio"]=$post["txtBioUser"];

		$this->user->updateUser($param,'personalinfo');
		$user=$this->user->selectUser($param["email"]);
		
		if($user[0]["ADDRESS_USER"]!="" && $user[0]["ZIPCODE_USER"]!="" && $user[0]["BIO_USER"]!="" && $user[0]["COMPLETION"]==0){
			$this->user->updateUser($param,'completion');
			$this->session->unset_userdata("logged_in");
			$data=array("email"=>$param["email"],"access"=>"1");
			$this->session->set_userdata("logged_in",$data);
		}
		redirect("Dashboard/index");
	}
}