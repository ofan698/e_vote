<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Menu Pendaftaran</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id Data</th>
						<th>Nama Data</th>
						<th>Keterangan</th>
						<th>Publish</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_data ");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $data['id_data']; ?>
						</td>
						<td>
							<?php echo $data['nama_data']; ?>
						</td>
						<td>
							<?php echo $data['keterangan']; ?>
						</td>

						<td><span class="badge badge-primary"><?php echo $data['publish']; ?></span></td>
						

						<td>
							<a href="?page=edit-data&kode=<?php echo $data['id_data']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
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