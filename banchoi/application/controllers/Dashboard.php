<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        $this->load->model('BlogModel');
        $this->load->helper('text');  // Load text helper here globally for this controller
    }

    protected $table = 'posts';

    public function get_blog($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function index()
    {
        $data['title'] = 'Dashboard | Banchoi';
        $data['username'] = $this->session->userdata('username');
        $data['page'] = 'dashboard';
        $this->load->view('layouts/main_layout', $data);
    }

    public function create_blog()
    {
        $data['title'] = 'Create Blog | Banchoi';
        $data['username'] = $this->session->userdata('username');
        $data['page'] = 'create_blog_view';
        $this->load->view('layouts/main_layout', $data);
    }

    public function your_blogs()
    {
        $data['title'] = 'Your Blogs | Banchoi';
        $data['username'] = $this->session->userdata('username');
        $data['page'] = 'your_blogs_view';
        $this->load->view('layouts/main_layout', $data);
    }


    // public function statistics()
    // {
    //     $data['title'] = 'Statistics | Banchoi';
    //     $data['username'] = $this->session->userdata('username');
    //     $data['page'] = 'statistics_view';
    //     $this->load->view('layouts/main_layout', $data);
    // }

    public function all_blogs()
    {
        $this->load->model('BlogModel');
        $data['blogs'] = $this->BlogModel->get_all();

        $data['title'] = 'All Blogs | Banchoi';
        $data['username'] = $this->session->userdata('username');
        $data['page'] = 'all_blogs_view';
        $this->load->view('layouts/main_layout', $data);
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }


    public function edit_blog($id)
    {
        $this->load->model('BlogModel');

        if (!method_exists($this->BlogModel, 'get_blog')) {
            show_error('Model method get_blog() not found', 500);
            return;
        }

        $blog = $this->BlogModel->get_blog($id);

        if (!$blog) {
            show_404();
            return;
        }

        if ($blog->user_id != $this->session->userdata('user_id')) {
            show_error('Unauthorized', 403);
            return;
        }

        $data['blog'] = $blog;
        $data['title'] = 'Edit Blog | Banchoi';
        $data['username'] = $this->session->userdata('username');
        $data['page'] = 'edit_blog_view';

        $this->load->view('layouts/main_layout', $data);
    }


}
