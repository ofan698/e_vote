<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kandidat Ketua BEM Fakultas Ilmu Komputer</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-calon" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>No Urut Kandidat</th>
						<th>Nama Kandidat</th>
						<th>Foto Kandidat</th>
						<th>Foto KTM</th>
						<th>Foto Transkrip</th>
						<th>Foto LK</th>
						<th>Visi & Misi</th>
						<th>Riwayat Organisasi</th>
						<th>Email Aktif</th>
						<th>No HP</th>
						<th>Publish</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_calon ");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $data['id_calon']; ?>
						</td>
						<td>
							<?php echo $data['no_urut']; ?>
						</td>
						<td>
							<?php echo $data['nama_calon']; ?>
						</td>
						<td align="center">
							<a href="foto/<?php echo $data['foto_calon']; ?>" width="150px" class="MagicZoom" rel="zoom-id:zoom;opacity-reverse:true;">
							<img src="foto/<?php echo $data['foto_calon']; ?>" width="150px" />
						</td>

						<td align="center">
							<a href="foto/<?php echo $data['foto_ktm']; ?>" class="MagicZoom" rel="zoom-id:zoom;opacity-reverse:true;">
							<img src="foto/<?php echo $data['foto_ktm']; ?>" width="150px" />
						</td>

						<td align="center">
							<a href="foto/<?php echo $data['foto_transkrip']; ?>" class="MagicZoom" rel="zoom-id:zoom;opacity-reverse:true;">
							<img src="foto/<?php echo $data['foto_transkrip']; ?>" width="150px" />
						</td>

						<td align="center">
							<a href="foto/<?php echo $data['foto_lk']; ?>" class="MagicZoom" rel="zoom-id:zoom;opacity-reverse:true;">
							<img src="foto/<?php echo $data['foto_lk']; ?>" width="150px" />
						</td>

						<td>
							<?php echo $data['keterangan']; ?>
						</td>
						<td><?php echo $data['riwayat']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['no_hp']; ?></td>
						<td><span class="badge badge-primary"><?php echo $data['publish']; ?></span></td>
						

						<td>
							<a href="?page=edit-calon&kode=<?php echo $data['id_calon']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-calon&kode=<?php echo $data['id_calon']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</a>
							<a href="?page=detail-calon&kode=<?php echo $data['id_calon']; ?>"
							 title="Detail" class="btn btn-primary btn-sm">
								<i class="fa fa-address-card"></i>
							</a>
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