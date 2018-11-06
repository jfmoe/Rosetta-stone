<?php

    require_once '../inc/db.php';
    require_once '../inc/common.php';
    $sql = 	"delete from articles where id = :id" ;
    $query = $db->prepare($sql);
    $query->bindValue(':id',$_POST['id'],PDO::PARAM_INT);

    if (!$query->execute()) {
        print_r($query->errorInfo());
    }else{
        redirect_to("/");
    };
