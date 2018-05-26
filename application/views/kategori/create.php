<?php $this->load->view('layout/base_start') ?>

<div class="container">
  <legend>Tambah Data Kategori</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart('kategori/store'); ?>

	<div class="form-group">
      <label for="Kategori">Kategori Baju</label>
      <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori Buku"
		value="<?php echo set_value('kategori'); ?>">  
    </div>

	<?php echo $error; ?>    

	<a class="btn btn-info" href="<?php echo site_url('kategori/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layout/base_end') ?>