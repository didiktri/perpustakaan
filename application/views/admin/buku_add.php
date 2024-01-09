<div class="page-header">
    <h3>Buku Baru</h3>
</div>
<form action="<?php echo base_url() . 'admin/buku_add_act' ?>" method="post">
    <div class="form-group">
        <label>Judul Buku</label>
        <input type="text" name="judulbuku" class="form-control">
        <?php echo form_error('judul_buku'); ?>
    </div>
    <div class="form-group">
        <label>Pengarang</label>
        <input type="text" name="pengarang" class="form-control">
    </div>
    <div class="form-group">
        <label>Penerbit</label>
        <input type="text" name="penerbit" class="form-control">
    </div>
    <div class="form-group">
        <label>Tahun Terbit</label>
        <input type="text" name="tahun" class="form-control">
    </div>
    <div class="form-group">
        <label>Jumlah buku</label>
        <input type="text" name="jumlah" class="form-control">
    </div>
    <div class="form-group">
        <label>Status Buku</label>
        <select name="status" class="form-control">
            <option value="1">Tersedia</option>
            <option value="2">Di Pinjam</option>
        </select>
        <?php echo form_error('status'); ?>
    </div>
    <div class="form-group">
        <input type="submit" value="Simpan" class="btn btn-primary">
    </div>
    </div>
</form>