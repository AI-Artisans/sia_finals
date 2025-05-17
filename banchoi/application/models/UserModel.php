<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    protected $table = 'users';  // your users table

    public function get_all_users()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }


    public function get_user($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function insert_user($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_user($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete_user($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
