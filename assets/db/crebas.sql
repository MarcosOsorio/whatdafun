drop table if exists account;

drop table if exists address;

drop table if exists carrier;

drop table if exists color;

drop table if exists commune;

drop table if exists design;

drop table if exists gallery;

drop table if exists product;

drop table if exists purchase;

drop table if exists region;

drop table if exists shipment;

drop table if exists wish;

/*==============================================================*/
/* Table: account                                               */
/*==============================================================*/
create table account
(
   acc_id               int not null auto_increment,
   acc_email            varchar(30),
   acc_password         varchar(255),
   acc_rut              varchar(30),
   acc_country          int default 1,
   acc_first_name       varchar(30),
   acc_second_name      varchar(30),
   acc_father_surname   varchar(30),
   acc_mother_surname   varchar(30),
   acc_designer_nickname varchar(30),
   acc_birth_date       timestamp,
   acc_register_date    timestamp default current_timestamp,
   acc_admin            int default 0,
   acc_active           int default 1,
   primary key (acc_id)
);

/*==============================================================*/
/* Table: region                                                */
/*==============================================================*/
create table region
(
   reg_id               int not null auto_increment,
   reg_name             text,
   primary key (reg_id)
);

/*==============================================================*/
/* Table: commune                                               */
/*==============================================================*/
create table commune
(
   com_id               int not null auto_increment,
   reg_id               int,
   com_name             varchar(30),
   primary key (com_id),
   constraint fk_reference_13 foreign key (reg_id)
      references region (reg_id) on delete cascade on update cascade
);

/*==============================================================*/
/* Table: address                                               */
/*==============================================================*/
create table address
(
   add_id               int not null auto_increment,
   acc_id               int,
   com_id               int,
   add_description      varchar(30),
   add_name             varchar(30),
   add_surname          varchar(30),
   add_address          varchar(30),
   add_block            varchar(30),
   add_number           varchar(30),
   add_phone            varchar(30),
   add_email            varchar(30),
   add_active           int default 0,
   primary key (add_id),
   constraint fk_reference_15 foreign key (acc_id)
      references account (acc_id) on delete cascade on update cascade,
   constraint fk_reference_16 foreign key (com_id)
      references commune (com_id) on delete cascade on update cascade
);

/*==============================================================*/
/* Table: carrier                                               */
/*==============================================================*/
create table carrier
(
   car_id               int not null auto_increment,
   car_name             varchar(30),
   primary key (car_id)
);

/*==============================================================*/
/* Table: color                                                 */
/*==============================================================*/
create table color
(
   col_id               int not null auto_increment,
   col_name             varchar(30),
   col_hex              varchar(30),
   primary key (col_id)
);

/*==============================================================*/
/* Table: gallery                                               */
/*==============================================================*/
create table gallery
(
   gal_id               int not null auto_increment,
   acc_id               int,
   gal_name             varchar(30) not null,
   gal_date             timestamp default current_timestamp,
   primary key (gal_id),
   constraint fk_relationship_17 foreign key (acc_id)
      references account (acc_id) on delete cascade on update cascade
);

/*==============================================================*/
/* Table: design                                                */
/*==============================================================*/
create table design
(
   des_id               int not null auto_increment,
   gal_id               int,
   col_id               int,
   des_name             varchar(30),
   des_date             timestamp,
   des_price            int,
   des_discount_percentage int,
   des_approved         int,
   primary key (des_id),
   constraint fk_relationship_9 foreign key (gal_id)
      references gallery (gal_id) on delete cascade on update cascade,
   constraint fk_reference_21 foreign key (col_id)
      references color (col_id) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: purchase                                              */
/*==============================================================*/
create table purchase
(
   pur_id               int not null auto_increment,
   acc_id               int,
   pur_date             timestamp default current_timestamp,
   pur_shipping_price   int,
   pur_status           int,
   primary key (pur_id),
   constraint fk_relationship_15 foreign key (acc_id)
      references account (acc_id) on delete cascade on update cascade
);

/*==============================================================*/
/* Table: product                                               */
/*==============================================================*/
create table product
(
   pro_id               int not null auto_increment,
   des_id               int,
   pur_id               int,
   col_id               int,
   pro_name             varchar(30),
   pro_price            int,
   pro_quantity         int,
   pro_gender           int,
   pro_size             varchar(3),
   primary key (pro_id),
   constraint fk_reference_14 foreign key (des_id)
      references design (des_id) on delete cascade on update cascade,
   constraint fk_reference_19 foreign key (pur_id)
      references purchase (pur_id) on delete cascade on update cascade,
   constraint fk_reference_20 foreign key (col_id)
      references color (col_id) on delete cascade on update cascade
);

/*==============================================================*/
/* Table: shipment                                              */
/*==============================================================*/
create table shipment
(
   shi_id               int not null auto_increment,
   shi_tracking         varchar(30),
   pur_id               int,
   car_id               int,
   com_id               int,
   shi_status           int,
   shi_address          text,
   shi_name             varchar(30),
   shi_surname          varchar(30),
   shi_number           int,
   shi_block            int,
   shi_phone            int,
   shi_email            varchar(30),
   primary key (shi_id),
   constraint fk_reference_22 foreign key (com_id)
      references commune (com_id) on delete restrict on update restrict,
   constraint fk_reference_17 foreign key (pur_id)
      references purchase (pur_id) on delete cascade on update cascade,
   constraint fk_reference_18 foreign key (car_id)
      references carrier (car_id) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: wish                                                  */
/*==============================================================*/
create table wish
(
   wis_id               int not null auto_increment,
   acc_id               int,
   des_id               int,
   wis_date             timestamp default current_timestamp,
   primary key (wis_id),
   constraint fk_reference_11 foreign key (acc_id)
      references account (acc_id) on delete cascade on update cascade,
   constraint fk_reference_12 foreign key (des_id)
      references design (des_id) on delete cascade on update cascade
);
