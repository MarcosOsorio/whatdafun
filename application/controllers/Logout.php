<?php
class Logout extends CI_Controller {

        public function index()
        {
                $this->session->unset_userdata('name');
                $this->session->unset_userdata('id');
                $this->session->unset_userdata('email');
                $this->session->sess_destroy();
                redirect('login');

        }
}
