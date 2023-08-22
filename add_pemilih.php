
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.min.js"></script>
		<!-- Alert -->
		<script src="plugins/alert.js"></script>
<?php 
include ("inc/koneksi.php");
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Pendaftaran Pemilih (Mahasiswa)</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Sesuai KTM" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="password" name="password" placeholder="password">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Scan Foto KTM Asli</label>
				<div class="col-sm-6">
					<input type="file" id="foto_pengguna" name="foto_pengguna">
					<p class="help-block">
						<font color="red">* Format File Images</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Em@il</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="email" name="email" placeholder="Email Aktif">
				<p class="help-block">
						<font color="red">* Email Aktif</font>
					</p>				
				</div>
			</div>
            
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP Aktif">
				<p class="help-block">
						<font color="red">* Nomor HP Yang Bisa Dihubungin</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Publish</label>
				<div class="col-sm-6">
				  <select name="publish" id="publish" class="form-control">
				    <option>N</option>
                  </select>
                  <font color="red">* Menunggu Keputusan Admin</font>
			  </div>
			</div>

		</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="login.php" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<div class="col-12">
		<center>Fakultas Ilmu Komputer &copy; <?php echo date (" Y"); ?> <a href="index.php">E-Voting</a> | Ketua BEM.
		</center>
	</div>

<?php
	$sumber = @$_FILES['foto_pengguna']['tmp_name'];
    $target = 'foto/';
    $nama_file = @$_FILES['foto_pengguna']['name'];
    $pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna, username,password, level, foto_pengguna, email, no_hp, publish, status, jenis) VALUES (
        '".$_POST['nama_pengguna']."',
        '".$_POST['username']."',
        '".$_POST['password']."',
        'Pemilih',
        '".$nama_file."',
        '".$_POST['email']."',
        '".$_POST['no_hp']."',
    	'".$_POST['publish']."',
        '1',
        'PST')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Selamat Anda Berhasil Mendaftar Sebagai Pemilih Silahkan Tunggu Verifikasi Admin',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'login.php';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Pendaftaran Pemilih Gagal Silahkan Input Data Dengan Benar',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'add_pemilih.php';
          }
      })</script>";
    }
    }elseif(empty($sumber)){
	echo "<script>
	Swal.fire({title: 'Gagal, Scan Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'add_pemilih.php';
		}
	})</script>";
  }
}
     //selesai proses simpan data
