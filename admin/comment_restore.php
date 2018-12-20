<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2018-12-20 21:44:41
 * @version $Id$
 */
    require_once '../inc/db.php';
    require_once '../inc/session.php';
    
    is_user_right(1)?:redirect_to("../");
    $sql = "update comments set comment_is_delete=0 where comment_id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

        if (!$query->execute()) {
            print_r($query->errorInfo());
        } else {
            redirect_back();
        };