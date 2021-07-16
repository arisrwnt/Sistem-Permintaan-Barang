<!DOCTYPE html><html lang="en">
<!-- Mirrored from themesdesign.in/drixo/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Apr 2021 10:49:53 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
<title>Login | StokBarang</title>
<meta content="Admin Dashboard" name="description">
<meta content="ThemeDesign" name="author">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="http://www.csat-training.com/upload/logocsat.jpg">
<link href="assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets2/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets2/css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="pb-0">
<!-- Loader -->
<div id="preloader">
	<div id="status">
		<div class="spinner"></div>
	</div>
</div>
<!-- Begin page -->
<div class="accountbg">
	<div class="content-center">
		<div class="content-desc-center">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-5 col-md-8">
						<div class="card">
							<div class="card-body">
								<h3 class="text-center mt-0 m-b-15"><a href="index.html" class="logo logo-admin"><img src="http://www.csat-training.com/upload/logocsat.jpg" height="50" alt="logo"></a></h3>
								<h4 class="text-muted text-center font-18"><b>Sign In</b></h4>
                <?php  
      // fungsi untuk menampilkan pesan
      // jika alert = "" (kosong)
      // tampilkan pesan "" (kosong)
      if (empty($_GET['alert'])) {
        echo "";
      } 
      // jika alert = 1
      // tampilkan pesan Gagal "Username atau Password salah, cek kembali Username dan Password Anda"
      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Gagal Login!</h4>
                Username atau Password salah, cek kembali Username dan Password Anda.
              </div>";
      }
      // jika alert = 2
      // tampilkan pesan Sukses "Anda telah berhasil logout"
      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
                Anda telah berhasil logout.
              </div>";
      }
      ?>

								<div class="p-2">
									<form class="form-horizontal m-t-20" action="login-check.php" method="POST">
										<div class="form-group row">
											<div class="col-12">
												<input class="form-control" type="text" required="" name="username" placeholder="Username"></div>
										</div>
										<div class="form-group row">
											<div class="col-12">
												<input class="form-control" type="password" name="password" required="" placeholder="Password"></div>
										</div>
										
										<div class="form-group text-center row m-t-20">
											<div class="col-12">
												<button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="login" value="Login">Log In</button>
											</div>
										</div>
										<!-- <div class="form-group m-t-10 mb-0 row">
											<div class="col-sm-7 m-t-20">
												<a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
											</div>
											<div class="col-sm-5 m-t-20">
												<a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
											</div>
										</div> -->
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end row --></div>
		</div>
	</div>
</div>
<!-- jQuery  -->
<script src="assets2/js/jquery.min.js"></script>
<script src="assets2/js/bootstrap.bundle.min.js"></script>
<script src="assets2/js/modernizr.min.js"></script>
<script src="assets2/js/detect.js"></script>
<script src="assets2/js/fastclick.js"></script>
<script src="assets2/js/jquery.slimscroll.js"></script>
<script src="assets2/js/jquery.blockUI.js"></script>
<script src="assets2/js/waves.js"></script>
<!-- App js -->
<script src="assets2/js/app.js"></script>
</body>
<!-- Mirrored from themesdesign.in/drixo/horizontal/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Apr 2021 10:49:53 GMT -->
</html>