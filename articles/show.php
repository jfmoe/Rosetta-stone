<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml" >
    <link rel="stylesheet" type="text/css" href="../assets/css/mycss.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/articles.css">
    <title>文章</title>
    <link rel="short icon" href="../assets/image/club.ico">
</head>
<body>
<div class="content">
    <!--上方导航栏-->
    <div class="global-nav">
        <ul>
            <li><a href="../index.php">主页</a></li>
            <li><a href="../user/userzone.html">用户</a></li>
            <li><a href="../about.html">关于</a></li>
            <li style="float:right; padding-right: 15px"><a href="../user/userzone.html">ManyMeanings</a></li>
        </ul>
    </div>

    <div class="club-nav">
        <ul>
            <li><img src="../assets/image/title.png" alt="mangyuan" style="margin-top: 5px; margin-left: 307px;"/></li>
            <li style="float:right; margin-top: 22px; margin-right: 290px;" >
                <div><form action="../index.php" method="post">
                    <input class="search" type="text" placeholder="搜索你想知道的..." name="s" autocomplete="off">
                    <input class="button" type="submit" value="">
                </form>
                </div>
            </li>

        </ul>
    </div>

    <?php
        require_once  '../inc/db.php';
        $query = $db->prepare('select * from articles where article_id =:id');
        $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
        $query->execute();
        $article = $query->fetchObject();
    ?>
    <--文章-->
    <div class="the-article">
        <h1><?php echo $article->title?></h1>
        <div class="message">
            <img src="../assets/image/my.jpg" class="head-img">
            <a class="author" href="../user/userzone.html">Manymeanings</a>
            <span class="time-in"><?php echo $article->article_created_time?></span>
        </div>
        <pre><?php echo $article->body?></pre>
        <div class="footer-sharing">
            <span class="read-number">浏览量：10086</span>
            <a class="good">星星</a>
            <a class="good">收藏</a>
            <form action="destroy.php" method="post">
                <input type="hidden" name="id" value = "<?php echo $article->article_id; ?>"/>
                <input class="change-button"type="submit" value="删除" onclick="alert('是否确定删除本篇文章？')">
            </form>
            <div><a class="change-button" href="edit.php?id=<?php echo $article->article_id; ?>">修改</a></div>
    </div>
    </div>
    <--侧边栏-->
    <div class="aside-in-articles">
        <div class="mini-userzone">
            <img src="../assets/image/my.jpg">
            <a class="name-in-miniaside" href="../user/userzone.html">ManyMeanings</a>
            <span class="home">（浙江台州）</span>
            <p>本来以为是很简单的网站，但是要把所有的功能都做出来还是很麻烦的。github地址：https://github.com/ManyMeanings</p>
            <div class="data-in-miniaside">文章:1篇 &nbsp;&nbsp;星辰:1颗</div>
        </div>
        <div class="articles-in-aside">
            <div class="title-in-aside">ManyMeanings的新文章&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a href="../user/userzone.html">(全部)</a></div>
            <div class="new-articles"><a href="../user/userzone.html">孤独有毒</a>&nbsp;(5颗星星)</div>
            <div class="new-articles"><a href="../user/userzone.html">第二篇文章</a>&nbsp;(6颗星星)</div>
            <div class="new-articles"><a href="../user/userzone.html">The Third Article</a>&nbsp;(7颗星星)</div>
            <div class="new-articles"><a href="../user/userzone.html">123456</a>&nbsp;(8颗星星)</div>
            <div class="new-articles"><a href="../user/userzone.html">凑数的</a>&nbsp;(123颗星星)</div>
        </div>
        <div class="articles-in-aside">
            <div class="title-in-aside">近期热门文章&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a href="../index.php">(去主页)</a></div>
            <div class="hot-articles"><a href="../user/userzone.html">孤独有毒</a><p>ManyMeanings&nbsp;10086人浏览<p></div>
            <div class="hot-articles"><a href="../user/userzone.html">第二篇文章</a><p>ManyMeanings&nbsp;233人浏览<p></div>
            <div class="hot-articles"><a href="../user/userzone.html">The Third Article</a><p>ManyMeanings&nbsp;8888人浏览<p></div>
            <div class="hot-articles"><a href="../user/userzone.html">123456</a><p>ManyMeanings&nbsp;12345人浏览<p></div>
            <div class="hot-articles"><a href="../user/userzone.html">凑数的</a><p>ManyMeanings&nbsp;555555人浏览<p></div>
        </div>
    </div>
    <--评论-->
    <div class="comments">
        <div class="comment-block">
        <img src="../assets/image/my.jpg">
            <div class="title-in-comment">
            <span class="time-in-comment">2018-10-02 00:00:01</span>
            <a class="author-in-comment" href="../user/userzone.html">ManyMeanings</a>
            </div>
        <p>沙发！！</p>
        <div class="reply-button">回复</div>
    </div>
        <div class="comment-block">
            <img src="../assets/image/my.jpg"><div class="title-in-comment">
            <span class="time-in-comment">2018-10-02 00:00:01</span>
            <a class="author-in-comment" href="../user/userzone.html">ManyMeanings</a>
        </div>
            <p>前排！！</p>
            <div class="reply-button">回复</div>
        </div>
        <div class="comment-block">
            <img src="../assets/image/my.jpg"><div class="title-in-comment">
            <span class="time-in-comment">2018-10-02 00:00:01</span>
            <a class="author-in-comment" href="../user/userzone.html">ManyMeanings</a>
        </div>
            <p>孤独的毒，是一种植入灵魂的毒，中了毒的人走在路上，仿佛整个世界都在孤独。山上的塔是孤独的，路旁的树是孤独的，头顶的月是孤独的，就连那群整日在一起打闹的年轻人都是孤独的。其实啊，世界才没有他想的那么不堪，世界还是那个世界，只是他选择了孤独，他没有办法逃避孤独，因为孤独就在那里。</p>
            <div class="reply-button">回复</div>
        </div>
        <div class="comment-block">
            <img src="../assets/image/my.jpg"><div class="title-in-comment">
            <span class="time-in-comment">2018-10-02 00:00:01</span>
            <a class="author-in-comment" href="../user/userzone.html">ManyMeanings</a>
        </div>
            <p class="reply">沙发！！</p>
            <p>手速真快！！！！！！！！</p>
            <div class="reply-button">回复</div>
        </div>
        <div class="comment-block">
            <img src="../assets/image/my.jpg"><div class="title-in-comment">
            <span class="time-in-comment">2018-10-02 00:00:01</span>
            <a class="author-in-comment" href="../user/userzone.html">ManyMeanings</a>
        </div>
            <p>1541151651616113168</p>
            <div class="reply-button">回复</div>
        </div>
        <div class="comment-edit">
            <span class="comment-edit-title">你的回复&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;</span>
            <form>
                <textarea class="comment-edit-box" rows="4" cols="64" title=""></textarea>
                <input type="button" value="加上去" class="comment-edit-button">
            </form>
        </div>
    </div>


</div>
<div class="footer">© 2001－2018 mangyuan.com, all rights reserved 杭州电子科技大学莽原文学社</div>
</body>
</html>