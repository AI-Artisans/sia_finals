<?php
class Blogs extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function Showall(){
        $this->load->model('Blogs_model', 'blogs');

        print_r($this->blogs->getAll());
        die();
    }
}

?>