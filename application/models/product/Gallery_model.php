<?php
class Gallery_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('account/Account_model');
                $this->load->model('product/Design_model');
                $this->load->model('product/Product_model');
        }

        public function get_galleries_count($acc_id)
        {
          $query = $this->db->query("
          select
          count(*) as gal_count
          from gallery
          where acc_id = $acc_id
          ");

          if ($query->num_rows() > 0)
          {
            return $query->row();
          }else {
            return null;
          }
        }

        public function get_galleries($acc_id)
        {
          // returns the galleries from an active user

          $query = $this->db->query("
          select
          design.des_id,
          design.des_name,
          design.des_date,
          gallery.gal_id,
          gallery.gal_name,
          gallery.gal_date,
          gallery.acc_id,
          color.col_name
          from design
          inner join gallery
          inner join color
          on design.gal_id = gallery.gal_id
          and design.col_id = color.col_id
          and design.des_date in
          (select max(des_date)
          from design
          where gal_id in (select gal_id from gallery where acc_id = $acc_id) group by gal_id);
          ");

          if ($query->num_rows() > 0)
          {
            return $query->result();
          }else {
            return null;
          }
        }

        public function get_empty_galleries($acc_id)
        {
          // returns all the galleries with no designs on it
          $query = $this->db->query("
          select
          gal_id,
          gal_name
          from gallery
          where gal_id not in
          (select
           gallery.gal_id
           from gallery
           inner join design
           inner join color
           on gallery.acc_id = $acc_id
           and color.col_id = design.col_id
           and design.des_date = (
               select max(des_date)
               from design
               where gal_id = gallery.gal_id
           	)
          )
          and acc_id = $acc_id;
          ");

          if ($query->num_rows() > 0)
          {
            return $query->result();
          }else {
            return null;
          }
        }

        public function get_gallery($gal_id)
        {
          // returns a gallery given it's id

          $query = $this->db->query("
          select
          gallery.gal_id,
          gallery.gal_name,
          gallery.gal_date,
          account.acc_id,
          account.acc_designer_nickname
          from gallery
          inner join account
          on account.acc_id = gallery.acc_id
          and gal_id = $gal_id;
          ");

          if ($query->num_rows() > 0)
          {

            return $query->row();
          }else {
            return null;
          }
        }

        public function is_gallery_owner($acc_id, $gal_id)
        {
          $query = $this->db->query("
          select
          gal_id,
          acc_id
          from gallery
          where acc_id = $acc_id
          and gal_id = $gal_id;
          ");

          if ($query->num_rows() > 0) {
            return $query->row();
          } else {
            return null;
          }
        }
        public function get_gallery_id($acc_id, $gal_name)
        {
          // returns the id of the given gallery for checking if exists

          $query = $this->db->query("
          select
          gal_id
          from gallery
          where acc_id = $acc_id and gal_name = '$gal_name';
          ");

          if ($query->num_rows() > 0)
          {
            return $query->row();
          }else {
            return null;
          }
        }

        public function save_gallery($acc_id, $gal_name)
        {
          // inserts a new gallery for the current designer

          $query = $this->db->query("
          insert
          into gallery
          (gal_id, acc_id, gal_name, gal_date)
          values
          (null, $acc_id, '$gal_name', null);
          ");

          $gal_id = $this->db->insert_id();

          if ($gal_id > 0) {
            return $gal_id;
          } else {
            return null;
          }
        }

        public function delete_gallery($acc_id, $gal_id)
        {

          $gallery = $this->get_gallery($gal_id);
          if (isset($gallery)) {

            $query = $this->db->query("
            delete
            from gallery
            where gal_id = $gal_id;
            ");
            if ($this->db->affected_rows() > 0) {
              return $this->db->affected_rows();
            } else {
              return null;
            }
          } else {
            return null;
          }
        }

        public function update_gallery($acc_id, $gal_id, $gal_name)
        {

          $gallery = $this->get_gallery($gal_id);
          if (isset($gallery)) {

            $query = $this->db->query("
            update
            gallery
            set gal_name = '$gal_name'
            where gal_id = $gal_id
            and acc_id = $acc_id;
            ");
            if ($this->db->affected_rows() > 0) {
              return $this->db->affected_rows();
            } else {
              return null;
            }
          } else {
            return null;
          }
        }
}

?>
