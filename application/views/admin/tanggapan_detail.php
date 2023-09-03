<!-- Begin Page Content -->
<div class="container-fluid mb-2">

  <!-- Page Heading -->
  <a href="<?= base_url('Admin/TanggapanController') ?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>') ?>
  <?= $this->session->flashdata('msg'); ?>

  <div class="card no-border mb-3 col-lg-8">
    <div class="justify-content-center">
      <div class="">
        <h3 class="mt-2 mb-2"></h3>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-md-6 text-center">
        <img src="<?= base_url() ?>assets/uploads/<?= $data_pengaduan['foto'] ?>" alt="" class="mt-2 mb-2" width="250">
      </div>

      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title">Tgl Pengaduan : <?= $data_pengaduan['tgl_pengaduan']; ?></h5>
          <p class="card-text">Status : <?= $data_pengaduan['status'] == 0 ? 'Belum di verifikasi' : ''; ?></p>
          <p class="card-text"><small class="text-muted">Laporan : <?= $data_pengaduan['isi_laporan'] ?></small></p>
        </div>
      </div>
    </div>
  </div>


  
<?php if ($this->session->userdata('level')=='petugas') {?>
  <h1 class="h3 mb-4 text-gray-800">Masukan Tanggapan Anda</h1>
  <div class="row">
    <div class="col-lg-6">
      <?= form_open('Admin/TanggapanController/tambah_tanggapan'); ?>
      <input type="hidden" name="id" value="<?= $data_pengaduan['id_pengaduan']; ?>">
      <label for="status">Status Tanggapan</label>
      <div class="form-group">
        <select class="form-control" name="status" id="status">
          <option value="proses">Proses</option>
          <option value="selesai">Selesai</option>
          <option value="pending">Pending</option>
        </select>
      </div>
      <div class="form-group" id="foto" style="display: block;" >
        <label for="foto">Upload Foto</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="foto" name="foto">
          <label class="custom-file-label" for="foto">Choose file</label>
        </div>
      </div>


      <div class="form-group" id="tanggapan" style="display: none;">
        <label for="tanggapan">Tanggapan</label>
        <textarea name="tanggapan" class="form-control" id="tanggapan" cols="30" rows="10"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      <?= form_close(); ?>
    </div>
  </div>
  <?php }?>

</div>

<!-- /.container-fluid -->
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const statusDropdown  = document.getElementById('status');
    const uploadFoto = document.getElementById("foto");
    const tanggapan = document.getElementById("tanggapan");

    // Tampilkan input file ketika status yang bukan "Pending" dipilih
    statusDropdown.addEventListener("change", function () {
    // Cek apakah opsi yang dipilih adalah "Pending"
    if (statusDropdown.value === "pending") {
      // Sembunyikan uploadFoto dan tampilkan tanggapan
      uploadFoto.style.display = "block";
      tanggapan.style.display = "block";
    } else {
      // Jika opsi yang dipilih bukan "Pending", kembalikan tampilan ke semula (jika diperlukan)
      uploadFoto.style.display = "block";
      tanggapan.style.display = "none";
    }
  });
  });
</script>