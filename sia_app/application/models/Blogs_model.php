<?php
class Blogs_model extends CI_Model{
    public function getAll(){
        $query = $this->db->get('blogs');

        return $query->result();
    }
}
?>