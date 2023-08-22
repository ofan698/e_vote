<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_data WHERE id_data='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Pilih Y Untuk Menghidupkan Tombol Pendaftaran</h3>
	</div>
	<br>
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Pilih N Untuk Mematikan Tombol Pendaftaran</h3>
	</div>
	
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Data</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_data" name="id_data" value="<?php echo $data_cek['id_data']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Data</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_data" name="nama_data" value="<?php echo $data_cek['nama_data']; ?>"
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
			<a href="?page=data-data" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>


<?php

if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        
        $sql_ubah = "UPDATE tb_data SET
            nama_data='".$_POST['nama_data']."',
            publish='".$_POST['publish']."'
            WHERE id_data='".$_POST['id_data']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
        $sql_ubah = "UPDATE tb_data SET
            nama_data='".$_POST['nama_data']."',
            publish='".$_POST['publish']."'
            WHERE id_data='".$_POST['id_data']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-data';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-data';
            }
        })</script>";
    }
}

