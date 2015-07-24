drop table if exists tbl_double_color_ball;

drop table if exists tbl_privilege;

drop table if exists tbl_site;

drop index Index_Unique_LoginName on tbl_user;

drop table if exists tbl_user;

drop table if exists tbl_user_privilege;

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
/* Table: tbl_privilege                                         */
/*==============================================================*/
create table tbl_privilege
(
   privilegeID          int not null auto_increment,
   privilege            varchar(48) not null,
   link                 varchar(128) not null,
   dt                   timestamp not null default CURRENT_TIMESTAMP,
   type                 int not null default 100 comment '100:Normal and everyone can access 999:Only Manager',
   primary key (privilegeID)
);

/*==============================================================*/
/* Table: tbl_site                                              */
/*==============================================================*/
create table tbl_site
(
   dt_id                timestamp not null default CURRENT_TIMESTAMP comment 'YYYY-MM-DD HH:mm:ss(14)',
   random_id            char(3) not null comment 'Random Number(3)',
   title                varchar(128),
   url                  varchar(196) not null,
   comment              text,
   create_u             varchar(64),
   primary key (dt_id, random_id)
);

/*==============================================================*/
/* Table: tbl_user                                              */
/*==============================================================*/
create table tbl_user
(
   lname                varchar(64) not null comment 'Login name',
   lpwd                 varchar(32) not null comment 'Password for account',
   status               int not null default 100 comment '100:Normal 101:Inactive 102:Locked',
   type                 int not null default 100 comment '100:Normal 999:Manager',
   primary key (lname)
);

/*==============================================================*/
/* Index: Index_Unique_LoginName                                */
/*==============================================================*/
create unique index Index_Unique_LoginName on tbl_user
(
   lname
);

/*==============================================================*/
/* Table: tbl_user_privilege                                    */
/*==============================================================*/
create table tbl_user_privilege
(
   privilegeID          int not null comment 'Privilege ID',
   accountName          varchar(64) not null comment 'Account Name',
   linkDT               timestamp not null default CURRENT_TIMESTAMP comment 'Link Time',
   primary key (linkDT)
);

alter table tbl_site add constraint FK_Reference_3 foreign key (create_u)
      references tbl_user (lname) on delete restrict on update restrict;

alter table tbl_user_privilege add constraint FK_Reference_1 foreign key (privilegeID)
      references tbl_privilege (privilegeID) on delete restrict on update restrict;

alter table tbl_user_privilege add constraint FK_Reference_2 foreign key (accountName)
      references tbl_user (lname) on delete restrict on update restrict;
