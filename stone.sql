# Host: localhost  (Version: 5.5.53)
# Date: 2018-11-08 13:25:29
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_password` varchar(30) NOT NULL,
  `admin_account` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "admin"
#

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

#
# Structure for table "article_delete"
#

DROP TABLE IF EXISTS `article_delete`;
CREATE TABLE `article_delete` (
  `articles_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`articles_id`,`admin_id`),
  KEY `FK_article_delete` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "article_delete"
#

/*!40000 ALTER TABLE `article_delete` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_delete` ENABLE KEYS */;

#
# Structure for table "articles"
#

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `article_created_time` datetime NOT NULL,
  `article_updated_time` datetime NOT NULL,
  `article_is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `get_read` int(11) NOT NULL,
  `get_stars` int(11) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "articles"
#

/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'“声之形”观后感','声音是什么样子的呢？从小便失聪的硝子难以感受到，被孤立后不敢抬头的将也恐怕也忘了，他们眼前是略显黑暗的世界。\r\n\r\n昨晚熬夜看完了《声之形》，在硝子跳楼的一刹那，我脑子里闪过这样一句话：如果她就这么死了，我绝对饶不了你。不知道那一刻我为什么会那么凶狠，大概是这么萌的妹子……不，不是的，，这个世界不应该绝望到不值得你留恋，将也那么惨的时候都因为一束烟花的绽放放弃了寻死。此刻，烟花大会的夜空，你微微仰头便能看见的那样繁华的光景，满空的绽放为什么会留不住你？\r\n\r\n更何况，还有那么多还没来得及看的番，那么多孕育在有生之年里的优秀作品，人怎么能轻易放弃自己的生命？\r\n\r\n我看来，《声之形》不是一部关于爱情的电影，它更像是《那朵花》式的展开，通过一个人把童年与青春、回忆与现实串起来。这是一个将遗憾补全的故事，至少是近似地补全（有些人最终也不可能达成和解）。这是一个真实得可怕的故事，作者有力的笔触毫不忌讳地勾画到社会的阴暗面，霸凌、孤立、歧视、冷漠、忍耐、轻生……各色的人物在舞台上登场。这支笔在血肉之躯上划下道道流血的伤口，泪水在观者脸上流淌；这支笔将狰狞的伤疤擦除，泪水在观者脸上流淌。\r\n\r\n真正令我感动的，是作者作为社会人，是京都作为大公司的担当。在决定制作的那一刻，这些人或多或少意识到《声之形》的风险，但是有些事不能不做。尽管《你的名字。》票房是《声之形》的十几倍，但在我心中《声之形》的分量重得多。不管哪个领域都应有开拓者的存在，去不断撕开约束，创造新的东西。《声之形》体现了对残障人士的关怀，对青少年自杀现象的反思，揭露了社会存在的畸形现状，它将这一切融在影院的大荧幕里。\r\n\r\n转学之前硝子的爆发令我一瞬间视线模糊，看着只会道歉她拼命地和将也扭打在一起，痛苦地嘶喊“我也不容易”这样的字眼。身体的缺陷令她自卑，令她总是装作毫不在乎地接受一切，那种“温柔”的样子。不知为何我会为那时狼狈的她感到高兴。\r\n\r\n电影的结局将也放开了捂在耳旁的“手”，声音一下子嘈杂起来，一直以来所恐惧的议论也就只有一句罢了。在学园祭的热闹里，众人达成了初步的和解，故事迎来尾声。时隔11年，aiko再次为动漫电影献唱，主题曲《恋をしたのは》前奏响起，制作人员的名单呈现。\r\n\r\n最后，请早见沙织姐姐收下我的膝盖(｀・ω・´)。\r\n','2018-11-07 23:35:09','2018-11-07 23:41:13',0,0,0),(2,'孤独有毒','孤独有毒。\r\n\r\n怎样的一种毒？他不会见血封喉，半步就倒，它会像个人畜无害的小动物躲在你身体的某个角落，一点点吃掉你的心。\r\n\r\n我固然喜欢长长的假期，可当连续几日不与人交也会陷入无事可做的窘境。有人体会过捧着手机坐在电脑前却不知道干啥的痛苦吗，那是孤独的毒在发作。我虽然很宅但一直不承认自己是死宅，大概是因为我真的很讨厌宅吧。\r\n\r\n现在好多视频网站都有弹幕，刚知道有那玩意儿时我还不懂，为什么看个视频还要忍受被一排排字挡住画面的痛苦，后来渐渐明白，这是一群孤独的人相拥取暖的地方。一个人低头数着进度条，看到精彩处，浑身寒毛炸起，可是身边却没有一个能听你吐槽的人。想说的话憋在心里总要憋出内伤，于是你将你的感慨写在弹幕里的某分某秒，这样后来人便知道你曾经走过这里，留下过你的声音，这样你便和他在冥冥中建立起一种联系，就像飞鸟掠过断崖。\r\n\r\n然而朋友不在身旁，总免不了一个人孤独下去。这世上有太多种无缘，无缘这个，无缘那个。说来缘分真是个奇妙的东西。它总喜欢变脸色，时而阴，时而晴，时而狂风暴雨，希望和失望常交织在一起，织出个理也理不清的毛线球，最后被绝望地一脚踢走，哭笑不得。\r\n\r\n怎样的人才有资格谈论孤独？你会说一个死宅孤独吗？可是你看他有好多好多网络朋友，纵然不得相见，可是总是在线，大家不必顾忌现实的那层伪装而显得更加真实。他甚至还有一整个二次元世界的陪伴，有他臆想中的男神女神御姐萌妹，有他可以肆无忌惮痛哭流泪的地方，有他可以没心没肺放肆傻笑的地方，你好意思说他孤独吗？可是，你看他总像地鼠一样窝在家中，啃着面包可怜兮兮。就算是地鼠从门里探出头也会有人提着塑料锤子去招呼它，可他呢？风匆匆而过，带不走什么。\r\n\r\n孤独的毒，是一种植入灵魂的毒，中了毒的人走在路上，仿佛整个世界都在孤独。山上的塔是孤独的，路旁的树是孤独的，头顶的月是孤独的，就连那群整日在一起打闹的年轻人都是孤独的。其实啊，世界才没有他想的那么不堪，世界还是那个世界，只是他选择了孤独，他没有办法逃避孤独，因为孤独就在那里。\r\n\r\n每个人生来就被种下了毒，我们终究只是一个个孤独的灵魂，走在自己的路上，走向自己的终点。只是有些路会有交集，有些灵魂可以相拥取暖，孤独便在这时悄悄隐匿，恍若不见。  \r\n\r\n当有一天灵魂失去了温度，毒症将会浮出。\r\n','2018-11-07 23:37:04','2018-11-07 23:37:04',0,0,0),(3,'忧郁先生','                              这是忧郁先生的墨水\r\n                              与声音绝缘\r\n                              枯败的老叶探出手掌\r\n                              替他涂上\r\n\r\n                              涂上就不怕大雨和黑夜\r\n                              忧郁先生在水泥地里游泳\r\n                              我垂头\r\n                              像演砸的小丑\r\n\r\n                              黑夜喜欢思索\r\n                              大雨偏爱寻仇\r\n                              忧郁先生盖上喧嚣\r\n                              躺在安静里\r\n\r\n                              一声脆响\r\n                              玻璃渣划伤了忧郁先生\r\n                              \r\n                              墨水流走 \r\n                              呆呆抬头\r\n                              雨声在手\r\n\r\n                              明灯 影瘦\r\n                              行人 匆匆\r\n                              大雨微凉\r\n                              淌过疏松的秋\r\n                              淋湿干净的夏\r\n\r\n                              隔着甲胄\r\n                              打在心头\r\n','2018-11-07 23:37:55','2018-11-07 23:37:55',0,0,0);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

#
# Structure for table "book_like"
#

DROP TABLE IF EXISTS `book_like`;
CREATE TABLE `book_like` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_to_write` text NOT NULL,
  PRIMARY KEY (`book_id`,`user_id`),
  KEY `FK_book_like` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "book_like"
#

/*!40000 ALTER TABLE `book_like` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_like` ENABLE KEYS */;

#
# Structure for table "books"
#

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(20) NOT NULL,
  `book_author` varchar(20) NOT NULL,
  `book_img` varchar(50) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "books"
#

/*!40000 ALTER TABLE `books` DISABLE KEYS */;
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

#
# Structure for table "comment_delete"
#

DROP TABLE IF EXISTS `comment_delete`;
CREATE TABLE `comment_delete` (
  `comment_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`,`admin_id`),
  KEY `FK_comment_delete` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "comment_delete"
#

/*!40000 ALTER TABLE `comment_delete` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_delete` ENABLE KEYS */;

#
# Structure for table "comments"
#

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_created_time` datetime NOT NULL,
  `comment_update_time` datetime NOT NULL,
  `comment_is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `article_id_in_comment` int(11) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `FK_reply` (`reply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "comments"
#

/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (17,0,'沙发！','2018-11-08 12:14:08','2018-11-08 12:14:08',0,1),(23,0,'昨晚熬夜看完了《声之形》，在硝子跳楼的一刹那，我脑子里闪过这样一句话：如果她就这么死了，我绝对饶不了你。不知道那一刻我为什么会那么凶狠，大概是这么萌的妹子……不，不是的，，这个世界不应该绝望到不值得你留恋，将也那么惨的时候都因为一束烟花的绽放放弃了寻死。此刻，烟花大会的夜空，你微微仰头便能看见的那样繁华的光景，满空的绽放为什么会留不住你？','2018-11-08 13:20:25','2018-11-08 13:20:25',0,1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

#
# Structure for table "reply_comments"
#

DROP TABLE IF EXISTS `reply_comments`;
CREATE TABLE `reply_comments` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_comment_created_time` datetime NOT NULL,
  `reply_comment_updated_time` datetime NOT NULL,
  `reply_body` text NOT NULL,
  `reply_comment_is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reply_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "reply_comments"
#

/*!40000 ALTER TABLE `reply_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `reply_comments` ENABLE KEYS */;

#
# Structure for table "reply_delete"
#

DROP TABLE IF EXISTS `reply_delete`;
CREATE TABLE `reply_delete` (
  `reply_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`reply_id`,`admin_id`),
  KEY `FK_Association_9` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "reply_delete"
#

/*!40000 ALTER TABLE `reply_delete` DISABLE KEYS */;
/*!40000 ALTER TABLE `reply_delete` ENABLE KEYS */;

#
# Structure for table "tv"
#

DROP TABLE IF EXISTS `tv`;
CREATE TABLE `tv` (
  `tv_id` int(11) NOT NULL AUTO_INCREMENT,
  `tv_name` varchar(1024) NOT NULL,
  `tv_author` varchar(1024) NOT NULL,
  `tv_img` varchar(50) NOT NULL,
  PRIMARY KEY (`tv_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "tv"
#

/*!40000 ALTER TABLE `tv` DISABLE KEYS */;
/*!40000 ALTER TABLE `tv` ENABLE KEYS */;

#
# Structure for table "tv_like"
#

DROP TABLE IF EXISTS `tv_like`;
CREATE TABLE `tv_like` (
  `tv_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tv_to_say` text NOT NULL,
  `write_time` datetime NOT NULL,
  PRIMARY KEY (`tv_id`,`user_id`),
  KEY `FK_tv_like` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "tv_like"
#

/*!40000 ALTER TABLE `tv_like` DISABLE KEYS */;
/*!40000 ALTER TABLE `tv_like` ENABLE KEYS */;

#
# Structure for table "user_write"
#

DROP TABLE IF EXISTS `user_write`;
CREATE TABLE `user_write` (
  `articles_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_star_id` int(11) DEFAULT NULL,
  `user_read_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`articles_id`,`user_id`),
  KEY `FK_write` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "user_write"
#

/*!40000 ALTER TABLE `user_write` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_write` ENABLE KEYS */;

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `e_mail` varchar(100) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `registered_time` datetime NOT NULL,
  `had_read_number` int(11) NOT NULL DEFAULT '0',
  `write_number` int(11) NOT NULL DEFAULT '0',
  `had_geted_stars` int(11) NOT NULL DEFAULT '0',
  `address` varchar(100) NOT NULL DEFAULT '浙江杭州',
  `real_name` varchar(15) NOT NULL,
  `Self_introduction` varchar(100) NOT NULL,
  `head_img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `FK_write_comment` (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "users"
#

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
