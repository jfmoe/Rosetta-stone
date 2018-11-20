<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml">
    <link rel="stylesheet" type="text/css" href="assets/css/mycss.css">
    <title>莽原</title>
    <link rel="short icon" href="assets/image/club.ico">
</head>

<body>
<?php
    require_once 'inc/session.php';
    require_once 'inc/db.php';
    require_once 'inc/fun_paging.php';
    require_once 'inc/common.php';

    if(is_login()) echo '当前用户: ' . current_user()->name ;

    $sql = "select * from articles";
    $db1  = $db->query($sql)->fetchAll();
    $total = count($db1);
    $num = 4;
    $cpage = isset($_GET['page'])?intval($_GET['page']):1;
    $pagenum = ceil($total/$num);
    $offset = ($cpage-1)*$num;
    $sql = "select * from articles where article_is_delete=0 order by article_updated_time desc limit {$offset},{$num}";
    $result  = $db->query($sql)->fetchAll();
    $start = $offset+1;
    $end=($cpage==$pagenum)?$total : ($cpage*$num);//结束记录页
    $next=($cpage==$pagenum)? 0:($cpage+1);//下一页
    $prev=($cpage==1)? 0:($cpage-1);//前一页
?>
<div class="content">

    <!--上方导航栏-->
    <div class="global-nav">
        <ul>
            <li><a href="index.php">主页</a></li>
            <li><a href="user/show.html">用户</a></li>
            <li><a href="about.html">关于</a></li>
            <li style="float:right; padding-right: 15px"><a href="<?php if(is_login()) echo 'user/show.html';else echo 'user/index.php'?>"><?php if(is_login()) echo current_user()->nickname;else echo '登录'?></a></li>
        </ul>
    </div>

    <div class="club-nav">
        <ul>
            <li><img src="assets/image/title.png" alt="mangyuan" style="margin-top: 5px; margin-left: 307px;"/></li>
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
                //while( $article = $query->fetchObject() ) {
                foreach ($result as $value): ?>
                    <div class="article-block">
                        <div><img src="assets/image/my.jpg"></div>
                        <div style="color:#9d9d9d ;
                    font-family: Helvetica, Arial, sans-serif ;
                    font-size: 14px"><a class="name" href="user/show.html">ManyMeanings</a> 的文章:
                        </div>
                        <div class="article">
                            <a class="titles"
                               href="articles/show.php?id=<?php print $value['article_id']; ?>"><?= $value['title'] ?></a>
                            <p style="margin-top: 5px"><?php echo subtext($value['body'], 120); ?></p>
                        </div>
                        <div class="time">写于<?= $value['article_created_time'] ?></div>
                    </div>
                <?php endforeach ?>

                    <?php
                        echo "<div class='fenye'>";
                        paging($cpage, $pagenum);
                        echo "</div>"
                    ?>
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
                        <a href="">Forgot username or password?</a>
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