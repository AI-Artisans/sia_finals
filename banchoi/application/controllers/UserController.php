<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');  // Load your UserModel
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['users'] = $this->UserModel->get_all_users();
        $content = $this->load->view('users/index', $data, true);
        $this->load->view('layouts/admin_layout', [
            'title' => 'User Management',
            'content' => $content
        ]);
    }



    public function create()
    {
        $data = []; // if you need to pass anything to the create view, add here
        $content = $this->load->view('users/create', $data, true);
        $this->load->view('layouts/admin_layout', [
            'title' => 'Create User',
            'content' => $content
        ]);
    }


    public function store()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('users/create');
        } else {
            $this->UserModel->insert_user([
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email')
            ]);
            redirect('users');
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->UserModel->get_user($id);
        if (!$data['user']) {
            show_404();
        }
        $content = $this->load->view('users/edit', $data, true);
        $this->load->view('layouts/admin_layout', [
            'title' => 'Edit User',
            'content' => $content
        ]);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $data['user'] = $this->UserModel->get_user($id);
            $this->load->view('users/edit', $data);
        } else {
            $this->UserModel->update_user($id, [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email')
            ]);
            redirect('users');
        }
    }

    public function delete($id)
    {
        $this->UserModel->delete_user($id);
        redirect('users');
    }
}
