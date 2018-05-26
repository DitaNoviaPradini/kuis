<?php $this->load->view('layout/base_start') ?>

<div class="container">
  <legend>Edit Data Kategori</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart('kategori/update/'.$data->id_barang); ?>

    <?php echo form_hidden('id_barang', $data->id_barang) ?>
    
  	<div class="form-group">
      <label for="Kategori">Kategori Baju</label>
      <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori Baju"
        value="<?php echo $data->gelar ?>">
    </div>

    <?php echo $error;?>

    <a class="btn btn-info" href="<?php echo site_url('kategori/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>

  <?php echo form_close(); ?>
  </div>
</div>

