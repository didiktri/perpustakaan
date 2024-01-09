<div class="page-header">
    <h3>Data Anggota</h3>
</div>

<a href="<?php echo base_url() . 'admin/anggota_add'; ?>" class="btn btn-sm btn-primary"><span
        class='glyphicon glyphicon-plus'></span> Anggota Baru</a>
<br />
<br />
<div id="flash-data">
    <?= $this->session->flashdata('massage') ?>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped" id="table-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No.HP</th>
                <th>No.KTP</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($anggota as $m) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $m->anggota_nama ?></td>
                <td><?php echo $m->anggota_jk ?></td>
                <td><?php echo $m->anggota_alamat ?></td>
                <td><?php echo $m->anggota_hp ?></td>
                <td><?php echo $m->anggota_ktp ?></td>
                <td>
                    <a class="btn btn-sm btn-warning"
                        href="<?php echo base_url() . 'admin/anggota_edit/' . $m->anggota_id; ?>"><span
                            class="glyphicon glyphicon-wrench"></span> Edit</a>
                    <a class="btn btn-sm btn-danger"
                        href="<?php echo base_url() . 'admin/anggota_hapus/' . $m->anggota_id; ?>"><span
                            class="glyphicon glyphicon-trash"></span> Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script type="text/javascript">
    window.setTimeout(function() {
        $('#flash-data').fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
    </script>
</div>