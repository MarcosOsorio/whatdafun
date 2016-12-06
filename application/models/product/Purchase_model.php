<?php
class Purchase_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('account/Account_model');
                $this->load->model('address/Address_model');
                $this->load->model('product/Design_model');
                $this->load->model('product/Gallery_model');
                $this->load->model('product/Product_model');
        }

        public function place_order($acc_id, $car_id)
        {
          // inserts a new shipment and marks the purchase as paid.
          // gets the user's cart for mark as completed purchase
          $cart = $this->Product_model->get_cart($acc_id);
          // get the active address of the user
          $address = $this->Address_model->get_active_address($acc_id);

          if (isset($cart) and isset($address)){

            if (strcmp($address->add_block,'' == 0)){
              $address->add_block = 'null';
            }
            $this->db->trans_start();

            $query = $this->db->query("
            insert into shipment(
              shi_id,
              shi_tracking,
              pur_id,
              car_id,
              com_id,
              shi_status,
              shi_address,
              shi_name,
              shi_surname,
              shi_number,
              shi_block,
              shi_phone,
              shi_email
              )
            values(
              null,
              null,
              $cart->pur_id,
              $car_id,
              $address->com_id,
              0,
              '$address->add_address',
              '$address->add_name',
              '$address->add_surname',
              $address->add_number,
              $address->add_block,
              $address->add_phone,
              '$address->add_email'
            );
            ");

            $query = $this->db->query("
            update purchase
            set pur_status = 1
            where acc_id = $cart->acc_id
            and pur_id = $cart->pur_id;
            ");

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
              return null;
            }else {
              return $this->db->trans_status();
            }

          } else {
            return null;
          }
        }

        public function get_purchase($pur_id)
        {
          // returns the given purchase if it is completed (not cart state)


          $query = $this->db->query("
          select
              purchase.pur_id,
              purchase.pur_date,
              account.acc_id,
              account.acc_email,
              shipment.shi_tracking,
              carrier.car_name,
              carrier.car_id,
              shipment.shi_id,
              shipment.shi_address,
              shipment.shi_name,
              shipment.shi_surname,
              shipment.shi_number,
              shipment.shi_phone,
              shipment.shi_email,
              commune.com_name,
              region.reg_name,
              case shipment.shi_status
                   when 0 then 'en preparación'
                   when 1 then 'enviado'
                end as pur_status,
                case shipment.shi_status
                   when 0 then 'label-warning'
                   when 1 then 'label-success'
                end as pur_label_class,
              purchase.pur_shipping_price,
              sum(product.pro_price) as pur_subtotal,
              sum(product.pro_price) + purchase.pur_shipping_price as pur_total
              from product
              inner join purchase
              inner join account
              inner join shipment
              inner join carrier
              inner join commune
              inner join region
              where product.pur_id = purchase.pur_id
              and purchase.acc_id = account.acc_id
              and purchase.pur_id = shipment.pur_id
              and carrier.car_id = shipment.car_id
              and shipment.com_id = commune.com_id
              and commune.reg_id = region.reg_id
              and product.pur_id in (
                  select pur_id
                  from purchase
              )
              and purchase.pur_id = $pur_id
              group by purchase.pur_id;
          ");

          if ($query->num_rows() > 0){
            return $query->row();
          } else {
            return null;
          }

        }

        public function get_sales_by_designer_total($des_id)
        {
          // returns all the paid orders of an account given its id

          $query = $this->db->query("
          select
          sum(product.pro_price) as total
          from product
          inner join purchase
          inner join account
          inner join design
          on product.des_id in
           (select design.des_id from design where design.gal_id in
           (select gallery.gal_id from gallery where gallery.acc_id = $des_id))
           and design.des_id = product.des_id
           and product.pur_id = purchase.pur_id
           and purchase.acc_id = account.acc_id
           and purchase.pur_status = 1;

          ");

          if ($query->num_rows() > 0){
            return $query->row();
          } else {
            return null;
          }
        }

        public function get_sales_by_designer($des_id)
        {
            // returns all the paid orders of an account given its id

            $query = $this->db->query("
            select
            design.des_name,
            design.des_id,
            product.pro_id,
            product.pro_price as venta,
            purchase.pur_date,
            account.acc_email
            from product
            inner join purchase
            inner join account
            inner join design
            on product.des_id in
             (select design.des_id from design where design.gal_id in
             (select gallery.gal_id from gallery where gallery.acc_id = $des_id))
             and design.des_id = product.des_id
             and product.pur_id = purchase.pur_id
             and purchase.acc_id = account.acc_id
             and purchase.pur_status = 1
             order by product.pro_id desc;
            ");

            if ($query->num_rows() > 0){
              return $query->result();
            } else {
              return null;
            }
        }

        public function get_purchases($acc_id)
        {
            // returns all the paid orders of an account given its id

            $query = $this->db->query("
            select
            purchase.pur_id,
            purchase.pur_date,
            account.acc_id,
            account.acc_email,
            shipment.shi_tracking,
            carrier.car_name,
            case shipment.shi_status
                 when 0 then 'en preparación'
                 when 1 then 'enviado'
              end as pur_status,
              case shipment.shi_status
                 when 0 then 'label-warning'
                 when 1 then 'label-success'
              end as pur_label_class,
            sum(product.pro_price) + purchase.pur_shipping_price as pur_total
            from product
            inner join purchase
            inner join account
            inner join shipment
            inner join carrier
            where product.pur_id = purchase.pur_id
            and purchase.acc_id = account.acc_id
            and purchase.pur_id = shipment.pur_id
            and carrier.car_id = shipment.car_id
            and product.pur_id in (
                select pur_id
                from purchase
            )
            and purchase.pur_status = 1
            and account.acc_id = $acc_id
            group by purchase.pur_id
            order by purchase.pur_date desc;
            ");

            if ($query->num_rows() > 0){
              return $query->result();
            } else {
              return null;
            }
        }

        public function get_sales_count($acc_id)
        {
          $query = $this->db->query("
          select
          design.des_id,
          design.des_name,
          count(product.pro_id) as pro_quantity,
          gallery.gal_id,
          gallery.gal_name,
          color.col_name
          from product
          inner join design
          inner join gallery
          inner join color
          on product.des_id in (
            select
            des_id
            from design
            inner join gallery
            on design.gal_id = gallery.gal_id
            and gallery.acc_id = $acc_id)
          and product.des_id = design.des_id
          and design.gal_id = gallery.gal_id
          and design.col_id = color.col_id
          group by design.des_id
          order by pro_quantity desc;
          ");

          if ($query->num_rows() > 0){
            return $query->result();
          } else {
            return null;
          }
        }

        public function get_items_by_purchase($acc_id, $pur_id)
        {
          // returns all the items in a purchase given it's id

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
        }
}

?>
