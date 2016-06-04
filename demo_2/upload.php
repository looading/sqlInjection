<?php
	function redirect($url, $msg, $delay) {
		echo $msg?$msg:'';
		echo "<script type='text/javascript'>"; 
		echo "setTimeout(function(){ location.href='$url' }, $delay)";
		echo "</script>";
		exit();
	}


	session_start();

	if($_SESSION['login']) {
		$file = $_FILES['pic'];
		if(0 != $file['error']) {
			redirect('admin.php', '请上传文件！', 2000);
		}
		$newPath = './img/'.$file['name'];
		move_uploaded_file($file['tmp_name'], $newPath);


		$mysqli = new mysqli("localhost", "****", "****", "homework");
		$mysqli->set_charset('utf8');

		// 检查是否成功连接数据库
		if ($mysqli->connect_errno) {
		    printf("Connect failed: %s\n", $mysqli->connect_error);
		    exit();
		}

		$query = "INSERT INTO pic (name,url) VALUES('".$file['name']."','".$newPath."');";

		$mysqli->query($query);
		
		// echo $query."<br/>".$mysqli->error;

		redirect('admin.php', '上传成功', 2000);
	} else {
		redirect('admin.php', '请先登录！', 2000);

	}
 ?>