<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml" >
    <link rel="stylesheet" type="text/css" href="assets/css/mycss.css">
    <title>莽原</title>
    <link rel="short icon" href="assets/image/club.ico">
</head>

<body>
<div class="content">

    <!--上方导航栏-->
    <div class="global-nav">
        <ul>
            <li><a href="index.php">主页</a></li>
            <li><a href="user/userzone.html">用户</a></li>
            <li><a href="about.html">关于</a></li>
            <li style="float:right; padding-right: 15px"><a href="user/userzone.html">ManyMeanings</a></li>
        </ul>
    </div>

    <div class="club-nav">
        <ul>
            <li><img src="assets/image/title.png" alt="mangyuan" style="margin-top: 5px; margin-left: 307px;"/></li>
            <li style="float:right; margin-top: 22px; margin-right: 290px;" >
                <div><form action="index.php" method="post">
                    <input class="search" type="text" placeholder="搜索你想知道的..." name="s" autocomplete="off">
                    <input class="button" type="submit" value="">
                </form>
                </div>
            </li>

        </ul>
    </div>
    <div class="center">
        <!--编辑栏-->
        <div class="edit">
            <a href="articles/new.php"><input type="text" placeholder="点击这里上传您的文章..." style="height:24px;
                                                              width: 660px;
                                                              color: #f2f2f2;
                                                              padding-left: 10px;
                                                              font-size: 15px;
                                                              cursor: pointer;"></a>
        </div>
    <!--文章列表-->
    <div class="articles">

        <?php
            require_once 'inc/db.php';
            require'inc/common.php';
            $query = $db->query('select * from articles order by article_updated_time desc');
            while( $article = $query->fetchObject() ) {
        ?>
        <div class="article-block" >
            <div><img src="assets/image/my.jpg"></div>
            <div style="color:#9d9d9d ;
                    font-family: Helvetica, Arial, sans-serif ;
                    font-size: 14px"><a class="name" href="user/userzone.html">ManyMeanings</a> 的文章:
            </div>
            <div class="article">
                <a class="titles" href="articles/show.php?id=<?php print $article->article_id; ?>"><?php echo $article->title?></a>
                <p style="margin-top: 5px"><?php echo subtext($article->body,120);?></p>
            </div>
            <div class="time">写于<?php echo $article->article_created_time; ?></div>
        </div>

        <?php  } ?>

            <div class="fenye">
                <ul class="pagination">
                    <li><a href="index.php">«</a></li>
                    <li><a class="active" href="index.php">1</a></li>
                    <li><a href="index.php">2</a></li>
                    <li><a href="index.php">3</a></li>
                    <li><a href="index.php">4</a></li>
                    <li><a href="index.php">5</a></li>
                    <li><a href="index.php">6</a></li>
                    <li><a href="index.php">7</a></li>
                    <li><a href="index.php">»</a></li>
                </ul>

            </div>
    </div>
        <!--右侧栏-->
        <div class="aside">
            <form action="index.php" method="post">
                <ul>
                    <li>
                        <div class="text">
                            <span class="user"></span><input type="text" placeholder="IconDeposit">
                        </div>
                    </li>
                    <li>
                        <div class="password">
                            <span class="key"></span><input type="password" placeholder="••••••••••••••">
                        </div>
                    </li>
                    <li class="remember">
                        <input type="checkbox">Remember Me
                    </li>
                    <li>
                        <a href="" >Forgot username or password?</a>
                    </li>
                    <li>
                        <input type="button" value="Login">
                    </li>
                </ul>
            </form>
        </div>
</div>
</div>
<div class="footer">© 2001－2018 mangyuan.com, all rights reserved 杭州电子科技大学莽原文学社</div>

</body>
</html>