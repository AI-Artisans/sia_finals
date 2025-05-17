<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BlogModel extends CI_Model
{
    protected $table = 'posts';  // Make sure this matches your actual table name

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_all()
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_user($user_id)
    {
        return $this->db->where('user_id', $user_id)
            ->order_by('created_at', 'DESC')
            ->get($this->table)
            ->result_array();
    }

    public function get_blog($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function edit_blog($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_blog($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

}
