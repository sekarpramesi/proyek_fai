<?php
/**
+M_Event (event)
	-event //info tentang event,siapa yang membuat event
	-invitation //info tentang undangan, siapa yang membuat undangan
	-user_event //user yang mengikuti event
	-user_invitation //user yang menerima undangan

**/
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Event extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
      $this->load->database();
	}
}