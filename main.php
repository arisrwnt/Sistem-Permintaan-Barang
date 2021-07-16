<?php  
session_start();
?>
<!DOCTYPE html><html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
<title>StokBarang</title>
<meta content="Admin Dashboard" name="description">
<meta content="ThemeDesign" name="author">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="http://www.csat-training.com/upload/logocsat.jpg">
<!--Morris Chart CSS -->
<link rel="stylesheet" href="assets2/plugins/morris/morris.css">
<link href="assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets2/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets2/css/style.css" rel="stylesheet" type="text/css">
<!-- DataTables -->
<link href="assets2/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="assets2/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<!-- Responsive datatable examples -->
<link href="assets2/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
<!-- Fungsi untuk membatasi karakter yang diinputkan -->
<script language="javascript">
      function getkey(e)
      {
        if (window.event)
          return window.event.keyCode;
        else if (e)
          return e.which;
        else
          return null;
      }

      function goodchars(e, goods, field)
      {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;
       
        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();
       
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
          return true;
          
        if (key == 13) {
          var i;
          for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
              break;
          i = (i + 1) % field.form.elements.length;
          field.form.elements[i].focus();
          return false;
        };
        // else return false
        return false;
      }
    </script>
</head>
<body>
<!-- Loader -->
<div id="preloader">
	<div id="status">
		<div class="spinner"></div>
	</div>
</div>
<!-- Navigation Bar-->
<header id="topnav">
<div class="topbar-main">
	<div class="container-fluid">
		<!-- Logo container-->
		<div class="logo">
			<!-- Image Logo -->
			<a href="?module=beranda" class="logo"><img src="assets2/images/logo-sm.png" alt="" height="32" class="logo-small"><img src="http://www.csat-training.com/upload/logocsat.jpg" alt="" height="20" class="logo-large"></a>
		</div>
		<!-- End Logo container-->
		<div class="menu-extras topbar-custom">
			<ul class="list-inline float-right mb-0">
				
				<!-- User-->
				
        <?php include "top-menu.php" ?>
				<li class="menu-item list-inline-item">
					<!-- Mobile menu toggle-->
					<a class="navbar-toggle nav-link">
					<div class="lines">
						<span></span><span></span><span></span>
					</div>
					</a>
					<!-- End mobile menu toggle--></li>
			</ul>
		</div>
		<!-- end menu-extras -->
		<div class="clearfix"></div>
	</div>
	<!-- end container --></div>
<!-- end topbar-main -->
<!-- MENU Start -->
<div class="navbar-custom">
	<div class="container-fluid">
		<div id="navigation">
			<!-- Navigation Menu-->
			<ul class="navigation-menu">
      <?php 
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
				<li class="has-submenu">
					<a href="?module=beranda"><i class="dripicons-meter"></i>Dashboard</a>
				</li>
        		<li class="has-submenu">
					<a href="?module=helm"><i class="fa fa-folder"></i>Data Barang</a>
				</li>
        		<li class="has-submenu">
					<a href="?module=helm_masuk"><i class="fa fa-clone"></i>Data Barang Masuk</a>
				</li>
        <li class="has-submenu">
					<a href="?module=helm_keluar"><i class="fa fa-clone"></i>Data Barang Keluar</a>
				</li>
				<li class="has-submenu">
					<a href="#"><i class="dripicons-copy"></i>Laporan</a>
					<ul class="submenu megamenu">
						<li>
							<ul>
								<li>
									<a href="?module=lap_stok">Stok Barang</a>
								</li>
								<li>
									<a href="?module=lap_helm_masuk">Barang Masuk</a>
								</li>
								<li>
									<a href="?module=lap_helm_keluar">Barang Keluar</a>
								</li>
								
							</ul>
						</li>
						
					</ul>
				</li>	
				<li class="has-submenu">
					<a href="?module=user"><i class="fa fa-user"></i>Managemen Data User</a>
				</li>	
        <?php
}
elseif ($_SESSION['hak_akses']=='Manajer') { ?>
        <li class="has-submenu">
					<a href="?module=beranda"><i class="dripicons-meter"></i>Dashboard</a>
				</li>
        <li class="has-submenu">
					<a href="#"><i class="dripicons-copy"></i>Laporan</a>
					<ul class="submenu megamenu">
						<li>
							<ul>
								<li>
									<a href="?module=lap_stok">Stok Barang</a>
								</li>
								<li>
									<a href="?module=lap_helm_masuk">Barang Masuk</a>
								</li>
								<li>
									<a href="?module=lap_helm_keluar">Barang Keluar</a>
								</li>
								
							</ul>
						</li>
<?php
}
// jika hak akses = Gudang, tampilkan menu
if ($_SESSION['hak_akses']=='Gudang') { ?>
        <li class="has-submenu">
					<a href="?module=beranda"><i class="dripicons-meter"></i>Dashboard</a>
				</li>
        <li class="has-submenu">
					<a href="?module=helm_keluar"><i class="fa fa-clone"></i>Data Barang Keluar</a>
				</li>

<?php
}
?>
			</ul>
			<!-- End navigation menu -->
    </div>
		<!-- end #navigation -->
  </div>
	<!-- end container -->
</div>
<!-- end navbar-custom --></header>
<!-- End Navigation Bar-->
<div class="wrapper">
	<div class="container-fluid">
  
  <?php include "content.php" ?>
	
    </div>
	<!-- end container -->
</div>
<!-- end wrapper -->
<!-- Footer -->

<footer class="footer">
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			© 2018 - 2020 <b>Drixo</b><span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign.</span>
		</div>
	</div>
</div>
</footer>
<!-- End Footer -->
<!-- jQuery  -->
<script src="assets2/js/jquery.min.js"></script>
<script src="assets2/js/bootstrap.bundle.min.js"></script>
<script src="assets2/js/modernizr.min.js"></script>
<script src="assets2/js/detect.js"></script>
<script src="assets2/js/fastclick.js"></script>
<script src="assets2/js/jquery.slimscroll.js"></script>
<script src="assets2/js/jquery.blockUI.js"></script>
<script src="assets2/js/waves.js"></script>
<!-- skycons -->
<script src="assets2/plugins/skycons/skycons.min.js"></script>
<!-- skycons -->
<script src="assets2/plugins/peity/jquery.peity.min.js"></script>
<!--Morris Chart-->
<script src="assets2/plugins/morris/morris.min.js"></script>
<script src="assets2/plugins/raphael/raphael-min.js"></script>
<!-- dashboard -->
<script src="assets2/pages/dashboard.js"></script>
<!-- App js -->
<script src="assets2/js/app.js"></script>
<!-- Required datatable js -->
<script src="assets2/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets2/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets2/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets2/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets2/plugins/datatables/jszip.min.js"></script>
<script src="assets2/plugins/datatables/pdfmake.min.js"></script>
<script src="assets2/plugins/datatables/vfs_fonts.js"></script>
<script src="assets2/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets2/plugins/datatables/buttons.print.min.js"></script>
<script src="assets2/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets2/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets2/plugins/datatables/responsive.bootstrap4.min.js"></script>
<!-- Datatable init js -->
<script src="assets2/pages/datatables.init.js"></script>
<!-- page script -->
<script type="text/javascript">
      $(function () {
        // datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // chosen select
        $('.chosen-select').chosen({allow_single_deselect:true}); 
        //resize the chosen on window resize
        
        // mask money
        $('#harga_beli').maskMoney({thousands:'.', decimal:',', precision:0});
        $('#harga_jual').maskMoney({thousands:'.', decimal:',', precision:0});

        $(window)
        .off('resize.chosen')
        .on('resize.chosen', function() {
          $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
          })
        }).trigger('resize.chosen');
        //resize chosen on sidebar collapse/expand
        $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
          if(event_name != 'sidebar_collapsed') return;
          $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
          })
        });
    
    
        $('#chosen-multiple-style .btn').on('click', function(e){
          var target = $(this).find('input[type=radio]');
          var which = parseInt(target.val());
          if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
           else $('#form-field-select-4').removeClass('tag-input-style');
        });

        // DataTables
        $("#dataTables1").dataTable();
        $('#dataTables2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

</body>

</html>