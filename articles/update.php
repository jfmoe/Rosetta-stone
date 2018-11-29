<?php

    require_once '../inc/session.php';
    require_once '../inc/db.php';
    require_once '../inc/common.php';

    if(authenticate_user()){
    $id = $_POST['id'];
    $sql = "update articles set title = :title, body = :body ,article_updated_time = :article_updated_time where article_id = :id; " ;
    $query = $db->prepare($sql);
    $query->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
    $query->bindValue(':body',$_POST['body'],PDO::PARAM_STR);
    $query->bindParam(':article_updated_time',$article_updated_time,PDO::PARAM_STR);
    $query->bindValue(':id',$id,PDO::PARAM_INT);

    date_default_timezone_set('PRC');
    $article_updated_time = date('Y-m-d H:i:s');

    if (!$query->execute()) {
        print_r($query->errorInfo());
    }else{
        redirect_to("show.php?id={$id}");
        ChromePhp::log($query);
    };}