<?php
    require_once '../inc/session.php';
    require_once '../inc/common.php';

    if(login($_POST['username'] , $_POST['password'] ,$_POST['loginkeeping'])){
        redirect_to('../');
    }else{
        redirect_back();
    }
