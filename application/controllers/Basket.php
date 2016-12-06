<?php
class Basket extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
          $this->load->model('account/Account_model');
          $this->load->model('product/Design_model');
          $this->load->model('product/Product_model');
          $this->load->model('product/Purchase_model');
          $this->load->model('address/Address_model');
        }

        public function index()
        {
          if ($this->session->id){
            $this->_show_basket();
          } else {
            redirect('my404');
          }
        }

        public function _show_basket()
        {
          // load items in the cart
          $cart_items = $this->Product_model->get_cart_items($this->session->id);
          $cart_info  = $this->Product_model->get_cart_info($this->session->id);

          $data['cart_items'] = "";
          $data['cart_info']  = "";

          if (isset($cart_items)){
            $data['cart_items'] = $cart_items;
            $data['cart_info'] = $cart_info;
          } else {
            $data['cart_items'] = null;
          }

          // data for the cart
          $cart_count = $this->Product_model->get_cart_items_count($this->session->id);

          $data['cart_count'] = "";
          if (isset($cart_count)){
            $data['cart_count'] = $cart_count->car_count;
          } else {
            $data['cart_count'] = 0;
          }

          // data for the navbar
          $data['navbar_name'] = $this->session->name;

          // load the navbar with $data in $data['page_navbar']
          $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

          // set title
          $data['page_title'] = 'WhatDaFun! - Carro de Compras';

          //load head
          $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

          // load breadcrumb
          $data['breadcrumb_address'] = 'Carro de Compras';
          $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

          //load footer
          $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

          //load scripts
          $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

          // load the register view with all the other modules
          // $this->load->view('product/test_view', $data);
          $this->load->view('basket/basket_view', $data);

        }

        public function remove_item($pur_id, $pro_id)
        {
          if ($this->session->id){

            $cart = $this->Product_model->get_cart($this->session->id);

            if (isset($cart)){

              if ($pur_id == $cart->pur_id){
                $delete = $this->Product_model->remove_item($pur_id, $pro_id);

                if(isset($delete)){
                  $this->_show_basket();
                } else {
                  redirect('404/my404');
                }
              }
            }
          } else {
            redirect('404/my404');
          }
        }

        public function checkout_1($address = false, $address_editable = false)
        {
          if ($this->session->id){

            // load items in the cart
            $cart_items = $this->Product_model->get_cart_items($this->session->id);
            $cart_info  = $this->Product_model->get_cart_info($this->session->id);

            $data['cart_items'] = "";
            $data['cart_info']  = "";

            if (isset($cart_items)){
              $data['cart_items'] = $cart_items;
              $data['cart_info'] = $cart_info;
            } else {
              $data['cart_items'] = null;
            }

            // data for the cart
            $cart_count = $this->Product_model->get_cart_items_count($this->session->id);

            $data['cart_count'] = "";
            if (isset($cart_count)){
              $data['cart_count'] = $cart_count->car_count;
            } else {
              $data['cart_count'] = 0;
            }

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = 'WhatDaFun! - Carro de Compras';

            //load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = 'Carro de Compras';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            //load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            //load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

            // check if address editable variable sent
            if (!$address_editable ==  false){
              $data['address_editable'] = 1;
            }
            // load addresses of active account
            $data['addresses'] = $this->Address_model->get_addresses($this->session->id);

            // load full address (active or selected)
            if ($address == false){
              $data['full_address'] = $this->Address_model->get_active_address($this->session->id);
            } else {
              $data['full_address'] = $this->Address_model->get_address_commune_and_region($address);

              // if address is empty, array is filled with default values

              if ($this->Address_model->get_address_exists($this->session->id, $address)){
                if (empty($data['full_address'])){
                  $data['full_address'] = (object) array(
                    'add_id' => $address,
                    'acc_id' => $this->session->id,
                    'com_id' => '0',
                    'add_description' => '',
                    'add_name' => '',
                    'add_surname' => '',
                    'add_address' => '',
                    'add_block' => '',
                    'reg_id' => '0',
                    'add_number' => '',
                    'add_phone' => '',
                    'add_email' => '',
                    'add_active' => '1'
                  );
                }
              } else {
                redirect('404/my404');
              }
            }

            $data['region_list'] = $this->Address_model->get_regions();
            $data['communes_list'] = $this->Address_model->get_communes();

            // load the checkout 1 view with all the other modules
            $this->load->view('basket/checkout1_view', $data);

          } else {
            redirect('404/my404');
          }
        }

        public function checkout_2()
        {
          if ($this->session->id){
            // load items in the cart
            $cart_items = $this->Product_model->get_cart_items($this->session->id);
            $cart_info  = $this->Product_model->get_cart_info($this->session->id);

            $data['cart_items'] = "";
            $data['cart_info']  = "";

            if (isset($cart_items)){
              $data['cart_items'] = $cart_items;
              $data['cart_info'] = $cart_info;
            } else {
              $data['cart_items'] = null;
            }

            // data for the cart
            $cart_count = $this->Product_model->get_cart_items_count($this->session->id);

            $data['cart_count'] = "";
            if (isset($cart_count)){
              $data['cart_count'] = $cart_count->car_count;
            } else {
              $data['cart_count'] = 0;
            }

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = 'WhatDaFun! - Carro de Compras';

            //load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = 'Carro de Compras';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            //load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            //load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

            // load the checkout 2 view with all the other modules
            $this->load->view('basket/checkout2_view', $data);

          } else {
            redirect('404/my404');
          }
        }

        public function checkout_3()
        {
          if ($this->session->id){
            // load items in the cart
            $cart_items = $this->Product_model->get_cart_items($this->session->id);
            $cart_info  = $this->Product_model->get_cart_info($this->session->id);

            $this->session->carrier = $this->input->post('carrier');

            $data['cart_items'] = "";
            $data['cart_info']  = "";

            if (isset($cart_items)){
              $data['cart_items'] = $cart_items;
              $data['cart_info'] = $cart_info;
            } else {
              $data['cart_items'] = null;
            }

            // data for the cart
            $cart_count = $this->Product_model->get_cart_items_count($this->session->id);

            $data['cart_count'] = "";
            if (isset($cart_count)){
              $data['cart_count'] = $cart_count->car_count;
            } else {
              $data['cart_count'] = 0;
            }

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = 'WhatDaFun! - Carro de Compras';

            //load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = 'Carro de Compras';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            //load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            //load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

            // load the checkout 2 view with all the other modules
            $this->load->view('basket/checkout3_view', $data);

          } else {
            redirect('404/my404');
          }
        }

        public function checkout_4()
        {
          if ($this->session->id){
            // load items in the cart
            $cart_items = $this->Product_model->get_cart_items($this->session->id);
            $cart_info  = $this->Product_model->get_cart_info($this->session->id);

            $this->session->payment = $this->input->post('payment');

            $data['cart_items'] = "";
            $data['cart_info']  = "";

            if (isset($cart_items)){
              $data['cart_items'] = $cart_items;
              $data['cart_info'] = $cart_info;
            } else {
              $data['cart_items'] = null;
            }

            // data for the cart
            $cart_count = $this->Product_model->get_cart_items_count($this->session->id);

            $data['cart_count'] = "";
            if (isset($cart_count)){
              $data['cart_count'] = $cart_count->car_count;
            } else {
              $data['cart_count'] = 0;
            }

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = 'WhatDaFun! - Carro de Compras';

            //load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = 'Carro de Compras';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            //load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            //load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

            // load the checkout 2 view with all the other modules
            $this->load->view('basket/checkout4_view', $data);

          } else {
            redirect('404/my404');
          }
        }

        public function payment_gateway()
        {
          if ($this->session->id){
            $data['business'] = 'WhatDaFun';
            $data['amount'] = $this->Product_model->get_cart_info($this->session->id);
            $data['name'] = $this->session->name;
            $data['address'] = $this->Address_model->get_active_address($this->session->id);

            switch ($this->session->carrier) {
              case 'Correos de Chile':
                $this->session->carrier_id = 1;
                break;
              case 'Chilexpress':
                $this->session->carrier_id = 2;
                  break;
              case 'Tur Bus Cargo':
                $this->session->carrier_id = 3;
                  break;
            }

            switch ($this->session->payment) {
              case 'Paypal':
                $this->load->view('payment/paypal_view', $data);
                break;
              case 'WebPay Plus':
                $this->load->view('payment/webpayplus_view', $data);
                  break;
            }

          } else {
            redirect('404/my404');
          }
        }

        public function verify_payment()
        {
          $success = $this->Purchase_model->place_order($this->session->id, $this->session->carrier_id);

          if (isset($success)){
            $this->checkout_success();
          } else {
            $this->checkout_failure();
          }
        }

        public function checkout_success()
        {
          // data for the cart
          $cart_count = $this->Product_model->get_cart_items_count($this->session->id);

          $data['cart_count'] = "";
          if (isset($cart_count)){
            $data['cart_count'] = $cart_count->car_count;
          } else {
            $data['cart_count'] = 0;
          }

          // data for the navbar
          $data['navbar_name'] = $this->session->name;

          // load the navbar with $data in $data['page_navbar']
          $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

          // set title
          $data['page_title'] = '¡Felicitaciones! - ¡Tu Pedido está Hecho!';

          //load head
          $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

          // load breadcrumb
          $data['breadcrumb_address'] = 'Pedido Completado';
          $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

          //load footer
          $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

          //load scripts
          $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

          // load the checkout success with all the other modules
          $this->load->view('basket/checkout_success_view', $data);
        }

        public function checkout_failure()
        {
          // data for the cart
          $cart_count = $this->Product_model->get_cart_items_count($this->session->id);

          $data['cart_count'] = "";
          if (isset($cart_count)){
            $data['cart_count'] = $cart_count->car_count;
          } else {
            $data['cart_count'] = 0;
          }

          // data for the navbar
          $data['navbar_name'] = $this->session->name;

          // load the navbar with $data in $data['page_navbar']
          $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

          // set title
          $data['page_title'] = 'Lo Sentimos - Algo ha salido mal';

          //load head
          $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

          // load breadcrumb
          $data['breadcrumb_address'] = 'Error al Realizar el Pedido';
          $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

          //load footer
          $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

          //load scripts
          $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

          // load the checkout success with all the other modules
          $this->load->view('basket/checkout_failure_view', $data);
        }

        public function edit_address($address = false)
        {
          // makes the address in the view editable

          $this->load->helper(array('form', 'url'));
          $this->load->library('form_validation');

          $post_address = $this->input->post('default_address');

          if ($address == false){
            if (isset($post_address)){
              $this->checkout_1($post_address);
            } else{
              $this->index();
            }
          } else $this->index($address);
        }

        public function activate_address()
        {
          // sets the address selected in the view as the new active address

          $post_address = $this->input->post('new_active_address');
          if (isset($post_address)){
            if ($this->Address_model->set_active_address($this->session->id,$post_address)){
              $this->checkout_1();
            }
          }
        }

        public function verify_address_change()
        {
          // verifies if the address edit form is correct

          $this->load->helper(array('form', 'url'));
          $this->load->library('form_validation');

          if ($this->form_validation->run('address') == FALSE)
          {
            // if the form is completely ok, we call the index method with
            // the new address as a parameter

            $this->checkout_1($this->input->post('new_selected_address'),true);

          } elseif ($this->Account_model->set_account_update_address(
            Array(
            "id" => $this->session->id,
            "add_id" => $this->input->post("new_selected_address"),
            "new_description" => $this->input->post('new_description'),
            "new_name" => $this->input->post('new_name'),
            "new_surname" => $this->input->post('new_surname'),
            "new_address" => $this->input->post('new_address'),
            "new_number" => $this->input->post('new_number'),
            "new_block" => $this->input->post('new_block'),
            "new_commune" => $this->input->post('new_commune'),
            "new_phone" => $this->input->post('new_phone'),
            "new_email" => $this->input->post('new_email'))
            ))
          {
            // if the insert fails user is redirected to account
            $this->checkout_1();
          }
        }

        public function add_new_address()
        {
          // registers a new address for a given user

          $address = $this->Address_model->set_new_address($this->session->id);
          if (!$address){
            // new address isn't registered and we call the index method
            $this->checkout_1();
          } else {
            // new address is registered and we call the index method with the address id
            $this->checkout_1($address, false);
          }
        }
}
