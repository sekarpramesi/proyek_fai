<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsfeed extends CI_Controller {

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
		if($this->session->userdata["logged_in"]["access"]==1){
			$email = $this->session->userdata["logged_in"]["email"];
			$data["title"]="Newsfeed";
			$data["profile"]=$this->user->selectUser($email);
			$id=$data["profile"][0]["ID_USER"];

			$data["friends"]=$this->friends->selectFriends($id);
			$data["friendsSuggestions"]=$this->friends->friendsSuggestions($id);
			$data["friendsRequest"]=$this->friends->friendsRequest($id);
			$data["posts"]=$this->post->getAllPost($data["profile"][0]["ID_USER"]);
			$data["comments"]=$this->post->getAllComment();

			$data["passedData"]=array($data["posts"],$data["comments"],$data["profile"][0],$data["friendsSuggestions"]);
			$data["container"]=array("newsfeed/newsfeed");
			$this->load->view('template/template',$data);
		}else{
			redirect("Dashboard/index");
		}	
	}

	public function insertPost(){
		$email = $this->session->userdata["logged_in"]["email"];
		$profile=$this->user->selectUser($email);
		$cntPosts=count($this->post->getAllPost($profile[0]["ID_USER"]))-1;
		
		$post=$this->input->post();
		$contentPost=$post["txtPost"];

		$uploadPath="";
		$fileName="";
		$typePost=0;
		$path = $_FILES['filePost']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		 switch($ext){
		 	case "jpg":
		 	case "png":
		 	case "jpeg":
		 		$uploadPath="./uploads/post/photo/";
		 		$fileName.="p";
		 		$typePost=1;
		 		break;
		 	case "mp4":
		 		$uploadPath="./uploads/post/video/";
		 		$fileName.="v";
		 		$typePost=2;
		 		break;
		 	default:
		 		break;
		 }
		
		

		
		$config['upload_path']=$uploadPath;
		$config['allowed_types'] = 'jpeg|jpg|png|mp4';
		$config['file_name']=$fileName.($cntPosts+1);
		$config['overwrite'] = 'false';

		$this->load->library('upload',$config);

		if ( ! $this->upload->do_upload("filePost")){
			$error= $this->upload->display_errors();
			$pic='';

		}else{
			$te=$this->upload->data();
			$pic=$te["file_name"];
		}

		$this->post->insertPost($contentPost,$profile[0]["ID_USER"],$typePost,$pic);
		redirect('Newsfeed/index');
				
	}

	public function insertComment($idPost){
		$email = $this->session->userdata["logged_in"]["email"];
		$profile=$this->user->selectUser($email);
		$id=$profile[0]["ID_USER"];

		$post=$this->input->post();
		$contentComment=$post["txtComment"];
		$this->post->insertComment($idPost,$id,$contentComment);
		var_dump($idPost,$id,$contentComment);
		//redirect('Newsfeed/index');
	}

	public function sharePost(){
		$post=$this->input->post();
		$idPost =$post['idPost'];
		//$isiPost =$post['txtSharePost'];
		$idUser =$post['idUser'];
		$this->post->sharePost($idPost,'',$idUser);
		echo "success";
		
	}
}