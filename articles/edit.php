<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml" >
    <title>文章编辑</title>
    <link rel="short icon" href="../assets/image/club.ico">
    <link rel="stylesheet" type="text/css" href="../assets/css/submit.css" >
</head>
<body>
<?php
    require_once '../inc/db.php';
    $id = $_GET['id'];
    $query = $db->prepare('select * from articles where article_id = :id');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $article = $query->fetchObject();
?>
<div class="edit-area">
    <form action="update.php" method="post">
        <div class="top-title">
            <img src="../assets/image/title.png" id="ui">
            <input type="submit" id="submit" value="" autocomplete="off" onclick="return confirm('是否确定修改文章？')"/>
        </div>
        <input type="hidden" name="id" value = "<?php echo $id; ?>"/>
        <input type="text" name="title" value="<?php echo $article->title ?>" id="title" autocomplete="off"/>
        <br/>
        <textarea name="body" id="body" autocomplete="off"><?php echo $article->body; ?></textarea>
    </form>
</div>
</body>
</html>