/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  8/10/2020 7:57:18 PM                     */
/*==============================================================*/


drop table if exists Admin;

drop table if exists Ads;

drop table if exists Client;

drop table if exists Comment;

drop table if exists PostForum;

drop table if exists PostVehicule;

drop table if exists PostVol;

/*==============================================================*/
/* Table : Admin                                                */
/*==============================================================*/
create table Admin
(
   idAdmin              int not null AUTO_INCREMENT,
   nom                  varchar(254),
   email                varchar(254),
   password             varchar(254),
   primary key (idAdmin)
);

/*==============================================================*/
/* Table : Ads                                                  */
/*==============================================================*/
create table Ads
(
   idAds                int not null AUTO_INCREMENT,
   idAdmin              int,
   image                varchar(254),
   active               varchar(25),
   primary key (idAds)
);

/*==============================================================*/
/* Table : Client                                               */
/*==============================================================*/
create table Client
(
   idUser               int not null AUTO_INCREMENT,
   nom                  varchar(254),
   prenom               varchar(254),
   email                varchar(254),
   password             varchar(254),
   ville                varchar(254),
   telephone            varchar(10),
   primary key (idUser)
);

/*==============================================================*/
/* Table : Comment                                              */
/*==============================================================*/
create table Comment
(
   idComment            int not null AUTO_INCREMENT,
   idUser               int,
   idPostF              int,
   comment              varchar(254),
   primary key (idComment)
);

/*==============================================================*/
/* Table : PostForum                                            */
/*==============================================================*/
create table PostForum
(
   idPostF              int not null AUTO_INCREMENT,
   idUser               int,
   post                 varchar(254),
   date                 timestamp,
   primary key (idPostF)
);

/*==============================================================*/
/* Table : PostVehicule                                         */
/*==============================================================*/
create table PostVehicule
(
   idPostV              int not null AUTO_INCREMENT,
   image                varchar(254),
   titre                varchar(254),
   prix                 float,
   ville                varchar(254),
   description          varchar(254),
   telephone            varchar(10),
   idUser               int,
   date                 timestamp,
   primary key (idPostV)
);

/*==============================================================*/
/* Table : PostVol                                              */
/*==============================================================*/
create table PostVol
(
   idPostVo             int AUTO_INCREMENT,
   vin                  varchar(254),
   primary key (idPostVo)
);

alter table Ads add constraint FK_association6 foreign key (idAdmin)
      references Admin (idAdmin) on delete restrict on update restrict;

alter table Comment add constraint FK_association4 foreign key (idPostF)
      references PostForum (idPostF) on delete restrict on update restrict;

alter table Comment add constraint FK_association5 foreign key (idUser)
      references Client (idUser) on delete restrict on update restrict;

alter table PostForum add constraint FK_association3 foreign key (idUser)
      references Client (idUser) on delete restrict on update restrict;

alter table PostVehicule add constraint FK_association1 foreign key (idUser)
      references Client (idUser) on delete restrict on update restrict;

