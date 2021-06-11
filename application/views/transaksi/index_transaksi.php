<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Master Customer</h1>

    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Customer</h6>

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
                        <a href="<?= base_url("admin/create_customer"); ?>" class="btn btn-primary my-2">Tambah Data</a>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No Faktur</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Kode Customer</th>
                                    <th>Nama Customer</th>
                                    <th>Alamat</th>
                                    <th>Grand Total</th>
                                    <th>Pajak</th>
                                    <th>Total Biaya</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($transaksi->result_array() as $transaksi) {

                                ?>

                                    <tr>
                                        <td><?= $transaksi["no_faktur"]; ?></td>
                                        <td><?= $transaksi["tgl_transaksi"]; ?></td>
                                        <td><?= $transaksi["kode_customer"]; ?></td>
                                        <td><?= $transaksi["nama_customer"]; ?></td>
                                        <td><?= $transaksi["alamat"]; ?></td>
                                        <td><?= $transaksi["grand_total"]; ?></td>
                                        <td><?= $transaksi["pajak"]; ?></td>
                                        <td><?= $transaksi["total_biaya"]; ?></td>
                                        <td>
                                            <span data-toggle="tooltip" data-original-title="Edit Data" style="font-size:10;"> <a href="<?= base_url() ?>Admin/tampil_data_edit_transaksi/<?= $transaksi["no_faktur"]; ?>" class="btn btn-warning"> Edit </a> </span>
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