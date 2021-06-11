<div class="container">
    <div class="row">
        <div class="col-10">
            <h2 class="my-3">Form Edit Data Customer</h2>

            <?php var_dump($customer) ?>

            <form action="<?= base_url(); ?>Admin/edit_customer/<?= $customer->kode_customer; ?>" method="post">
                <div class="row mb-3">
                    <label for="kode_customer" class="col-sm-2 col-form-label">Kode Customer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_customer" name="kode_customer" value="<?= $customer->kode_customer; ?>" readonly>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_customer" class="col-sm-2 col-form-label">Nama Customer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" autofocus value="<?= $customer->nama_customer; ?>">
                        <?= form_error("nama_customer", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $customer->alamat; ?>">
                        <?= form_error("alamat", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $customer->email; ?>">
                        <?= form_error("email", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_telp" class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $customer->no_telp; ?>">
                        <?= form_error("no_telp", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fax" class="col-sm-2 col-form-label">Fax</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fax" name="fax" value="<?= $customer->fax; ?>">
                        <?= form_error("fax", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="con_pers" class="col-sm-2 col-form-label">Personal Contact</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="con_pers" name="con_pers" value="<?= $customer->con_pers; ?>">
                        <?= form_error("con_pers", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>