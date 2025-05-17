<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CommentModel;
use App\Models\CategoryModel;

class Posts extends BaseController
{
    protected $postModel;
    protected $commentModel;
    protected $categoryModel;
    
    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
        $this->categoryModel = new CategoryModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Articles'
        ];
        
        // Get category filter if exists
        $category = $this->request->getGet('category');
        $search = $this->request->getGet('search');
        
        $builder = $this->postModel;
        
        if ($category) {
            $builder = $builder->where('category', $category);
            $data['category'] = $category;
        }
        if ($search) {
            $builder = $builder->like('title', $search)->orLike('summary', $search)->orLike('content', $search);
            $data['search'] = $search;
        }
        // Only show published posts
        $builder = $builder->where('published', 1);
        // Order by most recent
        $builder = $builder->orderBy('id', 'DESC');
        
        $posts = $builder->select('bitbybit_posts.*, bitbybit_users.username as author_name')
            ->join('bitbybit_users', 'bitbybit_users.id = bitbybit_posts.created_by')
            ->findAll();
        
        $data['posts'] = $posts;
        
        return view('posts/index', $data);
    }
    
    public function show($id)
    {
        $post = $this->postModel
            ->select('bitbybit_posts.*, bitbybit_users.username')
            ->join('bitbybit_users', 'bitbybit_users.id = bitbybit_posts.created_by')
            ->where('bitbybit_posts.id', $id)
            ->where('bitbybit_posts.published', 1)
            ->first();
        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Post not found');
        }
        $data = [
            'title' => $post['title'],
            'post' => $post
        ];
        return view('posts/show', $data);
    }
    
    public function create()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }
        
        $data = [
            'title' => 'Create Article'
        ];
        
        // Pass validation errors if they exist
        if (session()->getFlashdata('validation')) {
            $data['validation'] = session()->getFlashdata('validation');
        }
        
        return view('posts/create', $data);
    }
    
    public function store()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }
        
        // Validate form data
        $rules = [
            'title' => 'required|min_length[5]|max_length[255]',
            'category' => 'required',
            'content' => 'required|min_length[20]',
            'summary' => 'required|min_length[10]|max_length[250]',
            'terms' => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        
        // Process featured image if uploaded
        $featuredImage = $this->request->getFile('featured_image');
        $imagePath = '';
        
        if ($featuredImage && $featuredImage->isValid() && !$featuredImage->hasMoved()) {
            $newName = $featuredImage->getRandomName();
            $imagePath = 'uploads/posts/' . $newName;
            
            // Move the image to the uploads directory
            $featuredImage->move(ROOTPATH . 'public/uploads/posts', $newName);
        }
        
        // Prepare post data
        $postData = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'summary' => $this->request->getPost('summary'),
            'category' => $this->request->getPost('category'),
            'featured_image' => $imagePath,
            'tags' => $this->request->getPost('tags'),
            'published' => $this->request->getPost('published'),
            'created_by' => session()->get('user_id'),
            'date_created' => date('Y-m-d H:i:s'),
            'last_updated' => date('Y-m-d H:i:s')
        ];
        
        $this->postModel->insert($postData);
        
        // Set success message
        session()->setFlashdata('success', 'Article created successfully' . ($postData['published'] ? ' and published' : ' as draft'));
        
        // Redirect to posts page
        return redirect()->to('posts');
    }
    
    public function edit($id)
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }
        
        // In a real implementation, you would fetch the post from the database
        // and check if the user is authorized to edit it
        
        $data = [
            'title' => 'Edit Article'
        ];
        
        return view('posts/edit', $data);
    }
    
    public function update($id)
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }
        
        // Validate form data
        $rules = [
            'title' => 'required|min_length[5]|max_length[255]',
            'category' => 'required',
            'content' => 'required|min_length[20]',
            'summary' => 'required|min_length[10]|max_length[250]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        
        // In a real implementation, you would update the post in the database
        
        // Set success message
        session()->setFlashdata('success', 'Article updated successfully');
        
        // Redirect to the post
        return redirect()->to('posts/' . $id);
    }
    
    public function delete($id)
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }
        
        // In a real implementation, you would delete the post from the database
        // and check if the user is authorized to delete it
        
        // Set success message
        session()->setFlashdata('success', 'Article deleted successfully');
        
        // Redirect to posts page
        return redirect()->to('posts');
    }
} 