<?php
    require_once '../inc/session.php';
    authenticate_user();
    $sql = "update articles set article_is_delete=1 where article_id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(':id', $_POST['id'], PDO::PARAM_INT);

    if (!$query->execute()) {
        print_r($query->errorInfo());
    } else {
        redirect_to("../");
    };


