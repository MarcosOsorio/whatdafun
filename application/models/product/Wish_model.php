<?php
class Wish_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('account/Account_model');
                $this->load->model('product/Product_model');
                $this->load->model('product/Gallery_model');
        }

        public function get_wish_exists($acc_id, $des_id)
        {
          // returns a wish in a wishlist only if is registered

          $query = $this->db->query("
          select
          wis_id
          from wish
          where acc_id = $acc_id
          and des_id = $des_id;
          ");

          if ($query->num_rows() > 0) {
            return $query->row();
          } else {
            return null;
          }
        }

        public function get_wishlist($acc_id)
        {
          // returns the wishlist for an user given its id

          $query =$this->db->query("
          select
          wish.wis_id,
          wish.des_id,
          wish.acc_id,
          wish.wis_date,
          design.des_id,
          design.des_name,
          design.col_id,
          color.col_name
          from wish
          inner join design
          inner join color
          on wish.des_id = design.des_id
          and design.col_id = color.col_id
          and wish.acc_id = $acc_id;
          ");

          if ($query->num_rows() > 0) {
            return $query->result();
          } else {
            return null;
          }
        }

        public function add_to_wishlist($acc_id, $des_id)
        {
          // insert a new wish for a given account

          $wish = $this->get_wish_exists($acc_id, $des_id);
          if (!isset($wish)) {
            $query = $this->db->query("
            insert into
            wish (
              wis_id,
              acc_id,
              des_id,
              wis_date
              )
            values(
              null,
              $acc_id,
              $des_id,
              null
            );
            ");

            $wis_id = $this->db->insert_id();

            if ($wis_id > 0) {
              return $wis_id;
            } else {
              return null;
            }
          } else {
            return null;
          }
        }

        public function remove_from_wishlist($acc_id, $wis_id)
        {
          // removes the specified wish form an account wishlist
          $query = $this->db->query("
          delete
          from wish
          where wis_id = $wis_id
          and acc_id = $acc_id;
          ");

          $wish = $this->db->affected_rows();
          if ($wish > 0) {
            return $wish;
          } else {
            return null;
          }
        }
}

?>
