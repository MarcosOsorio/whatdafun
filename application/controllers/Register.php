<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
          $this->load->model('account/Account_model');
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
                  $data['navbar_name'] = $this->session->first_name;

                  // load the navbar with $data in $data['page_navbar']
                  $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

                  // set title
                  $data['page_title'] = 'WhatDaFun! - Registro';

                  //load head
                  $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

                  // load breadcrumb
                  $data['breadcrumb_address'] = 'Registro';
                  $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

                  //load footer
                  $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

                  //load scripts
                  $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

                  // load the register view with all the other modules
                  $this->load->view('register/register_view', $data);

        }

        public function verify_register()
        {
          $this->load->helper(array('form', 'url'));
          $this->load->library('form_validation');

          if ($this->form_validation->run('register') == FALSE)
          {
            $this->index();

          } elseif ($this->Account_model->set_account(
                    $this->input->post('email'),
                    $this->input->post('first_name'),
                    $this->input->post('father_surname'),
                    $this->input->post('password')
                    ))
          {
            // fetch session data from the database
            $this->_load_session_data($this->input->post('email'), $this->input->post('password'),$this->session);

            //print_r($this->session->all_userdata());

            // account is authenticated with database and session is ready
            redirect('account');
          }
        }

        // load the session data against the database
        public function _load_session_data($email, $password,&$session)
        {
            $record = $this->Account_model->get_account_session_data($email, $password);
            $session->id = $record->acc_id;
            $session->first_name = $record->acc_first_name;
            $session->email = $record->acc_email;
        }
}
