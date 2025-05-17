<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'bitbybit_comments';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField = 'date_created';
    protected $updatedField = 'last_updated';
    protected $deletedField = 'deleted_at';
    
    protected $allowedFields = [
        'post_id',
        'user_id',
        'parent_id',
        'content',
        'likes'
    ];
    
    protected $validationRules = [
        'post_id' => 'required|numeric',
        'user_id' => 'required|numeric',
        'content' => 'required|min_length[2]'
    ];
    
    protected $validationMessages = [
        'post_id' => [
            'required' => 'Post ID is required',
            'numeric' => 'Post ID must be a number'
        ],
        'user_id' => [
            'required' => 'User ID is required',
            'numeric' => 'User ID must be a number'
        ],
        'content' => [
            'required' => 'Comment content is required',
            'min_length' => 'Comment must be at least 2 characters long'
        ]
    ];
    
    /**
     * Get comments for a specific post
     *
     * @param int $postId Post ID
     * @param int $limit Number of comments to retrieve
     * @param int $offset Offset for pagination
     * @return array
     */
    public function getCommentsByPost($postId, $limit = 50, $offset = 0)
    {
        return $this->select('bitbybit_comments.*, bitbybit_users.username, bitbybit_users.profile_image')
            ->join('bitbybit_users', 'bitbybit_users.id = bitbybit_comments.user_id')
            ->where('bitbybit_comments.post_id', $postId)
            ->where('bitbybit_comments.parent_id IS NULL')
            ->orderBy('bitbybit_comments.date_created', 'DESC')
            ->limit($limit, $offset)
            ->find();
    }
    
    /**
     * Get replies for a specific comment
     *
     * @param int $commentId Comment ID
     * @return array
     */
    public function getRepliesByComment($commentId)
    {
        return $this->select('bitbybit_comments.*, bitbybit_users.username, bitbybit_users.profile_image')
            ->join('bitbybit_users', 'bitbybit_users.id = bitbybit_comments.user_id')
            ->where('bitbybit_comments.parent_id', $commentId)
            ->orderBy('bitbybit_comments.date_created', 'ASC')
            ->find();
    }
    
    /**
     * Get comments with nested replies
     *
     * @param int $postId Post ID
     * @param int $limit Number of comments to retrieve
     * @param int $offset Offset for pagination
     * @return array
     */
    public function getCommentsWithReplies($postId, $limit = 50, $offset = 0)
    {
        $comments = $this->getCommentsByPost($postId, $limit, $offset);
        
        foreach ($comments as &$comment) {
            $comment['replies'] = $this->getRepliesByComment($comment['id']);
        }
        
        return $comments;
    }
    
    /**
     * Get recent comments for a user
     *
     * @param int $userId User ID
     * @param int $limit Number of comments to retrieve
     * @return array
     */
    public function getRecentCommentsByUser($userId, $limit = 10)
    {
        return $this->select('bitbybit_comments.*, bitbybit_posts.title as post_title')
            ->join('bitbybit_posts', 'bitbybit_posts.id = bitbybit_comments.post_id')
            ->where('bitbybit_comments.user_id', $userId)
            ->orderBy('bitbybit_comments.date_created', 'DESC')
            ->limit($limit)
            ->find();
    }
    
    /**
     * Increment comment likes
     *
     * @param int $commentId Comment ID
     * @return bool
     */
    public function incrementLikes($commentId)
    {
        return $this->set('likes', 'likes + 1', false)
            ->where('id', $commentId)
            ->update();
    }
    
    /**
     * Decrement comment likes
     *
     * @param int $commentId Comment ID
     * @return bool
     */
    public function decrementLikes($commentId)
    {
        return $this->set('likes', 'likes - 1', false)
            ->where('id', $commentId)
            ->where('likes >', 0)
            ->update();
    }
    
    /**
     * Get comment count for a post
     *
     * @param int $postId Post ID
     * @return int
     */
    public function getCommentCount($postId)
    {
        return $this->where('post_id', $postId)
            ->countAllResults();
    }
} 