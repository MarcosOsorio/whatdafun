<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {


      public function __construct()
      {
        parent::__construct();
        $this->load->model('account/Account_model');
        $this->load->model('product/Product_model');
        $this->load->model('product/Purchase_model');
        $this->load->model('product/Wish_model');
        $this->load->model('address/Address_model');
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

      public function index($address = false, $address_editable = false)
      {
        if($this->session->name)
        {

            // data for the cart
            $data['cart_count'] = $this->_get_cart_data();

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = $this->session->name . ' - Mi Cuenta';

            //load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = $this->session->name . ' - Mi Cuenta';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // set active page form customer menu
            $data['active_page'] = 'my_account';

            //load customer menu
            $data['page_customer_menu'] = $this->load->view('modules/customer_menu', $data, TRUE);

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

            //load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            //load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

            // load the register view with all the other modules
            $this->load->view('account/account_view', $data);
        }
          else
          {
            // account is not authenticated. Therefore is redirected to Login
            redirect('login');
          }
      }

      public function my_wishlist()
      {

          if ($this->session->id){

              // data for the cart
              $data['cart_count'] = $this->_get_cart_data();

              // data for the navbar
              $data['navbar_name'] = $this->session->name;

              // load the navbar with $data in $data['page_navbar']
              $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

              // set title
              $data['page_title'] = $this->session->name . ' - Mi Lista de Deseos';

              // load head
              $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

              // load breadcrumb
              $data['breadcrumb_address'] = $this->session->name . ' - Mi Lista de Deseos';
              $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

              // set active page form customer menu
              $data['active_page'] = 'my_wishlist';

              // load customer menu
              $data['page_menu'] = $this->load->view('modules/customer_menu', $data, TRUE);

              // load footer
              $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

              // load scripts
              $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

              // load wishes
              $data['wishlist'] = $this->Wish_model->get_wishlist($this->session->id);

              //print_r($data['wishlist']);

              // load the register view with all the other modules
              $this->load->view('account/my_wishlist_view', $data);
          } else {
            redirect('login');
          }
      }

      public function my_purchases()
      {
        if ($this->session->id){

            // data for the cart
            $data['cart_count'] = $this->_get_cart_data();

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = $this->session->name . ' - Mi Cuenta';

            // load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = $this->session->name . ' - Mi Cuenta';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // set active page form customer menu
            $data['active_page'] = 'my_purchases';

            // load customer menu
            $data['page_customer_menu'] = $this->load->view('modules/customer_menu', $data, TRUE);

            // load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            // load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

            // load purchases
            $data['purchases'] = $this->Purchase_model->get_purchases($this->session->id);

            // load the register view with all the other modules
            $this->load->view('account/my_purchases_view', $data);
        } else {
          redirect('404');
        }
      }

      public function order($pur_id = false)
      {
        if ($this->session->id and !$pur_id == false){

            // data for the cart
            $data['cart_count'] = $this->_get_cart_data();

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = $this->session->name . ' - Mi Cuenta';

            // load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = $this->session->name . ' - Mi Cuenta';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // set active page form customer menu
            $data['active_page'] = 'my_purchases';

            // load customer menu
            $data['page_customer_menu'] = $this->load->view('modules/customer_menu', $data, TRUE);

            // load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            // load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

            // load purchase info
            $data['purchase'] = $this->Purchase_model->get_purchase($pur_id);

            if (!isset($data['purchase'])){
              redirect('404');
            }

            // load purchased items
            $data['items'] = $this->Purchase_model->get_items_by_purchase($this->session->id, $pur_id);

            if (!isset($data['items'])){
              redirect('404');
            }

            // load the register view with all the other modules
            $this->load->view('account/order_view', $data);
        } else {
          redirect('404');
        }
      }

      public function edit_address($address = false)
      {
        // makes the address in the view editable

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $post_address = $this->input->post('default_address');

        if ($address == false){
          if (isset($post_address)){
            $this->index($post_address);
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
            $this->index();
          }
        }
      }

      public function fetch_communes($region = false)
      {
        // loads the communes list for a given region

        // https://css-tricks.com/dynamic-dropdowns/

        $communes = $this->Address_model->get_communes_by_region($region);
        // to implement echo json_encode($communes); instead of <option> tags

        foreach ($communes as $commune) {
          echo '<option value="'. $commune->com_id .'">'. $commune->com_name .'</option>';
        }
      }

      public function verify_password_change()
      {
        // validates the password change form

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if ($this->form_validation->run('password') == FALSE)
        {
          // password is not updated and we call the index method
          $this->index();

        } elseif ($this->Account_model->set_account_update_password(
          $this->session->email, $this->input->post('old_password'),
          $this->input->post('new_password')))
        {
          // user must make login again
          $this->password_change_success();
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

          $this->index($this->input->post('new_selected_address'),true);

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
          $this->index();
        }
      }

      public function add_new_address()
      {
        // registers a new address for a given user

        $address = $this->Address_model->set_new_address($this->session->id);
        if (!$address){
          // new address isn't registered and we call the index method
          $this->index();
        } else {
          // new address is registered and we call the index method with the address id
          $this->index($address, false);
        }
      }

      public function password_change_success()
      {
        // loads the success page on password changed

        // unsets session variables for new session on login
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('mail');
        $this->session->sess_destroy();

        // data for the redirection delay
        $data['page_logout'] = true;

        // set title
        $data['page_title'] = 'Contraseña Restablecida';

        //load head
        $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

        // load the navbar with $data in $data['page_navbar']
        $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

        // load breadcrumb
        $data['breadcrumb_address'] = ' Contraseña Restablecida';
        $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

        //load footer
        $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

        //load scripts
        $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

        // load the register view with all the other modules
        $this->load->view('account/account_password_reset_success_view', $data);
      }

      public function _password_check($str)
      {
        // checks if the old password matches with the new written password in the password form

        if (!$str) {
            return true;
        } elseif ($this->Account_model->get_account_email_password_exists($this->session->email, $this->input->post('old_password'))) {
            return true;
        } else {
            return false;
        }
      }
}
