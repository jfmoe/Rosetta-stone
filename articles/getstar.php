<?php

    require_once '../inc/db.php';
    require_once '../inc/common.php';
    require_once '../inc/session.php';

    if (authenticate_user_not_redirect()) {
        $article_id = $_GET['article_id'];
        if (is_same($article_id)) {
            $sql = "update articles set get_stars = get_stars+1 where article_id = :id ; ";
            $query = $db->prepare($sql);
            $query->bindValue(':id', $article_id, PDO::PARAM_INT);
            $query->execute();

            /*$sql = "insert into article_like(article_id,user_id) values(:article_id,:user_id);" ;
            $query = $db->prepare($sql);
            $query->bindValue(':article_id', $article_id, PDO::PARAM_INT);
            $query->bindValue(':user_id', current_user()->user_id, PDO::PARAM_INT);
            $query->execute();*/

            $sql = "select * from articles where article_id = :id ; ";
            $query = $db->prepare($sql);
            $query->bindValue(':id', $article_id, PDO::PARAM_INT);
            $query->execute();
            $article = $query->fetchObject();
            echo $article->get_stars;
        } else {
            echo "已赞";
        }
    } else {
        echo '登陆后方可使用本功能！';
    }



