<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml" target="_blank">
    <link rel="stylesheet" type="text/css" href="../assets/css/mycss.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/biaodan.css">
    <title>上传文章</title>
    <link rel="short icon" href="../assets/image/club.ico">
</head>
<body>
<div class="content">
    <form action="save.php" method="post">
        <label for="title">title</label>
        <input type="text" name="title" value="" />
        <br/>
        <label for="body">body</label>
        <textarea name="body"></textarea>
        <br/>
        <input type="submit" value="提交" />
    </form>

</div>
<div class="footer">© 2001－2018 mangyuan.com, all rights reserved 杭州电子科技大学莽原文学社</div>
</body>
</html>