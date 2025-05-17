<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'bitbybit_posts';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField = 'date_created';
    protected $updatedField = 'last_updated';
    protected $deletedField = 'deleted_at';
    
    protected $allowedFields = [
        'title',
        'content',
        'summary',
        'published',
        'likes',
        'tags',
        'created_by',
        'featured_image',
        'category',
        'date_created',
        'last_updated',
        'deleted_at'
    ];
    
    protected $validationRules = [
        'title' => 'required|min_length[5]|max_length[255]',
        'content' => 'required|min_length[20]',
        'summary' => 'required|min_length[10]|max_length[250]',
        'created_by' => 'required|numeric'
    ];
    
    protected $validationMessages = [
        'title' => [
            'required' => 'The title is required',
            'min_length' => 'The title must be at least 5 characters long',
            'max_length' => 'The title cannot exceed 255 characters'
        ],
        'content' => [
            'required' => 'The content is required',
            'min_length' => 'The content must be at least 20 characters long'
        ],
        'summary' => [
            'required' => 'The summary is required',
            'min_length' => 'The summary must be at least 10 characters long',
            'max_length' => 'The summary cannot exceed 250 characters'
        ],
        'created_by' => [
            'required' => 'Author ID is required',
            'numeric' => 'Author ID must be a number'
        ]
    ];
    
    /**
     * Get all published posts
     *
     * @param int $limit Number of posts to retrieve
     * @param int $offset Offset for pagination
     * @return array
     */
    public function getPublishedPosts($limit = 10, $offset = 0)
    {
        return $this->select('bitbybit_posts.*, bitbybit_users.username as author_name')
            ->join('bitbybit_users', 'bitbybit_users.id = bitbybit_posts.created_by')
            ->where('bitbybit_posts.published', 1)
            ->orderBy('bitbybit_posts.date_created', 'DESC')
            ->limit($limit, $offset)
            ->find();
    }
    
    /**
     * Get posts by category
     *
     * @param string $category Category slug
     * @param int $limit Number of posts to retrieve
     * @param int $offset Offset for pagination
     * @return array
     */
    public function getPostsByCategory($category, $limit = 10, $offset = 0)
    {
        return $this->select('bitbybit_posts.*, bitbybit_users.username as author_name')
            ->join('bitbybit_users', 'bitbybit_users.id = bitbybit_posts.created_by')
            ->where('bitbybit_posts.published', 1)
            ->where('bitbybit_posts.category', $category)
            ->orderBy('bitbybit_posts.date_created', 'DESC')
            ->limit($limit, $offset)
            ->find();
    }
    
    /**
     * Search posts by title or content
     *
     * @param string $search Search term
     * @param int $limit Number of posts to retrieve
     * @param int $offset Offset for pagination
     * @return array
     */
    public function searchPosts($search, $limit = 10, $offset = 0)
    {
        return $this->select('bitbybit_posts.*, bitbybit_users.username as author_name')
            ->join('bitbybit_users', 'bitbybit_users.id = bitbybit_posts.created_by')
            ->where('bitbybit_posts.published', 1)
            ->groupStart()
                ->like('bitbybit_posts.title', $search)
                ->orLike('bitbybit_posts.content', $search)
                ->orLike('bitbybit_posts.summary', $search)
                ->orLike('bitbybit_posts.tags', $search)
            ->groupEnd()
            ->orderBy('bitbybit_posts.date_created', 'DESC')
            ->limit($limit, $offset)
            ->find();
    }
    
    /**
     * Get posts by user
     *
     * @param int $userId User ID
     * @param int $limit Number of posts to retrieve
     * @param int $offset Offset for pagination
     * @return array
     */
    public function getPostsByUser($userId, $limit = 10, $offset = 0)
    {
        return $this->where('created_by', $userId)
            ->orderBy('date_created', 'DESC')
            ->limit($limit, $offset)
            ->find();
    }
    
    /**
     * Get post with author and comment count
     *
     * @param int $postId Post ID
     * @return array|null
     */
    public function getPostWithDetails($postId)
    {
        return $this->select('bitbybit_posts.*, bitbybit_users.username as author_name, bitbybit_users.email as author_email, COUNT(bitbybit_comments.id) as comment_count')
            ->join('bitbybit_users', 'bitbybit_users.id = bitbybit_posts.created_by')
            ->join('bitbybit_comments', 'bitbybit_comments.post_id = bitbybit_posts.id', 'left')
            ->where('bitbybit_posts.id', $postId)
            ->groupBy('bitbybit_posts.id')
            ->first();
    }
    
    /**
     * Increment post likes
     *
     * @param int $postId Post ID
     * @return bool
     */
    public function incrementLikes($postId)
    {
        return $this->set('likes', 'likes + 1', false)
            ->where('id', $postId)
            ->update();
    }
    
    /**
     * Decrement post likes
     *
     * @param int $postId Post ID
     * @return bool
     */
    public function decrementLikes($postId)
    {
        return $this->set('likes', 'likes - 1', false)
            ->where('id', $postId)
            ->where('likes >', 0)
            ->update();
    }
    
    /**
     * Get related posts by category or tags
     *
     * @param int $postId Current post ID to exclude
     * @param string $category Category slug
     * @param string $tags Comma-separated tags
     * @param int $limit Number of posts to retrieve
     * @return array
     */
    public function getRelatedPosts($postId, $category, $tags = '', $limit = 3)
    {
        $tagArray = explode(',', $tags);
        
        $query = $this->select('bitbybit_posts.*, bitbybit_users.username as author_name')
            ->join('bitbybit_users', 'bitbybit_users.id = bitbybit_posts.created_by')
            ->where('bitbybit_posts.published', 1)
            ->where('bitbybit_posts.id !=', $postId);
        
        if (!empty($category)) {
            $query->where('bitbybit_posts.category', $category);
        }
        
        if (!empty($tagArray)) {
            $query->groupStart();
            foreach ($tagArray as $tag) {
                $query->orLike('bitbybit_posts.tags', trim($tag));
            }
            $query->groupEnd();
        }
        
        return $query->orderBy('RAND()')
            ->limit($limit)
            ->find();
    }
} 