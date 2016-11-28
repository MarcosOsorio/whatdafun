<?php
class Product extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
          $this->load->model('account/Account_model');
          $this->load->model('product/Product_model');
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

        public function detail($pro_id = false, $thumb_type = 'tshirt', $thumb_size = 'front', $thumb_gender = 'male', $thumb_color = 'white')
        {
          // gets the id of the product to display
          if (!$pro_id == false and $this->session->name){

            // data for the navbar
            $data['navbar_name'] = $this->session->name;

            // load the navbar with $data in $data['page_navbar']
            $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

            // set title
            $data['page_title'] = 'Tres Corazones - Cerati';

            //load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load product id
            $data['product_id'] = $pro_id;

            // load breadcrumb
            $data['breadcrumb_address'] = 'Tres Corazones';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

            // set size for thumbnails
            $data['thumb_size'] = $thumb_size;

            // set the default gender for the thumbnails
            $data['thumb_gender'] = $thumb_gender;

            // set the thumbnail type (tshirt, tanktop, etc.)
            $data['thumb_type'] = $thumb_type;

            // set colours array for thumbnails array
            $colours = (object) array(
              (object) array('colour' => 'white'),
              (object) array('colour' => 'black'),
              (object) array('colour' => 'gray'),
              (object) array('colour' => 'red')
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
                                'file' => 'assets/img/item/'. $pro_id.'/'.$pro_id.'_'.$thumb_type.'_'.$thumb_size.'_'.$colour->colour.'.jpg',
                                'selected' => 1
                                );

                                $data['thumb_colour'] = $item;

                            } else {
                              $item = (object) array(
                                'colour' => $colour->colour,
                                'file' => 'assets/img/item/'. $pro_id.'/'.$pro_id.'_'.$thumb_type.'_'.$thumb_size.'_'.$colour->colour.'.jpg',
                                'selected' => 0
                                );
                            }
                      break;
                    case 'front':
                            if ($colour->colour == $thumb_color){
                              $item = (object) array(
                                'colour' => $colour->colour,
                                'file' => 'assets/img/item/'. $pro_id.'/'.$pro_id.'_'.$thumb_type.'_'.$thumb_size.'_'.$thumb_gender.'_'.$colour->colour.'.jpg',
                                'selected' => 1
                                );

                                $data['thumb_colour'] = $item;

                            } else {
                              $item = (object) array(
                                'colour' => $colour->colour,
                                'file' => 'assets/img/item/'. $pro_id.'/'.$pro_id.'_'.$thumb_type.'_'.$thumb_size.'_'.$thumb_gender.'_'.$colour->colour.'.jpg',
                                'selected' => 0
                                );
                            }
                      break;

                    default:
                      # code...
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
}
