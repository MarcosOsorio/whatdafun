<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Designer extends CI_Controller {

      public function __construct()
      {
        parent::__construct();
        $this->load->model('account/Account_model');
        $this->load->model('product/Product_model');
        $this->load->model('address/Address_model');
      }

      public function index()
      {
        $this->gallery();
      }
      public function gallery($gallery = false, $offset = false)
      {
        // shows the galleries made by the designer.
        // it's also a home for designer view

        if($this->session->name){

          // data for the navbar
          $data['navbar_name'] = $this->session->name;

          // load the navbar with $data in $data['page_navbar']
          $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

          //load footer
          $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

          //load scripts
          $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);


          // page specific content

          if ($gallery == false){
            $data['galleries'] = $this->Product_model->get_galleries($this->session->id);

            // set title
            $data['page_title'] = $this->session->name . ' - Diseñador';

            //load head
            $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

            // load breadcrumb
            $data['breadcrumb_address'] = $this->session->name . ' - Galerías';
            $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);
            // load the register view with all the other modules
            $this->load->view('designer/galleries_view', $data);


          } else{
            $data['gallery'] = $this->Product_model->get_gallery($this->session->id, $gallery);
            if (isset($data['gallery'])){

              // set title
              $data['page_title'] = $this->session->name . ' - ' . $data['gallery']->gal_name;

              //load head
              $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

              // load breadcrumb
              $data['breadcrumb_address'] = $this->session->name . ' - ' . $data['gallery']->gal_name;
              $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

              // designs count for the page navigator
              $data['designs_count'] = $this->Product_model->get_designs_count($this->session->id, $data['gallery']->gal_id);

              if ($offset == 0){

                // previous page set to null to disable backwards navigating
                $data['previous_page'] = null;
                $data['next_page']     = 6;

                // load designs limited by offset in url
                $data['designs'] = $this->Product_model->get_designs($this->session->id, $data['gallery']->gal_id,0);

              } else{

                $data['previous_page'] = $offset - 6;
                $data['next_page']     = $offset + 6;

                // load designs limited by offset in url
                $data['designs'] = $this->Product_model->get_designs($this->session->id, $data['gallery']->gal_id,$offset);
              }

              // load gallery detail
              $this->load->view('designer/gallery_detail_view', $data);
            } else{
              // gallery isn't owned by designer, therefore we redirect
              redirect('designer');
            }

          }
        } else
        {
          // account is not authenticated. Therefore is redirected to Login
          redirect('login');
        }
      }

      public function designs()
      {
        if($this->session->name){

        }

      }

      public function products()
      {

      }

}
