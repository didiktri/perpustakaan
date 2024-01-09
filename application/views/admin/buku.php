<div class="page-header">
    <h3>Data Buku</h3>
</div>
<a href="<?php echo base_url() . 'admin/buku_add'; ?>" class="btn
	btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span>
Buku Baru</a>
<br /><br />
<div id="flash-data">
    <?= $this->session->flashdata('massage') ?>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" id="table-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Buku</th>
                <!--<th>Dipinjam</th>-->
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($buku as $b) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $b->judul_buku; ?></td>
                    <td><?php echo $b->pengarang; ?></td>
                    <td><?php echo $b->penerbit; ?></td>
                    <td><?php echo $b->tahun_terbit; ?></td>
                    <td><?php echo $b->jumlah_buku; ?></td>
                    <!--<td>
                        <?php
                        
                        $dd = $this->db->query("SELECT * FROM transaksi WHERE transaksi_status = '2'");
                        if($dd->num_rows() > 0 )
                        {
                            echo $dd->num_rows();
                        }else{
                            echo '0';
                        }
                        ?>
                    </td>-->
                    <td>
                        <?php
                        if ($b->buku_status == "1") {
                            echo "Tersedia";
                        } else if ($b->buku_status == "2") {
                            echo "Di Pinjam";
                        }
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="<?php echo base_url() . 'admin/buku_edit/' . $b->buku_id;
                        ?>"><span class="glyphicon glyphicon-wrench"></span>
                    Edit</a>
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'admin/buku_hapus/' . $b->buku_id;
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

<script type="text/javascript">
    window.setTimeout(function() {
        $('#flash-data').fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>
</div>