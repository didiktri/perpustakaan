<div class="page-header">
    <h3>Transaksi Selesai</h3>
</div>
<?php foreach ($transaksi as $t) { ?>
<form action="<?php echo base_url() . 'admin/transaksi_selesai_act'
                    ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $t->transaksi_id ?>">
    <input type="hidden" name="buku" value="<?php echo $t->transaksi_mobil ?>">
    <input type="hidden" name="tgl_kembali" value="<?php echo $t->transaksi_tgl_kembali ?>">
    <input type="hidden" name="denda" value="<?php echo $t->transaksi_denda ?>">
    <div class="form-group">
        <label>Anggota</label>
        <select class="form-control" name="anggota" disabled>
            <option value="">-Pilih Anggota-</option>
            <?php foreach ($anggota as $m) { ?>
            <option <?php if ($t->transaksi_kostumer == $m->anggota_id) {
                                echo "selected='selected'";
                            } ?> value="<?php echo $m->anggota_id; ?>"><?php echo $m->anggota_nama; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Buku</label>
        <select class="form-control" name="buku" disabled>
            <option value="">-Pilih Buku-</option>
            <?php foreach ($buku as $b) { ?>
            <option <?php if ($t->transaksi_mobil == $b->buku_id) {
                                echo "selected='selected'";
                            } ?> value="<?php echo $b->buku_id; ?>"><?php echo $b->judul_buku; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Tanggal Pinjam</label>
        <input class="form-control" type="date" name="tgl_pinjam" value="<?php echo $t->transaksi_tgl_pinjam ?>"
            disabled>
    </div>
    <div class="form-group">
        <label>Tanggal Kembali</label>
        <input class="form-control" type="date" name="tgl_kembali" value="<?php echo $t->transaksi_tgl_kembali ?>"
            disabled>
    </div>
    <!--<div class="form-group">
        <label>Harga</label>
        <input class="form-control" type="number" name="harga" value="<?php echo $t->transaksi_harga ?>" disabled>
    </div>-->
    <div class="form-group">
        <label>Harga Denda / Hari</label>
        <input class="form-control" type="text" name="denda" value="<?php echo $t->transaksi_denda ?>" disabled>
    </div>
    <div class="form-group">
        <label>Tanggal Dikembalikan Oleh Kostumer</label>
        <input class="form-control" type="date" name="tgl_dikembalikan">
        <?php echo form_error('tgl_dikembalikan'); ?>
    </div>
    <div class="form-group">
        <input type="submit" value="Simpan" class="btn btn-primary btn-sm">
    </div>
</form>
<?php } ?>