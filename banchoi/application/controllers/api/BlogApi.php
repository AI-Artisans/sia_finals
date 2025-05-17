<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BlogApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BlogModel');
        $this->load->helper('url');
        $this->load->helper('text'); // For any text helper you might need
    }

    public function create()
    {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
            return;
        }

        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $status = $this->input->post('status') ?? 'draft';
        $published = $this->input->post('published') ?? NULL;
        $user_id = $this->input->post('user_id'); // pass this from session or form

        if (!$title || !$user_id) {
            echo json_encode(['status' => 'error', 'message' => 'Title and User ID are required']);
            return;
        }

        // Image upload
        $image = null;
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
            } else {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
                return;
            }
        }

        // Insert into DB
        $data = [
            'title' => $title,
            'content' => $content,
            'image' => $image,
            'user_id' => $user_id,
            'status' => $status,
            'published' => $published
        ];

        $this->db->insert('posts', $data);

        echo json_encode(['status' => 'success', 'message' => 'Blog created successfully']);
    }

    // New method to fetch blogs by user_id
    public function get_blogs_by_user()
    {
        header('Content-Type: application/json');

        // Try to get user_id from GET param or session
        $user_id = $this->input->get('user_id');
        if (!$user_id) {
            $user_id = $this->session->userdata('user_id');
        }

        if (!$user_id) {
            echo json_encode(['status' => 'error', 'message' => 'User ID is required']);
            return;
        }

        $blogs = $this->BlogModel->get_by_user($user_id);

        echo json_encode($blogs);
    }

    public function edit_blog()
    {
        $this->load->model('BlogModel');

        $id = $this->input->post('id');
        $user_id = $this->input->post('user_id');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $status = $this->input->post('status');

        if (!$id || !$user_id || !$title || !$content || !$status) {
            echo json_encode(['status' => 'error', 'message' => 'Missing data']);
            return;
        }

        // Check blog ownership (optional but recommended)
        $blog = $this->BlogModel->get_blog($id);
        if (!$blog || $blog->user_id != $user_id) {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
            return;
        }

        $updateData = [
            'title' => $title,
            'content' => $content,
            'status' => $status,
        ];

        // Handle image upload if any
        if (!empty($_FILES['image']['name'])) {
            // Your upload logic here, e.g.:
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $updateData['image'] = $uploadData['file_name'];
            } else {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
                return;
            }
        }

        $updated = $this->BlogModel->edit_blog($id, $updateData);

        if ($updated) {
            echo json_encode(['status' => 'success', 'message' => 'Blog updated successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update blog']);
        }
    }

    public function delete_blog()
    {
        // Load model if not autoloaded
        $this->load->model('BlogModel');

        // Get JSON input (since frontend sends JSON)
        $input = json_decode(file_get_contents('php://input'), true);

        if (empty($input['id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Missing blog ID']);
            return;
        }

        $blogId = $input['id'];

        // Get blog to check ownership
        $blog = $this->BlogModel->get_blog($blogId);

        if (!$blog) {
            echo json_encode(['status' => 'error', 'message' => 'Blog not found']);
            return;
        }

        // Check if the blog belongs to the logged-in user
        if ($blog->user_id != $this->session->userdata('user_id')) {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
            return;
        }

        // Delete the blog
        $deleted = $this->BlogModel->delete_blog($blogId);

        if ($deleted) {
            echo json_encode(['status' => 'success', 'message' => 'Blog deleted']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete blog']);
        }
    }

}
?>