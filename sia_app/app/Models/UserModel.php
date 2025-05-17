<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'bitbybit_users';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField = 'date_created';
    protected $updatedField = 'last_updated';
    protected $deletedField = 'deleted_at';
    
    protected $allowedFields = [
        'username',
        'email',
        'password',
        'salt',
        'role',
        'bio',
        'profile_image',
        'social_twitter',
        'social_github',
        'social_linkedin',
        'reset_token',
        'reset_token_expires',
        'last_login'
    ];
    
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[30]|alpha_numeric_space',
        'email' => 'required|valid_email|is_unique[bitbybit_users.email,id,{id}]',
        'password' => 'required|min_length[8]',
        'role' => 'required|numeric'
    ];
    
    protected $validationMessages = [
        'username' => [
            'required' => 'The username is required',
            'min_length' => 'The username must be at least 3 characters long',
            'max_length' => 'The username cannot exceed 30 characters',
            'alpha_numeric_space' => 'The username can only contain alphanumeric characters and spaces'
        ],
        'email' => [
            'required' => 'The email is required',
            'valid_email' => 'Please enter a valid email address',
            'is_unique' => 'This email is already registered'
        ],
        'password' => [
            'required' => 'The password is required',
            'min_length' => 'The password must be at least 8 characters long'
        ],
        'role' => [
            'required' => 'The role is required',
            'numeric' => 'The role must be a number'
        ]
    ];
    
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPasswordUpdate'];
    
    /**
     * Hash the password before inserting a new user
     *
     * @param array $data Data to be inserted
     * @return array
     */
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['salt'] = bin2hex(random_bytes(16));
            $data['data']['password'] = password_hash(
                $data['data']['password'] . $data['data']['salt'],
                PASSWORD_DEFAULT
            );
        }
        
        return $data;
    }
    
    /**
     * Hash the password before updating a user
     *
     * @param array $data Data to be updated
     * @return array
     */
    protected function hashPasswordUpdate(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['salt'] = bin2hex(random_bytes(16));
            $data['data']['password'] = password_hash(
                $data['data']['password'] . $data['data']['salt'],
                PASSWORD_DEFAULT
            );
        }
        
        return $data;
    }
    
    /**
     * Verify a user's credentials
     *
     * @param string $email User's email
     * @param string $password User's password
     * @return array|null User data if verified, null otherwise
     */
    public function verifyCredentials($email, $password)
    {
        $user = $this->where('email', $email)
            ->first();
        
        if (!$user) {
            return null;
        }
        
        if (!password_verify($password . $user['salt'], $user['password'])) {
            return null;
        }
        
        // Update last login timestamp
        $this->update($user['id'], ['last_login' => date('Y-m-d H:i:s')]);
        
        // Remove sensitive data
        unset($user['password']);
        unset($user['salt']);
        unset($user['reset_token']);
        unset($user['reset_token_expires']);
        
        return $user;
    }
    
    /**
     * Generate a password reset token
     *
     * @param string $email User's email
     * @return string|false Token if user exists, false otherwise
     */
    public function generateResetToken($email)
    {
        $user = $this->where('email', $email)
            ->first();
        
        if (!$user) {
            return false;
        }
        
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $this->update($user['id'], [
            'reset_token' => $token,
            'reset_token_expires' => $expires
        ]);
        
        return $token;
    }
    
    /**
     * Verify a password reset token
     *
     * @param string $token Reset token
     * @return array|false User data if token is valid, false otherwise
     */
    public function verifyResetToken($token)
    {
        $user = $this->where('reset_token', $token)
            ->first();
        
        if (!$user) {
            return false;
        }
        
        // Check if token has expired
        if (strtotime($user['reset_token_expires']) < time()) {
            return false;
        }
        
        return $user;
    }
    
    /**
     * Reset a user's password
     *
     * @param string $token Reset token
     * @param string $password New password
     * @return bool
     */
    public function resetPassword($token, $password)
    {
        $user = $this->verifyResetToken($token);
        
        if (!$user) {
            return false;
        }
        
        $this->update($user['id'], [
            'password' => $password,
            'reset_token' => null,
            'reset_token_expires' => null
        ]);
        
        return true;
    }
    
    /**
     * Get user with post count
     *
     * @param int $userId User ID
     * @return array|null
     */
    public function getUserWithStats($userId)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('bitbybit_users');
        $builder->select('bitbybit_users.*, COUNT(DISTINCT bitbybit_posts.id) as post_count, COUNT(DISTINCT bitbybit_comments.id) as comment_count');
        $builder->join('bitbybit_posts', 'bitbybit_posts.created_by = bitbybit_users.id', 'left');
        $builder->join('bitbybit_comments', 'bitbybit_comments.user_id = bitbybit_users.id', 'left');
        $builder->where('bitbybit_users.id', $userId);
        $builder->groupBy('bitbybit_users.id');
        
        $query = $builder->get();
        $result = $query->getRowArray();
        
        // Remove sensitive data
        if ($result) {
            unset($result['password']);
            unset($result['salt']);
            unset($result['reset_token']);
            unset($result['reset_token_expires']);
        }
        
        return $result;
    }
} 