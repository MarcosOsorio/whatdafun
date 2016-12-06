<?php
class Design extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
          $this->load->model('account/Account_model');
          $this->load->model('product/Design_model');
          $this->load->model('product/Product_model');
          $this->load->model('product/Wish_model');
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

        public function index($pro_id = false)
        {
          // gets the id of the product to display
          if (!$pro_id == false){
            // if the id is given, then detail function is loaded
            $this->detail($pro_id);
          } else {
            // if id isn't gived, user is redirected to 404
            redirect('404/my404');
          }

        }

        public function detail($pro_id = false, $thumb_type = 'tshirt', $thumb_size = 'front', $thumb_gender = 'male', $thumb_color = 'white', $thumb_cloth_size = 'l')
        {
          // gets the id of the product to display
          if (!$pro_id == false){

            $data['product_info'] = $this->Design_model->get_design_info($pro_id);

            if (!isset($data['product_info'])){
              redirect('404/my404');
            }

            if ($data['product_info']->des_approved == 0) {
              redirect('home');
            }

            // data for the cart
            $data['cart_count'] = $this->_get_cart_data();

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = $data['product_info']->des_name. ' - ' .$data['product_info']->gal_name;;

            //load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load product id
            $data['product_id'] = $pro_id;

            // load breadcrumb
            $data['breadcrumb_address'] = $data['product_info']->des_name;
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // load customer menu
            $data['page_menu'] = $this->load->view('modules/sidebar_menu', $data, TRUE);

            // set size for thumbnails
            $data['thumb_size'] = $thumb_size;

            // set the default gender for the thumbnails
            $data['thumb_gender'] = $thumb_gender;

            // set the thumbnail type (tshirt, tanktop, etc.)
            $data['thumb_type'] = $thumb_type;

            // set the thumnail selected cloth size
            $data['thumb_cloth_size'] = $thumb_cloth_size;

            // set colours array for thumbnails array
            $colours = (object) array(
              (object) array('colour' => 'white'),
              (object) array('colour' => 'black'),
              (object) array('colour' => 'gray'),
              (object) array('colour' => 'red'),
              (object) array('colour' => 'yellow'),
            );

            $data['thumbnails'] = array();

            // set the default color for the thumbnail
            $data['thumb_colour'] = '';

            // foreach loop for fill the data['thumbnails'] array
            foreach ($colours as $colour) {

                  // set selected value for the colour sent in the form

                  switch ($thumb_size) {
                    case 'full':
                            if ($colour->colour == $thumb_color){
                              $item = (object) array(
                                'colour' => $colour->colour,
                                'file' => 'uploads/'.$pro_id.'_'.$thumb_type.'_'.$thumb_size.'_'.$colour->colour.'.jpg',
                                'selected' => 1
                                );

                                $data['thumb_colour'] = $item;

                            } else {
                              $item = (object) array(
                                'colour' => $colour->colour,
                                'file' => 'uploads/'.$pro_id.'_'.$thumb_type.'_'.$thumb_size.'_'.$colour->colour.'.jpg',
                                'selected' => 0
                                );
                            }
                      break;
                    case 'front':
                            if ($colour->colour == $thumb_color){
                              $item = (object) array(
                                'colour' => $colour->colour,
                                'file' => 'uploads/'.$pro_id.'_'.$thumb_type.'_'.$thumb_size.'_'.$thumb_gender.'_'.$colour->colour.'.jpg',
                                'selected' => 1
                                );

                                $data['thumb_colour'] = $item;

                            } else {
                              $item = (object) array(
                                'colour' => $colour->colour,
                                'file' => 'uploads/'.$pro_id.'_'.$thumb_type.'_'.$thumb_size.'_'.$thumb_gender.'_'.$colour->colour.'.jpg',
                                'selected' => 0
                                );
                            }
                      break;
                  }


                  array_push($data['thumbnails'],$item);
            }

            //load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            //load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

            // load the register view with all the other modules
            // $this->load->view('product/test_view', $data);
            $this->load->view('product/detail_view', $data);

          } else {
            // if id isn't gived, user is redirected to 404
            redirect('404/my404');
          }
        }

        public function add_to_cart()
        {
          if (!$this->session->name) {
            redirect('login');
          } else {



            $product['des_id']        =  $this->input->post('selected_id');
            $product['col_id']        =  $this->input->post('selected_colour_id');
            $product['pro_gender']    =  $this->input->post('selected_gender');
            $product['pro_size']      =  $this->input->post('selected_cloth_size');
            $product['pro_price']     = "";
            $product['pro_quantity']  = 1;
            $product['pro_name']      = "";

            $design_info = $this->Design_model->get_design($product['des_id']);

            if (isset($design_info)) {
              $product['pro_name']  = $design_info->des_name;
              $product['pro_price'] = $design_info->des_price-($design_info->des_price*$design_info->des_discount_percentage/100);
            } else {
              redirect('404');
            }

            $cart = $this->Product_model->add_to_cart($this->session->id, $product);

            if (isset($cart)) {
              redirect('basket');
            } else {
              redirect('404');
            }
          }
        }

        public function add_to_wishlist()
        {
          if (!$this->session->name) {
            redirect('login');
          } else {

            $des_id  = $this->input->post('selected_id');
            $wish_id = $this->Wish_model->add_to_wishlist($this->session->id, $des_id);

            if (isset($wish_id)) {
              redirect('account/my_wishlist');
            } else {
              redirect('design/detail/'.$des_id);
            }
          }
        }

        public function remove_from_wishlist()
        {
          if (!$this->session->name) {
            redirect('login');
          } else {

            print_r($this->input->post());
            $wish  = $this->input->post('delete_wish');
            $wish_id = $this->Wish_model->remove_from_wishlist($this->session->id, $wish);

            if (isset($wish_id)) {
              redirect('account/my_wishlist');
            } else {
              echo 'no pasó na';
              //redirect('404');
            }
          }
        }
}
