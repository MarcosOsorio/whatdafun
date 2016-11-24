<?php
class Product extends CI_Controller {

        public function index()
        {
                // load the account model to query for the user
                $this->load->model('product/Product_model');

                // set title
                $data['page_title'] = 'WhatDaFun! - Productos';

                //load head
                $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

                // data for the navbar
                $data['navbar_name'] = $this->Account_model->get_account_first_name(1);
                $data['navbar_mail'] = $this->Account_model->get_account_mail(1);

                // load the navbar with $data in $data['page_navbar']
                $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

                // load breadcrumb
                $data['breadcrumb_address'] = 'Registro';
                $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

                //load footer
                $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

                //load scripts
                $data['page_scripts'] = $this->load->view('modules/scripts', NULL, TRUE);

                // load the register view with all the other modules
                $this->load->view('register/register_view', $data);

        }
}
