<html>
<head>
	<meta charset="UTF-8">
	<title>homework</title>
</head>
<body>
	<form action="./" method="post">
		<input type="text" name="name" />
		<input type="submit" value="查询">
	</form>
</body>
</html>


<?php 

	function show($msg) {
		echo '<pre>';
		var_dump($msg);
		echo '</pre>';
	}


	$name = @$_POST['name'];

	if(!empty($name)) {
			// 建立数据库连接
			$mysqli = new mysqli("localhost", "****", "****", "homework");
			$mysqli->set_charset('utf8');

			// 检查是否成功连接数据库
			if ($mysqli->connect_errno) {
			    printf("Connect failed: %s\n", $mysqli->connect_error);
			    exit();
			}


		 	// 查询
		 	$name = addslashes($name);
			$query = "select * from user where name='$name'";
		
			if($result = $mysqli->query($query)) {

				while($rows = $result->fetch_array(MYSQLI_NUM)) {
					show($rows);
				}
				
				
				// 释放资源
				$result->free();
			} else {
				echo 'error!';
			}
			

			// 关闭连接
			$mysqli->close();
	}

 ?>

