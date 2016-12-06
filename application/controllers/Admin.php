<?php
class Admin extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Admin_model');
    $this->load->model('product/Product_model');
    $this->load->model('product/Design_model');
  }

  public function index()
  {
    $this->user_lookup();
  }

  public function _admin_authenticate()
  {
    // check if account is admin
    $admin = $this->Admin_model->get_admin_status($this->session->id);

    if (!isset($admin)){
      return false;
    } else {
      return true;
    }
  }

  public function _get_cart_data()
  {
    $cart_count = $this->Product_model->get_cart_items_count($this->session->id);

    if (isset($cart_count)){
      return $cart_count->car_count;
    } else {
      return 0;
    }
  }

  public function user_lookup()
  {
      if ($this->session->id){

          if (!$this->_admin_authenticate()){
            redirect('404');
          } else {

            // data for the cart
            $data['cart_count'] = $this->_get_cart_data();

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = 'Administración - Usuarios';

            // load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = 'Administración - Usuarios';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // set active page form customer menu
            $data['active_page'] = 'users';

            // load customer menu
            $data['page_admin_menu'] = $this->load->view('modules/admin_menu', $data, TRUE);

            // load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            // load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

            $data['accounts'] = $this->Admin_model->get_admin_accounts($this->session->id);

            // load the register view with all the other modules
            $this->load->view('admin/user_lookup_view', $data);
          }
      } else {
        redirect('404');
      }
  }

  public function account_lookup($acc_id)
  {
      if ($acc_id == false) {
        redirect('404');
      }
      if ($this->session->id){

          if (!$this->_admin_authenticate()){
            redirect('404');
          } else {

            // data for the cart
            $data['cart_count'] = $this->_get_cart_data();

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = 'Administración - Usuarios';

            // load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = 'Administración - Usuarios';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // set active page form customer menu
            $data['active_page'] = 'users';

            // load customer menu
            $data['page_admin_menu'] = $this->load->view('modules/admin_menu', $data, TRUE);

            // load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            // load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

            $data['account'] = $this->Admin_model->get_admin_account($this->session->id, $acc_id);
            $data['purchases'] = $this->Admin_model->get_admin_purchases_by_account($this->session->id, $acc_id);
            $data['galleries'] = $this->Admin_model->get_admin_galleries_by_designer($this->session->id, $acc_id);
            $data['wishes'] = $this->Admin_model->get_admin_wishlist($this->session->id, $acc_id);

            // load the register view with all the other modules
            $this->load->view('admin/account_lookup_view', $data);
          }
      } else {
        redirect('404');
      }
  }

  public function designer_lookup()
  {
      if ($this->session->id){

          if (!$this->_admin_authenticate()){
            redirect('404');
          } else {

            // data for the cart
            $data['cart_count'] = $this->_get_cart_data();

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = 'Administración - Diseñadores';

            // load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = 'Administración - Diseñadores';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // set active page form customer menu
            $data['active_page'] = 'designers';

            // load customer menu
            $data['page_admin_menu'] = $this->load->view('modules/admin_menu', $data, TRUE);

            // load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            // load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

            // load the register view with all the other modules
            $this->load->view('admin/designer_lookup_view', $data);
          }
      } else {
        redirect('404');
      }
  }

  public function designs_lookup()
  {
      if ($this->session->id){

          if (!$this->_admin_authenticate()){
            redirect('404');
          } else {

            // data for the cart
            $data['cart_count'] = $this->_get_cart_data();

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = 'Administración - Diseños';

            // load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = 'Administración - Diseños';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // set active page form customer menu
            $data['active_page'] = 'designs';

            // load customer menu
            $data['page_admin_menu'] = $this->load->view('modules/admin_menu', $data, TRUE);

            // load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            // load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

            // load designs
            $data['designs'] = $this->Admin_model->get_admin_designs($this->session->id);


            // load the register view with all the other modules
            $this->load->view('admin/designs_lookup_view', $data);

          }
      } else {
        redirect('404');
      }
  }

  public function stats_lookup()
  {
      if ($this->session->id){

          if (!$this->_admin_authenticate()){
            redirect('404');
          } else {

            // data for the cart
            $data['cart_count'] = $this->_get_cart_data();

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = 'Administración - Estadísticas';

            // load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = 'Administración - Estadísticas';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // set active page form customer menu
            $data['active_page'] = 'stats';

            // load customer menu
            $data['page_admin_menu'] = $this->load->view('modules/admin_menu', $data, TRUE);

            // load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            // load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

            // load purchases
            $data['purchases'] = $this->Admin_model->get_admin_purchases($this->session->id);

            // load top 10 on basket designs
            $data['top_10_basket'] = $this->Admin_model->get_admin_top_10_basket($this->session->id);

            // load top 10 purchased designs
            $data['top_10_purchased'] = $this->Admin_model->get_admin_top_10_purchased($this->session->id);

            // load top 10 wishlist designs
            $data['top_10_wishlist'] = $this->Admin_model->get_admin_top_10_wishlist($this->session->id);

            // load the register view with all the other modules
            $this->load->view('admin/stats_lookup_view', $data);



          }
      } else {
        redirect('404');
      }
  }

  public function order_lookup($pur_id)
  {
    if ($pur_id == false){
      redirect('404');
    }
    if ($this->session->id){

        if (!$this->_admin_authenticate()){
          redirect('404');
        } else {

          $order = $this->Admin_model->get_admin_purchase($this->session->id, $pur_id);

          if (isset($order)) {
            // data for the cart
            $data['cart_count'] = $this->_get_cart_data();

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = 'Administración - Pedido #'.$order->pur_id;

            // load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = 'Administración - Estadísticas';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // set active page form customer menu
            $data['active_page'] = 'stats';

            // load customer menu
            $data['page_admin_menu'] = $this->load->view('modules/admin_menu', $data, TRUE);

            // load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            // load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

            // load order
            $data['purchase'] = $order;

            // load purchased items
            $data['items'] = $this->Admin_model->get_admin_items_by_purchase($this->session->id, $pur_id);

            // load the register view with all the other modules
            $this->load->view('admin/order_lookup_view', $data);

          } else {
            redirect('404');
          }
        }
    } else {
      redirect('404');
    }
  }

  public function user_ban()
  {
    if ($this->session->id){

        if (!$this->_admin_authenticate()){
          redirect('404');
        } else {

          $deactivated_user = $this->Admin_model->set_admin_disable_user($this->session->id, $this->input->post('user_ban'));

          if (isset($deactivated_user)) {
            $this->user_lookup();
          } else {
            redirect('404');
          }
        }
    } else {
      redirect('404');
    }
  }

  public function user_unban()
  {
    if ($this->session->id){

        if (!$this->_admin_authenticate()){
          redirect('404');
        } else {

          $activated_user = $this->Admin_model->set_admin_enable_user($this->session->id, $this->input->post('user_unban'));

          if (isset($activated_user)) {
            $this->user_lookup();
          } else {
            redirect('404');
          }
        }
    } else {
      redirect('404');
    }
  }

  public function enable_design()
  {
    if ($this->session->id){

        if (!$this->_admin_authenticate()){
          redirect('404');
        } else {

          $enabled_design = $this->Admin_model->set_admin_enable_design($this->session->id, $this->input->post('enable_design'));

          if (isset($enabled_design)) {
            $this->designs_lookup();
          } else {
            redirect('404');
          }
        }
    } else {
      redirect('404');
    }
  }

  public function disable_design()
  {
    if ($this->session->id){

        if (!$this->_admin_authenticate()){
          redirect('404');
        } else {

          $disabled_design = $this->Admin_model->set_admin_disable_design($this->session->id, $this->input->post('disable_design'));

          if (isset($disabled_design)) {
            $this->designs_lookup();
          } else {
            redirect('404');
          }
        }
    } else {
      redirect('404');
    }
  }

  public function update_tracking()
  {
    if ($this->session->id){

        if (!$this->_admin_authenticate()){
          redirect('404');
        } else {

          $updated_shipment = $this->Admin_model->set_admin_update_tracking($this->session->id, $this->input->post('shipment_id'), $this->input->post('tracking_number'));

          if (isset($updated_shipment)) {
            $this->order_lookup($this->input->post('purchase_id'));
          } else {
            redirect('404');
          }
        }
    } else {
      redirect('404');
    }
  }
}
