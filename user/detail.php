<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml">
    <title>个人中心</title>
    <link rel="short icon" href="../assets/image/club.ico">
    <link rel="stylesheet" type="text/css" href="../assets/css/mycss.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/userzone.css">
</head>
<body>
<?php
    require_once '../inc/session.php';

    $query = $db->prepare('select * from users where user_id =:id');
    $query->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetchObject();
?>
<div class="content">
    <!--上方导航栏-->
    <div class="global-nav">
        <ul>
            <li><a href="../index.php">主页</a></li>
            <li><a href="show.php">用户</a></li>
            <li><a href="../about.html">关于</a></li>
            <li style="float:right; padding-right: 15px"><a
                        href="<?php if (is_login()) echo "show.php?id=" . current_user()->user_id; else echo 'user/index.php' ?>"><?php if (is_login()) echo current_user()->nickname; else echo '登录' ?></a>
            </li>
        </ul>
    </div>

    <div class="club-nav">
        <ul>
            <li><img src="../assets/image/title.png" alt="mangyuan" style="margin-top: 5px; margin-left: 307px;"/></li>
            <li style="float:right; margin-top: 22px; margin-right: 290px;">
                <div>
                    <form action="index.php" method="post">
                        <input class="search" type="text" placeholder="搜索你想知道的..." name="s" autocomplete="off">
                        <input class="button" type="submit" value="">
                    </form>
                </div>
            </li>

        </ul>
    </div>
    <div class="center">
        <--正文栏-->
        <div class="message">
            <--头-->
            <div class="head-in-message">
                <img src="../assets/upload/head/<?php echo $user->head_img ?>" class="img-in-headmsg">
                <span class="name-in-message"><?php echo $user->nickname ?></span><br>
                <span class="sth-to-say"><?php echo $user->saying ?></span>
            </div>

            <--文章-->
            <div class="articles-to-show">
                <div class="title-in-this"><?php echo $user->nickname ?>的文章&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;</div>
                <?php
                    $query = $db->query("select * from articles where author_id =" . $user->user_id . " and article_is_delete=0 order by article_updated_time desc");
                    while ($article = $query->fetchObject()) { ?>
                        <div class="show-articles-blocks">
                            <a class="title-in-show"
                               href="../articles/show.php?id=<?php print $article->article_id ?>"><?= $article->title ?></a>
                            <div class="time-in-show"><?= $article->article_updated_time ?></div>
                            <p><?= subtext($article->body, 120); ?></p>
                        </div>
                    <?php } ?>
            </div>
        </div>
        <--侧边栏-->
        <div class="message-in-aside">
            <div class="msg-card">
                <img src="../assets/upload/head/<?php echo $user->head_img ?>">
                <span class="place">常居：<?php echo $user->address ?></span><br>
                <span class="time-to-join"><?php echo $user->registered_time ?>&nbsp;加入</span><br>
                <span class="star">星辰：2颗</span>
                <div class="line"></div>
                <div class="word"><?php echo $user->Self_introduction ?></div>
            </div>

            <div class="books-in-read">
                <div class="title-in-aside">ManyMeanings正在读的书&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a
                            href="../index.php">(全部)</a></div>
                <img src="../assets/image/book.jpg">
                <img src="../assets/image/book.jpg">
            </div>

            <div class="articles-in-aside">
                <div class="title-in-aside">ManyMeanings的热门文章&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a
                            href="show.php">(全部)</a></div>
                <div class="new-articles"><a href="show.php">孤独有毒</a>&nbsp;(5颗星星)</div>
                <div class="new-articles"><a href="show.php">第二篇文章</a>&nbsp;(6颗星星)</div>
                <div class="new-articles"><a href="show.php">The Third Article</a>&nbsp;(7颗星星)</div>
                <div class="new-articles"><a href="show.php">123456</a>&nbsp;(8颗星星)</div>
                <div class="new-articles"><a href="show.php">凑数的</a>&nbsp;(123颗星星)</div>
            </div>

            <div class="articles-in-aside">
                <div class="title-in-aside">ManyMeanings喜欢的文章&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a
                            href="../index.php">(去主页)</a></div>
                <div class="hot-articles"><a href="show.php">孤独有毒</a>
                    <p>ManyMeanings&nbsp;10086人浏览
                    <p></div>
                <div class="hot-articles"><a href="show.php">第二篇文章</a>
                    <p>ManyMeanings&nbsp;233人浏览
                    <p></div>
                <div class="hot-articles"><a href="show.php">The Third Article</a>
                    <p>ManyMeanings&nbsp;8888人浏览
                    <p></div>
                <div class="hot-articles"><a href="show.php">123456</a>
                    <p>ManyMeanings&nbsp;12345人浏览
                    <p></div>
                <div class="hot-articles"><a href="show.php">凑数的</a>
                    <p>ManyMeanings&nbsp;555555人浏览
                    <p></div>
            </div>

        </div>
    </div>
</div>
<div class="footer">© 2001－2018 mangyuan.com, all rights reserved 杭州电子科技大学莽原文学社</div>
</body>
</html>