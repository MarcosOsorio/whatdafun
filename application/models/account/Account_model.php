<?php
// http://jeremykendall.net/2014/01/04/php-password-hashing-a-dead-simple-implementation/
// hash implementing
class Account_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public function _server()
        {
          // return 'production' - 'development'
          // remove return true on get_account_email_password_exists
          return 'development';
        }

        public function set_account($email, $first_name, $father_surname, $password )
        {
          // inserts a new account with the basic given data

          if ($this->get_account_email_exists($email)){
            // if email is already registered we exit
            return false;
          }
            // storing of password with hash encryption

            $server = $this->_server();
            $password_hash = "";

            switch ($server) {
              case 'development':
                $password_hash = $password;
                break;
              case 'production':
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                break;
            }

            if ($father_surname){

              $first_name = ucfirst($first_name);
              $father_surname = ucfirst($father_surname);

              $query = $this->db->query("
              insert into account
              values
              (
                null,
                '$email',
                '$password_hash',
                null,
                null,
                '$first_name',
                null,
                '$father_surname',
                null,
                null,
                '',
                null,
                null
              );"
              );

              if ($this->db->insert_id())
              return true;
            } else {

              $first_name = ucfirst($first_name);
              $father_surname = ucfirst($father_surname);

              $query = $this->db->query("
              insert into account
              values
              (
                null,
                '$email',
                '$password',
                null,
                null,
                '$first_name',
                null,
                null,
                null,
                null,
                '',
                null
              );"
              );

              if ($this->db->insert_id())
              return true;
            }

        }

        public function get_account_address($acc_id, $add_id)
        {
          $query = $this->db->query("
          select count(*)
          from address
          where acc_id = $acc_id
          and add_id = $add_id;
          ");

          if ($query->num_rows() > 0){
            return $query->result();
          } else return null;
        }

        public function set_account_update_address($array)
        {
          // updates the address with the provided information
          if (!$this->get_account_address($array['id'], $array['add_id']) == null)
          {
            $query = $this->db->query("
            update address
            set
            add_description = '".$array['new_description']."',
            add_name = '".$array['new_name']."',
            add_surname = '".$array['new_surname']."',
            add_address = '".$array['new_address']."',
            add_number = ".$array['new_number'].",
            com_id = ".$array['new_commune'].",
            add_phone = ".$array['new_phone'].",
            add_email = '".$array['new_email']."'
            where add_id = ".$array['add_id'].";
            ");

            if ($this->db->affected_rows() >0)
            return true;
            else
            return null;
          }
        }

        public function set_account_update_password($email, $old_password, $new_password)
        {


          if (!$this->get_account_email_password_exists($email, $old_password))
            return false;

            $server = $this->_server();
            $new_password = "";
            switch ($server) {
              case 'development':
                $new_password = $password;
                break;
              case 'production':
                $new_password = password_hash($password, PASSWORD_DEFAULT);
                break;
            }


            $query = $this->db->query("
            update account
            set acc_password = '$new_password' where acc_email ='$email' and acc_password <>'$new_password';"
            );

            if ($this->db->affected_rows() >0)
            return true;
            else
            return false;

        }

        public function get_account_designer_nickname($acc_id)
        {
          // returns the designer nickname for the given account id

          $exists = $this->get_account_id_exists($acc_id);

          if (isset($exists)){
            $query = $this->db->query("
            select
            acc_designer_nickname
            from account
            where acc_id = $acc_id;
            ");
            if ($query->num_rows() >0){
              return $query->row();
            } else {
              return null;
            }
          } else {
            return null;
          }
        }

        public function get_account_id_exists($acc_id)
        {
          // checks if the given account id exists in the database

          $query = $this->db->query("
          select
          acc_id
          from account
          where acc_id = $acc_id;
          ");

          if ($query->num_rows() >0){
            return $query->row();
          } else {
            return null;
          }
        }

        public function get_account_session_data($email, $password)
        {
          // queries in MiXeD CaSe don't work on UNIX system

          if (!$this->get_account_email_password_exists($email, $password))
            return false;

            $query = $this->db->query("
            select
            acc_id,
            acc_email,
            acc_first_name
            from account
            where acc_email =  '$email'  ;"
            );

            if ($query->num_rows() > 0){
                return $query->row();
            }
            else{
                return false;
            }


        }

        public function get_account_email_exists($email)
        {
                // queries in MiXeD CaSe don't work on UNIX system

                $query = $this->db->query("
                select
                acc_email
                from account
                where acc_email =  '$email'  ;"
                );

                if ($query->num_rows() > 0){
                    return true;
                }
                else{
                    return false;
                }
        }

        public function get_account_email_password_exists($email, $password)
        {
                // queries in MiXeD CaSe don't work on UNIX system

                // get the hashed password from the database with matching email
                $query = $this->db->query("
                select
                acc_password
                from account
                where acc_email = '$email';"
                );

                // verify if there is a matching record
                if ($query->num_rows() > 0){

                  // storing the hashed password for comparing
                  $hashedPassword = $query->row()->acc_password;

                  // remove on production
                  return true;

                  // verify if stored password matches input password
                  if (password_verify($password, $hashedPassword)){
                    return true;
                  }else{
                    return false;
                  }
                }else {
                  return false;
                }
        }

        public function get_account_id($email)
        {
                // queries in MiXeD CaSe don't work on UNIX system

                $query = $this->db->query("
                select
                acc_id
                from account
                where acc_email =  '$email'  ;"
                );

                return $query->row()->acc_id;
        }

        public function get_account_first_name($id)
        {
                // queries in MiXeD CaSe don't work on UNIX system

                $query = $this->db->query("
                select
                acc_first_name
                from account
                where acc_id =  $id  ;"
                );

                return $query->row()->acc_first_name;
        }

        public function get_account_second_name($id)
        {
                // queries in MiXeD CaSe don't work on UNIX system

                $query = $this->db->query("
                select
                acc_second_name
                from account
                where acc_id =  $id  ;"
                );

                return $query->row()->acc_second_name;
        }

        public function get_account_email($id)
        {
                // queries in MiXeD CaSe don't work on UNIX system

                $query = $this->db->query("
                select
                acc_email
                from account
                where acc_id =  $id  ;"
                );

                return $query->row()->acc_email;
        }

}

?>
