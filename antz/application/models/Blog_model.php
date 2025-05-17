<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Create a new blog post
    public function create_post($data) {
        $this->db->insert('blog_posts', $data);
        return $this->db->insert_id();
    }

    // Get all blog posts with user information
    public function get_all_posts($limit = null, $offset = 0) {
        $this->db->select('blog_posts.*, users.username');
        $this->db->from('blog_posts');
        $this->db->join('users', 'users.id = blog_posts.user_id', 'left');
        $this->db->order_by('blog_posts.created_at', 'DESC');

        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    // Get posts by specific user with pagination
    public function get_posts_by_user($user_id, $limit = 10, $offset = 0) {
        $this->db->select('*');
        $this->db->from('blog_posts');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get a single post by ID
    public function get_post_by_id($post_id) {
        $this->db->select('blog_posts.*, users.username');
        $this->db->from('blog_posts');
        $this->db->join('users', 'users.id = blog_posts.user_id', 'left');
        $this->db->where('blog_posts.id', $post_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Get a single post by slug
    public function get_post_by_slug($slug) {
        $this->db->select('blog_posts.*, users.username');
        $this->db->from('blog_posts');
        $this->db->join('users', 'users.id = blog_posts.user_id', 'left');
        $this->db->where('blog_posts.slug', $slug);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Count posts by user
    public function count_posts_by_user($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('blog_posts');
        return $query->num_rows();
    }

    // Count all posts
    public function count_all_posts() {
        return $this->db->count_all('blog_posts');
    }

    // Add a comment to a blog post
    public function add_comment($data) {
        $this->db->insert('blog_comments', $data);
        return $this->db->insert_id();
    }

    // Get comments for a specific blog post
    public function get_comments_by_post($post_id) {
        $this->db->select('blog_comments.*, users.username');
        $this->db->from('blog_comments');
        $this->db->join('users', 'users.id = blog_comments.user_id', 'left');
        $this->db->where('blog_comments.post_id', $post_id);
        $this->db->order_by('blog_comments.created_at', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Count all comments
    public function count_all_comments() {
        return $this->db->count_all('blog_comments');
    }

    // Count comments for a specific post
    public function count_comments_by_post($post_id) {
        $this->db->where('post_id', $post_id);
        return $this->db->count_all_results('blog_comments');
    }

    // Count comments by user
    public function count_comments_by_user($user_id) {
        if ($this->db->table_exists('blog_comments')) {
            $this->db->where('user_id', $user_id);
            $query = $this->db->get('blog_comments');
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // In Blog_model.php
public function delete_post($post_id, $user_id = null) {
    // Delete comments related to the post first
    $this->db->where('post_id', $post_id);
    $this->db->delete('blog_comments'); // Changed from 'comments' to 'blog_comments'
    
    // Then delete the post itself
    $this->db->where('id', $post_id);
    
    // If user_id is provided, ensure the post belongs to this user
    if ($user_id !== null) {
        $this->db->where('user_id', $user_id);
    }
    
    return $this->db->delete('blog_posts'); // Changed from 'posts' to 'blog_posts'
}

    // Update a blog post
    public function update_post($post_id, $user_id, $data) {
        $this->db->where('id', $post_id);
        $this->db->where('user_id', $user_id); // Ensure the post belongs to this user
        return $this->db->update('blog_posts', $data);
    }

    // Generate a unique slug for a blog post
    public function generate_slug($title, $id = null) {
        $this->load->helper(['text', 'url']);
        $slug = url_title(convert_accented_characters($title), '-', TRUE);

        $base_slug = $slug;
        $i = 1;

        while (true) {
            $this->db->where('slug', $slug);
            if ($id !== null) {
                $this->db->where('id !=', $id);
            }
            $query = $this->db->get('blog_posts');

            if ($query->num_rows() === 0) {
                break;
            }

            $slug = $base_slug . '-' . $i++;
        }

        return $slug;
    }

    
}
