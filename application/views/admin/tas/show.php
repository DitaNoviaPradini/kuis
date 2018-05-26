
<?php $this->load->view('admin/layout/base_start') ?>

<div class="container">
  <legend>Lihat Tas</legend>
  <div class="content">
    <div class="form-group">
      <label for="nama">Nama Barang</label>
      <p><?php echo $data->nama ?></p>
    </div>
    <div class="form-group">
      <label for="harga">Harga Barang</label>
      <p><?php echo $data->harga ?></p>
    </div>
    <div class="form-group">
      <label for="keterangan">Keterangan Barang</label>
      <p><?php echo $data->keterangan ?></p>
    </div>
    <div class="form-group">
      <label for="foto">Foto</label>
      <p><img src="<?php echo base_url('assets/uploads/').$data->foto; ?>"></p>
      <p><?php echo $data->foto ?></p>
    </div>
    
    <a class="btn btn-info" href="<?php echo site_url('tas/') ?>">Kembali</a>
  </div>
</div>

<?php $this->load->view('admin/layout/base_end') ?>