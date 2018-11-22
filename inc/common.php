<?php

    function redirect_to($dest='/'){
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: $dest");
    }

    function redirect_back(){
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    function subtext($text, $length){
        if(mb_strlen($text, 'utf8') > $length) {
            return mb_substr($text, 0, $length, 'utf8').' ...';
        } else {
            return $text;
        }
    }

    function get_user($id){
        global $db;
        $query = $db->prepare("select * from users where user_id =:id");
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $user = $query->fetchObject();
        return $user;
    }

    function get_number($sql){
        global $db;
        $db1  = $db->query($sql)->fetchAll();
        return count($db1);
    }

    function get_article($id){
        global $db;
        $query = $db->prepare("select * from articles where author_id =:id");
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $article = $query->fetchObject();
        return $article;
    }



