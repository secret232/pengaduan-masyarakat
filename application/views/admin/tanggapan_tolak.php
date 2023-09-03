<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
	<?= $this->session->flashdata('msg'); ?>

	<?php if (!empty($data_pengaduan)) : ?>

		<div class="table-responsive">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">Laporan</th>
						<th scope="col">Telp</th>
						<th scope="col">Tgl Pengaduan</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data_pengaduan as $key => $dp) : ?>
						<tr>
							<th scope="row"><?= $key + 1; ?></th>
							<td><?= $dp['nama'] ?></td>
							<td><?= $dp['isi_laporan'] ?></td>
							<td><?= $dp['telp'] ?></td>
							<td><?= $dp['tgl_pengaduan'] ?></td>
							<td>
								<button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $dp['id_pengaduan'] ?>">Edit</button>
							</td>
						</tr>

						<!-- Modal untuk edit data -->
						<div class="modal fade" id="editModal<?= $dp['id_pengaduan'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $dp['id_pengaduan'] ?>" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editModalLabel<?= $dp['id_pengaduan'] ?>">Edit Pengaduan</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<!-- Form edit pengaduan di sini -->
										<?= form_open('Admin/EditPengaduanController/update/' . $dp['id_pengaduan']); ?>
										<div class="form-group">
											<label for="isi_laporan_edit<?= $dp['id_pengaduan'] ?>">Isi Laporan</label>
											<textarea name="isi_laporan_edit<?= $dp['id_pengaduan'] ?>" id="isi_laporan_edit<?= $dp['id_pengaduan'] ?>" cols="30" rows="5" class="form-control"><?= $dp['isi_laporan'] ?></textarea>
										</div>
										<div class="form-group">
											<label for="telp_edit<?= $dp['id_pengaduan'] ?>">Telp</label>
											<input type="text" name="telp_edit<?= $dp['id_pengaduan'] ?>" id="telp_edit<?= $dp['id_pengaduan'] ?>" class="form-control" value="<?= $dp['telp'] ?>">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Update</button>
									</div>
									<?= form_close(); ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	<?php else : ?>
		<div class="text-center">Belum Ada Pengaduan</div>
	<?php endif; ?>

</div>
<!-- /.container-fluid -->