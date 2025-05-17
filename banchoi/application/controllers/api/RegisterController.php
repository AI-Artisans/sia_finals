<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class RegisterController extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['username']) || !isset($data['email']) || !isset($data['password'])) {
            return $this->response([
                'status' => false,
                'message' => 'Invalid input'
            ], RestController::HTTP_BAD_REQUEST);
        }

        $userData = [
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ];

        $this->db->insert('users', $userData);

        return $this->response([
            'status' => true,
            'message' => 'User registered successfully!'
        ], RestController::HTTP_OK);
    }

    public function login_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['email']) || !isset($data['password'])) {
            return $this->response([
                'status' => false,
                'message' => 'Email and password are required'
            ], RestController::HTTP_BAD_REQUEST);
        }

        $email = $data['email'];
        $password = $data['password'];

        // Query user by email
        $user = $this->db->get_where('users', ['email' => $email])->row();

        if (!$user) {
            return $this->response([
                'status' => false,
                'message' => 'User not found'
            ], RestController::HTTP_NOT_FOUND);
        }

        // Verify password
        if (password_verify($password, $user->password)) {
    $redirectUrl = (strpos($user->email, '@admin.com') !== false) ? 'admin/dashboard' : 'dashboard/your_blogs';

    return $this->response([
        'status' => true,
        'message' => 'Login successful',
        'redirect' => base_url($redirectUrl),  // full URL to redirect
        'user' => [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email
        ]
    ], RestController::HTTP_OK);

        } else {
            return $this->response([
                'status' => false,
                'message' => 'Incorrect password'
            ], RestController::HTTP_UNAUTHORIZED);
        }
    }


}
