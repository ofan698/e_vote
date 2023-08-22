<?php

?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
<center><img src="dist/img/logo.png" width="123" />&nbsp;<i class="fa fa-"></i>&nbsp;Laporan Hasil Pemungutan Suara Pemilihan Ketua BEM ( Badan Eksekutif Mahasiswa )</h3></center>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kandidat</th>
						<th>ID Si Pemilih</th>
						<th>Waktu Memilih</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select c.nama_calon, v.id_pemilih, v.date 
					from tb_calon c join tb_vote v on 
					c.id_calon=v.id_calon");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_calon']; ?>
						</td>
						<td>
							<?php echo $data['id_pemilih']; ?>
						</td>
						<td>
							<?php echo $data['date']; ?>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->

	               <script>
        window.print();
    </script>