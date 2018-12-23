<?php
    require_once '../inc/session.php';

    is_user_right(1) ?: redirect_to("../");
    $sql = "update articles set article_is_delete=1 where article_id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

    if (!$query->execute()) {
        print_r($query->errorInfo());
    } else {
        redirect_back();
    };