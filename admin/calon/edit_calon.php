<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<input type='hidden' class="form-control" name="id_calon" value="<?php echo $data_cek['id_calon']; ?>"
			 readonly/>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Urut</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_urut" name="no_urut"  value="<?php echo $data_cek['no_urut']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Calon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_calon" name="nama_calon" value="<?php echo $data_cek['nama_calon']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Kandidat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="foto_calon" name="foto_calon" value="<?php echo $data_cek['foto_calon']; ?>"
					/>
					<input type="file" id="foto_calon" name="foto_calon">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto KTM</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="foto_ktm" name="foto_ktm" value="<?php echo $data_cek['foto_ktm']; ?>"
					/>
					<input type="file" id="foto_ktm" name="foto_ktm">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Transkrip</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="foto_transkrip" name="foto_transkrip" value="<?php echo $data_cek['foto_transkrip']; ?>"
					/>
					<input type="file" id="foto_transkrip" name="foto_transkrip">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto LK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="foto_lk" name="foto_lk" value="<?php echo $data_cek['foto_lk']; ?>"
					/>
					<input type="file" id="foto_lk" name="foto_lk">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Visi & Misi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Riwayat Organisasi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="riwayat" name="riwayat" value="<?php echo $data_cek['riwayat']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email Aktif</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="email" name="email" value="<?php echo $data_cek['email']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>"
					/>
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
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
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

	if (isset ($_POST['Ubah'])){

    	if(!empty($sumber)){
        	$foto= $data_cek['foto_calon'];
        	$foto1= $data_cek1['foto_ktm'];
        	$foto2= $data_cek2['foto_transkrip'];
        	$foto3= $data_cek3['foto_lk'];
            	if (file_exists("foto/$foto")){
            	unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_calon SET
            no_urut='".$_POST['no_urut']."',
            nama_calon='".$_POST['nama_calon']."',
            foto_calon='".$nama_file."',
            foto_ktm='".$nama_file1."',
            foto_transkrip='".$nama_file2."',
            foto_lk='".$nama_file3."',
            keterangan='".$_POST['keterangan']."',
            riwayat='".$_POST['riwayat']."',
            email='".$_POST['email']."',
            no_hp='".$_POST['no_hp']."',
			publish='".$_POST['publish']."'
            WHERE id_calon='".$_POST['id_calon']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
        $sql_ubah = "UPDATE tb_calon SET
            no_urut='".$_POST['no_urut']."',
            nama_calon='".$_POST['nama_calon']."',
            keterangan='".$_POST['keterangan']."',
            riwayat='".$_POST['riwayat']."',
            email='".$_POST['email']."',
            no_hp='".$_POST['no_hp']."',
			publish='".$_POST['publish']."'
            WHERE id_calon='".$_POST['id_calon']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-calon';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-calon';
            }
        })</script>";
    }
}

