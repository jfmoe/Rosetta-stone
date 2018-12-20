<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2018-12-20 20:34:04
 * @version $Id$
 */

require_once '../inc/session.php';
if(is_login()){
	if(is_user_right(1)){
		redirect_to("show.php");
	}else{
		echo "本账号不是管理员账号";
	}
}else{
		echo "您必须在用户登录界面登录管理员账号";
	}