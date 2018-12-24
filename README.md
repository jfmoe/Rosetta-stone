# Rosetta-stone
这是一个多用户博客网站，页面的样式和布局主要参考豆瓣的风格，项目运行环境环境为 __Nginx-1.11.5 + PHP-7.2.10 + MySQL-5.5.53__ ，这是项目的演示地址：http://test.manymeanings.me
## 一、项目愿景
Rosetta Stone，译为“罗塞塔石碑”，是一块制作于公元前196年的花岗闪长岩石碑，由于这块石碑同时刻有同一段内容的三种不同语言版本，使得近代考古学家得以解读出已经失传千余年的埃及象形文之意义与结构，而成为今日研究古埃及历史的重要里程碑。由于其知名度与重要性，罗塞塔石碑也被引申用来意指或暗喻一些其他的事物。至于为什么本项目取名 Rosetta-stone ，这就要从它的用途说起。

我在大一加入[莽原文学社](https://baike.baidu.com/item/%E8%8E%BD%E5%8E%9F%E6%96%87%E5%AD%A6%E7%A4%BE)，经历一年锻炼，成为一名普通的部长。莽原满足了高中时代的我对于大学社团生活的部分幻想，然而现实总是美中不足，（在我看来）莽原的文学氛围不足，成员间的交流也不足，也许这是莽原生在工科院校的基因所致。作为一名伪文艺青年，思来想去，自己文学造诣不足，办事能力也不足，还不会说话，也就只能干干体力活，于是 Rosetta-stone 应运而生。 虽然我们都说汉语，但是在短暂相处之后，我慢慢发现大家说的都是不同的“语言”。一个人吐出的话，立足于其十几年来形成的价值观，而深度交流的基础，就立足于对其价值观的了解。因此，惟愿人们能通过阅读他人所写的文字，来了解他人。 Rosetta-stone 作为社团内部的博客网站，能成为促进人们相互了解的基石吗？

## 二、功能介绍
网站大致由 __用户系统、文章系统__ 等组成。以下介绍各系统的主要功能：
### 1.用户系统
由用户权限可分为三类用户：游客、会员、管理员

- 游客可访问网站，查询并浏览文章及会员信息
- 会员可发表、修改、删除个人文章，在所有文章下回复、给星星，更新个人信息，上传文件
- 管理员可删除或恢复所有会员的文章和评论，查看数据库的部分表

### 2.文章系统

- 一篇文章仅由一个会员创建
- 仅在作者登录的时候显示修改和删除按钮
- 文章可由浏览量,星星数量等参数划分出热门文章
- 一篇文章可有多条评论

### 3.其他系统

+ __星星系统__
    - 对于一篇文章，每个会员仅可送一颗星星
    - 会员获得星星的数量，是计算星光（类似用户等级的概念）的重要参数
+ __回复系统__
    - 每条回复只能对应一篇文章和一位用户
    - 回复之间最多有一层嵌套（尚未开发完成）
+ __书籍影视分享系统__（尚未开发完成）

## 三、技术介绍
主要介绍项目的开发工具，文件布局，数据库设计，所用到的前端和后端技术

### 1.开发工具
PHPStorm 是一款功能非常齐全的 IDE ，通过教育邮箱可以免费使用，对比 Sublime Text ，它打开速度较慢。 Sublime Text 的优点就是轻量且美观，而且包拓展给了它不亚于 IDE 的功能。

我喜欢用 Sublime Text 编写 Markdown 文档和进行短时间的开发，用 PHPStorm 进行长时间的开发。
> PHPStorm 是 JetBrains 公司开发的一个轻量级且便捷的 PHP IDE，其旨在提供用户效率，可深刻理解用户的编码，提供智能代码补全，快速导航以及即时错误检查。

> Sublime Text 是一款跨平台的代码编辑器软件，可通过包（Package）扩展功能。大多数的包使用自由软件授权发布，并由社群建置维护。

### 2.文件布局
在 WEB 的世界里，采用的是面向资源的设计

__什么是资源__？

- 将内容、功能和页面看作一个整体，就是资源。
- 每一个资源都有唯一url标识，
- 资源代表着一类可被用户访问和存取的内容，故通常命名为名词形式
- 用户可以通过一组标准的功能接口访问和存取资源，即CRUD


__以下为本项目主要的文件布局，每个根目录的文件夹均代表一种资源:__

* _admin_  
    + article_delete.php 
    + article_restore.php
    + comment_delete.php
    + comment_restore.php
    + index.php
    + show.php
* _articles_
    + destroy.php
    + edit.php
    + getread.php
    + getstar.php
    + new.php
    + save.php
    + show.php
    + update.php
* _assets_
    + _css_
    + _image_
    + _js_
    + _upload_
    + index.php
    + save.php
* _comments_
    + destroy.php
    + save.php
* _inc_
    + common.php
    + db.php
    + fun_paging
    + session.php
* _user_
    + detail.php
    + index.php
    + login_delete.php
    + login_save.php
    + save.php
    + show.php
* index.php
* README.me
* search.php
* stone.sql

### 3.数据库设计

由于新手起步，为了查询方便，数据库设计得有些冗余，字段命名也不够规范（项目进行到一半再改字段名有些麻烦）。下面仅给出用户表和文章表以作示例：

####（1）创建用户表

用户表主键为 `user_id` ,其余字段为： __用户的基本信息，分别为昵称，邮箱，密码，注册日期，所有文章获得的浏览总数，所写文章数量，获得的星星，地址，真实姓名，自我介绍，签名，星光__

    create table users
    (
    user_id           int auto_increment  primary key,
    nickname          varchar(50)  default ''           not null,
    e_mail            varchar(200) default ''           not null,
    user_password     text                              not null,
    registered_time   date         default '0000-00-00' not null,
    get_read_number   int          default 0            not null,
    write_number      int          default 0            not null,
    had_geted_stars   int          default 0            not null,
    address           varchar(100) default '浙江杭州'    not null,
    real_name         varchar(15)                       not null,
    Self_introduction text                              not null,
    head_img          varchar(100)                      null,
    saying            varchar(50)                       null,
    star_light        float(11, 1)                      null
    );

####（2）创建文章表

文章表主键为 `article_id` ,其余分别为： __作者id，标题，内容，创建日期，修改日期，是否被删除（默认为'0'，'1'表示被删除），浏览量，获得的星星数__

    create table articles
    (
    article_id           int auto_increment  primary key,
    author_id            int        default 0 not null,
    title                varchar(50)          not null,
    body                 text                 not null,
    article_created_time datetime             not null,
    article_updated_time datetime             not null,
    article_is_delete    tinyint(1) default 0 not null,
    get_read             int                  not null,
    get_stars            int                  not null
    );

### 4.前后端技术

本段主要介绍项目的界面组成及技术实现，前后端揉在一起。

介绍主要界面之前，需要知道 `assets` 文件夹里存放 `css` 和 `js` 文件，通过标签引用。

`inc` 文件夹里存放常用的 php 函数，通过 `require` 引用。简单介绍两个自定义函数：

```
//db.php

<?php
try {
        $db = new PDO("mysql:host=127.0.0.1;dbname=stone;", "root", "root");
        $db->query("SET NAMES 'utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e) {
        echo $e->getMessage() . '<br>';

    }
?>
```

该文件使用 `PDO` 链接 MySQL 数据库
>PDO (PHP data Object) 是一个数据库连接抽象类库,自 5.1.0 版本起内置于 PHP

`PDO` 具有以下特性

- 兼容性：PDO 为各种主流数据库提供了统一的编程接口
- 灵活性：PDO 在运行时才加载必须的数据库驱动程序，所以无需在每次使用不同数据库时重新配置和重新编译 PHP 
- 面向对象特性：PDO 利用 PHP5 的面向对象特性，编程支持更强大
- 内置对输入数据进行数据类型绑定、自动转义等功能, __有效防止 sql 注入__

```
//common.php

<?php

    function redirect_to($dest = '/')
    {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: $dest");
    }
...
```
网页提交表单后需要重定向到另一个页面，自定义 `redirect_to()` 函数实现服务端重定向

> HTTP重定向：服务器无法处理浏览器发送过来的请求（request），服务器告诉浏览器跳转到可以处理请求的url上。（浏览器会自动访问该URL地址，以至于用户无法分辨是否重定向了。） 

下面开始介绍主要功能实现及相关界面设计：

#### （1）注册 & 登录







