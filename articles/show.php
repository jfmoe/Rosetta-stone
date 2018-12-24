<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml">
    <title>文章</title>
    <link rel="short icon" href="../assets/image/club.ico">
    <link rel="stylesheet" type="text/css" href="../assets/css/mycss.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/articles.css">
    <script src="../assets/js/jquery-2.1.1.min.js"></script>
    <script src="../assets/js/ajaxindex.js"></script>
</head>
<body>
<?php require_once '../inc/session.php' ?>
<div class="content">
    <!--上方导航栏-->
    <div class="global-nav">
        <ul>
            <li><a href="../index.php">主页</a></li>
            <li><a href="../user/show.php">用户</a></li>
            <li><a href="https://github.com/ManyMeanings/Rosetta-stone">关于</a></li>
            <li style="float:right; padding-right: 5px">
                <a href="../user/login_delete.php"
                   style="<?php if (!is_login()) echo "display: none" ?>"><?php if (is_login()) echo "登出" ?></a></li>
            <li style="float:right;">
                <a href="../admin/"
                   style="<?php if (!is_user_right(1)) echo "display: none" ?>"><?php if (is_login()) echo "后台" ?></a>
            </li>
            <li style="float:right;">
                <a href="<?php if (is_login()) echo "../user/show.php?id=" . current_user()->user_id; else echo '../user/index.php' ?>"><?php if (is_login()) echo "个人中心"; else echo '登录' ?></a>
            </li>
        </ul>
    </div>

    <div class="club-nav">
        <ul>
            <li><img src="../assets/image/title.png" alt="mangyuan" style="margin-top: 5px; margin-left: 307px;"/></li>
            <li style="float:right; margin-top: 22px; margin-right: 290px;">
                <div>
                    <form action="../search.php" method="post">
                        <input class="search" type="text" placeholder="搜索文章标题关键字..." name="s" autocomplete="off">
                        <input class="button" type="submit" value="">
                    </form>
                </div>
            </li>

        </ul>
    </div>

    <?php
        require_once '../inc/db.php';
        require_once '../inc/common.php';
        $query = $db->prepare('select * from articles where article_id =:id');
        $query->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $query->execute();
        $article = $query->fetchObject();
        $user = get_user($article->author_id);
        if (authenticate_user_not_redirect()) {
            if (have_read($article->article_id)) {
                $sql = "update articles set get_read = get_read+1 where article_id = :id ; ";
                $query = $db->prepare($sql);
                $query->bindValue(':id', $article->article_id, PDO::PARAM_INT);
                $query->execute();
            }
        }
    ?>
    <--文章-->
    <div class="the-article">
        <h1><?php echo $article->title ?></h1>
        <div class="message">
            <img src="../assets/upload/head/<?php echo $user->head_img ?>" class="head-img">
            <a class="author" href="../user/show.php?id=<?php echo $user->user_id ?>"><?php echo $user->nickname ?></a>
            <span class="time-in"><?php echo $article->article_created_time ?></span>
        </div>
        <pre><?php echo $article->body ?></pre>
        <div class="footer-sharing">
            <span class="read-number">浏览量：<?php echo $article->get_read ?></span>
            <button id="btn" class="good" value="<?php echo $article->article_id ?>">星星</button>
            <span id="result" class="good-number"><?php echo $article->get_stars ?></span>
            <form action="destroy.php" method="post">
                <input type="hidden" name="id" value="<?php echo $article->article_id; ?>"/>
                <input
                    <?php if (!is_user_right($article->author_id)) echo "style='display: none;'" ?>class="change-button"
                    type="submit" value="删除" onclick="return confirm('是否确定删除本篇文章？')">
            </form>
            <div><a <?php if (!is_user_right($article->author_id)) echo "style='display: none;'" ?>class="change-button"
                    href="edit.php?id=<?php echo $article->article_id; ?>">修改</a></div>
        </div>
    </div>
    <--侧边栏-->
    <div class="aside-in-articles">
        <div class="mini-userzone">
            <img src="../assets/upload/head/<?php echo $user->head_img ?>">
            <a class="name-in-miniaside"
               href="../user/show.php?id=<?php echo $user->user_id ?>"><?php echo $user->nickname ?></a>
            <span class="home">（<?php echo $user->address ?>）</span>
            <p><?php echo $user->Self_introduction ?></p>
            <div class="data-in-miniaside">
                文章:<?php echo get_number("select * from articles where article_is_delete=0 and author_id=" . $user->user_id) ?>
                篇 &nbsp;&nbsp;星辰:<?php echo get_star_light($user->user_id) ?>颗
            </div>
        </div>
        <div class="articles-in-aside">
            <div class="title-in-aside"><?php echo $user->nickname ?>的新文章&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a
                        href="../user/show.php">(全部)</a></div>
            <?php
                $query = $db->query("select * from articles where author_id =" . $user->user_id . " and article_is_delete=0 order by article_updated_time desc");
                for ($i = 0; $i < 5; $i++) {
                    if ($article1 = $query->fetchObject()) {
                        ?>
                        <div class="new-articles"><a
                                    href="show.php?id=<?php echo $article1->article_id ?>"><?php echo $article1->title ?></a>&nbsp;(<?= $article1->get_stars ?>
                            颗星星)
                        </div>
                    <?php }
                } ?>
        </div>
        <div class="articles-in-aside">
            <div class="title-in-aside">近期热门文章&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;<a href="../index.php">(去主页)</a>
            </div>
            <?php
                $query = $db->prepare("select article_id, nickname, title, get_read, get_stars, get_read*0.25+get_stars*0.75 as rank from hot_articles order by rank desc limit 0,5;");
                $query->execute();
                $hot_articles = $query->fetchAll();
                foreach ($hot_articles as $value):?>
                    <div class="hot-articles"><a
                                href="show.php?id=<?= $value["article_id"] ?>"><?= $value["title"] ?></a>
                        <p><?= $value["nickname"] ?>&nbsp;<?= $value["get_read"] ?>人浏览
                        <p></div>
                <?php endforeach; ?>
        </div>
    </div>
    <--评论-->
    <div class="comments" id="place">
        <?php
            $query = $db->query('select * from comments where comment_is_delete=0 and article_id_in_comment = ' . $_GET['id']);
            while ($comment = $query->fetchObject()) {
                ?>
                <?php $commentator = get_user($comment->commentator_id) ?>
                <div class="comment-block">
                    <img src="../assets/upload/head/<?php echo $commentator->head_img ?>">
                    <div class="title-in-comment">
                        <span class="time-in-comment"><?php echo $comment->comment_created_time; ?></span>
                        <a class="author-in-comment"
                           href="../user/show.php?id=<?php echo $comment->commentator_id ?>"><?php echo $commentator->nickname ?></a>
                    </div>
                    <p><?php echo $comment->comment_body; ?></p>
                    <form action="../comments/destroy.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $comment->comment_id; ?>"/>
                        <input <?php if (!is_user_right($comment->commentator_id)) echo "style='display: none;'" ?>
                                class="comment-delete-button" type="submit" value="删除"
                                onclick="return confirm('是否确定删除这条评论？')">
                    </form>
                    <div class="reply-button">回复</div>
                </div>
            <?php } ?>
        <form action="../comments/save.php" method="post">
            <input type="hidden" name='article_id_in_comment' value='<?php echo $_GET['id']; ?>'/>
            <div class="comment-edit">
                <span class="comment-edit-title">你的回复&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;</span>
                <form>
                    <textarea name="comment_body" class="comment-edit-box" rows="4" cols="64" title=""></textarea>
                    <input type="submit" value="加上去" class="comment-edit-button" onclick="return confirm('是否确定回复？')">
                </form>
            </div>
        </form>
    </div>

</div>
<div class="footer">© 2001－2018 mangyuan.com, all rights reserved 杭州电子科技大学莽原文学社</div>
</body>
</html>