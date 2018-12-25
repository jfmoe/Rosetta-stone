<?php

    function redirect_to($dest = '/')
    {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: $dest");
    }

    function redirect_back()
    {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    function subtext($text, $length)
    {
        if (mb_strlen($text, 'utf8') > $length) {
            return mb_substr($text, 0, $length, 'utf8') . ' ...';
        } else {
            return $text;
        }
    }

    function get_user($id)
    {
        global $db;
        $query = $db->prepare("select * from users where user_id =:id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $user = $query->fetchObject();
        return $user;
    }

    function get_number($sql)
    {
        global $db;
        $db1 = $db->query($sql)->fetchAll();
        return count($db1);
    }

    function get_article($id)
    {
        global $db;
        $query = $db->prepare("select * from articles where author_id =:id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $article = $query->fetchObject();
        return $article;
    }

    function is_same($article_id)
    {
        global $db;
        date_default_timezone_set('PRC');
        $like_time = date('Y-m-d H:i:s');
        $sql = "insert into article_like(article_id,user_id,like_time) values(:article_id,:user_id,:like_time);";
        $query = $db->prepare($sql);
        $query->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $query->bindValue(':user_id', current_user()->user_id, PDO::PARAM_INT);
        $query->bindValue(':like_time', $like_time, PDO::PARAM_STR);
        if (!$query->execute()) return false;
        else return true;
    }

    function have_read($article_id)
    {
        global $db;
        date_default_timezone_set('PRC');
        $read_time = date('Y-m-d H:i:s');
        $sql = "insert into article_read(article_id,user_id,read_time) values(:article_id,:user_id,:read_time);";
        $query = $db->prepare($sql);
        $query->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $query->bindValue(':user_id', current_user()->user_id, PDO::PARAM_INT);
        $query->bindValue(':read_time', $read_time, PDO::PARAM_STR);
        if (!$query->execute()) return false;
        else return true;
    }

    function get_star_light($user_id)
    {
        global $db;
        $article_number = get_number("select * from articles where article_is_delete=0 and author_id=" . $user_id);
        $sql = "select get_read, get_stars from articles where article_is_delete=0 and author_id=" . $user_id;
        $query = $db->prepare($sql);
        $query->execute();
        $articles = $query->fetchAll();
        $get_stars = 0;
        $get_read = 0;
        foreach ($articles as $v):
            $get_read += $v["get_read"];
            $get_stars += $v["get_stars"];
        endforeach;
        $star_light = 9 * ($article_number * 0.2 + $get_stars * 0.5 + $get_read * 0.03) * 0.01;

        $sql = "update users set write_number = :write_number, had_geted_stars = :had_geted_stars ,star_light = :star_light, get_read_number = :get_read_number where user_id = :id; ";
        $query = $db->prepare($sql);
        $query->bindValue(':write_number', $article_number, PDO::PARAM_STR);
        $query->bindValue(':had_geted_stars', $get_stars, PDO::PARAM_STR);
        $query->bindParam(':get_read_number', $get_read, PDO::PARAM_STR);
        $query->bindParam(':star_light', $star_light, PDO::PARAM_STR);
        $query->bindValue(':id', $user_id, PDO::PARAM_INT);
        if (!$query->execute()) return false;
        else return true;
    }

    function get_comment($id){
        global $db;
        $query = $db->prepare("select * from comments where comment_id =:id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $comment = $query->fetchObject();
        return $comment;

    }

