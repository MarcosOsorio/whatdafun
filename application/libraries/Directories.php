<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Directories {

        public function _get_head_basepath()
        {
          /*
          if ($_SERVER['HTTP_HOST']== 'freakmediadesigncom.ipage.com'){
            return '../assets/';
          } else {
            return '../assets/';
          }
          */
          return '../assets/';
        }
}
