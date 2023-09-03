<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
	<?= $this->session->flashdata('msg'); ?>

	<div class="table-responsive">
		<?php if (!empty($data_pengaduan)) : ?>

			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Foto</th>
						<th>Foto Proses</th>
						<th>Laporan</th>
						<th>Petugas</th>
						<th>Telp</th>
						<th>Tgl Pengaduan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($data_pengaduan as $dp) : ?>
						<tr>
							<td><?= $i ?></td>
							<td><?= $dp['nama'] ?></td>
							<td><img height="150" src="<?= base_url() ?>assets/uploads/<?= $dp['foto'] ?>"></td>
							<td><img height="150" src="<?= base_url() ?>assets/uploads/<?= $dp['foto_tanggapan'] ?>"></td>
							<td><?= $dp['isi_laporan'] ?></td>
							<td><?= $dp['nama_petugas'] ?></td>
							<td><?= $dp['telp'] ?></td>
							<td><?= $dp['tgl_pengaduan'] ?></td>
							<td>
								<?= form_open('Admin/TanggapanController/tanggapan_pengaduan_selesai'); ?>
								<input type="hidden" name="id" value="<?= $dp['id_pengaduan'] ?>">
							<?php if ($this->session->userdata('level')=='petugas') {?>
								<button class="btn btn-success" name="selesai">Selesai</button>

							<?php }?>							

								<?= form_close(); ?>
							</td>
						</tr>
					<?php $i++;
					endforeach; ?>
				</tbody>
			</table>

		<?php else : ?>
			<div class="text-center">Belum Ada Pengaduan</div>
		<?php endif; ?>
	</div>

</div>