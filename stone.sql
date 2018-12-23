create table admin
(
  admin_id       int auto_increment
    primary key,
  admin_password varchar(30) not null,
  admin_account  varchar(30) not null
);

create table article_delete
(
  articles_id int not null,
  admin_id    int not null,
  primary key (articles_id, admin_id)
);

create table article_like
(
  article_id int default 0 not null,
  user_id    int           not null,
  like_time  datetime      null,
  primary key (article_id, user_id)
);

create table article_read
(
  read_id    int auto_increment
    primary key,
  article_id int default 0 not null,
  user_id    int           not null,
  read_time  datetime      null
);

create table articles
(
  article_id           int auto_increment
    primary key,
  author_id            int        default 0 not null,
  title                varchar(50)          not null,
  body                 text                 not null,
  article_created_time datetime             not null,
  article_updated_time datetime             not null,
  article_is_delete    tinyint(1) default 0 not null,
  get_read             int                  not null,
  get_stars            int                  not null
);

create table book_like
(
  book_id       int  not null,
  user_id       int  not null,
  book_to_write text not null,
  primary key (book_id, user_id)
);

create table books
(
  book_id     int auto_increment
    primary key,
  book_name   varchar(20) not null,
  book_author varchar(20) not null,
  book_img    varchar(50) not null
);

create table comment_delete
(
  comment_id int not null,
  admin_id   int not null,
  primary key (comment_id, admin_id)
);


create table comments
(
  comment_id            int auto_increment
    primary key,
  reply_id              int                  not null,
  comment_body          text                 not null,
  comment_created_time  datetime             not null,
  comment_update_time   datetime             not null,
  comment_is_delete     tinyint(1) default 0 not null,
  article_id_in_comment int                  null,
  commentator_id        int        default 0 not null
);


create table reply_comments
(
  reply_id                   int auto_increment
    primary key,
  reply_comment_created_time datetime             not null,
  reply_comment_updated_time datetime             not null,
  reply_body                 text                 not null,
  reply_comment_is_delete    tinyint(1) default 0 not null
);

create table reply_delete
(
  reply_id int not null,
  admin_id int not null,
  primary key (reply_id, admin_id)
);


create table tv
(
  tv_id     int auto_increment
    primary key,
  tv_name   varchar(1024) not null,
  tv_author varchar(1024) not null,
  tv_img    varchar(50)   not null
);

create table tv_like
(
  tv_id      int      not null,
  user_id    int      not null,
  tv_to_say  text     not null,
  write_time datetime not null,
  primary key (tv_id, user_id)
);


create table users
(
  user_id           int auto_increment
    primary key,
  nickname          varchar(50)  default ''           not null,
  e_mail            varchar(200) default ''           not null,
  user_password     text                              not null,
  registered_time   date         default '0000-00-00' not null,
  get_read_number   int          default 0            not null,
  write_number      int          default 0            not null,
  had_geted_stars   int          default 0            not null,
  address           varchar(100) default '浙江杭州'       not null,
  real_name         varchar(15)                       not null,
  Self_introduction text                              not null,
  head_img          varchar(100)                      null,
  saying            varchar(50)                       null,
  star_light        float(11, 1)                      null
);

create view hot_articles as
select `stone`.`articles`.`article_id` AS `article_id`,
       `stone`.`articles`.`title`      AS `title`,
       `stone`.`articles`.`get_read`   AS `get_read`,
       `stone`.`articles`.`get_stars`  AS `get_stars`,
       `stone`.`users`.`nickname`      AS `nickname`,
       `stone`.`articles`.`author_id`  AS `author_id`
from (`stone`.`articles`
       join `stone`.`users`)
where ((`stone`.`articles`.`author_id` = `stone`.`users`.`user_id`) and (`stone`.`articles`.`article_is_delete` = 0));


