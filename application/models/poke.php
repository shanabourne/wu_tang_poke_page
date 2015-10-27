<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poke extends CI_Model {

	public function get_user_info() {
		$query = "SELECT * FROM users where id = ?";
		$values = $this->session->userdata("id");
		return $this->db->query($query,$values)->row_array();
	}

	public function get_poke_info() {
		$query = "SELECT users.id, poked_id, alias, poke_count FROM users LEFT JOIN pokes ON users.id = pokes.poker_id WHERE pokes.poked_id = ? ORDER BY poke_count DESC";
		$values = $this->session->userdata("id");
		return $this->db->query($query,$values)->result_array();
	}

	public function get_others() {
		$query = "SELECT id, name, alias, email, total_pokes FROM users WHERE id <> ?";
        $values = array($this->session->userdata['id']);
		return $this->db->query($query,$values)->result_array();
	}

	public function add_poke($id) {
	// adding +1 to overall total_pokes for this user
		$totalpokes_query = "UPDATE users SET total_pokes = total_pokes +1 WHERE id = ?";
		$values1 = array($id);
		$this->db->query($totalpokes_query, $values1);
    // check if you've poked this user before
        $pokepast_query = "SELECT * from pokes WHERE poker_id = ? AND poked_id = ?";
        $values2 = array($this->session->userdata['id'], $id);
		$result = $this->db->query($pokepast_query, $values2)->result_array();
		$count = count($result);
    // if you have poked them before, update the poke count
        if ($count > 0) {
            $updatepokes_query = "UPDATE pokes SET poke_count = poke_count +1 WHERE poker_id = ? AND poked_id = ?";
        	$values3 = array($this->session->userdata['id'], $id);
            $this->db->query($updatepokes_query, $values3);
        }
    // if you never have,
        else {
        // update their total_pokers to include you as a new poker
        	$totalpokers_query = "UPDATE users SET total_pokers = total_pokers +1 WHERE users.id = ?";
        	$values4 = array($id);
        	$this->db->query($totalpokers_query, $values4);
        // then poke them for the first time
            $firstpoke_query = "INSERT INTO pokes (poker_id, poked_id, poke_count, created_at, updated_at) VALUES (?,?,1,NOW(),NOW())";
        	$values5 = array($this->session->userdata['id'], $id);
        	$this->db->query($firstpoke_query, $values5);
		}
	}
}