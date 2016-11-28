<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
          $this->load->model('account/Account_model');
        }

        public function index()
        {

                // data for the navbar
                $data['navbar_name'] = $this->session->name;

                // load the navbar with $data in $data['page_navbar']
                $data['page_navbar'] = $this->load->view('modules/navbar', $data, TRUE);

                // set title
                $data['page_title'] = 'WhatDaFun! - Login';

                //load head
                $data['page_head'] = $this->load->view('modules/head', $data, TRUE);

                // load breadcrumb
                $data['breadcrumb_address'] = 'Login';
                $data['page_breadcrumb'] = $this->load->view('modules/breadcrumb', $data, TRUE);

                //load footer
                $data['page_footer'] = $this->load->view('modules/footer', NULL, TRUE);

                //load scripts
                $data['page_scripts'] = $this->load->view('modules/scripts', $data, TRUE);

                // load the register view with all the other modules
                $this->load->view('login/login_view', $data);

        }

        public function verify_login()
        {
          $this->load->helper(array('form', 'url'));
          $this->load->library('form_validation');

          if ($this->form_validation->run('login') == FALSE)
          {
            $this->index();

          } elseif ($this->Account_model->get_account_email_password_exists($this->input->post('email'), $this->input->post('password')))
          {
            // fetch session data from the database
            $this->_load_session_data($this->input->post('email'), $this->input->post('password'),$this->session);

            //print_r($this->session->all_userdata());

            // account is authenticated with database and session is ready
            redirect('home');
          }
        }

        // check if the email is registered in database
        public function _email_check($str)
        {
          if (!$str) {
              return TRUE;
          } elseif ($this->Account_model->get_account_email_exists($str)) {
              return TRUE;
          } else {
              return FALSE;
          }


        }

        // check if the password matches the sent mail
        public function _password_check($str)
        {
          if (!$str) {
              return TRUE;
          } elseif ($this->Account_model->get_account_email_password_exists($this->input->post('email'), $this->input->post('password'))) {
              return TRUE;
          } else {
              return FALSE;
          }
        }

        // load the session data against the database
        public function _load_session_data($email, $password,&$session)
        {
            $record = $this->Account_model->get_account_session_data($email, $password);
            $session->id = $record->acc_id;
            $session->name = $record->acc_first_name;
            $session->email = $record->acc_email;
        }

}
