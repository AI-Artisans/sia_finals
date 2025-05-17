<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get_user_count() {
        return $this->db->count_all('users');
    }

    public function get_post_count() {
        return $this->db->count_all('posts');
    }

    public function get_monthly_post_counts() {
        $this->db->select("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as post_count", false);
        $this->db->from('posts');
        $this->db->where("created_at >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)");
        $this->db->group_by('month');
        $this->db->order_by('month', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
