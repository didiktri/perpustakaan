<div class="page-header">
    <h3>Data User</h3>
</div>
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal"><span class="glyphicon glyphicon-plus"></span> User Baru</button>
<br /><br />
<div id="flash-data">
    <?= $this->session->flashdata('massage') ?>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" id="table-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($admin as $a) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a->admin_nama; ?></td>
                    <td><?php echo $a->admin_username; ?></td>
                    <td>
                       <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $a->admin_id; ?>"><span class="glyphicon glyphicon-wrench"></span> Edit</button>
                        <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'user/user_hapus/' . $a->admin_id;
                        ?>"><span
                        class="glyphicon glyphicon-trash"></span>
                    Hapus</a>
                    </td>
                </tr>
            <?php
        }
        ?>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('user/user_add_act'); ?>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php $no = 0;
foreach($admin as $a) : $no++; ?>
<div class="modal fade" id="edit<?php echo $a->admin_id; ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('user/user_update'); ?>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="id" value="<?php echo $a->admin_id; ?>">
                    <input type="text" name="nama" class="form-control" value="<?php echo $a->admin_nama; ?>">
                    <?php echo form_error('admin_nama'); ?>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $a->admin_username; ?>">
                    <?php echo form_error('admin_username'); ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" class="form-control" required>
                    <?php echo form_error('admin_password'); ?>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.setTimeout(function() {
        $('#flash-data').fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>
</div>
<?php endforeach; ?>