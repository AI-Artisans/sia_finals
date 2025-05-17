<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('session');
		$this->load->helper('url');

		// Enable error reporting for debugging
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		// Log the request method and data
		log_message('debug', 'API Request Method: ' . $_SERVER['REQUEST_METHOD']);
		log_message('debug', 'API Request URI: ' . $_SERVER['REQUEST_URI']);
	}

	// POST /api/register
	public function register() {
		$raw_input = file_get_contents('php://input');
		log_message('debug', 'Raw input for register: ' . $raw_input);

		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			$this->output
				->set_content_type('application/json')
				->set_status_header(405)
				->set_output(json_encode(['error' => 'Method not allowed']));
			return;
		}

		$input_data = json_decode($raw_input, true);
		log_message('debug', 'Decoded input: ' . print_r($input_data, true));

		if (empty($input_data) && !empty($_POST)) {
			$input_data = $_POST;
			log_message('debug', 'Using POST data instead: ' . print_r($input_data, true));
		}

		if (empty($input_data['username']) || empty($input_data['email']) || empty($input_data['password'])) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['error' => 'Username, email and password are required']));
			return;
		}

		if (!filter_var($input_data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['error' => 'Invalid email format']));
			return;
		}

		try {
			$existing_user = $this->User_model->get_user_by_email($input_data['email']);
			if ($existing_user) {
				$this->output
					->set_content_type('application/json')
					->set_status_header(400)
					->set_output(json_encode(['error' => 'Email already exists']));
				return;
			}

			// Log database connection status
			$this->db->initialize();
			log_message('debug', 'Database initialized.');

			$user_data = [
				'username' => $input_data['username'],
				'email' => $input_data['email'],
				'password' => password_hash($input_data['password'], PASSWORD_BCRYPT),
				'created_at' => date('Y-m-d H:i:s')
			];

			log_message('debug', 'Attempting to create user with data: ' . print_r($user_data, true));

			$user_id = $this->User_model->create_user($user_data);

			log_message('debug', 'User creation result: ' . ($user_id ? $user_id : 'failed'));

			if (!$user_id) {
				log_message('error', 'Database error: ' . $this->db->error()['message']);
				$this->output
					->set_content_type('application/json')
					->set_status_header(500)
					->set_output(json_encode(['error' => 'Failed to create user account: ' . $this->db->error()['message']]));
				return;
			}

			$user = $this->User_model->get_user_by_id($user_id);
			unset($user['password']);

			$this->output
				->set_content_type('application/json')
				->set_status_header(201)
				->set_output(json_encode([
					'message' => 'Registration successful',
					'user' => $user
				]));

		} catch (Exception $e) {
			log_message('error', 'Exception during registration: ' . $e->getMessage());
			$this->output
				->set_content_type('application/json')
				->set_status_header(500)
				->set_output(json_encode(['error' => 'Internal server error: ' . $e->getMessage()]));
		}
	}

	// POST /api/login
	public function login() {
		$raw_input = file_get_contents('php://input');
		log_message('debug', 'Raw input for login: ' . $raw_input);

		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			$this->output
				->set_content_type('application/json')
				->set_status_header(405)
				->set_output(json_encode(['error' => 'Method not allowed']));
			return;
		}

		$input_data = json_decode($raw_input, true);
		log_message('debug', 'Decoded input: ' . print_r($input_data, true));

		if (empty($input_data) && !empty($_POST)) {
			$input_data = $_POST;
			log_message('debug', 'Using POST data instead: ' . print_r($input_data, true));
		}

		if (empty($input_data['email']) || empty($input_data['password'])) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['error' => 'Email and password are required']));
			return;
		}

		if (!filter_var($input_data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['error' => 'Invalid email format']));
			return;
		}

		try {
			$user = $this->User_model->verify_password($input_data['email'], $input_data['password']);

			if (!$user) {
				$this->output
					->set_content_type('application/json')
					->set_status_header(401)
					->set_output(json_encode(['error' => 'Invalid email or password']));
				return;
			}

			unset($user['password']);

			$this->session->set_userdata('user_id', $user['id']);
			$this->session->set_userdata('logged_in', true);
			$this->session->set_userdata('user_email', $user['email']);
			$this->session->set_userdata('username', $user['username']);

			log_message('debug', 'User logged in successfully: ' . $user['id']);

			$this->output
				->set_content_type('application/json')
				->set_status_header(200)
				->set_output(json_encode([
					'message' => 'Login successful',
					'user' => $user,
					'redirect_url' => site_url('dashboard')
				]));

		} catch (Exception $e) {
			log_message('error', 'Exception during login: ' . $e->getMessage());
			$this->output
				->set_content_type('application/json')
				->set_status_header(500)
				->set_output(json_encode(['error' => 'Internal server error: ' . $e->getMessage()]));
		}
	}

	public function create_blog_post() {
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			$this->output
				->set_content_type('application/json')
				->set_status_header(405)  
				->set_output(json_encode(['error' => 'Method not allowed']));
			return;
		}

		// Check if user is logged in
		if (!$this->session->userdata('logged_in')) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(401)
				->set_output(json_encode(['error' => 'You must be logged in to create a blog post']));
			return;
		}

		$this->load->model('Blog_model');

		$user_id = $this->session->userdata('user_id');

		// Handle file upload for the image
		$image_path = null;
		if (!empty($_FILES['image']['name'])) {
			// Configure upload
			$config['upload_path'] = './uploads/blog_images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 5120; // 5MB max
			$config['max_width'] = 2048;
			$config['max_height'] = 2048;
			$config['encrypt_name'] = TRUE; // Encrypt filename for security

			// Create directory if it doesn't exist
			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0755, true);
			}

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$upload_data = $this->upload->data();
				$image_path = 'uploads/blog_images/' . $upload_data['file_name'];
			} else {
				$this->output
					->set_content_type('application/json')
					->set_status_header(400)
					->set_output(json_encode(['error' => 'Image upload failed: ' . $this->upload->display_errors()]));
				return;
			}
		}

		// Get title and content from POST
		$title = $this->input->post('title');
		$content = $this->input->post('content');

		if (empty($title) || empty($content)) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['error' => 'Title and content are required']));
			return;
		}

		try {
			// Generate slug for SEO-friendly URLs
			$slug = $this->Blog_model->generate_slug($title);

			$blog_data = [
				'user_id' => $user_id,
				'title' => trim($title),
				'content' => $content, // This will preserve the HTML formatting from Quill
				'image_path' => $image_path,
				'slug' => $slug,
				'created_at' => date('Y-m-d H:i:s')
			];

			$blog_id = $this->Blog_model->create_post($blog_data);

			if (!$blog_id) {
				$this->output
					->set_content_type('application/json')
					->set_status_header(500)
					->set_output(json_encode(['error' => 'Failed to create blog post']));
				return;
			}

			// Get the created blog post to return
			$created_post = $this->Blog_model->get_post_by_id($blog_id);

			$this->output
				->set_content_type('application/json')
				->set_status_header(201)
				->set_output(json_encode([
					'message' => 'Blog post created successfully',
					'post' => $created_post
				]));

		} catch (Exception $e) {
			log_message('error', 'Exception during blog post creation: ' . $e->getMessage());
			$this->output
				->set_content_type('application/json')
				->set_status_header(500)
				->set_output(json_encode(['error' => 'Internal server error: ' . $e->getMessage()]));
		}
	}

	// POST /api/add-comment
	public function add_comment() {
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			$this->output
				->set_content_type('application/json')
				->set_status_header(405)
				->set_output(json_encode(['error' => 'Method not allowed']));
			return;
		}

		// Check if user is logged in
		if (!$this->session->userdata('logged_in')) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(401)
				->set_output(json_encode(['error' => 'You must be logged in to comment']));
			return;
		}

		$this->load->model('Blog_model');

		$user_id = $this->session->userdata('user_id');
		$post_id = $this->input->post('post_id');
		$comment_text = $this->input->post('comment');

		if (empty($post_id) || empty($comment_text)) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['error' => 'Post ID and comment text are required']));
			return;
		}

		try {
			// Check if the post exists
			$post = $this->Blog_model->get_post_by_id($post_id);
			if (!$post) {
				$this->output
					->set_content_type('application/json')
					->set_status_header(404)
					->set_output(json_encode(['error' => 'Blog post not found']));
				return;
			}

			$comment_data = [
				'post_id' => $post_id,
				'user_id' => $user_id,
				'comment' => trim($comment_text),
				'created_at' => date('Y-m-d H:i:s')
			];

			$comment_id = $this->Blog_model->add_comment($comment_data);

			if (!$comment_id) {
				$this->output
					->set_content_type('application/json')
					->set_status_header(500)
					->set_output(json_encode(['error' => 'Failed to add comment']));
				return;
			}

			// Get all comments for this post to return
			$comments = $this->Blog_model->get_comments_by_post($post_id);

			$this->output
				->set_content_type('application/json')
				->set_status_header(201)
				->set_output(json_encode([
					'message' => 'Comment added successfully',
					'comments' => $comments
				]));

		} catch (Exception $e) {
			log_message('error', 'Exception during comment creation: ' . $e->getMessage());
			$this->output
				->set_content_type('application/json')
				->set_status_header(500)
				->set_output(json_encode(['error' => 'Internal server error: ' . $e->getMessage()]));
		}
	}

/**
 * Delete a blog post via POST method
 * POST /api/delete-post
 */
public function delete_post_post() {
    // Check if user is logged in
    if (!$this->session->userdata('logged_in')) {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(401)
            ->set_output(json_encode(['error' => 'You must be logged in to delete a post']));
        return;
    }

    $user_id = $this->session->userdata('user_id');
    $post_id = $this->input->post('post_id');
    
    if (empty($post_id)) {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode(['error' => 'Post ID is required']));
        return;
    }

    try {
        $this->load->model('Blog_model');
        
        // Check if the post exists and belongs to this user
        $post = $this->Blog_model->get_post_by_id($post_id);
        if (!$post) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode(['error' => 'Blog post not found']));
            return;
        }
        
        if ($post['user_id'] != $user_id) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(403)
                ->set_output(json_encode(['error' => 'You are not authorized to delete this post']));
            return;
        }
        
        // Delete the post
        $result = $this->Blog_model->delete_post($post_id, $user_id);
        
        if (!$result) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(['error' => 'Failed to delete the post']));
            return;
        }
        
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'success' => true,
                'message' => 'Post deleted successfully'
            ]));
            
    } catch (Exception $e) {
        log_message('error', 'Exception during post deletion: ' . $e->getMessage());
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(500)
            ->set_output(json_encode(['error' => 'Internal server error: ' . $e->getMessage()]));
    }
}

/**
 * Update a blog post
 * POST /api/update-post
 */
public function update_post() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(405)
            ->set_output(json_encode(['error' => 'Method not allowed']));
        return;
    }

    // Check if user is logged in
    if (!$this->session->userdata('logged_in')) {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(401)
            ->set_output(json_encode(['error' => 'You must be logged in to update a post']));
        return;
    }

    $this->load->model('Blog_model');

    $user_id = $this->session->userdata('user_id');
    $post_id = $this->input->post('post_id');

    if (empty($post_id)) {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode(['error' => 'Post ID is required']));
        return;
    }

    try {
        // Check if the post exists and belongs to this user
        $post = $this->Blog_model->get_post_by_id($post_id);
        if (!$post) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode(['error' => 'Blog post not found']));
            return;
        }
        
        if ($post['user_id'] != $user_id) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(403)
                ->set_output(json_encode(['error' => 'You are not authorized to update this post']));
            return;
        }

        // Get title and content from POST
        $title = $this->input->post('title');
        $content = $this->input->post('content');

        if (empty($title) || empty($content)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode(['error' => 'Title and content are required']));
            return;
        }

        // Handle file upload for the image if a new one is provided
        $image_path = $post['image_path']; // Default to current image
        if (!empty($_FILES['image']['name'])) {
            // Configure upload
            $config['upload_path'] = './uploads/blog_images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 5120; // 5MB max
            $config['max_width'] = 2048;
            $config['max_height'] = 2048;
            $config['encrypt_name'] = TRUE; // Encrypt filename for security

            // Create directory if it doesn't exist
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0755, true);
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image_path = 'uploads/blog_images/' . $upload_data['file_name'];
                
                // Delete the old image if it exists
                if (!empty($post['image_path']) && file_exists($post['image_path'])) {
                    unlink($post['image_path']);
                }
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode(['error' => 'Image upload failed: ' . $this->upload->display_errors()]));
                return;
            }
        }

        // Update the slug if the title changed
        $slug = ($post['title'] !== $title) ? $this->Blog_model->generate_slug($title) : $post['slug'];

        $blog_data = [
            'title' => trim($title),
            'content' => $content,
            'image_path' => $image_path,
            'slug' => $slug,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $result = $this->Blog_model->update_post($post_id, $user_id, $blog_data);

        if (!$result) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(['error' => 'Failed to update blog post']));
            return;
        }

        // Get the updated blog post to return
        $updated_post = $this->Blog_model->get_post_by_id($post_id);

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'message' => 'Blog post updated successfully',
                'post' => $updated_post
            ]));

    } catch (Exception $e) {
        log_message('error', 'Exception during blog post update: ' . $e->getMessage());
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(500)
            ->set_output(json_encode(['error' => 'Internal server error: ' . $e->getMessage()]));
    }
}
}