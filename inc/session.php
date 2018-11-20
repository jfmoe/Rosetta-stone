<?php
    session_start();

    require_once $_SERVER['DOCUMENT_ROOT'] . '/phpp/Rosetta-stone/inc/db.php' ;
    require_once $_SERVER['DOCUMENT_ROOT'] . '/phpp/Rosetta-stone/inc/common.php' ;

    function has_notice(){
        return isset($_SESSION['notice']);
    }

    function get_notice(){
        return $_SESSION['notice'];
    }

    function set_notice($notice){
        $_SESSION['notice'] = $notice;
    }

    function clean_notice(){
        unset($_SESSION['notice']);
    }

    function is_login(){
        return isset($_SESSION['user_id']);
    }

    function login($name,$pwd,$remember_me=false){
        $user = load_user($name);
        if($user && encrypt_password($pwd) == $user->user_password){
            $_SESSION['user_id'] =  $user->user_id;
            if($remember_me){
                $expire_time =  7*24*3600*100 ;
                session_set_cookie_params($expire_time);
            }
            set_notice("欢迎您：{$name} 来到本站!");
            return $user;
        }else{
            set_notice("用户名或密码错误");
            return false;
        }
    }

    define("SALT_KEY","dsfsd2387008~!~@sdf");
    function encrypt_password($plain){
        return hash_hmac('sha256', $plain, SALT_KEY);
    }


    function logout(){
        session_destroy();
    }

    function current_user(){
        if (is_login()) {
            return load_user_id(intval($_SESSION['user_id']));
        }

    }

    function load_user($e_mail_or_nickname){
        if(strpos($e_mail_or_nickname,'@')){
            $where = "e_mail = :id";
        }else{
            $where = "nickname = :id";
        }

        global $db;
        $sql = "select * from users where " . $where  ;
        $query = $db->prepare($sql);
        $query->bindParam(':id',$e_mail_or_nickname,PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetchObject();
        return $user;
    }

    function load_user_id($id){
        global $db;
        $sql = "select * from users where user_id = :id" ;
        $query = $db->prepare($sql);
        $query->bindParam(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $user = $query->fetchObject();
        return $user;
    }

    function authenticate_user(){
        if(!is_login()){
            set_notice('必须登录后方可使用本功能');
            redirect_to('/user/');
        }

    }