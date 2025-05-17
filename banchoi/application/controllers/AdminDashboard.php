<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminDashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PostModel');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->model('Admin_model');

        $data['total_users'] = $this->Admin_model->get_user_count();
        $data['total_posts'] = $this->Admin_model->get_post_count();

        $monthly_posts = $this->Admin_model->get_monthly_post_counts();

        $labels = [];
        $post_counts = [];

        foreach ($monthly_posts as $row) {
            $labels[] = date("M Y", strtotime($row['month'] . '-01'));
            $post_counts[] = (int) $row['post_count'];
        }

        $data['labels'] = $labels;
        $data['data'] = $post_counts;

        $content = $this->load->view('admin_dashboard', $data, true);
        $this->load->view('layouts/admin_layout', [
            'title' => 'Admin Dashboard',
            'content' => $content
        ]);
    }

    public function users()
    {
        // Initialize data (empty array for now)
        $data = [];

        // Load the users view and pass data
        $content = $this->load->view('users/index', $data, true);

        // Load the main admin layout with title and content
        $this->load->view('layouts/admin_layout', [
            'title' => 'User Management',
            'content' => $content
        ]);
    }

    public function posts()
    {
        $data = [];
        $content = $this->load->view('posts', $data, true);
        $this->load->view('layouts/admin_layout', [
            'title' => 'Manage Posts',
            'content' => $content
        ]);
    }

    // Edit post form and update
    public function edit_post($id)
    {
        $post = $this->PostModel->getById($id);
        if (!$post)
            show_404();

        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');

            if ($this->form_validation->run()) {
                $data = [
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                ];
                $this->PostModel->update($id, $data);
                redirect('posts');
            }
        }

        $data['post'] = $post;
        $content = $this->load->view('posts/edit', $data, true);
        $this->load->view('layouts/admin_layout', [
            'title' => 'Edit Post',
            'content' => $content
        ]);
    }

    // Delete post
    public function delete_post($id)
    {
        $this->PostModel->delete($id);
        redirect('posts');
    }

    public function test()
    {
        echo "Admin Dashboard test works!";
    }
}
