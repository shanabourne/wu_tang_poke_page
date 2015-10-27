<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Model {
	
	public function login_user($post) {
		//check against db VALIDATION
		$this->form_validation->set_rules("email", "Email Address", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		// END LOGIN VALIDATION
		if($this->form_validation->run() === FALSE)
		{
			$errors = validation_errors();
			$this->session->set_flashdata("errors", validation_errors());
		}
		else
		{
			// Check if user info is in db
			$query = "SELECT id FROM users WHERE email = ? AND password = ?";
			$values = array($post["email"], $post["password"]);
			$user = $this->db->query($query, $values)->row_array();
			// if no user is found....
			if(empty($user)) {
				$this->session->set_flashdata("errors","Email or password you entered is invalid.");
			}
			// otherwise, save user...
			else {
				$this->session->set_userdata("id", $user["id"]);
				return true;
			}

		}
	}

	public function register_user($post) {
		// Check whether first name and last name are not blank, trim blank space
		$this->form_validation->set_rules("name", "Name", "trim|required");
		// Check whether alias is entered properly and doesn't already exist
		$this->form_validation->set_rules("alias", "Nickname", "trim|required|is_unique[users.alias");
		// Check whether email address is entered properly and doesn't already exist
		$this->form_validation->set_rules("email", "Email Address", "trim|required|valid_email|is_unique[users.email");
		// Check password is not empty and has at least 8 characters
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
		// Check if password and confirm field have the same value
		$this->form_validation->set_rules("confirm", "Password Confirmation", "trim|required|matches[password]");
		// Check if date of birth is entered properly and not empty
		$this->form_validation->set_rules("date_of_birth", "Date of Birth", "trim|required|");
		// END VALIDATION RULES
		if($this->form_validation->run() === FALSE)
		{
			$errors = validation_errors();
			$this->session->set_flashdata("errors", validation_errors());
		}
		else
		{
			$query = "INSERT INTO users (name, alias, email, password, date_of_birth, total_pokes, total_pokers, created_at, updated_at) 
			VALUES (?,?,?,?,?,0,0,NOW(),NOW())";
			$values = array($post["name"], $post["alias"], $post["email"], $post["password"], $post["date_of_birth"]);
			$this->db->query($query,$values);		
		}
	}

	// public function get_user_info() {
	// 	$query = "SELECT name, email FROM users
	// 		WHERE id = ?";
	// 	$values = $this->session->userdata("id");
	// 	return $this->db->query($query,$values)->row_array();
	// }

	

}
