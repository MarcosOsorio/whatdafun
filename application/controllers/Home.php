<?php
class Home extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
          $this->load->library('directories');
        }

        public function index()
        {

                // data for the navbar
                $data['navbar_name'] = $this->session->name;
                // load the navbar with $data in $data['page_navbar']
                $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

                // set title
                $data['page_title'] = 'WhatDaFun! - ¡Tu Moda Friki!';

                //load head

                $data['page_assets'] = $this->directories->_get_head_basepath();
                $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

                //load footer
                $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

                //load scripts
                $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

                // load the home view with all the other modules
                $this->load->view('home/home_view', $data);

        }

}
