<?php include('../lib/functions.php'); $myApp = new data();
	ob_start();
	session_start();
	
	if(!isset($_SESSION['t_user'])){
		header('location:../login');
	}
?>

<?php
	if(isset($_GET["q"]))
        $q = $_GET["q"];
    else
        $q = "";

    if(isset($_GET["thoat"])){
    	unset($_SESSION['t_user']);
    	unset($_SESSION['t_group']);
		header('location:../login');	
    }
?>

<!DOCTYPE html>
<html lang="vi">
	<head>
		<title>Trình Quản Trị</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="css/all.min.css">
		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<link rel="shortcut icon" type="image/icon" href="https://1.bp.blogspot.com/-d-8481jUnTY/X3fCXSjQs0I/AAAAAAAAFCk/K8YAkhn0lckXiK8q1yJ8zqhTlZBZYKN0ACLcBGAsYHQ/s16000/favicon.ico">

		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,700i&amp;subset=latin-ext,vietnamese" rel="stylesheet">

		<link href="css/bootstrap.min.css" rel="stylesheet">

		<link href="css/vex.css" rel="stylesheet">
		<link href="css/vex-theme-default.css" rel="stylesheet">
	
	
		<link href="css/iconfont.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		
		<script src="js/jquery.min.js" type="c0276cd82bb522550ed20481-text/javascript"></script>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	

		<script src="js/bootstrap.bundle.js" type="c0276cd82bb522550ed20481-text/javascript"></script>
	</head>
<body>
	<nav id="mainNav" class="navbar static-top navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php"><strong>Trình Quản Trị</strong></a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarBoard" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarBoard">
			<ul class="sidebar-nav navbar-nav">
				<li class="nav-item <?php if($q =="danhsachtruyen") echo 'active'; ?>">
					<a class="nav-link" href="index.php?q=danhsachtruyen"><i class="material-icons">library_books</i> Danh Sách Truyện</a>
				</li>

				<li class="nav-item <?php if($q =="taotruyen") echo 'active'; ?>">
					<a class="nav-link" href="index.php?q=taotruyen"><i class="material-icons">create_new_folder</i> Tạo Truyện Mới</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="index.php?q=the-loai-truyen"><i class="material-icons">library_books</i> Thể Loại Truyện</a>
				</li>

				<li class="nav-item"><hr></li>
			</ul>

			<ul class="navbar-nav ml-auto nav-top">
				<li class="nav-item mr-4">
					<a href="../" class="nav-link"><i class="material-icons">home</i> <span class="d-lg-none">Quay Lại Trang Truyện</span></a>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle mr-lg-2" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
						<i class="material-icons">account_circle</i> <span class="d-lg-none">Tài Khoản</span>
					</a>

					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="z-index: 1031;">
						<a class="dropdown-item" href="#">Tuan</a>
						<a class="dropdown-item" href="#">Thiết Lập Cài Đặt</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="index.php?thoat">Thoát</a>
					</div>
				</li>

				<li class="nav-item">
					<form class="form-inline my-2 my-lg-0 mr-lg-2" action="#">
						<div class="input-group">
							<input type="search" class="form-control" placeholder="Tìm truyện..." name="q" value="">
							<span class="input-group-btn">
								<button class="btn btn-primary" style="border-radius: 0 .25rem .25rem 0;"><i class="material-icons">search</i></button>
							</span>
						</div>
					</form>
				</li>
			</ul>
		</div>
	</nav>

	<div class="content-wrapper py-3">
	    <div class="container-fluid">
	        <?php  
	        	switch ($q) {
	        		case 'taotruyen': //roi
	        			include('pages/taotruyen.php');
	        			break;
	        		case 'them-chuong': //roi
	        			include('pages/themchuong.php');
	        			break;
	        		case 'suatruyen': //roi
	        			include('pages/suatruyen.php');
	        			break;
	        		case 'list-chuong': //roi
	        			include('pages/list-chuong.php');
	        			break;
	        		case 'sua-chuong': //roi
	        			include('pages/sua-chuong.php');
	        			break;
	        		case 'the-loai-truyen': //dang lam
	        			include('pages/the-loai-truyen.php');
	        			break;
	        		case 'sua-the-loai': //dang lam
	        			include('pages/sua-the-loai.php');
	        			break;
        			case 'them-the-loai': //dang lam
        			include('pages/them-the-loai.php');
        			break;

	        		default: //roi
	        			include('pages/truyen_cua_toi.php');
	        			break;
	        	}
	        ?>
	    </div>
	</div>


    <script src="js/rocket-loader.min.js" data-cf-settings="c0276cd82bb522550ed20481-|49" defer=""></script>
</body>
</html>