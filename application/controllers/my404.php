<?php defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
        }

        public function index()
        {
          // data for the navbar
          $data['navbar_name'] = $this->session->name;

          // load the navbar with $data in $data['page_navbar']
          $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

          // set title
          $data['page_title'] = '¡Ops! - No Encontrado';

          //load head
          $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

          // load breadcrumb
          $data['breadcrumb_address'] = 'No Encontrado';
          $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

          //load footer
          $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

          //load scripts
          $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

          // load the register view with all the other modules
          $this->output->set_status_header('404');
          $this->load->view('my404/my404_view', $data);
        }
}
