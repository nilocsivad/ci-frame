/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2015/6/12 17:55:35                           */
/*==============================================================*/


drop index Index_Unique_LoginName on tbl_users;

drop table if exists tbl_users;

/*==============================================================*/
/* Table: tbl_users                                             */
/*==============================================================*/
create table tbl_users
(
   uid                  int not null auto_increment,
   lname                varchar(48) not null,
   lpwd                 varchar(32) not null,
   status               int,
   primary key (uid)
);

/*==============================================================*/
/* Index: Index_Unique_LoginName                                */
/*==============================================================*/
create unique index Index_Unique_LoginName on tbl_users
(
   lname
);

