<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('home');
    }

    public function about()
    {
        $this->load->view('about');
    }

    public function contact()
    {
        $this->load->view('contact');
    }

    public function interests()
    {
        $this->load->view('interests');
    }

   public function css()
{
    $file = APPPATH . 'assets/css/output.css';

    if (!file_exists($file)) {
        show_404();
        return;
    }

    $this->output
        ->set_content_type('text/css')
        ->set_output(file_get_contents($file));
}

   
    public function image($filename = '')
    {
        $allowed = array(
            'anjo.jpg'  => 'image/jpeg',
            'blind.jpg' => 'image/jpeg'
        );

        if (!isset($allowed[$filename])) {
            show_404();
            return;
        }

        $file = APPPATH . 'assets/images/' . $filename;

        if (!file_exists($file)) {
            show_404();
            return;
        }

        $this->output->set_content_type($allowed[$filename]);
        readfile($file);
    }
}