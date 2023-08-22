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
			<a href="?page=data-pemilih-panitia" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>



<?php

$sumber = @$_FILES['foto_pengguna']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['foto_pengguna']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Ubah'])){
      
    $sql_ubah = "UPDATE tb_pengguna SET
        publish='".$_POST['publish']."'
        WHERE id_pengguna='".$_POST['id_pengguna']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    
    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemilih-panitia';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemilih-panitia';
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