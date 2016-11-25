<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {


      public function __construct()
      {
        parent::__construct();
        $this->load->model('account/Account_model');
        $this->load->model('product/Product_model');
        $this->load->model('address/Address_model');
      }

      public function index($address = false, $address_editable = false)
      {
        if($this->session->name)
        {

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = $this->session->name . ' - Mi Cuenta';

            //load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load active page
            //$data['active_page'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = $this->session->name . ' - Mi Cuenta';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // check if address editable variable sent
            if (!$address_editable ==  false){
              $data['address_editable'] = 1;
            }
            // load addresses of active account
            $data['addresses'] = $this->Address_model->get_addresses($this->session->id);

            // load

            // load full address (active or selected)
            if ($address == false){
              $data['full_address'] = $this->Address_model->get_active_address($this->session->id);
            } else {
              $data['full_address'] = $this->Address_model->get_address_commune_and_region($address);
              if (empty($data['full_address'])){
                redirect('404');
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

      public function address($address = false)
      {
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
        $post_address = $this->input->post('new_active_address');
        if (isset($post_address)){
          if ($this->Address_model->set_active_address($this->session->id,$post_address)){
            $this->index();
          }
        }

      }

      public function fetch_communes($region = false)
      {
        // https://css-tricks.com/dynamic-dropdowns/

        $communes = $this->Address_model->get_communes_by_region($region);
        // echo json_encode($communes);

        foreach ($communes as $commune) {
          echo '<option value="'. $commune->com_id .'">'. $commune->com_name .'</option>';
        }
      }

      public function verify_password_change()
      {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if ($this->form_validation->run('password') == FALSE)
        {
          //$data['password_errors'] = validation_errors('<div class="alert alert-warning" role="alert">', '</div>');

          $this->index();

        } elseif ($this->Account_model->set_account_update_password($this->session->email, $this->input->post('old_password'), $this->input->post('new_password')))
        {
          // user must make login again
          $this->password_change_success();
        }
      }

      public function verify_address_change()
      {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if ($this->form_validation->run('address') == FALSE)
        {
          //$route['account/index/(:any)/(:any)'] = 'account/index/hola/quetal';

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
          // user is redirected to account
          $this->index();
        }
      }

      public function password_change_success()
      {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('mail');
        $this->session->sess_destroy();


        // data for the redirection delay
        $data['page_logout'] = TRUE;

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
        if (!$str) {
            return TRUE;
        } elseif ($this->Account_model->get_account_email_password_exists($this->session->email, $this->input->post('old_password'))) {
            return TRUE;
        } else {
            return FALSE;
        }
      }
}
