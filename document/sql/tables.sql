drop table if exists tbl_double_color_ball;

drop table if exists tbl_site;

drop index Index_Unique_LoginName on tbl_users;

drop table if exists tbl_users;

/*==============================================================*/
/* Table: tbl_double_color_ball                                 */
/*==============================================================*/
create table tbl_double_color_ball
(
   dcb_dt               char(10) not null,
   dcb_num              char(7) not null,
   rb1                  char(2),
   rb2                  char(2),
   rb3                  char(2),
   rb4                  char(2),
   rb5                  char(2),
   rb6                  char(2),
   blueb                char(2),
   allrb                char(12),
   allb                 char(14),
   primary key (dcb_num)
);

/*==============================================================*/
/* Table: tbl_site                                              */
/*==============================================================*/
create table tbl_site
(
   dt_id                timestamp not null default CURRENT_TIMESTAMP comment 'YYYY-MM-DD HH:mm:ss(14)',
   random_id            char(3) not null comment 'Random Number(3)',
   url                  varchar(196) not null,
   comment              text,
   primary key (dt_id, random_id)
);

/*==============================================================*/
/* Table: tbl_users                                             */
/*==============================================================*/
create table tbl_users
(
   uid                  int not null,
   lname                varchar(48) not null,
   lpwd                 varchar(32) not null,
   status               int comment '0:Normal 2:Locked',
   primary key (uid)
);

/*==============================================================*/
/* Index: Index_Unique_LoginName                                */
/*==============================================================*/
create unique index Index_Unique_LoginName on tbl_users
(
   lname
);
