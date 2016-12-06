<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Designer extends CI_Controller {

      public function __construct()
      {
        parent::__construct();
        $this->load->model('account/Account_model');
        $this->load->model('product/Gallery_model');
        $this->load->model('product/Design_model');
        $this->load->model('product/Purchase_model');
        $this->load->model('account/Designer_model');
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
        $this->artist();
      }

      public function artist_enroll()
      {
        // data for the cart
        $data['cart_count'] = $this->_get_cart_data();

        // data for the navbar
        $data['navbar_name'] = ucwords($this->session->name);

        // load the navbar with $data in $data['page_navbar']
        $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

        // set title
        $data['page_title'] =  '¡Conviértete en Artista WhatDaFun!';

        // load head
        $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

        // load breadcrumb
        $data['breadcrumb_address'] = '¡Conviértete en Artista WhatDaFun!';
        $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

        // load footer
        $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

        // load scripts
        $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

        // load the register view with all the other modules
        $this->load->view('designer/artist_enroll_view', $data);

      }


      public function settings()
      {
        if ($this->session->id) {

            $artist = $this->Designer_model->get_artist($this->session->id);
            if (isset($artist)) {

                  // data for the cart
                  $data['cart_count'] = $this->_get_cart_data();

                  // data for the navbar
                  $data['navbar_name'] = $artist->acc_designer_nickname;

                  // load the navbar with $data in $data['page_navbar']
                  $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

                  // set title
                  $data['page_title'] = ucfirst($artist->acc_designer_nickname) . ' - Configuración';

                  // load head
                  $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

                  // load breadcrumb
                  $data['breadcrumb_address'] = ucfirst($artist->acc_designer_nickname) . ' - Configuración';
                  $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

                  // set active page form customer menu
                  $data['active_page'] = 'my_settings';

                  // set box_name for title
                  $data['box_title_name'] = ucfirst($artist->acc_designer_nickname);

                  // load customer menu
                  $data['page_menu'] = $this->load->view('modules/designer_menu', $data, TRUE);

                  // load footer
                  $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

                  // load scripts
                  $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

                  // load galleries
                  $data['artist'] = $artist;

                  // load the register view with all the other modules
                  $this->load->view('designer/settings_view', $data);

            } else {
              redirect('404');
            }
        } else {
          redirect('login');
        }
      }

      public function sales()
      {
        if ($this->session->id) {

            $artist = $this->Designer_model->get_artist($this->session->id);
            if (isset($artist)) {

                  // data for the cart
                  $data['cart_count'] = $this->_get_cart_data();

                  // data for the navbar
                  $data['navbar_name'] = $artist->acc_designer_nickname;

                  // load the navbar with $data in $data['page_navbar']
                  $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

                  // set title
                  $data['page_title'] = ucfirst($artist->acc_designer_nickname) . ' - Diseñador';

                  // load head
                  $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

                  // load breadcrumb
                  $data['breadcrumb_address'] = ucfirst($artist->acc_designer_nickname) . ' - Diseñador';
                  $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

                  // set active page form customer menu
                  $data['active_page'] = 'my_sales';

                  // set box_name for title
                  $data['box_title_name'] = ucfirst($artist->acc_designer_nickname);

                  // load customer menu
                  $data['page_menu'] = $this->load->view('modules/designer_menu', $data, TRUE);

                  // load footer
                  $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

                  // load scripts
                  $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

                  // load galleries
                  $data['sales_count'] = $this->Purchase_model->get_sales_count($this->session->id);

                  $data['sales'] = $this->Purchase_model->get_sales_by_designer($this->session->id);

                  $data['total'] = $this->Purchase_model->get_sales_by_designer_total($this->session->id);

                  // load the register view with all the other modules
                  $this->load->view('designer/sales_view', $data);

            } else {
              redirect('404');
            }
        } else {
          redirect('login');
        }
      }

      public function artist($art_id = false)
      {
        if ($art_id == false){
          if ($this->session->id){
            // not given artist id, session active
            $artist = $this->Designer_model->get_artist($this->session->id);
            if (isset($artist)) {

              // Private Artist Page

              // data for the cart
              $data['cart_count'] = $this->_get_cart_data();

              // data for the navbar
              $data['navbar_name'] = $artist->acc_designer_nickname;

              // load the navbar with $data in $data['page_navbar']
              $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

              // set title
              $data['page_title'] = ucfirst($artist->acc_designer_nickname) . ' - Diseñador';

              // load head
              $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

              // load breadcrumb
              $data['breadcrumb_address'] = ucfirst($artist->acc_designer_nickname) . ' - Diseñador';
              $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

              // set active page form customer menu
              $data['active_page'] = 'my_galleries';

              // set box_name for title
              $data['box_title_name'] = ucfirst($artist->acc_designer_nickname);

              // load customer menu
              $data['page_menu'] = $this->load->view('modules/designer_menu', $data, TRUE);

              // load footer
              $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

              // load scripts
              $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

              // load galleries
              $data['artist'] = $artist;
              $data['galleries'] = $this->Gallery_model->get_galleries($this->session->id);
              $data['empty_galleries'] = $this->Gallery_model->get_empty_galleries($this->session->id);
              $data['galleries_count'] = $this->Gallery_model->get_galleries_count($this->session->id);
              $data['galleries_count'] = $data['galleries_count']->gal_count;

              // load the register view with all the other modules
              $this->load->view('designer/private_artist_view', $data);

            } else {
              redirect('designer/artist_enroll');
            }
          } else {
            redirect('designer/artist_enroll');
          }
        } else {
          // echo 'enviaste un artista';
          $artist = $this->Designer_model->get_artist($art_id);
          if (isset($artist)) {

            // data for the cart
            $data['cart_count'] = $this->_get_cart_data();

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = ucfirst($artist->acc_designer_nickname) . ' - Diseñador';

            // load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = ucfirst($artist->acc_designer_nickname) . ' - Diseñador';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // set active page form customer menu
            $data['active_page'] = 'galleries';

            // set box_name for title
            $data['box_title_name'] = ucfirst($artist->acc_designer_nickname);

            // load customer menu
            $data['page_menu'] = $this->load->view('modules/sidebar_menu', $data, TRUE);

            // load footer
            $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

            // load scripts
            $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

            $data['galleries'] = $this->Gallery_model->get_galleries($art_id);
            $data['galleries_count'] = $this->Gallery_model->get_galleries_count($art_id);
            $data['galleries_count'] = $data['galleries_count']->gal_count;

            // load the register view with all the other modules
            $this->load->view('designer/public_artist_view', $data);

          } else {
            redirect('404');
          }
        }
      }


      public function gallery($gal_id = false)
      {
        if ($gal_id == false) {
          // no se envió galería
          redirect('404');
        } else {

          // se envió galería

          if ($this->session->id) {
            // usuario con sesión abierta.

            $gallery = $this->Gallery_model->get_gallery($gal_id);

            if ($gallery->acc_id == $this->session->id) {

              // usuario es dueño de la galería
              $artist  = $this->Designer_model->get_artist($this->session->id);
              $designs = $this->Design_model->get_designs_by_gallery($gal_id);

                // data for the cart
                $data['cart_count'] = $this->_get_cart_data();

                // data for the navbar
                $data['navbar_name'] = $artist->acc_designer_nickname;

                // load the navbar with $data in $data['page_navbar']
                $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

                // set title
                $data['page_title'] = ucfirst($gallery->gal_name) . ' - Galería';

                // load head
                $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

                // load breadcrumb
                $data['breadcrumb_address'] = ucfirst($gallery->gal_name) . ' - Galería';
                $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

                // set active page form customer menu
                $data['active_page'] = 'my_galleries';

                // set box_name for title
                $data['box_title_name'] = ucfirst($gallery->gal_name);

                // load customer menu
                $data['page_menu'] = $this->load->view('modules/designer_menu', $data, TRUE);

                // load footer
                $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

                // load scripts
                $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

                $data['gallery'] = $gallery;
                $data['artist'] = $artist;
                $data['designs'] = $designs;
                $data['designs_count'] = $this->Design_model->get_designs_count($gal_id);
                $data['designs_count'] = $data['designs_count']->des_count;


                // load the register view with all the other modules
                $this->load->view('designer/private_gallery_view', $data);

            } else {

              // user authenticated - does not own gallery

              $gallery  = $this->Gallery_model->get_gallery($gal_id);
              $designs = $this->Design_model->get_designs_by_gallery($gal_id);
              if (isset($designs)) {

                // data for the cart
                $data['cart_count'] = $this->_get_cart_data();

                // data for the navbar
                $data['navbar_name'] = $this->session->name;

                // load the navbar with $data in $data['page_navbar']
                $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

                // set title
                $data['page_title'] = ucfirst($gallery->gal_name) . ' - Galería';

                // load head
                $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

                // load breadcrumb
                $data['breadcrumb_address'] = ucfirst($gallery->gal_name) . ' - Galería';
                $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

                // set active page form customer menu
                $data['active_page'] = '';

                // set box_name for title
                $data['box_title_name'] = ucfirst($gallery->gal_name);

                // load customer menu
                $data['page_menu'] = $this->load->view('modules/designer_menu', $data, TRUE);

                // load footer
                $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

                // load scripts
                $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

                $data['artist'] = $gallery;
                $data['designs'] = $designs;
                $data['designs_count'] = $this->Design_model->get_designs_count($gal_id);
                $data['designs_count'] = $data['designs_count']->des_count;

                // load the register view with all the other modules
                $this->load->view('designer/public_gallery_view', $data);

              }
            }

          } else {

            // user not authenticated - does not own gallery

            $gallery = $this->Gallery_model->get_gallery($gal_id);
            $designs = $this->Design_model->get_designs_by_gallery($gal_id);
            if (isset($designs)) {

              // data for the cart
              $data['cart_count'] = $this->_get_cart_data();

              // data for the navbar
              $data['navbar_name'] = $this->session->name;

              // load the navbar with $data in $data['page_navbar']
              $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

              // set title
              $data['page_title'] = ucfirst($gallery->gal_name) . ' - Galería';

              // load head
              $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

              // load breadcrumb
              $data['breadcrumb_address'] = ucfirst($gallery->gal_name) . ' - Galería';
              $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

              // set active page form customer menu
              $data['active_page'] = '';

              // set box_name for title
              $data['box_title_name'] = ucfirst($gallery->gal_name);

              // load customer menu
              $data['page_menu'] = $this->load->view('modules/designer_menu', $data, TRUE);

              // load footer
              $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

              // load scripts
              $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

              $data['artist'] = $gallery;
              $data['designs'] = $designs;
              $data['designs_count'] = $this->Design_model->get_designs_count($gal_id);
              $data['designs_count'] = $data['designs_count']->des_count;

              // load the register view with all the other modules
              $this->load->view('designer/public_gallery_view', $data);

          }
      }
    }
  }

  public function designs($acc_id = false)
  {
    if ($acc_id == false) { // no se envió id de diseñador
      if ($this->session->id) { // usuario con sesion abierta
        $artist = $this->Designer_model->get_artist($this->session->id);
        if (!isset($artist)) {
          redirect('404');
        }

        $designs = $this->Design_model->get_designs_by_designer($this->session->id);
        if (isset($designs)) {

          // data for the cart
          $data['cart_count'] = $this->_get_cart_data();

          // data for the navbar
          $data['navbar_name'] = ucwords($artist->acc_designer_nickname);

          // load the navbar with $data in $data['page_navbar']
          $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

          // set title
          $data['page_title'] = ucwords($artist->acc_designer_nickname) . ' - Diseños';

          // load head
          $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

          // load breadcrumb
          $data['breadcrumb_address'] = ucwords($artist->acc_designer_nickname) . ' - Diseños';
          $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

          // set active page form customer menu
          $data['active_page'] = 'my_designs';

          // set box_name for title
          $data['box_title_name'] = ucwords($artist->acc_designer_nickname);

          // load customer menu
          $data['page_menu'] = $this->load->view('modules/designer_menu', $data, TRUE);

          // load footer
          $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

          // load scripts
          $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

          $data['designs'] = $designs;

          // load the register view with all the other modules
          $this->load->view('designer/private_designs_view', $data);

        } else {
          redirect('404');
        }
      } else {
        redirect('404');
      }
    } else { // se envió id de diseñador

      $designs = $this->Design_model->get_designs_by_designer($acc_id);
      if (isset($designs)) {
        # code...
      } else {
        redirect('404');
      }
    }
  }

  public function create_gallery()
  {
    if ($this->session->name) {

      $artist = $this->Designer_model->get_artist($this->session->id);
      // data for the cart
      $data['cart_count'] = $this->_get_cart_data();

      // data for the navbar
      $data['navbar_name'] = ucfirst($artist->acc_designer_nickname);

      // load the navbar with $data in $data['page_navbar']
      $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

      // set title
      $data['page_title'] = ucfirst($artist->acc_designer_nickname) . ' - Galerías';

      // load head
      $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

      // load breadcrumb
      $data['breadcrumb_address'] = ucfirst($artist->acc_designer_nickname) . ' - Galerías';
      $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

      // set active page form customer menu
      $data['active_page'] = 'my_galleries';

      // load customer menu
      $data['page_menu'] = $this->load->view('modules/designer_menu', $data, TRUE);

      // load footer
      $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

      // load scripts
      $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

      // load the create view with all the other modules
      $this->load->view('designer/create_gallery_view', $data);

    } else {
      redirect('login');
    }
  }

  public function save_gallery()
  {
    if ($this->session->id){

          $saved_gallery = $this->Gallery_model->save_gallery($this->session->id, $this->input->post('gallery_name'));

          print_r($saved_gallery);
          if (isset($saved_gallery)) {
            redirect('designer');
          } else {
            redirect('404');
          }
    } else {
      redirect('404');
    }
  }

  public function delete_gallery()
  {
    if ($this->session->id){

          $deleted_gallery = $this->Gallery_model->delete_gallery($this->session->id, $this->input->post('delete_gallery'));

            print_r($this->input->post());
          if (isset($deleted_gallery)) {
            redirect('designer');
          } else {
            //redirect('404');
          }
    } else {
      redirect('404');
    }
  }

  public function update_nickname()
  {
    if ($this->session->id){

        $updated_nickname   = $this->Designer_model->update_nickname($this->session->id, $this->input->post('update_nickname'));

          if (isset($updated_nickname)) {
            redirect('designer');
          } else {
            redirect('404');
          }
    } else {
      redirect('404');
    }
  }

  public function update_gallery()
  {
    if ($this->session->id){

        $updated_gallery = $this->Gallery_model->update_gallery($this->session->id, $this->input->post('gallery_id'), $this->input->post('gallery_name'));

          if (isset($updated_gallery)) {
            redirect('designer/gallery/'.$this->input->post('gallery_id'));
          } else {
            redirect('404');
          }
    } else {
      redirect('404');
    }
  }

  public function add_design()
  {
    if ($this->session->id){

      $gallery = $this->Gallery_model->get_gallery($this->input->post('gallery'));

      if ($gallery->acc_id == $this->session->id){

        $artist = $this->Designer_model->get_artist($this->session->id);
        // data for the cart
        $data['cart_count'] = $this->_get_cart_data();

        // data for the navbar
        $data['navbar_name'] = ucfirst($artist->acc_designer_nickname);

        // load the navbar with $data in $data['page_navbar']
        $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

        // set title
        $data['page_title'] = ucfirst($artist->acc_designer_nickname) . ' - Diseños';

        // load head
        $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

        // load breadcrumb
        $data['breadcrumb_address'] = ucfirst($artist->acc_designer_nickname) . ' - Diseños';
        $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

        // set active page form customer menu
        $data['active_page'] = 'my_designs';

        // load customer menu
        $data['page_menu'] = $this->load->view('modules/designer_menu', $data, TRUE);

        // load footer
        $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

        // load scripts
        $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

        $data['errors'] = $this->session->errors;
        $data['gallery'] = $gallery;

        unset($this->session->errors);
        // load the create view with all the other modules
        $this->load->view('designer/add_design_view', $data);

      } else {
        redirect('404');
      }


    } else {
      redirect('404');
    }
  }

  public function delete_design()
  {
    if ($this->session->id) {

      $gal_id = $this->input->post('gallery');
      $del_id = $this->input->post('delete_design');


      $design = $this->Design_model->get_design($del_id);

      if (isset($design)) {
        if ($this->session->id == $design->acc_id) {
          print_r($this->input->post());
          $design = $this->Design_model->delete_design($del_id);

          if (isset($design)) {
            redirect('designer/gallery/'.$gal_id);
          }
        } else {
          echo 'acá llegué';
          //redirect('404');
        }
      }
    } else {
      redirect('login');
    }
  }

  public function save_design()
  {

    if ($this->session->id) {

      $gallery = $this->Gallery_model->get_gallery($this->input->post('gallery_id'));

      if ($gallery->acc_id == $this->session->id){
        $this->db->trans_begin();

        $insert_id = $this->Design_model->insert_design($gallery->gal_id, $this->input->post('design_name'), $this->input->post('design_color'));

        if (!isset($insert_id)){
            redirect('404');
        } else {

          $config['upload_path']          = './uploads';
          $config['allowed_types']        = 'png';
          $config['max_size']             = 2048;
          $config['min_width']            = 100;
          $config['min_height']           = 100;
          $config['file_name']            = $insert_id.'_full.png';

          $this->load->library('upload', $config);

          if ( ! $this->upload->do_upload('userfile'))
          {
            $error = array('error' => $this->upload->display_errors());
            $this->db->trans_rollback();
            $this->session->errors = $error;
            redirect('designer/add_design');
          }
          else
          {
            $data = array('upload_data' => $this->upload->data());
            $this->create_thumbnails($insert_id);
            $this->db->trans_commit();
            redirect('designer');
            $this->load->view('designer/upload_success', $data);
          }
        }
      } else {
        redirect('404');
      }
    } else {
      redirect('404');
    }
  }

  public function create_thumbnails($id)
  {
    $colors = (object) array(
      (object) array('color' => 'black'),
      (object) array('color' => 'white'),
      (object) array('color' => 'gray'),
      (object) array('color' => 'red'),
      (object) array('color' => 'yellow')
    );

    $this->create_front_alpha($id);

    foreach ($colors as $color) {

      $this->create_front_thumbnail($id, 'male', $color->color);
      $this->create_front_thumbnail($id, 'female', $color->color);
      $this->create_full_thumbnail($id, $color->color);
    }
  }

  public function create_front_alpha($id)
  {
    $png = imagecreatefrompng('uploads/'.$id.'_full.png');
    $out = imagecreatetruecolor(198, 198);

    imagealphablending($out, false);
    imagesavealpha($out, true);

    imagecopyresampled(
    $out,
    $png,
    0, 0, 0, 0,
    198, 198, /* tamaño nueva imagen */
    630, /* ancho que quieres */
    630 /* alto que quieres */
    );

    imagepng($out, 'uploads/'.$id.'_front.png');
  }

  public function create_front_thumbnail($id, $gender, $color)
  {

    $png  = imagecreatefrompng('uploads/'.$id.'_front.png');
    $jpeg = imagecreatefromjpeg('assets/img/cloth/tshirt_'.$gender.'_'.$color.'_front.jpg');

    // list($newwidth, $newheight) = getimagesize('assets/img/cloth/tshirt_'.$color.'_full.jpg');
    // list($width, $height) = getimagesize('uploads/'.$id.'_front.png');

    $out = imagecreatetruecolor(630, 630);
    imagecopyresampled($out, $jpeg, 0, 0, 0, 0, 630, 630, 630, 630);
    imagecopyresampled($out, $png,  216, 160, 0, 0, 198, 198, 198, 198);

    imagejpeg($out, 'uploads/'.$id.'_tshirt_front_'.$gender.'_'.$color.'.jpg', 100);

  }

  public function create_full_thumbnail($id, $color)
  {

    $png  = imagecreatefrompng('uploads/'.$id.'_full.png');
    $jpeg = imagecreatefromjpeg('assets/img/cloth/tshirt_'.$color.'_full.jpg');

    // list($newwidth, $newheight) = getimagesize('assets/img/cloth/tshirt_'.$color.'_full.jpg');
    // list($width, $height) = getimagesize('uploads/'.$id.'_front.png');

    $out = imagecreatetruecolor(630, 630);
    imagecopyresampled($out, $jpeg, 0, 0, 0, 0, 630, 630, 630, 630);
    imagecopyresampled($out, $png,  0, 0, 0, 0, 630, 630, 630, 630);

    imagejpeg($out, 'uploads/'.$id.'_tshirt_full_'.$color.'.jpg', 100);

  }

}
