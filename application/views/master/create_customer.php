<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="my-3">Form Tambah Data Obat</h2>

            <form action="<?= base_url("admin/create_customer"); ?>" method="post">
                <div class="row mb-3">
                    <label for="kode_customer" class="col-sm-2 col-form-label">Kode Customer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_customer" name="kode_customer" value="KC-<?php echo sprintf("%03s", $kode_customer) ?>" readonly>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_customer" class="col-sm-2 col-form-label">Nama Customer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" autofocus value="<?= set_value("nama_customer"); ?>">
                        <?= form_error("nama_customer", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value("alamat"); ?>">
                        <?= form_error("alamat", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= set_value("email"); ?>">
                        <?= form_error("email", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_telp" class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= set_value("no_telp"); ?>">
                        <?= form_error("no_telp", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fax" class="col-sm-2 col-form-label">Fax</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fax" name="fax" value="<?= set_value("fax"); ?>">
                        <?= form_error("fax", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="con_pers" class="col-sm-2 col-form-label">Personal Contact</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="con_pers" name="con_pers" value="<?= set_value("con_pers"); ?>">
                        <?= form_error("con_pers", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>