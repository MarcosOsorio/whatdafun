<?php defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
          $this->load->model('product/Product_model');
        }

        public function index()
        {

          if ($this->session->id){
            // data for the cart
            $cart_count = $this->Product_model->get_cart_items_count($this->session->id);

            $data['cart_count'] = "";
            if (isset($cart_count)){
              $data['cart_count'] = $cart_count->car_count;
            } else {
              $data['cart_count'] = 0;
            }
          } else {
            $data['cart_count'] = 0;
          }

          // data for the navbar
          $data['navbar_name'] = $this->session->name;

          // load the navbar with $data in $data['page_navbar']
          $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

          // set title
          $data['page_title'] = '¡Ops! - No Encontrado';

          //load head
          $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

          // load breadcrumb
          $data['breadcrumb_address'] = 'No Encontrado';
          $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

          //load footer
          $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

          //load scripts
          $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

          // load the register view with all the other modules
          $this->output->set_status_header('404');
          $this->load->view('my404/my404_view', $data);
        }
}
