<?php $this->load->view('layout/base_start') ?>

<div class="container">
  <legend>Edit Data Barang</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart('barang/update/'.$data->id_barang); ?>

    <?php echo form_hidden('id_barang', $data->id_barang) ?>
    <div class="form-group">
      <label for="Nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Barang"
        value="<?php echo $data->nama ?>">
    </div>
    <div class="form-group">
		  <label for="Foto">Foto</label>
      <p><img src="<?php echo base_url('assets/uploads/').$data->foto; ?>"></p>
	  	<input type="file" name="foto" size="20">
	  </div>
  	<div class="form-group">
      <label for="Kategori">Kategori Buku</label>
      <select class="form-control" id="kategori" name="kategori">
      
      <?php
        foreach($datakat as $rowkat) {
          $s='';
            if($data->id_barang == $rowkat->id_barang)
            { $s='selected'; }
      ?>
        <option value="<?php echo $rowkat->id_barang ?>" <?php echo $s ?>>
          <?php echo $rowkat->kategori ?>
        </option>
      <?php } ?>
      
      </select>
    </div>

    <?php echo $error;?>

    <a class="btn btn-info" href="<?php echo site_url('buku/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>

  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('layout/base_end') ?>