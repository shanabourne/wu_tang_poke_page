<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {
	public function index() {
		$this->load->view('index');
	}

	public function login_user() {
		if($this->login->login_user($this->input->post())) {
			redirect("/pokes");
		}
		else
		{
			redirect("/");
		}
	}

	public function register_user() {
		// submit the register form
		$this->login->register_user($this->input->post());
		redirect ("/");
	}

	public function show() {
		$user = $this->poke->get_user_info();
		$poke_info = $this->poke->get_poke_info();
		$all_others = $this->poke->get_others();
		
		$this->load->view("welcome", array("user" => $user, "poke_info" => $poke_info, "all_others" => $all_others));
	}

	public function poke($id) {
		$this->poke->add_poke($id);
		redirect("/pokes");
	}

	public function log_off() {
		$this->session->sess_destroy();
		redirect("/");
	}

}