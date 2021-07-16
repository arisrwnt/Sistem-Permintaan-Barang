<?php  
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";

// fungsi query untuk menampilkan data dari tabel user
$query = mysqli_query($mysqli, "SELECT id_user, nama_user, foto, hak_akses FROM is_users WHERE id_user='$_SESSION[id_user]'")
                                or die('Ada kesalahan pada query tampil Manajemen User: '.mysqli_error($mysqli));

// tampilkan data
$data = mysqli_fetch_assoc($query);
?> 
        
        
        
        
        
        <li class="list-inline-item dropdown notification-list">
        
					<a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
          <?php  
  if ($data['foto']=="") { ?>
    <img src="images/user/user-default.png" class="rounded-circle" alt="User Image"/>
  <?php
  }
  else { ?>
    <img src="images/user/<?php echo $data['foto']; ?>" class="rounded-circle" alt="User Image"/>
  <?php
  }
  ?>
          
          </a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
          <a class="dropdown-item" href="#"><span class="badge badge-success mt-1 float-right"></span><i class="mdi mdi-account-circle m-r-5 text-muted"></i> <?php echo $data['nama_user']; ?> | 
        <small><?php echo $data['hak_akses']; ?></small></a>
						<a class="dropdown-item" href="?module=profil"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
            <a class="dropdown-item" href="?module=password"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Ubah Pass</a>
            <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
					</div>
				</li>