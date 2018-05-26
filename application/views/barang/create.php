<?php $this->load->view('admin/layout/base_start') ?>

<div class="container">
  <legend>Tambah Data Barang</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart('barang/store'); ?>

    <div class="form-group">
      <label for="Nama">Nama Barang</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Barang"
		value="<?php echo set_value('nama'); ?>">  
    </div>
	<div class="form-group">
		<label for="Foto">Foto</label>
	  <input type="file" name="foto" size="20" value="<?php echo set_value('foto'); ?>">
	</div>
	<div class="form-group">
    <label for="Kategori">Kategori Barang</label>
    <select class="form-control" id="kategori" name="kategori">
    
    <?php foreach($data as $row) { ?>
      <option value="<?php echo $row->id_kategori ?>"><?php echo $row->kategori ?></option>
    <?php } ?>
    
    </select>
  </div>

	<?php echo $error; ?>    

	<a class="btn btn-info" href="<?php echo site_url('buku/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layout/base_end') ?>