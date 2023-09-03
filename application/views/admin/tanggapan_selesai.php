<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
	<?= $this->session->flashdata('msg'); ?>

	<?php if (!empty($data_pengaduan)) : ?>

		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Nama Petugas</th>
					<th>Foto</th>
					<th>Laporan</th>
					<th>Telp</th>
					<th>Tgl Pengaduan</th>

				</tr>
			</thead>
			<tbody>
				<?php $i = 1;
				foreach ($data_pengaduan as $dp) : ?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $dp['nama'] ?></td>
						<td><?= $dp['nama_petugas'] ?></td>
						<td><img height="150" src="<?= base_url() ?>assets/uploads/<?= $dp['foto'] ?>" class="img-thumbnail"></td>
						<td><?= $dp['isi_laporan'] ?></td>
						<td><?= $dp['telp'] ?></td>
						<td><?= $dp['tgl_pengaduan'] ?></td>
					</tr>
				<?php $i++;
				endforeach; ?>
			</tbody>
		</table>

	<?php else : ?>
		<div class="text-center">Belum Ada Pengaduan</div>
	<?php endif; ?>

</div>