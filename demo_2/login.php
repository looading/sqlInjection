<?php  
	function redirect($url, $msg, $delay) {
		echo $msg?$msg:'';
		echo "<script type='text/javascript'>"; 
		echo "setTimeout(function(){ location.href='$url' }, $delay)";
		echo "</script>";
		exit();
	}

	session_start();

	$pages = './pages';
	$username = @$_POST['username'];
	$pass = @$_POST['pass'];

	if(empty('username')||empty($pass)) {
		redirect('admin.php', '账号密码不能为空！', 2000);
	}

	$mysqli = new mysqli("localhost", "root", "zhlt1234", "homework");
	$mysqli->set_charset('utf8');

	// 检查是否成功连接数据库
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
	$query = "SELECT * FROM admin where username='$username' and pass='$pass' ORDER BY id desc";

	if($result = $mysqli->query($query)) {
		$row = $result->fetch_assoc();
		$result->free();
		if(empty($row)) {
			redirect('admin.php', '账号或密码错误!', 2000);
		}
		$_SESSION['login'] = true;
		redirect('admin.php', '登陆成功!', 2000);
	} else {
		redirect('admin.php', '系统错误，请稍后再试！', 2000);
	}




?>