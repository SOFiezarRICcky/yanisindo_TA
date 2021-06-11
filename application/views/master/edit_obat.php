<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Edit Data Buku</h2>

            <form action="<?= base_url() ?>Admin/edit_obat/<?= $obat->kode_obat; ?>" method="post">
                <div class="row mb-3">
                    <label for="kode_obat" class="col-sm-2 col-form-label">Kode Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_obat" name="kode_obat" autofocus value="<?= $obat->kode_obat; ?>" readonly>

                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" autofocus value="<?= $obat->nama_obat; ?>">
                        <?= form_error("nama_obat", "<small class='text-danger pl-3'>", "</small>"); ?>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_obat" class="col-sm-2 col-form-label">Expired Obat</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="expired_obat" name="expired_obat" autofocus value="<?= $obat->expired; ?>">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="isi_per_q" class="col-sm-2 col-form-label">Isi Per Qarton</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="isi_per_q" name="isi_per_q" autofocus value="<?= $obat->isi_per_q; ?>">

                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                        <select name="satuan" class="form-control" id="">
                            <option value="1">Box</option>
                            <option value="2">Btl</option>
                            <option value="3">Ampul</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="stock" name="stock" autofocus value="<?= $obat->stock; ?>">

                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga" name="harga" autofocus value="<?= $obat->harga; ?>">

                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga_ppn" class="col-sm-2 col-form-label">PPN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga_ppn" name="harga_ppn" readonly value="<?= $obat->harga_ppn; ?>">
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <label for="DISC" class="col-sm-2 col-form-label">DISC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="disc" name="disc" value=0>
                    </div>
                </div> -->
                <div class="row mb-3">
                    <label for="harga_total" class="col-sm-2 col-form-label">Harga Total</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga_total" name="harga_total" readonly value="<?= $obat->harga_total; ?>">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#harga, #harga_ppn").keyup(function() {
            var harga = $("#harga").val();

            var harga_pajak = parseInt(harga) * 10 / 100;
            $("#harga_ppn").val(harga_pajak);

            var total = parseInt(harga) + parseInt(harga_pajak);
            $("#harga_total").val(total);
        });
    });
</script>