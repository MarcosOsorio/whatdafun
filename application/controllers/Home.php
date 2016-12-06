<?php
class Home extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
          $this->load->model('product/Design_model');
        }

        public function _get_cart_data()
        {
          $cart_count = "";
          if ($this->session->id) {
            $cart_count = $this->Product_model->get_cart_items_count($this->session->id);
            if (isset($cart_count)){
              return $cart_count->car_count;
            } else {
              return 0;
            }
          } else {
            return 0;
          }
        }

        public function index()
        {
          $this->home();
        }

        public function home()
        {

          // get the designs for showing in home
          $data['top_basket'] = $this->Design_model->get_top_basket();

          // get the designs for showing in home
          $data['top_purchased'] = $this->Design_model->get_top_purchased();

          // data for the cart
          $data['cart_count'] = $this->_get_cart_data();

          // data for the navbar
          $data['navbar_name'] = $this->session->name;
          // load the navbar with $data in $data['page_navbar']
          $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

          // set title
          $data['page_title'] = 'WhatDaFun! - ¡Tu Moda Friki!';

          //load head

          $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

          //load footer
          $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

          //load scripts
          $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

          // load the home view with all the other modules
          $this->load->view('home/home_view', $data);

        }

}
