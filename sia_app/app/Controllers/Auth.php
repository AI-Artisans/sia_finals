<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    public function login()
    {
        // If already logged in, redirect to home
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        
        $data = [
            'title' => 'Login'
        ];
        
        return view('auth/login', $data);
    }
    
    public function attemptLogin()
    {
        // Validate form data
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        
        // Get form data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Use real user authentication
        $user = $this->userModel->verifyCredentials($email, $password);
        
        if ($user) {
            $userData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'isLoggedIn' => true
            ];
            session()->set($userData);
            session()->setFlashdata('success', 'Login successful! Welcome back.');
            return redirect()->to('posts');
        }
        
        session()->setFlashdata('error', 'Invalid email or password. Please try again.');
        return redirect()->back()->withInput();
    }
    
    public function register()
    {
        // If already logged in, redirect to home
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        
        $data = [
            'title' => 'Register'
        ];
        
        return view('auth/register', $data);
    }
    
    public function attemptRegister()
    {
        // Validate form data
        $rules = [
            'username' => 'required|min_length[3]|max_length[30]|alpha_numeric_space',
            'email' => 'required|valid_email|is_unique[bitbybit_users.email]',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]',
            'terms' => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        
        // Get form data
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $userData = [
            'username' => $username,
            'email' => $email,
            'password' => $password, // UserModel will hash and salt it
            'role' => 2 // Always regular user
        ];
        
        try {
            if (!$this->userModel->insert($userData)) {
                // Registration failed, show model validation errors
                return redirect()->back()->withInput()->with('validation', $this->userModel->errors());
            }
        } catch (\Exception $e) {
            // Show the error message directly for debugging
            die('Registration error: ' . $e->getMessage());
        }
        
        session()->setFlashdata('success', 'Registration successful! You can now login.');
        return redirect()->to('login');
    }
    
    public function logout()
    {
        // Clear session data
        session()->destroy();
        
        // Set success message
        session()->setFlashdata('success', 'You have been logged out successfully.');
        
        // Redirect to login page
        return redirect()->to('login');
    }
    
    public function forgotPassword()
    {
        // If already logged in, redirect to home
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        
        $data = [
            'title' => 'Forgot Password'
        ];
        
        return view('auth/forgot_password', $data);
    }
    
    public function processForgotPassword()
    {
        // Validate form data
        $rules = [
            'email' => 'required|valid_email'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        
        // Get form data
        $email = $this->request->getPost('email');
        
        // In a real implementation, you would check if the email exists and send a reset link
        
        // Set success message
        session()->setFlashdata('success', 'If the email exists in our system, you will receive password reset instructions shortly.');
        
        // Redirect to login page
        return redirect()->to('login');
    }
    
    public function resetPassword($token)
    {
        // In a real implementation, you would validate the token
        
        $data = [
            'title' => 'Reset Password',
            'token' => $token
        ];
        
        return view('auth/reset_password', $data);
    }
    
    public function processResetPassword()
    {
        // Validate form data
        $rules = [
            'token' => 'required',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        
        // Get form data
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        
        // In a real implementation, you would validate the token and update the password
        
        // Set success message
        session()->setFlashdata('success', 'Your password has been reset successfully. You can now login with your new password.');
        
        // Redirect to login page
        return redirect()->to('login');
    }
    
    public function adminLogin()
    {
        // If already logged in as admin, redirect to admin dashboard
        if (session()->get('isLoggedIn') && session()->get('role') == 1) {
            return redirect()->to('/admin/dashboard');
        }
        $data = ['title' => 'Admin Login'];
        return view('auth/admin_login', $data);
    }
    
    public function attemptAdminLogin()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->verifyCredentials($email, $password);

        if ($user && isset($user['role']) && $user['role'] == 1) {
            $userData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ];
            session()->set($userData);
            session()->setFlashdata('success', 'Admin login successful!');
            return redirect()->to('/admin/dashboard'); // Change to your admin dashboard route
        }

        session()->setFlashdata('error', 'Invalid admin credentials.');
        return redirect()->back()->withInput();
    }

    // Show the admin registration form (GET)
    public function adminRegister()
    {
        // TEMPORARY: Allow public access to bootstrap first admin
        // Restore the restriction below after creating your first admin:
        // if (!session()->get('isLoggedIn') || session()->get('role') != 1) {
        //     return redirect()->to('admin/login');
        // }
        $data = ['title' => 'Admin Registration'];
        return view('auth/admin_register', $data);
    }

    // Handle admin registration (POST)
    public function attemptAdminRegister()
    {
        // TEMPORARY: Allow public access to bootstrap first admin
        // Restore the restriction below after creating your first admin:
        // if (!session()->get('isLoggedIn') || session()->get('role') != 1) {
        //     return redirect()->to('admin/login');
        // }
        $rules = [
            'username' => 'required|min_length[3]|max_length[30]|alpha_numeric_space',
            'email' => 'required|valid_email|is_unique[bitbybit_users.email]',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]',
            'terms' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userData = [
            'username' => $username,
            'email' => $email,
            'password' => $password, // UserModel will hash and salt it
            'role' => 1 // Always admin
        ];

        try {
            if (!$this->userModel->insert($userData)) {
                return redirect()->back()->withInput()->with('validation', $this->userModel->errors());
            }
        } catch (\Exception $e) {
            die('Admin registration error: ' . $e->getMessage());
        }

        session()->setFlashdata('success', 'Admin registration successful! You can now login as admin.');
        return redirect()->to('admin/login');
    }
} 