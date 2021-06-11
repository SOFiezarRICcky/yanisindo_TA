<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Master Obat</h1>

    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>

                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata("success")) { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close"></i>
                            </button>
                            <span style="text-align:left;" aria-hidden="true"><?php echo $this->session->flashdata("success"); ?></span>
                        </div>
                    <?php } ?>
                    <div class="table-responsive">
                        <a href="/laporan" class="btn btn-success my-2">Laporan</a>
                        <a href="<?= base_url("admin/create_obat"); ?>" class="btn btn-primary my-2">Tambah Data</a>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Expired Obat</th>
                                    <th>Isi Per Qarton</th>
                                    <th>Satuan</th>
                                    <th>Stock</th>
                                    <th>HNA</th>
                                    <th>PPN</th>
                                    <th>HNA PPN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($obat->result_array() as $obat) {

                                ?>

                                    <tr>
                                        <td><?= $obat["kode_obat"]; ?></td>
                                        <td><?= $obat["nama_obat"]; ?></td>
                                        <td><?= $obat["expired"]; ?></td>
                                        <td><?= $obat["isi_per_q"]; ?></td>
                                        <td><?= $obat["satuan"]; ?></td>
                                        <td><?= $obat["stock"]; ?></td>
                                        <td><?= $obat["harga"]; ?></td>
                                        <td><?= $obat["harga_ppn"]; ?></td>
                                        <td><?= $obat["harga_total"]; ?></td>
                                        <td>
                                            <span data-toggle="tooltip" data-original-title="Edit Data" style="font-size:10;"> <a href="<?= base_url() ?>Admin/edit_obat/<?= $obat["kode_obat"]; ?>" class="btn btn-warning"> Edit </a> </span>
                                            <span data-toggle="tooltip" data-original-title="Hapus Data" style="font-size:10;"> <a href="<?= base_url() ?>Admin/delete_obat/<?= $obat["kode_obat"]; ?>" class="btn btn-danger"> Hapus </a> </span>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>


</div>