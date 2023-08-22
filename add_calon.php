
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
			<i class="fa fa-edit"></i>Pendaftaran Calon Kandidat Ketua BEM</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_calon" name="nama_calon" placeholder="Nama Calon">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Calon Ketua BEM</label>
				<div class="col-sm-6">
					<input type="file" id="foto_calon" name="foto_calon">
					<p class="help-block">
						<font color="red">* Format File Images</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Scan Foto KTM Calon Ketua BEM</label>
				<div class="col-sm-6">
					<input type="file" id="foto_ktm" name="foto_ktm">
					<p class="help-block">
						<font color="red">* Format File Images</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Scan Transkrip Calon Ketua BEM</label>
				<div class="col-sm-6">
					<input type="file" id="foto_transkrip" name="foto_transkrip">
					<p class="help-block">
						<font color="red">* Format File Images</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto LK</label>
				<div class="col-sm-6">
					<input type="file" id="foto_lk" name="foto_lk">
					<p class="help-block">
						<font color="red">* Format File Images</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Visi & Misi</label>
				<div class="col-sm-6">
                  <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan"></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Riwayat Organisasi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="riwayat" name="riwayat" placeholder="Riwayat Organisasi">
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
	$sumber = @$_FILES['foto_calon']['tmp_name'];
    $target = 'foto/';
    $nama_file = @$_FILES['foto_calon']['name'];
    $pindah = move_uploaded_file($sumber, $target.$nama_file);
	$sumber1 = @$_FILES['foto_ktm']['tmp_name'];
    $target1 = 'foto/';
    $nama_file1 = @$_FILES['foto_ktm']['name'];
    $pindah1 = move_uploaded_file($sumber1, $target1.$nama_file1);
	$sumber2 = @$_FILES['foto_transkrip']['tmp_name'];
    $target2 = 'foto/';
    $nama_file2 = @$_FILES['foto_transkrip']['name'];
    $pindah2 = move_uploaded_file($sumber2, $target2.$nama_file2);
	$sumber3 = @$_FILES['foto_lk']['tmp_name'];
    $target3 = 'foto/';
    $nama_file3 = @$_FILES['foto_lk']['name'];
    $pindah3 = move_uploaded_file($sumber3, $target3.$nama_file3);

    if (isset ($_POST['Simpan'])){

		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tb_calon (nama_calon, foto_calon, foto_ktm, foto_transkrip, foto_lk, keterangan, riwayat, email, no_hp, publish) VALUES (
        '".$_POST['nama_calon']."',
        '".$nama_file."',
        '".$nama_file1."',
        '".$nama_file2."',
        '".$nama_file3."',
        '".$_POST['keterangan']."',
		'".$_POST['riwayat']."',
		'".$_POST['email']."',
		'".$_POST['no_hp']."',
		'".$_POST['publish']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Pendaftaran Sebagai Kandidat Berhasil Silahkan Tunggu Verifikasi Admin Melalui Email atau Telpon',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'login.php';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Mendaftar Sebagai Kandidat Gagal Silahkan Input Data Dengan Benar',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'add_calon.php';
          }
      })</script>";
	}
}elseif(empty($sumber)){
	echo "<script>
	Swal.fire({title: 'Gagal, Scan Foto Anda Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'add_calon.php';
		}
	})</script>";
  }
}   
