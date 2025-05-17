<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{
    public function index()
    {
        // Load data from model if needed
        // $this->load->model('PostModel');
        // $data['posts'] = $this->PostModel->get_all_posts();

        // Load the view
        $content = $this->load->view('posts/list', [], true);

        $this->load->view('layouts/admin_layout', [
            'title' => 'Posts',
            'content' => $content
        ]);
    }
}
