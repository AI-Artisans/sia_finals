<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Custom base controller that all API controllers should extend
class MY_Controller extends CI_Controller {

	protected $request_method;
	protected $request_data;

	public function __construct() {
		parent::__construct();


		parent::__construct();
        date_default_timezone_set('Asia/Manila');

		// Get request method
		$this->request_method = $_SERVER['REQUEST_METHOD'];

		// Get request data based on method
		switch ($this->request_method) {
			case 'GET':
				$this->request_data = $this->input->get();
				break;
			case 'POST':
				// Try to get JSON input first
				$raw_input = file_get_contents('php://input');
				if (!empty($raw_input)) {
					$this->request_data = json_decode($raw_input, true);
				}

				// Fall back to POST if JSON parsing failed
				if (json_last_error() !== JSON_ERROR_NONE || empty($this->request_data)) {
					$this->request_data = $this->input->post();
				}
				break;
			case 'PUT':
			case 'DELETE':
				$raw_input = file_get_contents('php://input');
				$this->request_data = json_decode($raw_input, true);
				break;
			default:
				$this->request_data = [];
		}
	}

	// Helper function for JSON responses
	protected function json_response($data, $status_code = 200) {
		$this->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode($data));
	}

	// Helper function for JSON error responses
	protected function json_error($message, $status_code = 400) {
		$this->output
			->set_content_type('application/json')
			->set_status_header($status_code)
			->set_output(json_encode(['error' => $message]));
	}
}

