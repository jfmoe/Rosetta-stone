<?php
    require_once '../inc/session.php';
    require_once '../inc/db.php';

    $id = $_POST['id'];
    if(authenticate_user()){
    print_r($_FILES);
    $file = strtolower($_FILES['upload']['name']);
    $path_parts = pathinfo( $_FILES['upload']['name'] );
    $ext = $path_parts['extension'];
    $file = $_POST['nickname'] . '-' . mt_rand() . '.' . $ext;

    $tmp_file_path = $_FILES['upload']['tmp_name'];

    $dest_dir = "upload/head/";
    $dest_file_path = $dest_dir . $file;

    if( !is_uploaded_file($tmp_file_path) || !move_uploaded_file($tmp_file_path,$dest_file_path) ){
    set_notice("文件上传失败！请联系站点管理员！");
    redirect_to("../");
    exit();
    }

    $sql = "update users set head_img = :head_img, nickname = :nickname, real_name = :real_name ,e_mail = :e_mail, address = :address, saying = :saying ,Self_introduction = :Self_introduction where user_id = :id " ;
    $query = $db->prepare($sql);
    $query->bindValue(':head_img',$file,PDO::PARAM_STR);
    $query->bindValue(':nickname',$_POST['nickname'],PDO::PARAM_STR);
    $query->bindValue(':real_name',$_POST['real_name'],PDO::PARAM_STR);
    $query->bindParam(':e_mail',$_POST['e_mail'],PDO::PARAM_STR);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->bindValue(':address',$_POST['address'],PDO::PARAM_STR);
    $query->bindParam(':saying',$_POST['saying'],PDO::PARAM_STR);
    $query->bindParam(':Self_introduction',$_POST['Self_introduction'],PDO::PARAM_STR);

    if (!$query->execute()) {
        print_r($query->errorInfo());
    }else{
        redirect_to("../user/show.php?id={$id}");
    };}