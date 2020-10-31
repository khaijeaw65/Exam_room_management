<?php
require_once 'aut.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--CSS-->
	<!-- css files -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
	<link href="css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
	<link href="css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	<!-- //css files -->
	
	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit:400,500,600&display=swap&subset=latin-ext,thai,vietnamese" rel="stylesheet">
	<!-- //google fonts -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</head>
<body>

<!-- //header -->
<header class="py-3">
	<div class="container">
		<div id="logo">
			<h1><a class="navbar-brand" href="index.php">ระบบจัดห้องสอบ</a></h1>
		</div>
		<!-- nav -->
		<nav class="navbar navbar-expand-lg navbar-light d-lg-flex">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item dropdown">
						<a class="dropdown-toggle" href="" role="button" data-toggle="dropdown">การสอบ</a>
						<div class="dropdown-menu dropdown-menu-lg-right">
							<a class="dropdown-item" href="view_exam.php">ประวัติการสอบ</a>
							<a class="dropdown-item" href="add_exam.php">เพิ่มข้อมูลการสอบ</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="dropdown-toggle" href="" role="button" data-toggle="dropdown">ข้อมูลสถานที่สอบ</a>
						<div class="dropdown-menu dropdown-menu-lg-right">
							<a class="dropdown-item" href="view_building.php">รายระเอียดสถานที่สอบ</a>
							<a class="dropdown-item" href="add_data.php">เพิ่มข้อมูล</a>
							<a class="dropdown-item" href="edit_data.php">แก้ไขข้อมูล</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><?php echo $_SESSION['id'] ?></a>
						<div class="dropdown-menu dropdown-menu-lg-right">
							<a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
<!-- //header -->
</body>
</html>
