<?php
class Product_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('account/Account_model');
                $this->load->model('product/Design_model');
                $this->load->model('product/Gallery_model');
        }

        public function get_cart($acc_id)
        {
          $query = $this->db->query("
          select
          pur_id,
          acc_id,
          pur_date,
          pur_shipping_price,
          pur_status
          from purchase
          where acc_id = $acc_id
          and pur_status = 0;
          ");

          if ($query->num_rows() > 0){
            return $query->row();
          } else {
            return null;
          }
        }

        public function get_cart_items($acc_id)
        {
          // returns the items in an account's cart
          $cart = $this->get_cart($acc_id);

          if (isset($cart)){
            $pur_id = $cart->pur_id;
            $query = $this->db->query("
            select
            product.pro_id,
            product.des_id,
            product.pur_id,
            product.col_id,
            product.pro_name,
            product.pro_price,
            product.pro_quantity,
            product.pro_gender,
            product.pro_size,
            color.col_name,
            design.des_id
            from product
            inner join color
            inner join design
            on color.col_id = product.col_id
            and product.des_id = design.des_id
            and pur_id = $pur_id;
            ");

            if ($query->num_rows() > 0){
              return $query->result();
            } else {
              return null;
            }
          } else {
            return null;
          }
        }

        public function get_cart_info($acc_id)
        {
          // returns the cart info (subtotal, shipping, total, etc)
          $purchase = $this->get_cart($acc_id);

          if (isset($purchase)){
            $query = $this->db->query("
            select
            purchase.pur_id,
            purchase.pur_date,
            purchase.pur_shipping_price,
            sum(product.pro_price) as pur_subtotal,
            sum(product.pro_price) + purchase.pur_shipping_price as pur_total
            from purchase
            inner join product
            on product.pur_id = purchase.pur_id
            and purchase.pur_id = $purchase->pur_id;
            ");

            if ($query->num_rows() > 0 ){
              return $query->row();
            } else {
              return null;
            }
          } else {
            return null;
          }
        }

        public function get_cart_items_count($acc_id)
        {
          // returns the quantity of items in an account's cart
          $cart = $this->get_cart($acc_id);

          if (isset($cart)){
            $pur_id = $cart->pur_id;

            $query = $this->db->query("
            select count(*) as car_count
            from product
            where pur_id = $pur_id;
            ");

            if ($query->num_rows() > 0){
              return $query->row();
            } else {
              return null;
            }
          } else {

            return null;
          }
        }

        public function remove_item($pur_id, $pro_id)
        {
          // removes an item from the cart
          $query = $this->db->query("
          delete
          from product
          where pro_id = $pro_id
          and pur_id = $pur_id;
          ");

          if ($this->db->affected_rows() > 0){
            return $this->db->affected_rows();
          } else {
            return null;
          }
        }

        public function new_cart($acc_id)
        {
          $cart = $this->get_cart($acc_id);
          if (!isset($cart)) {
            $query = $this->db->query("
            insert into purchase(
              pur_id, acc_id, pur_date, pur_status, pur_shipping_price
              )
              values(
                null, $acc_id, null, 0, 2500
              );
            ");

            $cart = $this->db->insert_id();

            if ($cart > 0) {
              return $cart;
            } else {
              return null;
            }
          } else {
            return null;
          }
        }

        public function load_cart($acc_id)
        {
          $cart = $this->get_cart($acc_id);
          if (isset($cart)) {
            return $cart;
          } else {
            $cart = $this->new_cart($acc_id);
            if (isset($cart)) {
              return $cart;
            } else {
              return null;
            }
          }
        }

        public function add_to_cart($acc_id, $product)
        {
          $cart = $this->load_cart($acc_id);
          if (isset($cart)) {

            $cart = $this->get_cart($acc_id);

            $des_id = $product['des_id'];
            $pur_id = $cart->pur_id;
            $col_id = $product['col_id'];
            $pro_name = $product['pro_name'];
            $pro_price = $product['pro_price'];
            $pro_quantity = $product['pro_quantity'];

            if (strcmp($product['pro_gender'], 'male' == 0)){
              $pro_gender = 1;
            } elseif (strcmp($product['pro_gender'], 'male' != 1)) {
              $pro_gender = 2;
            }

            $pro_size = $product['pro_size'];

            $query = $this->db->query("
            insert into product
            (pro_id, des_id, pur_id,  col_id,  pro_name,  pro_price,  pro_quantity,  pro_gender,  pro_size)
            values
            (null,  $des_id, $pur_id, $col_id, '$pro_name', $pro_price, $pro_quantity, $pro_gender, '$pro_size' );
            ");

            $pro_id = $this->db->insert_id();

            if ($pro_id > 0) {
              return $pro_id;
            } else {
              return null;
            }


          } else {
            return null;
          }
          /*
          print_r($product)
          $des_id = $product['id'];
          $query = $this->db->query("
          insert
          into product(
            pro_id,
            des_id,
            pur_id,
            col_id,
            pro_name,
            pro_price,
            pro_gender,
            pro_size
            )
            values(
              null,
              $des_id,
              $

              )

          "); */
        }
}

?>
