<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en,th">
<head>
<title>การจัดห้องสอบ</title>
<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta charset="UTF-8"/>
	<!-- css files -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="css/style.css" rel="stylesheet" text="text/css"/>
	<!-- //css files -->
	
	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit:400,500,600&display=swap&subset=latin-ext,thai,vietnamese" rel="stylesheet">
	<!-- //google fonts -->
	
	<style>
		#loginBox{
			padding-top: 200px;
			margin-bottom:70px;
		}
		
		#rsu-logo{
			padding-top: 140px;
		}
	</style>
</head>
<body>
<!-- //header -->
<header>
	<div class="navbar navbar-expand-lg navbar-light bg-info">
		<h2 class="navbar-brand">ระบบจัดการห้องสอบ</h2>
	</div>
</header>
<!-- //header -->

<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="card" style="border: none" id="loginBox">
				<div class="card-body">
					<div class="col-md-6">
						<h2 class="card-title">เข้าสู่ระบบ</h2>
						<form action="check_user.php" method="post">
							<div class="form-group">
								<label for="user">Username:</label>
								<input type="text" class="form-control" id="user" name="user" required>
							</div>
							<div class="form-group">
								<label for="pass">Password:</label>
								<input type="password" class="form-control" id="pass" name="pass" required>
							</div>
							<button type="submit" class="btn btn-outline-info">Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6" id="rsu-logo">
			<img src="images/rsu-fb-share-new.png" alt="rsu-logo">
		</div>
	</div>
</div>

<?php include 'footer.php' ?>

</body>
</html>