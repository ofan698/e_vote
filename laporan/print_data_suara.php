<?php
  $sql = $koneksi->query("SELECT COUNT(ID_CALON) as tot_calon  from tb_calon");
  while ($data= $sql->fetch_assoc()) {
    $calon=$data['tot_calon'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as tot_pemilih  from tb_pengguna where level='Pemilih'");
  while ($data= $sql->fetch_assoc()) {
    $pemilih=$data['tot_pemilih'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as sudah  from tb_pengguna where level='Pemilih' and status='0'");
  while ($data= $sql->fetch_assoc()) {
    $sudah=$data['sudah'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as belum  from tb_pengguna where level='Pemilih' and status='1'");
  while ($data= $sql->fetch_assoc()) {
    $belum=$data['belum'];
  }

?>
<?php
$koneksi = new mysqli ("localhost","root","","db_vote");
?>
<div class="realtime">
	<div class="card card-info autoload">
		<div class="card-header">
			<h3 class="card-title">
				<center><img src="dist/img/logo.png" width="123" />&nbsp;<i class="fa fa-"></i>&nbsp;Laporan Hasil Pemungutan Suara Pemilihan Ketua BEM ( Badan Eksekutif Mahasiswa )</h3></center>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No Urut</th>
							<th>Nama Kandidat</th>
							<th>
								<center>Foto Kandidat</center>
							</th>
							<th>Jumlah Suara</th>
						</tr>
					</thead>
					<tbody>

						<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_calon WHERE publish = 'Y' ");
					while ($data= $sql->fetch_assoc()) {

						$id_calon = $data["id_calon"];
					?>

						<tr>
							<td>
								<?php echo $data['id_calon']; ?>
							</td>
							<td>
								<?php echo $data['nama_calon']; ?>
							</td>
							<td align="center">
								<img src="foto/<?php echo $data['foto_calon']; ?>" width="150px" />
							</td>
							<td>
								<h4>
									<?php
								$sql_hitung = "SELECT COUNT(id_vote) from tb_vote  where id_calon='$id_calon'";
								$q_hit= mysqli_query($koneksi, $sql_hitung);
								while($row = mysqli_fetch_array($q_hit)) {
								echo $row[0]." Suara";
								}
							?>
								</h4>
							</td>
						</tr>

						<?php
						}
						?>
					</tbody>
					</tfoot>
				</table>
				<table class="table table-bordered table-striped"border="1">
  					<tr>
    				<td align="center">Jumlah Mahasiswa Sudah Memilih 
    					<span class=""><b><?php echo $sudah; ?></b></span></td>
    					
    				<td align="center">Jumlah Mahasiswa Belum Memilih
    					<span class=""><b><?php echo $belum; ?></b></span></td>
    					
  					</tr>
				</table>
				
			</div>
		</div>
		<!-- /.card-body -->
	</div>
	      <script>
        window.print();
    </script>