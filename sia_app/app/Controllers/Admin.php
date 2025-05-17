<?php
namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard()
    {
        $userModel = new \App\Models\UserModel();
        $postModel = new \App\Models\PostModel();

        $userCount = $userModel->countAll();
        $postCount = $postModel->countAll();

        $posts = $postModel
            ->select('bitbybit_posts.*, bitbybit_users.username as author_name')
            ->join('bitbybit_users', 'bitbybit_users.id = bitbybit_posts.created_by')
            ->orderBy('bitbybit_posts.date_created', 'DESC')
            ->findAll();

        $admin = session()->get('username');
        return view('admin/dashboard', [
            'admin' => $admin,
            'userCount' => $userCount,
            'postCount' => $postCount,
            'posts' => $posts
        ]);
    }
} 