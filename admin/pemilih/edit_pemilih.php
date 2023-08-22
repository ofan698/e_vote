<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'";
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

			<input type='hidden' class="form-control" name="id_pengguna" value="<?php echo $data_cek['id_pengguna']; ?>"
			 readonly/>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama User</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data_cek['nama_pengguna']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="username" name="username" value="<?php echo $data_cek['username']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="pass" name="password" value="<?php echo $data_cek['password']; ?>"
					/>
					<input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
				</div>
			</div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Foto KTM</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="foto_pengguna" name="foto_pengguna" value="<?php echo $data_cek['foto_pengguna']; ?>"
          />
          <input type="file" id="foto_pengguna" name="foto_pengguna">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
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
			<a href="?page=data-pemilih" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>



<?php

$sumber = @$_FILES['foto_pengguna']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['foto_pengguna']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Ubah'])){
      
      if(!empty($sumber)){
        $foto= $data_cek['foto_pengguna'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

    $sql_ubah = "UPDATE tb_pengguna SET
        nama_pengguna='".$_POST['nama_pengguna']."',
        username='".$_POST['username']."',
        password='".$_POST['password']."',
        foto_pengguna='".$nama_file."',
        email='".$_POST['email']."',
        no_hp='".$_POST['no_hp']."',
        publish='".$_POST['publish']."'
        WHERE id_pengguna='".$_POST['id_pengguna']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    
    }elseif(empty($sumber)){
        $sql_ubah = "UPDATE tb_pengguna SET
            nama_pengguna='".$_POST['nama_pengguna']."',
            username='".$_POST['username']."',
            password='".$_POST['password']."',
            email='".$_POST['email']."',
            no_hp='".$_POST['no_hp']."',
            publish='".$_POST['publish']."'
            WHERE id_pengguna='".$_POST['id_pengguna']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemilih';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemilih';
        }
      })</script>";
    }
  }
?>

<script type="text/javascript">
    function change()
    {
    var x = document.getElementById('pass').type;

    if (x == 'password')
    {
        document.getElementById('pass').type = 'text';
        document.getElementById('mybutton').innerHTML;
    }
    else
    {
        document.getElementById('pass').type = 'password';
        document.getElementById('mybutton').innerHTML;
    }
    }
</script>