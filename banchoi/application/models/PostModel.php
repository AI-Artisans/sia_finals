<?php
class PostModel extends CI_Model
{
    protected $table = 'posts'; // your posts table name

    // Get all posts
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    // Get single post by ID
    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Insert new post
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Update existing post
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete post
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
