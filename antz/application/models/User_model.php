<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table = 'users';

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_user_by_email($email) {
		return $this->db->get_where($this->table, ['email' => $email])->row_array();
	}

	public function get_user_by_id($id) {
		return $this->db->get_where($this->table, ['id' => $id])->row_array();
	}

	public function create_user($data) {
		// Check if email already exists
		if ($this->get_user_by_email($data['email'])) {
			return false; // Email already exists
		}

		// Insert the user (password should already be hashed by the API controller)
		$this->db->insert($this->table, $data);

		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		}

		return false;
	}

	public function verify_password($email, $password) {
		$user = $this->get_user_by_email($email);

		if ($user && password_verify($password, $user['password'])) {
			return $user;
		}

		return false;
	}

	public function update_user($id, $data) {
		if (isset($data['password'])) {
			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
		}

		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	public function delete_user($id) {
		return $this->db->delete($this->table, ['id' => $id]);
	}

	public function get_all_users() {
		return $this->db->get($this->table)->result_array();
	}
}
