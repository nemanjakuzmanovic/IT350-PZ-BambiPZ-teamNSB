/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     1/27/2017 8:52:35 PM                         */
/*==============================================================*/


drop table if exists narudzbenica;

drop table if exists proizvod;

drop table if exists proizvodna_jedinica;

drop table if exists proizvodnja;

drop table if exists skladiste;

drop table if exists stanje_skladista;

drop table if exists tip_proizvoda;

/*==============================================================*/
/* Table: narudzbenica                                          */
/*==============================================================*/
create table narudzbenica
(
   id_narudzbenice      int not null,
   id_proizvoda         int not null,
   id_skladista         int not null,
   id_proizvodne_jedinice int not null,
   datum_slanja         date,
   kolicina_porucenog_proizvoda bigint,
   primary key (id_narudzbenice)
);

/*==============================================================*/
/* Table: proizvod                                              */
/*==============================================================*/
create table proizvod
(
   id_proizvoda         int not null,
   id_tipa_proizvoda    int not null,
   naziv_proizvoda      text,
   jedinica_mere        text,
   cena                 bigint,
   primary key (id_proizvoda)
);

/*==============================================================*/
/* Table: proizvodna_jedinica                                   */
/*==============================================================*/
create table proizvodna_jedinica
(
   id_proizvodne_jedinice int not null,
   ime_pj               text,
   mesto_pj             text,
   ukupan_kapacitet_proizvodnje bigint,
   primary key (id_proizvodne_jedinice)
);

/*==============================================================*/
/* Table: proizvodnja                                           */
/*==============================================================*/
create table proizvodnja
(
   id_proizvodnje       int not null,
   id_proizvodne_jedinice int not null,
   id_proizvoda         int not null,
   kolicina_proizvoda   bigint,
   min_kapacitet_proizvodnje bigint,
   max_kapacitet_proizvodnje bigint,
   primary key (id_proizvodnje)
);

/*==============================================================*/
/* Table: skladiste                                             */
/*==============================================================*/
create table skladiste
(
   id_skladista         int not null,
   naziv_skladista      text,
   mesto_skladista      text,
   ukupan_kapacitet_zaliha_skladista bigint,
   primary key (id_skladista)
);

/*==============================================================*/
/* Table: stanje_skladista                                      */
/*==============================================================*/
create table stanje_skladista
(
   id_stanja_skladista  int not null,
   id_skladista         int not null,
   id_proizvoda         int,
   trenutna_kolicina    bigint,
   primary key (id_stanja_skladista)
);

/*==============================================================*/
/* Table: tip_proizvoda                                         */
/*==============================================================*/
create table tip_proizvoda
(
   id_tipa_proizvoda    int not null,
   naziv_tipa_proizvoda text,
   primary key (id_tipa_proizvoda)
);

alter table narudzbenica add constraint FK_R6 foreign key (id_proizvoda)
      references proizvod (id_proizvoda) on delete restrict on update restrict;

alter table narudzbenica add constraint FK_R7 foreign key (id_proizvodne_jedinice)
      references proizvodna_jedinica (id_proizvodne_jedinice) on delete restrict on update restrict;

alter table narudzbenica add constraint FK_R8 foreign key (id_skladista)
      references skladiste (id_skladista) on delete restrict on update restrict;

alter table proizvod add constraint FK_R1 foreign key (id_tipa_proizvoda)
      references tip_proizvoda (id_tipa_proizvoda) on delete restrict on update restrict;

alter table proizvodnja add constraint FK_R2 foreign key (id_proizvoda)
      references proizvod (id_proizvoda) on delete restrict on update restrict;

alter table proizvodnja add constraint FK_R3 foreign key (id_proizvodne_jedinice)
      references proizvodna_jedinica (id_proizvodne_jedinice) on delete restrict on update restrict;

alter table stanje_skladista add constraint FK_R4 foreign key (id_proizvoda)
      references proizvod (id_proizvoda) on delete restrict on update restrict;

alter table stanje_skladista add constraint FK_R5 foreign key (id_skladista)
      references skladiste (id_skladista) on delete restrict on update restrict;

