<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ManyMeanings">
    <base href="index.hml">
    <title>修改资料</title>
    <link rel="short icon" href="../assets/image/club.ico">
    <link rel="stylesheet" type="text/css" href="../assets/css/submit.css">
</head>
<body>
<?php
    require_once '../inc/session.php';
    if (!is_user_right($_GET['id']))
        redirect_back();
    $user = load_user_id($_GET['id']);
?>
<div class="edit-area">
    <form enctype="multipart/form-data" action="save.php" method="post">
        <div class="top-title">
            <img src="../assets/image/title.png" id="ui">
            <input type="submit" id="submit" value="" autocomplete="off" onclick="return confirm('是否确定保存个人资料？')"/>
        </div>
        <img id="head_img" src="upload/head/<?php echo $user->head_img ?>"/>
        <br/>
        <a class="a-upload"><input name="upload" type="file">上传头像</a>
        <br/>
        <span class="tip">昵称：</span><input type="text" class="msg" name="nickname" value="<?php echo $user->nickname ?>"
                                           autocomplete="off"/>
        <br/>
        <span class="tip">真名：</span><input type="text" class="msg" name="real_name"
                                           value="<?php echo $user->real_name ?>" autocomplete="off"/>
        <br/>
        <span class="tip">邮箱：</span><input type="text" class="msg" name="e_mail" value="<?php echo $user->e_mail ?>"
                                           autocomplete="off"/>
        <br/>
        <span class="tip">常住：</span><input type="text" class="msg" name="address" value="<?php echo $user->address ?>"
                                           autocomplete="off"/>
        <br/>
        <span class="tip">签名：</span><input type="text" class="msg" name="saying" value="<?php echo $user->saying ?>"
                                           autocomplete="off"/>
        <br/>
        <span class="tip">介绍：</span><textarea class="in" name="Self_introduction"
                                              autocomplete="off"><?php echo $user->Self_introduction ?></textarea>
        <br/>
        <input style="display: none;" name='id' value=<?php echo $user->user_id ?>/>
    </form>

</div>
</body>
</html>