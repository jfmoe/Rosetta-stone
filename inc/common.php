<?php

    function redirect_to($dest='/'){
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: $dest");
    }

    function redirect_back(){
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    function subtext($text, $length)
    {
        if(mb_strlen($text, 'utf8') > $length) {
            return mb_substr($text, 0, $length, 'utf8').' ...';
        } else {
            return $text;
        }

    }


