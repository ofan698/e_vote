<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Calon Kandidat Ketua BEM Fakultas Ilmu Komputer </h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No urut</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="no_urut" name="no_urut" placeholder="Nomor Urut" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kandidat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_calon" name="nama_calon" placeholder="Nama Calon">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Kandidat</label>
				<div class="col-sm-6">
					<input type="file" id="foto_calon" name="foto_calon">
					<p class="help-block">
						<font color="red">"Format file Jpg"</font>
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
					<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
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
                    <option>Y</option>
                    <option>N</option>
                  </select>
			  </div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-calon" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
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
        $sql_simpan = "INSERT INTO tb_calon (no_urut, nama_calon, foto_calon, foto_ktm, foto_transkrip, foto_lk, keterangan, riwayat, email, no_hp, publish) VALUES (
        '".$_POST['no_urut']."',
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
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-calon';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-calon';
          }
      })</script>";
	}
}elseif(empty($sumber)){
	echo "<script>
	Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?page=add-calon';
		}
	})</script>";
  }
}   
