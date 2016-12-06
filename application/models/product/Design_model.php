<?php
class Design_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('account/Account_model');
                $this->load->model('product/Product_model');
                $this->load->model('product/Gallery_model');
        }

        public function get_top_basket(/* diseños más gustados*/)
        {
          $query = $this->db->query("
          select
          design.des_id,
          design.des_discount_percentage,
          design.des_price,
          design.des_name,
          count(product.pro_id) as pro_quantity,
          gallery.gal_id,
          gallery.gal_name,
          color.col_name
          from product
          inner join design
          inner join gallery
          inner join color
          on product.des_id = design.des_id
          and design.gal_id = gallery.gal_id
          and design.col_id = color.col_id
          group by design.des_id
          order by pro_quantity desc
          limit 10;
          ");

          if($query->num_rows() > 0){
            return $query->result();
          } else{
            return null;
          }
        }

        public function get_top_purchased(/* diseños más comprados*/)
        {
          $query = $this->db->query("
          select
          design.des_id,
          design.des_name,
          design.des_discount_percentage,
          design.des_price,
          count(product.pro_id) as pro_quantity,
          gallery.gal_id,
          gallery.gal_name,
          color.col_name
          from product
          inner join design
          inner join gallery
          inner join color
          inner join purchase
          on product.des_id = design.des_id
          and design.gal_id = gallery.gal_id
          and design.col_id = color.col_id
          and product.pur_id = purchase.pur_id
          and purchase.pur_status = 1
          group by design.des_id
          order by pro_quantity desc
          limit 10;
          ");

          if($query->num_rows() > 0){
            return $query->result();
          } else{
            return null;
          }
        }

        public function get_design_info($des_id)
        {
          $query = $this->db->query("
          select
          design.des_id,
          design.des_name,
          design.des_date,
          design.des_price,
          design.gal_id,
          design.des_discount_percentage,
          design.des_approved,
          gallery.gal_name,
          gallery.gal_id,
          account.acc_designer_nickname,
          account.acc_id
          from design
          inner join gallery
          inner join account
          on design.gal_id = gallery.gal_id
          and gallery.acc_id = account.acc_id
          and des_id = $des_id;
          ");

          if ($query->num_rows() > 0)
          {
            return $query->row();
          }else {
            return null;
          }
        }

        public function get_designs_by_gallery($gal_id)
        {
          // returns the designs for a given gallery id

          $query = $this->db->query("
          select
          design.des_id,
          design.gal_id,
          design.des_name,
          design.des_date,
          design.des_price,
          design.des_discount_percentage,
          design.des_approved,
          gallery.gal_name,
          account.acc_designer_nickname,
          color.col_name
          from design
          inner join gallery
          inner join account
          inner join color
          on gallery.gal_id = design.gal_id
          and gallery.acc_id = account.acc_id
          and design.col_id = color.col_id
          and gallery.gal_id = $gal_id
          order by des_date desc;
          ");

          if($query->num_rows() > 0){
            return $query->result();
          } else{
            return null;
          }

        }

        public function get_designs_by_designer($acc_id)
        {
          // returns the designs for a given gallery id

          $query = $this->db->query("
          select
          design.des_id,
          design.gal_id,
          design.des_name,
          design.des_date,
          design.des_price,
          design.des_discount_percentage,
          design.des_approved,
          gallery.gal_name,
          account.acc_designer_nickname,
          color.col_name
          from design
          inner join gallery
          inner join account
          inner join color
          on gallery.gal_id = design.gal_id
          and gallery.acc_id = account.acc_id
          and design.col_id = color.col_id
          and account.acc_id = $acc_id
          and account.acc_designer_nickname is not null
          order by des_date desc;
          ");

          if($query->num_rows() > 0){
            return $query->result();
          } else{
            return null;
          }

        }

        public function get_design($des_id)
        {
          // returns the information of a design

          $query = $this->db->query("
          select
          design.des_id,
          design.des_name,
          design.des_price,
          design.des_discount_percentage,
          design.des_approved,
          gallery.gal_id,
          gallery.gal_name,
          gallery.acc_id
          from design
          inner join gallery
          on design.gal_id = gallery.gal_id
          and des_id = $des_id;
          ");

          if ($query->num_rows() > 0){
            return $query->row();
          } else {
            return null;
          }
        }

        public function get_designs_count($gal_id)
        {
          // returns the design count of a gallery

          $query = $this->db->query("
          select count(des_id) as des_count
          from design where gal_id = $gal_id;
          ");

          if($query->num_rows() > 0){
            return $query->row();
          } else{
            return null;
          }
        }

        public function insert_design($gal_id, $des_name, $des_color)
        {
          // inserts a new design with the given name in the selected gallery

          $query = $this->db->query("
          insert into
          design
          (des_id, gal_id, col_id, des_name, des_date, des_price, des_discount_percentage, des_approved )
          values
          (null, $gal_id, $des_color, '$des_name', null, 12000, 0, 0);
          ");

          $insert_id = $this->db->insert_id();

          if ($insert_id > 0) {
            return $insert_id;
          } else {
            return null;
          }
        }

        public function delete_design($des_id)
        {
          // deletes a design given an id only if the user owns it

          $query = $this->db->query("
          delete
          from design
          where des_id = $des_id;
          ");

          if ($this->db->affected_rows() > 0) {
            return $this->db->affected_rows();
          } else {
            return null;
          }
        }
}

?>
