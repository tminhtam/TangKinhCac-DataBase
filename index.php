<?php session_start(); ob_start(); ?>
<?php  require_once "lib/functions.php"; $myApp = new data();
	if(isset($_GET['q'])){
		$q = $_GET['q'];
	}
	else{
		$q = "home";
	}

	if(isset($_GET['search']))
		$q = "search";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="http://tangkinhcac.atwebpages.com/">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/all.min.css">
		<script type="text/javascript" src="js/main.js"></script>
		<link rel="shortcut icon" href="https://1.bp.blogspot.com/-d-8481jUnTY/X3fCXSjQs0I/AAAAAAAAFCk/K8YAkhn0lckXiK8q1yJ8zqhTlZBZYKN0ACLcBGAsYHQ/s16000/favicon.ico" type="image/icon">
		<script src="js/jquery-3.5.1.min.js"></script>
		<title>Tàng Kinh Các</title>
		<meta property="fb:app_id" content="361231344504986" />
		<meta property="fb:admins" content="100035917283116" />
		<meta name="robots" content="index, follow">

		<!-- font chu -->
		<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=David+Libre:wght@400;500;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Pridi|Roboto" rel="stylesheet">

	</head>
	<body>

		<div class="container px-0 py-0">
			<header class="">
				<img class="gif-header" src="https://1.bp.blogspot.com/-6jPPGAvD6VM/X3M00H4RZnI/AAAAAAAAFAI/TGkpP2GBnx8h5hnCPbwVZSstYQ-hU89MACLcBGAsYHQ/s16000/Yone.gif">
				<div class="header-title">
					<a class="header-link-video" href="./">Tàng Kinh Các</a>
					<p class="header-video-title animate__animated animate__bounce">nơi chia sẽ truyện miễn phí</p>
				</div>
			</header>

			<nav class="navbar navbar-expand-lg navbar-dark bg-dark my-nav font-roman">
				<a class="navbar-brand font-robo my-1" href="./">
					tàng kinh <span class="ah-tls">các</span>
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="hot"><i class="fab fa-hotjar"></i> Truyện HOT <span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="truyen-dich"><i class="fad fa-language"></i> Truyện Dịch</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="convert"><i class="fad fa-language"></i> Truyện Convert</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="far fa-bars"></i> Thể Loại
							</a>
							<div class="dropdown-menu sub-menu-1 pb-0" aria-labelledby="navbarDropdown">
								<a class="dropdown-item nav-sub-menu" href="the-loai/Tiên+Hiệp"><i class="fab fa-phoenix-squadron fa-fw"></i> Tiên Hiệp</a>
								<a class="dropdown-item nav-sub-menu" href="the-loai/Huyền+Huyễn"><i class="fab fa-phoenix-framework fa-fw"></i> Huyền Huyễn</a>
								<a class="dropdown-item nav-sub-menu" href="the-loai/Trùng+Sinh"><i class="fas fa-history fa-fw"></i> Trùng Sinh</a>
								<a class="dropdown-item nav-sub-menu" href="#"><i class="far fa-ellipsis-h fa-fw"></i> Xem Thêm</a>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fad fa-user"></i> Tài Khoản
							</a>
							<div class="dropdown-menu sub-menu-1 pb-0" aria-labelledby="navbarDropdown">
								<a class="dropdown-item nav-sub-menu" <?php if(!isset($_SESSION['t_user'])) echo 'onclick="Message();"'; ?> href="<?php if(!isset($_SESSION['t_user'])) echo '#'; else echo 'books'; ?>"><i class="fad fa-books fa-fw"></i> Truyện Của Tôi</a>
								<a class="dropdown-item nav-sub-menu" href="login"><i class="fad fa-sign-in-alt fa-fw"></i> <?php $myApp->CheckLogin(); ?></a>

							</div>
						</li>

					</ul>

					<form class="my-form-search form-inline my-2 my-lg-0" action="" method="GET">
						<input class="my-input-search form-control mr-sm-2" type="search" placeholder="Tìm truyện..." aria-label="Search" name="search">
						<button class="btn-search btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fal fa-search"></i></button>
					</form>
				</div>
			</nav>

			<div id="content-main" class="container-fluid mt-3 py-1 px-0">
				<?php  
					switch ($q) {
						case 'truyen':
							require_once "blocks/truyen.php";
							break;

						case 'read':
							require_once "blocks/read.php";
							break;

						case 'login':
							require_once "blocks/login.php";
							break;

						case 'author':
							require_once "blocks/author.php";
							break;

						case 'tl':
							require_once "blocks/the_loai.php";
							break;

						case 'search':
							require_once "blocks/search.php";
							break;

						case 'hot':
							require_once "blocks/hot.php";
							break;

						case 'dich':
							require_once "blocks/dich.php";
							break;

						case 'full':
							require_once "blocks/hoan_thanh.php";
							break;

						case 'update':
							require_once "blocks/update.php";
							break;

						case 'convert':
							require_once "blocks/convert.php";
							break;
						case 'books':
							require_once "blocks/books.php";
							break;
						
						default:
							require_once "blocks/home.php";
							break;
					}
				?>
			</div>

			<footer class="bg-dark mt-3 px-2 my-foot">
				<div class="row">
					<div class="col-md-10 footer-left">
						<p class="text-light pt-3">Copyright &copy; <?php echo date("Y"); ?> - All Rights Reserved.</p>
					</div>
					<div class="col-md-2 text-light pt-2  footer-right">
						<a class="footer-link" href="#"><i class="fab fa-facebook-square"></i></a>
						<a class="footer-link" href="#"><i class="fab fa-youtube-square"></i></a>
						<a class="footer-link" href="#"><i class="fab fa-google-plus-square"></i></a>
						<a class="footer-link" href="#"><i class="fab fa-twitter-square"></i></a>
						<a class="footer-link" href="#"><i class="fab fa-instagram-square"></i></a>
					</div>
				</div>
			</footer>
		</div>

		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>


<script type="text/javascript">
	function Message(){
		alert('Bạn chưa đăng nhập!');
	}
</script>