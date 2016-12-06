<?php
// http://jeremykendall.net/2014/01/04/php-password-hashing-a-dead-simple-implementation/
// hash implementing
class Admin_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public function get_admin_status($acc_id)
        {
          $query = $this->db->query("
          select
          acc_admin
          from account
          where acc_id = $acc_id;
          ");

          if ($query->num_rows() > 0){
            if ($query->row()->acc_admin == 1){
              return $query->row();
            } else {
              return null;
            }
          } else {
            return null;
          }
        }

        public function get_admin_top_10_basket($acc_id)
        {
          $admin = $this->get_admin_status($acc_id);

          if (isset($admin)){

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
            on product.des_id = design.des_id
            and design.gal_id = gallery.gal_id
            and design.col_id = color.col_id
            group by design.des_id
            order by pro_quantity desc
            limit 10;
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

        public function get_admin_top_10_purchased($acc_id)
        {
          $admin = $this->get_admin_status($acc_id);

          if (isset($admin)){

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

            if ($query->num_rows() > 0){
              return $query->result();
            } else {
              return null;
            }
          } else {
            return null;
          }
        }

        public function get_admin_top_10_wishlist($acc_id)
        {
          $admin = $this->get_admin_status($acc_id);

          if (isset($admin)){

            $query = $this->db->query("
            select
            design.des_id,
            design.des_name,
            count(wish.des_id) as wish_quantity,
            gallery.gal_id,
            gallery.gal_name,
            color.col_name
            from product
            inner join design
            inner join gallery
            inner join color
			      inner join wish
            on product.des_id = design.des_id
            and design.gal_id = gallery.gal_id
            and design.col_id = color.col_id
			      and design.des_id = wish.des_id
            group by design.des_id
            order by pro_quantity desc
            limit 10;
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

        public function get_admin_accounts($acc_id)
        {
          $admin = $this->get_admin_status($acc_id);

          if (isset($admin)){

            $query = $this->db->query("
            select
            acc_id,
            acc_email,
            acc_first_name,
            acc_second_name,
            acc_father_surname,
            acc_mother_surname,
            acc_designer_nickname,
            acc_register_date,
            case acc_active
               when 0 then 'no'
               when 1 then 'si'
            end as acc_active,
            case acc_admin
               when 0 then 'no'
               when 1 then 'si'
            end as acc_admin
            from account;
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

        public function get_admin_account($admin_id, $account_id)
        {
          $admin = $this->get_admin_status($admin_id);

          if (isset($admin)){

            $query = $this->db->query("
            select
            acc_id,
            acc_email,
            acc_first_name,
            acc_second_name,
            acc_father_surname,
            acc_mother_surname,
            acc_designer_nickname,
            acc_register_date,
            case acc_active
               when 0 then 'no'
               when 1 then 'si'
            end as acc_active,
            case acc_admin
               when 0 then 'no'
               when 1 then 'si'
            end as acc_admin
            from account
            where account.acc_id = $account_id;
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

        public function set_admin_disable_user($admin_id, $acc_id)
        {
          $admin_status = $this->get_admin_status($admin_id);
          if (isset($admin_status)) {

                $query = $this->db->query("
                update account
                set acc_active = 0
                where acc_id = $acc_id
                and acc_admin = 0
                and acc_id <> $admin_id;
                ");

                if ($this->db->affected_rows() > 0){
                  return $this->db->affected_rows();
                } else {
                  return null;
                }
          }
        }

        public function set_admin_enable_user($admin_id, $acc_id)
        {
          $admin_status = $this->get_admin_status($admin_id);
          if (isset($admin_status)) {

                $query = $this->db->query("
                update account
                set acc_active = 1
                where acc_id = $acc_id;
                ");

                if ($this->db->affected_rows() > 0){
                  return $this->db->affected_rows();
                } else {
                  return null;
                }
          }
        }

        public function get_admin_designs($acc_id)
        {
          $admin_status = $this->get_admin_status($acc_id);
          if (isset($admin_status)) {

                $query = $this->db->query("
                select
                design.des_id,
                design.des_name,
                design.des_price,
                design.des_discount_percentage,
                design.des_approved,
                design.des_date,
                gallery.gal_id,
                gallery.gal_name,
                account.acc_id,
                account.acc_designer_nickname,
                color.col_name
                from design
                inner join gallery
                inner join account
                inner join color
                on design.gal_id = gallery.gal_id
                and gallery.acc_id = account.acc_id
                and design.col_id = color.col_id
                and account.acc_designer_nickname is not null
                order by des_date desc;
                ");

                if ($query->num_rows() > 0){
                  return $query->result();
                } else {
                  return null;
                }
          }
        }

        public function get_admin_wishlist($admin_id, $account_id)
        {
          $admin_status = $this->get_admin_status($admin_id);
          if (isset($admin_status)) {

                $query = $this->db->query("
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
                and wish.acc_id = $account_id;
                ");

                if ($query->num_rows() > 0){
                  return $query->result();
                } else {
                  return null;
                }
          }
        }

        public function set_admin_enable_design($admin_id, $design_id)
        {
          $admin_status = $this->get_admin_status($admin_id);
          if (isset($admin_status)) {

                $query = $this->db->query("
                update design
                set des_approved = 1
                where des_id = $design_id;
                ");

                if ($this->db->affected_rows() >= 0){
                  return $this->db->affected_rows();
                } else {
                  return null;
                }
          }
        }

        public function set_admin_disable_design($admin_id, $design_id)
        {
          $admin_status = $this->get_admin_status($admin_id);
          if (isset($admin_status)) {

                $query = $this->db->query("
                update design
                set des_approved = 0
                where des_id = $design_id;
                ");

                if ($this->db->affected_rows() >= 0){
                  return $this->db->affected_rows();
                } else {
                  return null;
                }
          }
        }

        public function get_admin_purchases_by_account($admin_id, $account_id)
        {
          $admin_status = $this->get_admin_status($admin_id);
          if (isset($admin_status)) {

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
                and account.acc_id = $account_id
                group by purchase.pur_id
                order by purchase.pur_date desc;
            ");

            if ($query->num_rows() > 0){
              return $query->result();
            } else {
              return null;
            }
          }

        }

        public function get_admin_purchases($admin_id)
        {
          $admin_status = $this->get_admin_status($admin_id);
          if (isset($admin_status)) {

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
                group by purchase.pur_id
                order by purchase.pur_date desc;;
            ");

            if ($query->num_rows() > 0){
              return $query->result();
            } else {
              return null;
            }
          }

        }

        public function get_admin_purchase($admin_id, $pur_id)
        {
          $admin_status = $this->get_admin_status($admin_id);
          if (isset($admin_status)) {

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
                     when 2 then 'entregado'
                  end as pur_status,
                  case shipment.shi_status
                     when 0 then 'label-warning'
                     when 1 then 'label-info'
                     when 2 then 'label-success'
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

        }

        public function get_admin_items_by_purchase($admin_id, $pur_id)
        {
          // returns all the items in a purchase given it's id

          $admin_status = $this->get_admin_status($admin_id);
          if (isset($admin_status)) {

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

      public function set_admin_update_tracking($admin_id, $shipment_id, $tracking_number)
      {
        $admin_status = $this->get_admin_status($admin_id);
        if (isset($admin_status)) {

              $query = $this->db->query("
              update shipment
              set shi_tracking = $tracking_number,
              shi_status = 1
              where shi_id = $shipment_id;
              ");

              if ($this->db->affected_rows() >= 0){
                return $this->db->affected_rows();
              } else {
                return null;
              }
        }
      }

      public function get_admin_galleries_by_designer($admin_id, $designer_id)
      {
        $admin_status = $this->get_admin_status($admin_id);
        if (isset($admin_status)) {

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
          where gal_id in (select gal_id from gallery where acc_id = $designer_id) group by gal_id);
          ");

          if ($query->num_rows() > 0)
          {
            return $query->result();
          }else {
            return null;
          }
        }
      }
}
?>
