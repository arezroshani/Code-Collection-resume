
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        $data = array(
            'page_title' => 'BookNest',
            'book'       => NULL,
        );

        if ($this->input->method() === 'post') {

            
            $price = $this->input->post('price');

            $fa = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
            $ar = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');
            $en = array('0','1','2','3','4','5','6','7','8','9');

            $price = str_replace(
                $ar,
                $en,
                str_replace($fa, $en, (string) $price)
            );

            $price = str_replace(array(',', '٬', ' '), '', trim($price));

            $_POST['price'] = $price;

            
            $this->form_validation->set_rules(
                'title',
                'book title',
                'trim|required|min_length[2]|max_length[100]'
            );

            $this->form_validation->set_rules(
                'publisher',
                'publisher',
                'trim|required|min_length[2]|max_length[80]'
            );

            $this->form_validation->set_rules(
                'price',
                'price',
                'trim|required|numeric|greater_than[0]|less_than[1000000000000]'
            );

            
            $this->form_validation->set_message('required', 'Please enter the %s.');
            $this->form_validation->set_message('min_length', 'The %s must be at least %s characters.');
            $this->form_validation->set_message('max_length', 'The %s can be at most %s characters.');
            $this->form_validation->set_message('numeric', 'The %s must be a number (digits only).');
            $this->form_validation->set_message('greater_than', 'The %s must be greater than 0.');
            $this->form_validation->set_message('less_than', 'The %s is too large.');

            
            if ($this->form_validation->run() !== FALSE) {

                $title = trim($this->input->post('title'));
                $publisher = trim($this->input->post('publisher'));
                $price = (float) $this->input->post('price');

                
                $data['book'] = array(
                    'title'           => $title,
                    'publisher'       => $publisher,
                    'price'           => $price,
                    'price_formatted' => number_format(
                        $price,
                        ($price == floor($price)) ? 0 : 2
                    ),
                    'cover'           => abs(crc32($title)) % 6,
                    'saved_at'        => date('M j, Y · g:i A'),
                );
            }
        }

        $this->load->view('book_view', $data);
    }
}
