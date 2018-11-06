<?php

    require_once '../inc/db.php';
    require_once  '../inc/common.php';

    $id = $_POST['id'];
    $sql = "update articles set title = :title, :body where id =:id; ";
    $query = $db->prepare($sql);
    $query->bindValue('title',$_POST['title'],PDO::PARAM_STR);
    $query->bindValue(':body',$_POST['body'],PDO::PARAM_STR);
    echo $query->bindValue(':article_id',$id,PDO::PARAM_INT);

    if (!$query->execute()) {
        print_r($query->errorInfo());
    }else{
        redirect_to("show.php?id={$id}");
    };