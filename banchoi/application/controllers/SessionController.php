<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SessionController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function set_session()
    {

        // Get raw POST data
        $input = json_decode(file_get_contents('php://input'), true);

        // For debugging, add this to log or echo input:
        log_message('debug', 'Input received: ' . print_r($input, true));
        // Or temporarily uncomment the next line to see what input you get:
        // echo json_encode($input); exit;

        if (!isset($input['id']) || !isset($input['username'])) {
            echo json_encode([
                'status' => false,
                'message' => 'Missing data'
            ]);
            return;
        }

        $this->session->set_userdata([
            'user_id' => $input['id'],
            'username' => $input['username']
        ]);

        echo json_encode([
            'status' => true,
            'message' => 'Session set successfully'
        ]);
    }
}
