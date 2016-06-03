<?php 
	session_start();
	$pages = './pages';
	$libs = "./node_modules";
	$imgurl = "./img/1.jpeg";
	
	if(@$_SESSION['login']){

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
		<title>Login</title>

		<link rel="stylesheet" href="<?php echo $libs; ?>/bootstrap/dist/css/bootstrap.min.css">
		<style>
			.panel {
				width: 600px;
				margin: 0 auto;
				margin-top: 100px;
			}
			img {
				width: 200px;
			}

		</style>
	</head>
	<body>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="text-center">后台管理－上传图片
						<a class="btn btn-danger pull-right" href="exit.php">退出</a>
					</h4>

				</div>
				<div class="panel-body">
					<form action="./upload.php" method="post" enctype="multipart/form-data">
						 <div class="form-group">
						     <label for="exampleInputFile">图片上传</label>
						     <input type="file" id="exampleInputFile" name="pic">
						 </div>
						 <button type="submit" class="btn btn-default">Submit</button>
					</form>
					<h5>图片显示：</h5>
					<img src="<?php echo $row['url'] ?>" alt="" class="img img-thumbnial">
				</div>
			</div>
		</div>

		<script type="text/javascript" src="<?php echo $libs; ?>/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $libs; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
	</html>

<?php
	} else {
?>

 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>Login</title>

 	<link rel="stylesheet" href="<?php echo $libs; ?>/bootstrap/dist/css/bootstrap.min.css">
 	<style>
 		.panel {
 			width: 400px;
 			margin: 0 auto;
 			margin-top: 100px;
 		}

 	</style>
 </head>
 <body>
 	<div class="container">
 		<div class="panel panel-default">
 			<div class="panel-heading">
 				<h4 class="text-center">登陆</h4>
 			</div>
 			<div class="panel-body">
 				<form action="./login.php" method="post">
 					<div class="form-group">
 					   <label for="user">username</label>
 					   <input type="text" class="form-control" id="user" placeholder="username" name="username">
 					 </div>
 					 <div class="form-group">
 					   <label for="pass">Password</label>
 					   <input type="password" class="form-control" id="pass" placeholder="Password" name="pass">
 					 </div>
 					 <button type="submit" class="btn btn-default">Submit</button>

 				</form>
 			</div>
 		</div>
 	</div>

 	<script type="text/javascript" src="<?php echo $libs; ?>/jquery/dist/jquery.min.js"></script>
 	<script type="text/javascript" src="<?php echo $libs; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
 </body>
 </html>


<?php } ?>