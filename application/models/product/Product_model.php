<?php
class Product_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public function get_product($id)
        {

        }

        public function get_products($id)
        {

        }

        public function get_products_by_designer($designer_id)
        {

        }

        public function get_products_by_gallery($designer_id)
        {

        }

        public function get_galleries($acc_id)
        {
          // returns the galleries from an active user

          $query = $this->db->query("
          select
          gal_id,
          acc_id,
          gal_name,
          gal_date
          from gallery
          where acc_id = $acc_id;
          ");

          if ($query->num_rows() > 0)
          {
            return $query->result();
          }else {
            return null;
          }
        }

        public function get_gallery($acc_id, $gal_id)
        {
          // returns the galleries from an active user

          $query = $this->db->query("
          select
          gal_id,
          acc_id,
          gal_name,
          gal_date
          from gallery
          where acc_id = $acc_id and gal_id = $gal_id;
          ");

          if ($query->num_rows() > 0)
          {
            return $query->row();
          }else {
            return null;
          }
        }

        public function get_designs($acc_id, $gal_id, $offset)
        {
          // returns all the designs for a given gallery

          // check if the user owns the gallery

          $gallery_check = $this->get_gallery($acc_id, $gal_id);
          if(isset($gallery_check))
          {

            $query = $this->db->query("
            select
            des_id,
            gal_id,
            des_name,
            des_date
            from design where gal_id = $gal_id
            limit 6 offset $offset;
            ");

            if($query->num_rows() > 0){
              return $query->result();
            } else{
              return null;
            }
          }

        }

        public function get_designs_count($acc_id, $gal_id)
        {
          // returns the design count of a gallery

          // check if the user owns the gallery

          $gallery_check = $this->get_gallery($acc_id, $gal_id);

          if(isset($gallery_check))
          {

            $query = $this->db->query("
            select count(*) as des_count
            from design where gal_id = $gal_id;
            ");

            if($query->num_rows() > 0){
              return $query->row();
            } else{
              return null;
            }
          }

        }

}

?>
