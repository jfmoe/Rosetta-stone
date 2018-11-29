<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml">
    <link rel="stylesheet" type="text/css" href="assets/css/articles.css">
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

    $sql = "select * from articles where article_is_delete=0";
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
            <li><a href="user/show.php">用户</a></li>
            <li><a href="about.html">关于</a></li>
            <li><a href="user/index.php">登录界面（临时）</a></li>
            <li style="float:right; padding-right: 15px"><a href="<?php if(is_login()) echo "user/show.php?id=".current_user()->user_id; else echo 'user/index.php'?>"><?php if(is_login()) echo current_user()->nickname;else echo '登录'?></a></li>
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
                foreach ($result as $value):
                    $user = get_user($value['author_id'])?>
                    <div class="article-block">
                        <div><img src="assets/image/my.jpg"></div>
                        <div style="color:#9d9d9d ;
                    font-family: Helvetica, Arial, sans-serif ;
                    font-size: 14px"><a class="name" href="user/show.php?id=<?php echo $user->user_id?>"><?php echo $user->nickname?></a> 的文章:
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
        <--侧边栏-->
        <div class="aside-in-articles">
            <div class="books-hot">
                <div class="title-in-aside">最近热门的书&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a href="index.php">(全部)</a></div>
                <img class="hot-books" src="assets/image/book.jpg">
                <img class="hot-books" src="assets/image/book.jpg">
            </div>

            <div class="articles-in-aside">
                <div class="title-in-aside">近期热门文章&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a href="index.php">(去主页)</a></div>
                <?php
                    $query = $db->prepare("select article_id, nickname, title, get_read, get_stars, get_read*0.25+get_stars*0.75 as rank from hot_articles order by rank desc limit 0,5;");
                    $query->execute();
                    $hot_articles = $query->fetchAll();
                    foreach($hot_articles as $value):?>
                      <div class="hot-articles"><a href="articles/show.php?id=<?= $value["article_id"] ?>"><?= $value["title"]?></a><p><?= $value["nickname"]?>&nbsp;<?= $value["get_read"]?>人浏览<p></div>
                    <?php  endforeach;?>
            </div>
        </div>
    </div>
</div>
<div class="footer">© 2001－2018 mangyuan.com, all rights reserved 杭州电子科技大学莽原文学社</div>

</body>
</html>