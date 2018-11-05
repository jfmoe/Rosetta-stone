/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2018/11/5 20:58:48                           */
/*==============================================================*/


drop table if exists Association_9;

drop table if exists admin;

drop table if exists article_delete;

drop table if exists articles;

drop table if exists book_like;

drop table if exists books;

drop table if exists comment_delete;

drop table if exists comments;

drop table if exists reply_comments;

drop table if exists tv;

drop table if exists tv_like;

drop table if exists user_write;

drop table if exists users;

/*==============================================================*/
/* Table: Association_9                                         */
/*==============================================================*/
create table Association_9
(
   reply_id             int not null,
   admin_id             int not null,
   primary key (reply_id, admin_id)
);

/*==============================================================*/
/* Table: admin                                                 */
/*==============================================================*/
create table admin
(
   admin_id             int not null,
   admin_password       varchar(30) not null,
   admin_account        varchar(30) not null,
   primary key (admin_id)
);

/*==============================================================*/
/* Table: article_delete                                        */
/*==============================================================*/
create table article_delete
(
   articles_id          int not null,
   admin_id             int not null,
   primary key (articles_id, admin_id)
);

/*==============================================================*/
/* Table: articles                                              */
/*==============================================================*/
create table articles
(
   articles_id          int not null,
   title                varchar(50) not null,
   body                 text not null,
   article_created_time datetime not null,
   article_updated_time datetime not null,
   article_is_delete    bool not null default false,
   get_read             int not null,
   get_stars            int not null,
   primary key (articles_id)
);

/*==============================================================*/
/* Table: book_like                                             */
/*==============================================================*/
create table book_like
(
   book_id              int not null,
   user_id              int not null,
   book_to_write        text not null,
   primary key (book_id, user_id)
);

/*==============================================================*/
/* Table: books                                                 */
/*==============================================================*/
create table books
(
   book_id              int not null,
   book_name            varchar(20) not null,
   book_author          varchar(20) not null,
   book_img             varchar(50) not null,
   primary key (book_id)
);

/*==============================================================*/
/* Table: comment_delete                                        */
/*==============================================================*/
create table comment_delete
(
   comment_id           int not null,
   admin_id             int not null,
   primary key (comment_id, admin_id)
);

/*==============================================================*/
/* Table: comments                                              */
/*==============================================================*/
create table comments
(
   comment_id           int not null,
   reply_id             int not null,
   comment_body         text not null,
   comment_created_time datetime not null,
   comment_update_time  datetime not null,
   comment_is_delete    bool not null default false,
   primary key (comment_id)
);

/*==============================================================*/
/* Table: reply_comments                                        */
/*==============================================================*/
create table reply_comments
(
   reply_id             int not null,
   reply_comment_created_time datetime not null,
   reply_comment_updated_time datetime not null,
   reply_body           text not null,
   reply_comment_is_delete bool not null default false,
   primary key (reply_id)
);

/*==============================================================*/
/* Table: tv                                                    */
/*==============================================================*/
create table tv
(
   tv_id                int not null,
   tv_name              varchar(1024) not null,
   tv_author            varchar(1024) not null,
   tv_img               varchar(50) not null,
   primary key (tv_id)
);

/*==============================================================*/
/* Table: tv_like                                               */
/*==============================================================*/
create table tv_like
(
   tv_id                int not null,
   user_id              int not null,
   tv_to_say            text not null,
   write_time           datetime not null,
   primary key (tv_id, user_id)
);

/*==============================================================*/
/* Table: user_write                                            */
/*==============================================================*/
create table user_write
(
   articles_id          int not null,
   user_id              int not null,
   user_star_id         int,
   user_read_id         int,
   primary key (articles_id, user_id)
);

/*==============================================================*/
/* Table: users                                                 */
/*==============================================================*/
create table users
(
   user_id              int not null,
   comment_id           int not null,
   nickname             varchar(20) not null,
   e_mail               varchar(100) not null,
   user_password        varchar(20) not null,
   registered_time      datetime not null,
   had_read_number      int not null default 0,
   write_number         int not null default 0,
   had_geted_stars      int not null default 0,
   address              varchar(100) not null default '’„Ω≠∫º÷›',
   real_name            varchar(15) not null,
   Self_introduction    varchar(100) not null,
   head_img             varchar(100),
   primary key (user_id)
);

alter table Association_9 add constraint FK_Association_9 foreign key (admin_id)
      references admin (admin_id) on delete restrict on update restrict;

alter table Association_9 add constraint FK_Association_9 foreign key (reply_id)
      references reply_comments (reply_id) on delete restrict on update restrict;

alter table article_delete add constraint FK_article_delete foreign key (admin_id)
      references admin (admin_id) on delete restrict on update restrict;

alter table article_delete add constraint FK_article_delete foreign key (articles_id)
      references articles (articles_id) on delete restrict on update restrict;

alter table book_like add constraint FK_book_like foreign key (book_id)
      references books (book_id) on delete restrict on update restrict;

alter table book_like add constraint FK_book_like foreign key (user_id)
      references users (user_id) on delete restrict on update restrict;

alter table comment_delete add constraint FK_comment_delete foreign key (admin_id)
      references admin (admin_id) on delete restrict on update restrict;

alter table comment_delete add constraint FK_comment_delete foreign key (comment_id)
      references comments (comment_id) on delete restrict on update restrict;

alter table comments add constraint FK_reply foreign key (reply_id)
      references reply_comments (reply_id) on delete restrict on update restrict;

alter table tv_like add constraint FK_tv_like foreign key (tv_id)
      references tv (tv_id) on delete restrict on update restrict;

alter table tv_like add constraint FK_tv_like foreign key (user_id)
      references users (user_id) on delete restrict on update restrict;

alter table user_write add constraint FK_write foreign key (articles_id)
      references articles (articles_id) on delete restrict on update restrict;

alter table user_write add constraint FK_write foreign key (user_id)
      references users (user_id) on delete restrict on update restrict;

alter table users add constraint FK_write_comment foreign key (comment_id)
      references comments (comment_id) on delete restrict on update restrict;

