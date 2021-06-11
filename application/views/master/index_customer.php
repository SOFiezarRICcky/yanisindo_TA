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
                                    <th>Kode Customer</th>
                                    <th>Nama Customer</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>No Telp</th>
                                    <th>Fax</th>
                                    <th>Personal Contact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($customer->result_array() as $customer) {

                                ?>

                                    <tr>
                                        <td><?= $customer["kode_customer"]; ?></td>
                                        <td><?= $customer["nama_customer"]; ?></td>
                                        <td><?= $customer["alamat"]; ?></td>
                                        <td><?= $customer["email"]; ?></td>
                                        <td><?= $customer["no_telp"]; ?></td>
                                        <td><?= $customer["fax"]; ?></td>
                                        <td><?= $customer["con_pers"]; ?></td>
                                        <td>
                                            <span data-toggle="tooltip" data-original-title="Edit Data" style="font-size:10;"> <a href="<?= base_url() ?>Admin/edit_customer/<?= $customer["kode_customer"]; ?>" class="btn btn-warning"> Edit </a> </span>
                                            <span data-toggle="tooltip" data-original-title="Hapus Data" style="font-size:10;"> <a href="<?= base_url() ?>Admin/delete_customer/<?= $customer["kode_customer"]; ?>" class="btn btn-danger"> Hapus </a> </span>
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
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Data Tables -->
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/js/demo/datatables-demo.js"></script>


<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>