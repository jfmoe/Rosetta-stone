<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml" target="_blank">
    <link rel="stylesheet" type="text/css" href="../assets/css/mycss.css">
    <title>文章编辑</title>
    <link rel="short icon" href="../assets/image/club.ico">
</head>
<body>
<?php
    require_once '../inc/db.php';
    $id = $_GET['id'];
    $query = $db->prepare('select * from articles where id = :id');
    $query->bindValue(':article_id',$id,PDO::PARAM_INT);
    $query->execute();
    $article = $query->fetchObject();
?>
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

    <form action="update.php" method="post">
        <input name="id" value = "<?php echo $id; ?>"/>
        <label for="title">title</label>
        <input type="text" name="title" value="<?php echo $article->title ?>" />
        <br/>
        <label for="body">body</label>
        <textarea name="body">
			<?php echo $article->body; ?>
		</textarea>
        <br/>
        <input type="submit" value="提交" />
    </form>
</div>
<div class="footer">© 2001－2018 mangyuan.com, all rights reserved 杭州电子科技大学莽原文学社</div>
</body>
</html>