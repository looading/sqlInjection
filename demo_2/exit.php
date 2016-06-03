<?php 
	function redirect($url, $msg, $delay) {
		echo $msg?$msg:'';
		echo "<script type='text/javascript'>"; 
		echo "setTimeout(function(){ location.href='$url' }, $delay)";
		echo "</script>";
		exit();
	}
	session_start();
	session_destroy();

	redirect('index.php', '退出成功！', 2000);

 ?>