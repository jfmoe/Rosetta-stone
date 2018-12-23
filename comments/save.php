<?php

    require_once '../inc/session.php';

    if (authenticate_user()) {

        $sql = "insert into comments(comment_body,comment_created_time,comment_update_time,article_id_in_comment,commentator_id) values(:comment_body,:comment_created_time,:comment_update_time,:article_id_in_comment,:commentator_id);";
        $query = $db->prepare($sql);
        $query->bindParam(':comment_body', $_POST['comment_body'], PDO::PARAM_STR);
        $query->bindParam(':comment_created_time', $comment_created_time, PDO::PARAM_STR);
        $query->bindParam(':comment_update_time', $comment_created_time, PDO::PARAM_STR);
        $query->bindParam(':article_id_in_comment', $_POST['article_id_in_comment'], PDO::PARAM_INT);
        $query->bindParam(':commentator_id', $commentator_id, PDO::PARAM_INT);

        $commentator_id = $_SESSION['user_id'];
        date_default_timezone_set('PRC');
        $comment_created_time = date('Y-m-d H:i:s');  //CURRENT_TIMESTAMP
        if (!$query->execute()) {
            print_r($query->errorInfo());
        } else {
            redirect_to("../articles/show.php?id=" . $_POST['article_id_in_comment']);
        };
    }

