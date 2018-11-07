<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml" >
    <link rel="stylesheet" type="text/css" href="../assets/css/submit.css">
    <title>文章</title>
    <link rel="short icon" href="../assets/image/club.ico">
</head>
<body>
<?php $id = $_GET['id']; ?>
<form action="destroy.php" method="post">
    <input type="hidden" name="id" value = "<?php echo $id; ?>"/>
    <input type="submit" value="删除" onclick="alert('是否确定删除本篇文章？')">
</form>
</body>
</html>
