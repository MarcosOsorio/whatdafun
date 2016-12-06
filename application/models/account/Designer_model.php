<?php
// http://jeremykendall.net/2014/01/04/php-password-hashing-a-dead-simple-implementation/
// hash implementing
class Designer_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public function get_artist($acc_id)
        {
          // returns a row if the user is an artist
          $query = $this->db->query("
          select
          acc_id,
          acc_designer_nickname,
          acc_register_date
          from account
          where acc_id = $acc_id
          and acc_designer_nickname is not null;
          ");

          if ($query->num_rows() > 0){
            return $query->row();
          } else {
            return null;
          }
        }

        public function update_nickname($acc_id, $nickname)
        {
          $query = $this->db->query("
          update
          account
          set acc_designer_nickname = '$nickname'
          where acc_id = $acc_id;
          ");

          if ($this->db->affected_rows() > 0){
            return $this->db->affected_rows();
          } else {
            return null;
          }
        }

}
?>
