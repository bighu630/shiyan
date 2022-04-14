<?php 

	header('Content-type:text/html; charset=utf-8');
	// 处理用户登录信息
	if (isset($_POST['login'])) {
		# 接收用户的登录信息
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		// 判断提交的登录信息
		if (($username == '') || ($password == '')) {
			// 若为空,视为未填写,提示错误,并3秒后返回登录界面
			header('url=login.html');
			echo "用户名或密码不能为空,系统将在3秒后跳转到登录界面,请重新填写登录信息!";
			exit;
		} else{
			$conn = mysqli_connect("172.24.0.2","root","root","shiyan2");
			if($conn->connect_error){
				echo("链接失败");
			}
			$strSql = "select * from user where user='$username' and pwd='$password'";

			$bChack = mysqli_query($conn,$strSql);
			if($bChack){
				$row = mysqli_fetch_array($bChack);
				if($row['pwd']){
					echo "登陆成功";
				}
				else{
					echo "登陆失败";
				}
			}
			else{
				echo "数据库链接失败";
			}
		}
	}
 ?>
