<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\PostModel;

class Comments extends BaseController
{
    protected $commentModel;
    protected $postModel;
    
    public function __construct()
    {
        $this->commentModel = new CommentModel();
        $this->postModel = new PostModel();
    }
    
    /**
     * Store a new comment
     *
     * @param int $postId Post ID
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function store($postId)
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }
        
        // Validate form data
        $rules = [
            'content' => 'required|min_length[2]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Get form data
        $content = $this->request->getPost('content');
        $parentId = $this->request->getPost('parent_id') ?: null;
        
        // Prepare comment data
        $commentData = [
            'post_id' => $postId,
            'user_id' => session()->get('user_id'),
            'parent_id' => $parentId,
            'content' => $content,
            'likes' => 0
        ];
        
        // In a real implementation, you would save the comment to the database
        // $this->commentModel->insert($commentData);
        
        // Set success message
        session()->setFlashdata('success', 'Comment posted successfully!');
        
        // Redirect back to the post
        return redirect()->to('posts/' . $postId);
    }
    
    /**
     * Update a comment
     *
     * @param int $commentId Comment ID
     * @return \CodeIgniter\HTTP\Response|\CodeIgniter\HTTP\RedirectResponse
     */
    public function update($commentId)
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'You must be logged in to update a comment'
                ]);
            }
            return redirect()->to('login');
        }
        
        // Validate form data
        $rules = [
            'content' => 'required|min_length[2]'
        ];
        
        if (!$this->validate($rules)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => $this->validator->getErrors()
                ]);
            }
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Get form data
        $content = $this->request->getPost('content');
        
        // In a real implementation, you would check if the user is authorized to update the comment
        // and update the comment in the database
        
        // Prepare response
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Comment updated successfully!'
            ]);
        }
        
        // Set success message
        session()->setFlashdata('success', 'Comment updated successfully!');
        
        // Redirect back to the post
        return redirect()->back();
    }
    
    /**
     * Delete a comment
     *
     * @param int $commentId Comment ID
     * @return \CodeIgniter\HTTP\Response|\CodeIgniter\HTTP\RedirectResponse
     */
    public function delete($commentId)
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'You must be logged in to delete a comment'
                ]);
            }
            return redirect()->to('login');
        }
        
        // In a real implementation, you would check if the user is authorized to delete the comment
        // and delete the comment from the database
        
        // Prepare response
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Comment deleted successfully!'
            ]);
        }
        
        // Set success message
        session()->setFlashdata('success', 'Comment deleted successfully!');
        
        // Redirect back to the post
        return redirect()->back();
    }
    
    /**
     * Like a comment
     *
     * @param int $commentId Comment ID
     * @return \CodeIgniter\HTTP\Response|\CodeIgniter\HTTP\RedirectResponse
     */
    public function like($commentId)
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'You must be logged in to like a comment'
                ]);
            }
            return redirect()->to('login');
        }
        
        // In a real implementation, you would check if the user has already liked the comment
        // and increment or decrement the like count in the database
        
        // For this demo, we'll just return a success response
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Comment liked successfully!',
                'likes' => 10 // Would be the actual like count from the database
            ]);
        }
        
        // Set success message
        session()->setFlashdata('success', 'Comment liked successfully!');
        
        // Redirect back to the post
        return redirect()->back();
    }
} 