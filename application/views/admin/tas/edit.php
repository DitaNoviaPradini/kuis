
<?php $this->load->view('admin/layout/base_start') ?>

<div class="container">
  <legend>Edit Data Tas Export</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">

  <?php echo form_open('tas/update/'.$data->id_barang); ?>

    <?php echo form_hidden('id_barang', $data->id_barang) ?>

    <div class="form-group">
      <label for="nama">Nama Barang</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Barang" value="<?php echo $data->nama ?>">
    </div>

    <div class="form-group">
      <label for="harga">Harga Barang</label>
      <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Barang" value="<?php echo $data->harga ?>">
    </div>

    <div class="form-group">
      <label for="keterangan">Keterangan Barang</label>
      <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan Barang" value="<?php echo $data->keterangan ?>">
    </div>

    <div class="form-group">
		<label for="foto">Foto</label>
	  <input type="file" name="foto" size="20" value="<?php echo $data->foto; ?>">
	</div>

    <a class="btn btn-info" href="<?php echo site_url('tas/') ?>">Kembali</a>
    <button type="submit" name="simpan" class="btn btn-primary">OK</button>

  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('admin/layout/base_end') ?>