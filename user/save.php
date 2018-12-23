<?php

    require_once '../inc/session.php';
    require_once '../inc/db.php';
    require_once '../inc/common.php';

    $usernamesignup = trim($_POST['usernamesignup']);
    $realnamesignup = trim($_POST['realnamesignup']);
    $emailsignup = trim($_POST['emailsignup']);

    if ($_POST['passwordsignup'] == $_POST['passwordsignup_confirm']) {
        if (load_user($usernamesignup)) {
            set_notice('用户名已存在！');
            redirect_to('index.php#toregister');
        } else {
            if (load_user($emailsignup)) {
                set_notice('邮箱已注册！');
                redirect_to('index.php#toregister');
            } else {
                $pwd = encrypt_password($_POST['passwordsignup']);
                date_default_timezone_set('PRC');
                $registered_time = date('Y-m-d H:i:s');    //CURRENT_TIMESTAMP

                $sql = "insert into users(nickname, user_password, registered_time, e_mail, real_name) values(:nickname, :user_password, :registered_time, :e_mail, :real_name);";
                $query = $db->prepare($sql);
                $query->bindParam(':nickname', $usernamesignup, PDO::PARAM_STR);
                $query->bindParam(':user_password', $pwd, PDO::PARAM_STR);
                $query->bindParam(':registered_time', $registered_time, PDO::PARAM_STR);
                $query->bindParam(':e_mail', $emailsignup, PDO::PARAM_STR);
                $query->bindParam(':real_name', $realnamesignup, PDO::PARAM_STR);

                if (!$query->execute()) {
                    print_r($query->errorInfo());
                } else {
                    set_notice('注册成功！');
                    redirect_to("./");
                };
            }
        }
    } else {
        set_notice('两次密码不一致');
        redirect_to('index.php#toregister');
    }

