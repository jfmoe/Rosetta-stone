<?php

    require_once  '../inc/db.php';
    require_once '../inc/common.php';

    $sql = "insert into articles(title,body,article_created_time,article_updated_time) values(:title,:body,:article_created_time,:article_created_time);" ;
    $query = $db->prepare($sql);
    $query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
    $query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
    $query->bindParam(':article_created_time',$article_created_time,PDO::PARAM_STR);
    $query->bindParam(':article_updated_time',$article_created_time,PDO::PARAM_STR);

    date_default_timezone_set('PRC');
    $article_created_time = date('Y-m-d H:i:s');
    if(!$query->execute()) {
        print_r($query->errorInfo());
    }else{
        $article = $query->fetchObject();
        redirect_to("../");
    };