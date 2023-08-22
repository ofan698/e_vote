<?php

	$data_id = $_SESSION["ses_id"];

	$sql = $koneksi->query("select * from tb_pengguna where id_pengguna=$data_id"); 
	while ($data= $sql->fetch_assoc()) {

	$status=$data['status'];

}
?>
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
<form action="" method="post" enctype="multipart/form-data">
<div class="container">
        <div class="jumbotron bg-primary text-white">
            <h1 class="display-4">Hello, <b><?= $_SESSION['ses_username'] ?></b></h1>
            <p class="lead"> Selamat datang, anda berhasil Login sebagai <b><?= $_SESSION['ses_username'] ?></b> </p>
        </div>
<div class="card">
            <div class="card-header bg-primary text-white">
                Ganti Password (*abaikan jika tidak ingin ganti password)
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <input type="hidden" name="username" value="<?= $_SESSION['ses_username'] ?>">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Input Password">
                    </div>
                    <!-- <div class="form-group">
                        <label>Masukkan Password Baru Anda!</label>
                        <input type="password" class="form-control" name="pass_baru" required>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru Anda!</label>
                        <input type="password" class="form-control" name="konfirmasi_pass" required>
                    </div> --> 
                    <button type="submit" class="btn btn-primary">Proses</button>
                    </form>
            </div>
        </div>
    </div>

<?php


    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_pengguna SET
        password='".$_POST['password']."'
        WHERE id_pengguna= '".$_POST['id_pengguna']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php';
        }
      })</script>";
    }}
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