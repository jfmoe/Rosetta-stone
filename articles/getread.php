<?php

    require_once '../inc/db.php';
    require_once '../inc/common.php';
    require_once '../inc/session.php';

    if (authenticate_user_not_redirect()) {
        $article_id = $_GET['article_id'];
        if (have_read($article_id)) {
            $sql = "update articles set get_read = get_read+1 where article_id = :id ; ";
            $query = $db->prepare($sql);
            $query->bindValue(':id', $article_id, PDO::PARAM_INT);
            $query->execute();
        }
    }



