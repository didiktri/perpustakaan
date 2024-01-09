<div class="page-header">
    <h3>Edit Buku</h3>
</div>
<?php foreach($buku as $b){ ?>
<form action="<?php echo base_url().'admin/buku_update' ?>" method="post">
    <div class="form-group">
        <label>Judul Buku</label>
        <input type="hidden" name="id" value="<?php echo $b->buku_id; ?>">
        <input class="form-control" type="text" name="judulbuku" value="<?php echo $b->judul_buku; ?>">
        <?php echo form_error('judul_buku'); ?>
    </div>
    <div class="form-group">
        <label>Pengarang</label>
        <input class="form-control" type="text" name="pengarang" value="<?php echo $b->pengarang; ?>">
    </div>
    <div class="form-group">
        <label>Penerbit</label>
        <input class="form-control" type="text" name="penerbit" value="<?php echo $b->penerbit; ?>">
    </div>
    <div class="form-group">
        <label>Tahun Terbit</label>
        <input class="form-control" type="text" name="tahun" value="<?php echo $b->tahun_terbit; ?>">
    </div>
    <div class="form-group">
        <label>Jumlah Buku</label>
        <input class="form-control" type="text" name="jumlah" value="<?php echo $b->jumlah_buku; ?>">
    </div>
    <div class="form-group">
        <label>Status Buku</label>
        <select name="status" class="form-control">
            <option <?php if($b->buku_status == "1"){echo
				"selected='selected'";} echo $b->tahun_terbit; ?> value="1">Tersedia</option>
            <option <?php if($b->buku_status == "2"){echo
					"selected='selected'";} echo $b->tahun_terbit; ?> value="2">Di
                Pinjam</option>
        </select>
        <?php echo form_error('status'); ?>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary">
    </div>
</form>
<?php } ?>