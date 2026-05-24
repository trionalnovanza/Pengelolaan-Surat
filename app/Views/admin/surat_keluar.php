<?php
$baseUrl = base_url();
$dataSuratKeluar = $data_surat_keluar ?? [];
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-red">
            <div class="panel-heading">
                <?= 'Daftar ' . esc($judul) ?>&nbsp;&nbsp;
                <button class="btn btn-warning" data-toggle="modal" data-target="#tambah_surat_keluar">
                    <i class="fa fa-envelope"></i> Tambah <?= esc($judul) ?>
                </button>
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Tanggal Kirim</th>
                        <th>Tujuan</th>
                        <th>Perihal</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataSuratKeluar as $suratKeluar): ?>
                        <tr>
                            <td class="text-center" style="vertical-align: middle;"><?= esc($suratKeluar->nomor_surat) ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= esc($suratKeluar->tgl_kirim) ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= esc($suratKeluar->tujuan) ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= esc($suratKeluar->perihal) ?></td>
                            <td class="text-center" style="vertical-align: middle;">
                                <a href="<?= base_url('uploads/' . $suratKeluar->file_surat) ?>" class="btn btn-info btn-sm">Lihat</a>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubah_surat_keluar" onclick="ubah_surat(<?= $suratKeluar->id_surat ?>)">Ubah</button>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah_file_surat_keluar" onclick="ubah_surat(<?= $suratKeluar->id_surat ?>)">Ubah Surat</button>
                                <a href="<?= base_url('home/hapus_surat_keluar/' . $suratKeluar->id_surat) ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah_surat_keluar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?= base_url('home/tambah_surat_keluar') ?>" method="post"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Tambah <?= esc($judul) ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nomor Surat</label>
                        <input class="form-control" type="text" name="nomor_surat" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kirim</label>
                        <input class="form-control" type="date" name="tgl_kirim" required>
                    </div>
                    <div class="form-group">
                        <label>Tujuan</label>
                        <input class="form-control" type="text" name="tujuan" required>
                    </div>
                    <div class="form-group">
                        <label>Perihal</label>
                        <textarea class="form-control" rows="1" name="perihal" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>File Surat</label>
                        <input class="form-control" type="file" accept="application/pdf" name="file_surat" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                    <input type="submit" value="Tambah <?= esc($judul) ?>" name="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ubah_surat_keluar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?= base_url('home/ubah_surat_keluar') ?>" method="post"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Ubah <?= esc($judul) ?></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ubah_id_surat" id="ubah_id_surat">
                    <div class="form-group">
                        <label>Nomor Surat</label>
                        <input class="form-control" type="text" name="ubah_nomor_surat" id="ubah_nomor_surat" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kirim</label>
                        <input class="form-control" type="date" name="ubah_tgl_kirim" id="ubah_tgl_kirim" required>
                    </div>
                    <div class="form-group">
                        <label>Tujuan</label>
                        <input class="form-control" type="text" name="ubah_tujuan" id="ubah_tujuan" required>
                    </div>
                    <div class="form-group">
                        <label>Perihal</label>
                        <textarea class="form-control" rows="1" name="ubah_perihal" id="ubah_perihal"
                                  required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                    <input type="submit" value="Ubah <?= esc($judul) ?>" name="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ubah_file_surat_keluar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?= base_url('home/ubah_file_surat_keluar') ?>" method="post"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Ubah File <?= esc($judul) ?></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ubah_file_surat_id" id="ubah_file_surat_id">
                    <div class="form-group">
                        <label>File Surat</label>
                        <input class="form-control" type="file" accept="application/pdf" name="ubah_file_surat"
                               required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                    <input type="submit" value="Ubah File <?= esc($judul) ?>" name="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function ubah_surat(id_surat) {
        const fields = [
            '#ubah_id_surat',
            '#ubah_nomor_surat',
            '#ubah_tgl_kirim',
            '#ubah_tujuan',
            '#ubah_perihal',
            '#ubah_file_surat_id'
        ];

        fields.forEach(function (selector) {
            $(selector).empty();
        });

        $.getJSON('<?= base_url('home/get_surat_keluar_by_id/') ?>' + id_surat, function (data) {
            $('#ubah_id_surat').val(data.id_surat);
            $('#ubah_nomor_surat').val(data.nomor_surat);
            $('#ubah_tgl_kirim').val(data.tgl_kirim);
            $('#ubah_tujuan').val(data.tujuan);
            $('#ubah_perihal').val(data.perihal);
            $('#ubah_file_surat_id').val(data.id_surat);
        });
    }
</script>
