<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
    public function index()
    {
        $postModel = new PostModel();
        $posts = $postModel->getPublishedPosts(6); // Show latest 6 posts with author_name

        $data = [
            'title' => 'Home',
            'posts' => $posts
        ];

        return view('home', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function terms()
    {
        $data = [
            'title' => 'Terms of Service'
        ];
        return view('static/terms', $data);
    }

    public function privacy()
    {
        $data = [
            'title' => 'Privacy Policy'
        ];
        return view('static/privacy', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us'
        ];
        return view('static/contact', $data);
    }

    public function sendContact()
    {
        // Form validation
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'subject' => 'required|min_length[3]|max_length[100]',
            'message' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get form data
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');

        // In a real application, you would send an email here
        // For this demo, we'll just show a success message

        // Flash success message
        session()->setFlashdata('success', 'Thank you for contacting us! We will get back to you soon.');

        // Redirect back to contact page
        return redirect()->to('contact');
    }
}
