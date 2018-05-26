<?php $this->load->view('admin/layout/base_start') ?>
<div class="container">
  <legend>Daftar Tas</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Keterangan</th>
        <th width="200">Foto</th>
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('tas/create/') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <tbody>
        <?php $number = 1; foreach($tas as $row) { ?>
        <tr>
          <td>
            <a href="<?php echo site_url('tas/show/'.$row->id_barang) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('tas/show/'.$row->id_barang) ?>">
              <?php echo $row->nama ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('tas/show/'.$row->id_barang) ?>">
              <?php echo $row->harga ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('tas/show/'.$row->id_barang) ?>">
              <?php echo $row->keterangan ?>
            </a>
          </td>
          <td>
              <img src="<?php echo base_url('assets/uploads/').$row->foto; ?>" style="display:block; width:100%; height:100%;">
          </td>
          <td>
            <?php echo form_open('tas/destroy/'.$row->id_barang); ?>
            <a class="btn btn-info" href="<?php echo site_url('tas/edit/'.$row->id_barang) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php echo $links ?>
  </div>
</div>

<?php $this->load->view('admin/layout/base_end') ?>