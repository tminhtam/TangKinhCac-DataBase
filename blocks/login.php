<?php

  if(isset($_SESSION['t_user'])){
    header('location:/admin');
  }
?>

<div class="container bg-trang shadow-sm myboder-3 py-3">
	<h1 class="text-center my-t-shadow font-roman">LOGIN</h1>
	<form id="login-form" method="post"  action="process/">
		<div class="form-group">
    		<label for="user"><i class="fas fa-user"></i> Tên Đăn Nhập</label>
    		<input type="text" class="form-control" id="user" name="username" required>
  		</div>
  		<div class="form-group">
    		<label for="pass"><i class="fas fa-lock-alt"></i> Mật Khẩu</label>
    		<input type="password" class="form-control" id="pass" name="password" required>
  		</div>

  		<div class="text-center">
  			<button type="submit" class="btn btn-primary"><i class="fal fa-sign-in-alt"></i> Đăng Nhập</button>
  			<a href="#" class="btn btn-primary" onclick="ShowErro();"><i class="fal fa-user-plus"></i> Tạo Tài Khoản</a>
  		</div>
	</form>
</div>

<script type="text/javascript">
    function ShowErro(){
        alert("Tính năng này hiện đang phát triển!");
    }
</script>

<script type="text/javascript">
    $("title").text("Đăng Nhập"); 
</script>