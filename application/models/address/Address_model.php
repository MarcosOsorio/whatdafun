<?php
// http://jeremykendall.net/2014/01/04/php-password-hashing-a-dead-simple-implementation/
// hash implementing
class Address_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('account/Account_model');
        }

        public function get_regions()
        {
          $query = $this->db->query("
          select
          reg_id,
          reg_name
          from region
          where 1;
          ");

          if ($query->num_rows() > 0){
            return $query->result();
          }
        }

        public function get_communes()
        {
          // Returns all communes

          $query = $this->db->query("
          select
          com_id,
          reg_id,
          com_name
          from commune;
          ");

          if ($query->num_rows() > 0){
            return $query->result();
          } else return 0;
        }

        public function get_communes_by_region($reg_id)
        {
          // Returns all communes

          $query = $this->db->query("
          select
          com_id,
          reg_id,
          com_name
          from commune
          where reg_id = $reg_id;
          ");

          if ($query->num_rows() > 0){
            return $query->result();
          } else return 0;
        }

        public function get_addresses($acc_id)
        {
          // Returns all addresses for a given account id

          $query = $this->db->query("
          select
          add_id,
          add_description,
          add_active
          from address where acc_id = '$acc_id'
          ");

          if ($query->num_rows() > 0){
            return $query->result();
          }else return 0;
        }

        public function get_address_commune_and_region($add_id)
        {
          // Returns full address for a given address id

          $query = $this->db->query("
          select
          address.add_id, address.add_description, address.add_name,
          address.add_surname, address.add_address, address.add_block,
          address.add_number, address.add_phone, address.add_email,
          address.add_active, commune.com_id, commune.com_name,
          region.reg_id, region.reg_name
          from address
          inner join commune
          on address.com_id = commune.com_id and address.add_id = '$add_id'
          inner join region
          on commune.reg_id = region.reg_id;
          ");

          if ($query->num_rows() > 0){
            //print_r($query->row());
            return $query->row();
          } else return 0;
        }

        public function get_active_address($acc_id)
        {
          // Returns full address of the active address of a given account id

          $addresses = $this->get_addresses($acc_id);
          if (!$addresses == 0){
            foreach ($addresses as $address) {
              if ($address->add_active == 1){
                //print_r($address->add_id);
                return $this->get_address_commune_and_region($address->add_id);
              }
            }
          } else return 0;
        }

        public function set_active_address($acc_id, $add_id)
        {
          // sets all addresses from an account as inactive and after that
          // sets the one with the sent id as active
          // this is done by transactions
          // if the last sql statement is not successfull, then the first
          // statement is reversed and nothing changes.

          $this->db->trans_start();
          $this->db->query("
          update address
          set add_active = 0
          where acc_id = $acc_id;
          ");
          $this->db->query("
          update address
          set add_active = 1
          where acc_id = $acc_id and add_id = $add_id
          ;");
          $this->db->trans_complete();

          if ($this->db->trans_status() === FALSE)
          {
              echo 'no se pudo actualizar la dirección';
              return 0;
          }else {
            return 1;
          }
        }
}

?>
