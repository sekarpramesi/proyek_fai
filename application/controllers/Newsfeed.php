<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsfeed extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$models=array(
			'M_User'=>'user',
			'M_Post'=>'post'
		);
        $this->load->model($models);
	}

	public function index(){
		$data["posts"]=$this->post->getAllPost();
		$email = $this->session->userdata('emailnow');
		$data["title"]="Newsfeed";
		$data["profile"]=$this->user->selectUser($email);
		$data["passedData"]=array($this->post->getAllPost($data["profile"][0]["ID_USER"]));
		$data["container"]=array("newsfeed/newsfeed");
		//var_dump($data["profile"]);
		$this->load->view('template/template',$data);		
	}
}