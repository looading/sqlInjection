<?php 
	$libs = "./node_modules";
	$imgUrl = "./img/1.jpeg";

	$mysqli = new mysqli("localhost", "root", "zhlt1234", "homework");
	$mysqli->set_charset('utf8');

	// 检查是否成功连接数据库
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}

	$query = "SELECT * FROM pic ORDER BY id desc";

	
	if($result = $mysqli->query($query)) {
		$row = $result->fetch_assoc();
		$result->free();
	} else {
		$row = array('url' => "./img/1.jpeg");
	}
 ?>


<html>
<head>
	<meta charset="UTF-8">
	<title>show picture</title>

	<link rel="stylesheet" href="<?php echo $libs; ?>/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center">图片展示</h1>
		<div class="center">
			<img src="<?php echo $row['url']; ?>" alt="" class="img img-thumbnail">
		</div>
	</div>

	<script type="text/javascript" src="<?php echo $libs; ?>/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $libs; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>