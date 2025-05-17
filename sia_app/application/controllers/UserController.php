<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');  // Load URL helper
		$this->load->library('session');  // Load session library
	}

	public function register() {
		// Check if user is already logged in
		if ($this->session->userdata('logged_in')) {
			redirect('dashboard');
		}
		$this->load->view('register');  
	}

	public function login() {
		// Check if user is already logged in
		if ($this->session->userdata('logged_in')) {
			redirect('dashboard');
		}
		$this->load->view('login');  
	}

	public function dashboard() {
		// Check if user is logged in
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		// Load the blog model
		$this->load->model('Blog_model');

		// Get user data from session
		$data['user_id'] = $this->session->userdata('user_id');
		$data['username'] = $this->session->userdata('username');
		$data['user_email'] = $this->session->userdata('user_email');

		// Get blog statistics
		$data['total_posts'] = $this->Blog_model->count_posts_by_user($data['user_id']);
		$data['total_comments'] = $this->Blog_model->count_comments_by_user($data['user_id']);

		// Get ALL recent blog posts for display (not just the user's posts)
		$data['recent_posts'] = $this->Blog_model->get_all_posts(8);

		$this->load->view('dashboard', $data);
	}

	public function logout() {
		// Destroy session
		$this->session->sess_destroy();
		
		// Redirect to login page
		redirect('login');
	}

	// View a single blog post
	public function view_blog($post_id) {
		// Check if user is logged in
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
	
		// Load the blog model
		$this->load->model('Blog_model');
	
		// Get user data from session
		$data['user_id'] = $this->session->userdata('user_id');
		$data['username'] = $this->session->userdata('username');
		$data['user_email'] = $this->session->userdata('user_email');
	
		// Get the blog post
		$data['post'] = $this->Blog_model->get_post_by_id($post_id);
	
		// If post doesn't exist, redirect to dashboard
		if (!$data['post']) {
			redirect('dashboard');
		}
	
		// Get comments for this post
		$data['comments'] = $this->Blog_model->get_comments_by_post($post_id);
	
		$this->load->view('blog_view', $data);
	}

	public function posts() {
		// Check if user is logged in
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
	
		// Load the blog model
		$this->load->model('Blog_model');
	
		// Get user data from session
		$data['user_id'] = $this->session->userdata('user_id');
		$data['username'] = $this->session->userdata('username');
		$data['user_email'] = $this->session->userdata('user_email');
	
		// Pagination setup
		$this->load->library('pagination');
		
		$per_page = 12; // Number of posts per page
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$offset = ($page - 1) * $per_page;
		
		// Get total posts count for this user
		$total_posts = $this->Blog_model->count_posts_by_user($data['user_id']);
		
		// Calculate total pages
		$data['total_pages'] = ceil($total_posts / $per_page);
		$data['current_page'] = $page;
	
		// Get paginated posts by this user
		$data['user_posts'] = $this->Blog_model->get_posts_by_user($data['user_id'], $per_page, $offset);
		
		// For each post, get the comment count
		if (!empty($data['user_posts'])) {
			foreach ($data['user_posts'] as &$post) {
				$post['comment_count'] = $this->Blog_model->count_comments_by_post($post['id']);
			}
		}
	
		// Load the view
		$this->load->view('posts', $data);
	}

	/**
 * Display the edit blog post page
 * 
 * @param int $post_id The ID of the post to edit
 */
public function edit_blog($post_id) {
    // Check if user is logged in
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }

    $user_id = $this->session->userdata('user_id');
    $username = $this->session->userdata('username');
    
    // Load the blog model
    $this->load->model('Blog_model');
    
    // Get the post data
    $post = $this->Blog_model->get_post_by_id($post_id);
    
    // Check if post exists
    if (!$post) {
        show_404();
        return;
    }
    
    // Check if user owns this post
    if ($post['user_id'] != $user_id) {
        // User doesn't own this post - redirect to view only
        redirect('blog/view/' . $post_id);
    }
    
    // Load the view with post data
    $data = [
        'username' => $username,
        'user_id' => $user_id,
        'post' => $post
    ];
    
    $this->load->view('edit_blog', $data);
}
/**
 * Post Controller - Delete Post method (PHP)
 * For your CodeIgniter backend
 */
// Delete post endpoint
public function delete_post() {
	// Log the request for debugging
	log_message('debug', 'Delete post request received');
	log_message('debug', 'POST data: ' . print_r($_POST, true));
	
	// Get post ID from POST data
	$post_id = $this->input->post('post_id');
	
	if (!$post_id) {
		log_message('error', 'No post ID provided for deletion');
		echo json_encode(['error' => 'No post ID provided']);
		return;
	}
	
	// Get current user ID
	$user_id = $this->session->userdata('user_id');
	
	// Check if post exists and belongs to current user
	$post = $this->post_model->get_post($post_id);
	
	if (!$post) {
		log_message('error', 'Post not found: ' . $post_id);
		echo json_encode(['error' => 'Post not found']);
		return;
	}
	
	if ($post['user_id'] != $user_id) {
		log_message('error', 'User ' . $user_id . ' attempted to delete post ' . $post_id . ' owned by user ' . $post['user_id']);
		echo json_encode(['error' => 'You do not have permission to delete this post']);
		return;
	}
	
	// Delete the post
	$result = $this->post_model->delete_post($post_id);
	
	if ($result) {
		log_message('debug', 'Post ' . $post_id . ' deleted successfully');
		echo json_encode(['success' => true, 'message' => 'Post deleted successfully']);
	} else {
		log_message('error', 'Failed to delete post ' . $post_id);
		echo json_encode(['error' => 'Failed to delete post']);
	}
}

// Post model function for reference
// This should be in your Post_model.php file, not in this controller
/*
public function delete_post($post_id) {
	// Delete comments related to the post first
	$this->db->where('post_id', $post_id);
	$this->db->delete('comments');
	
	// Then delete the post itself
	$this->db->where('id', $post_id);
	return $this->db->delete('posts');
}
*/
}