<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml" >
    <title>写文章</title>
    <link rel="short icon" href="../assets/image/club.ico">
    <link rel="stylesheet" type="text/css" href="../assets/css/submit.css" >
</head>
<body>
<div class="edit-area">
    <form action="save.php" method="post" >
        <div class="top-title">
            <img src="../assets/image/title.png" id="ui">
            <input type="submit" id="submit" value="" autocomplete="off" onclick="alert('是否确定上传文章？')"/>
        </div>
            <input type="text" id="title" name="title" placeholder="添加标题" autocomplete="off"/>
        <br/>
            <textarea name="body" id="body" placeholder="写文章..."></textarea>
        <br/>
    </form>

</div>
</body>
</html>