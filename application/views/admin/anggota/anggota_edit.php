<div class="page-header">
    <h3>Edit Anggota</h3>
</div>
<?php foreach ($anggota as $m) { ?>
    <form action="<?php echo base_url() . 'admin/anggota_update' ?>" method="post">
        <div class="form-group">
            <label>Nama</label>
            <input type="hidden" name="id" value="<?php echo $m->anggota_id; ?>">
            <input type="text" name="nama" value="<?php echo $m->anggota_nama; ?>" class="form-control" required>
            <?php echo form_error('anggota_nama'); ?>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required><?php echo $m->anggota_alamat; ?></textarea>
        </div>

        <div class="form-group">
            <label>No.HP</label>
            <input type="number" name="hp" value="<?php echo $m->anggota_hp; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>No.KTP</label>
            <input type="number" name="ktp" value="<?php echo $m->anggota_ktp; ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-primary">
        </div>
        </div>
    </form>
<?php } ?>