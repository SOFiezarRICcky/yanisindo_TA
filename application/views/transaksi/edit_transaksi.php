<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Transaksi</h2>
            <div class="alert alert-primary">
                Silahkan Isi Form Berikut Ini
            </div>
            <form method="POST" action="<?= base_url(); ?>admin/edit_transaksi_header/<?= $transaksi_header->no_faktur; ?>" method="POST">
                <div class="form-group row">

                    <?php var_dump($transaksi_header) ?>

                    <label for="" class="control-label col-sm-2">No Faktur</label>
                    <div class="col-md-3">
                        <input type="text" name="no_faktur" class="form-control" id="no_faktur" value="<?= $transaksi_header->no_faktur; ?>" readonly>
                    </div>
                    <label for="" class="control-label col-sm-2">Tanggal</label>
                    <div class="col-md-3">
                        <input type="date" name="tgl_transaksi" class="form-control" id="tgl_transaksi" value="<?= $transaksi_header->tgl_transaksi; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="control-label col-sm">Id Customer</label>
                    <div class="col-md-3">
                        <input list="data_customer" class="form-control" type="text" name="kode_customer" id="kode_customer" placeholder="Kode / Nama" onchange="return autofill_cus();" value="<?= $transaksi_header->kode_customer; ?>">
                    </div>

                    <label for="" class="control-label col-sm">Nama Customer</label>
                    <div class="col-md-3">
                        <input type="text" name="nama_customer" class="form-control" id="nama_customer" value="<?= $dataCustomer_transaksi->nama_customer; ?>" readonly>
                        <?= form_error("nama_customer", "<small class='text-danger pl-3'>", "</small>"); ?>
                    </div>
                    <label for="" class="control-label col-sm">Alamat</label>
                    <div class="col-md-3">
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $dataCustomer_transaksi->alamat; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="control-label col-sm-2">Keterangan (Optional)</label>
                    <div class="col-md">
                        <textarea name="keterangan" rows="5" class="form-control" id="keterangan"><?= $transaksi_header->keterangan; ?></textarea>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-1">
                        No
                        <input type="text" class="form-control input-sm text-right" id="no" readonly>
                    </div>
                    <div class="col-md-3">
                        Kode Obat
                        <input list="data_obat" type="text" class="form-control input-sm" id="kode_obat" name="kode_obat" placeholder="Kode / Nama" onchange="return autofill_obt();">
                    </div>
                    <div class="col-md-2">
                        Nama Obat
                        <input type="text" class="form-control input-sm" id="nama_obat" name="nama_obat" readonly>
                    </div>
                    <div class="col-md-3">
                        Harga
                        <input type="text" class="form-control input-sm" id="harga" name="harga" readonly>
                        <input type="text" class="form-control input-sm" id="stock" name="stock" readonly>
                    </div>
                    <div class="col-md-1">
                        Jumlah
                        <input type="text" class="form-control input-sm" id="jumlah" name="jumlah">
                    </div>
                    <div class="col-md-2">
                        Subtotal
                        <input type="text" class="form-control input-sm" id="subtotal" name="subtotal" readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" id="add_data" value="Add Data To Table" class="btn btn-primary btn-sm">
                        <input type="text" id="btn_ubah_jumlah" value="Jumlah" class="btn btn-primary btn-sm">
                        <!-- <button class="btn btn-info" id="btn_ubah_jumlah">Jumlah</button> -->
                    </div>
                </div>


                <br><br>

                <table class="table table-hover table-striped table-bordered" id="data_table">
                    <thead>
                        <tr>
                            <th>No Urut</th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php foreach ($transaksi_detail as $detail) : ?>
                            <?php var_dump($detail) ?>
                            <tr>
                                <td><?= $detail->no_urut; ?></td>
                                <td><?= $detail->kode_obat; ?></td>
                                <td><?= $detail->nama_obat; ?></td>
                                <td><?= $detail->harga; ?></td>
                                <td><?= $detail->jumlah; ?></td>
                                <td><?= $detail->subtotal; ?></td>
                                <td><a href="#" value="<?= $detail->no_urut; ?> " id="del" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a></td>
                                <td>
                                    <span data-toggle="tooltip" data-original-title="Hapus Data" style="font-size:10;"> <a href="<?= base_url() ?>Admin/delete_detail_traksaksi/<?= $detail->no_urut; ?>" class="btn btn-danger"> Hapus </a> </span>
                                </td>
                            </tr>

                        <?php endforeach ?>

                    </tbody>
                </table>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="">Grand Total</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="grand_total" name="grand_total" class="form-control" value="<?= $transaksi_header->grand_total; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="">Pajak</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="pajak" name="pajak" class="form-control" readonly value="<?= $transaksi_header->pajak; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="">Total Biaya</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="total_biaya" name="total_biaya" class="form-control" readonly value="<?= $transaksi_header->total_biaya; ?>">
                    </div>
                </div>

                <br>
                <hr><br>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" id="save" value="Save Table To Database" class="btn btn-info btn-sm">
                        <button type="submit" class="btn btn-primary btn-sm">Save Transaksi</button><br>
                    </div>
                </div>
            </form>




            <!-- Code Menampilkan Kode Customer Dropdown -->
            <datalist id="data_customer">
                <?php
                foreach ($dropdown_cus->result() as $data_customer) {
                    echo "<option value='$data_customer->kode_customer'>$data_customer->nama_customer</option>";
                }
                ?>
            </datalist>
            <!-- Code Menampilkan Kode Customer Dropdown -->

            <!-- Code Menampilkan Kode Obat Dropdown -->
            <datalist id="data_obat">
                <?php
                foreach ($dropdown_obt->result() as $data_obat) {
                    echo "<option value='$data_obat->kode_obat'>$data_obat->nama_obat</option>";
                };
                ?>
            </datalist>
            <!-- Code Menampilkan Kode Obat Dropdown -->


            <script>
                // Hitung Grand Total Otomatis
                var hitung_harga = function() {
                    var data = document.getElementById("data_table"),
                        grand_total = 0;

                    for (var i = 1; i < data.rows.length; i++) {
                        grand_total = grand_total + parseInt(data.rows[i].cells[5].innerHTML);
                        pajak = grand_total * 10 / 100;
                        total_biaya = grand_total + pajak;


                    }

                    document.getElementById("grand_total").value = grand_total;
                    document.getElementById("pajak").value = pajak;
                    document.getElementById("total_biaya").value = total_biaya;
                }
                // Hitung Grand Total Otomatis

                $(document).on("click", "#del", function(e) {
                    e.preventDefault();

                    var c = confirm("Apakah Ingin Di Hapus");
                    if (c === true) {
                        var del_id = $(this).attr("value");


                        $.ajax({
                            url: "<?= base_url("admin/delete_transaksi_detail"); ?>",
                            type: "post",
                            dataType: "json",
                            data: {
                                del_id: del_id
                            },
                            success: function(result) {



                                if (result.status == "success") {
                                    console.log("berhasil");
                                    // Jika Berhasil Pindah Ke Halaman
                                    location.reload()
                                    hitung_harga();
                                } else {
                                    console.log("belum berhasil");
                                    location.reload()
                                }

                            }
                        });
                    } else {

                    };

                });





                //  Code Autofill Customer
                function autofill_cus() {
                    var kode_customer = document.getElementById("kode_customer").value;
                    $.ajax({
                        url: "<?= base_url(); ?>admin/autofill_cus",
                        data: "&kode_customer=" + kode_customer,
                        success: function(data) {
                            var hasil = JSON.parse(data);

                            $.each(hasil, function(key, val) {
                                document.getElementById("kode_customer").value = val.kode_customer;
                                document.getElementById("nama_customer").value = val.nama_customer;
                                document.getElementById("alamat").value = val.alamat;
                            });
                        }
                    });
                }
                // Code Autofill Customer

                // Code Autofill Obat
                function autofill_obt() {
                    var kode_obat = document.getElementById("kode_obat").value;
                    $.ajax({
                        url: "<?= base_url(); ?>admin/autofill_obt",
                        data: "&kode_obat=" + kode_obat,
                        success: function(data) {
                            var hasil = JSON.parse(data);

                            $.each(hasil, function(key, val) {
                                document.getElementById("kode_obat").value = val.kode_obat;
                                document.getElementById("nama_obat").value = val.nama_obat;
                                document.getElementById("stock").value = val.stock
                                document.getElementById("harga").value = val.harga;
                            });
                        }
                    });
                }
                // Code Autofill Obat

                // Hitung Otomatis Subtotal Tranasksi Master
                $(document).ready(function() {
                    $("#jumlah").keyup(function() {
                        var harga1 = $("#harga").val();

                        var jumlah1 = $("#jumlah").val();

                        var total = parseInt(harga1) * parseInt(jumlah1);
                        $("#subtotal").val(total);
                    });
                });
                // Hitung Otomatis Subtotal Tranasksi Master

                // Ubah Stok Obat

                $(document).ready(function() {

                    $("#btn_ubah_jumlah").on("click", function() {

                        var kode_obat = $("#kode_obat").val();
                        var jumlah = $("#jumlah").val();
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url("admin/update_jumlah_barang"); ?>",
                            dataType: "JSON",
                            data: {
                                kode_obat: kode_obat,
                                jumlah: jumlah
                            },
                            success: function(data) {
                                console.log("berhasil");
                            }
                        })
                    });
                    return false;
                });


                // Ubah Stok Obat


                // Code Untuk Input Ke Data Table dan Ke Database
                $(function() {

                    // Hitung Grand Total Otomatis
                    var hitung_harga = function() {
                        var data = document.getElementById("data_table"),
                            grand_total = 0;

                        for (var i = 1; i < data.rows.length; i++) {
                            grand_total = grand_total + parseInt(data.rows[i].cells[5].innerHTML);
                            pajak = grand_total * 10 / 100;
                            total_biaya = grand_total + pajak;


                        }

                        document.getElementById("grand_total").value = grand_total;
                        document.getElementById("pajak").value = pajak;
                        document.getElementById("total_biaya").value = total_biaya;
                    }
                    // Hitung Grand Total Otomatis




                    // Nomor Otomatis
                    var set_number = function() {
                        var table_len = $("#data_table tbody tr").length + 1;

                        $("#no").val(table_len);
                    }

                    set_number();
                    // Nomor Otomatis

                    // Input Ke Table
                    $("#add_data").click(function() {

                        var kode_obat = $("#kode_obat").val();
                        var jumlah = $("#jumlah").val();
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url("admin/update_jumlah_barang"); ?>",
                            dataType: "JSON",
                            data: {
                                kode_obat: kode_obat,
                                jumlah: jumlah
                            },
                            success: function(data) {
                                console.log("berhasil");
                            }
                        })


                        var no = $("#no").val();
                        var kode_obat = $("#kode_obat").val();
                        var nama_obat = $("#nama_obat").val();
                        var harga = $("#harga").val();
                        var jumlah = $("#jumlah").val();
                        var subtotal = $("#subtotal").val();
                        var hapus = "remove";

                        var jumlah2 = $("#jumlah").val();
                        var stock2 = $("#stock").val();


                        var index, data_table = document.getElementById("data_table")

                        for (var i = 1; i < data_table.rows.length; i++) {
                            data_table.rows[i].cells[6].onclick = function() {
                                var c = confirm("do you want to delete this row");
                                if (c === true) {
                                    index = this.parentElement.rowIndex;
                                    data_table.deleteRow(index);

                                    set_number();

                                    hitung_harga();
                                }
                            }
                        }

                        // Tes Logika Untuk Validasi Kode Barang Yang
                        // for (var i = 0; i < data_table.rows.length; i++) {
                        //     if (data_table.rows[i].cells[1] === $("#kode_obat").val()) {
                        //         alert("Kode Barang Sudah Ada");
                        //     }
                        // }


                        if (parseInt(jumlah2) >= parseInt(stock2)) {
                            alert("Jumlah Stock Barang Kurang");
                        } else if ($("#jumlah").val() == "" || $("#nama_obat").val() == "") {
                            alert("Ada Data Atau Jumlah Obat Yang Belum Di Isi");
                        } else {

                            // Input Ke Table
                            $("#data_table tbody:last-child").append(

                                "<tr>" +
                                "<td>" + no + "</td>" +
                                "<td>" + kode_obat + "</td>" +
                                "<td>" + nama_obat + "</td>" +
                                "<td>" + harga + "</td>" +
                                "<td>" + jumlah + "</td>" +
                                "<td>" + subtotal + "</td>" +
                                "<td>" + hapus + "</td>" +
                                "</tr>"

                            );

                            // Hapus Form Input Nya Setelah Masuk
                            $("#no").val("");
                            $("#kode_obat").val("");
                            $("#nama_obat").val("");
                            $("#harga").val("");
                            $("#jumlah").val("");
                            $("#subtotal").val("");
                            // console.log(data_table);



                            // Code Untuk Menghitung Otomatis Subtotal
                            hitung_harga();

                            // console.log(grand_total);
                            // Code Untuk Menghitung Otomatis Subtotal

                            set_number();


                            // ------------------- LANGSUNG MASUK KE DATABASE --------------------

                            // var header_data = $("#form_transaksi").serialize();

                            var table_data = [];

                            $("#data_table tr").each(function(row, tr) {

                                if ($("#nama_customer").val() == "") {
                                    alert("Data Customer Belum Di Isi")
                                } else if ($(tr).find("td:eq(0)").text() == "") {

                                } else {
                                    var sub = {

                                        // "no": $(tr).find("td:eq(0)").text(),
                                        "no_faktur": $("#no_faktur").val(),
                                        "kode_obat": $(tr).find("td:eq(1)").text(),
                                        "nama_obat": $(tr).find("td:eq(2)").text(),
                                        "harga": $(tr).find("td:eq(3)").text(),
                                        "jumlah": $(tr).find("td:eq(4)").text(),
                                        "subtotal": $(tr).find("td:eq(5)").text(),

                                        // "tgl_transaksi": $("#tgl_transaksi").val(),
                                        // "kode_customer": $("#kode_customer").val(),
                                        // "keterangan": $("#keterangan").val(),
                                        // "grand_total": $("#grand_total").val(),
                                        // "pajak": $("#pajak").val(),
                                        // "total_biaya": $("#total_biaya").val(),

                                    };

                                    table_data.push(sub);
                                }

                            });



                            $(function() {

                                var data = {

                                    // "form_transaksi": header_data,
                                    "data_table": table_data,
                                };



                                // var data2 = $("#form_transaksi").serialize();
                                $.ajax({

                                    data: data,
                                    type: "POST",
                                    url: "<?= base_url("admin/insert_update_transaksi_detail"); ?>",
                                    crossOrigin: false,
                                    dataType: "JSON",
                                    success: function(result) {

                                        if (result.status == "success") {
                                            console.log("berhasil");
                                            // Jika Berhasil Pindah Ke Halaman
                                            // window.location.href = "<?= base_url("admin"); ?>"
                                        } else {
                                            console.log("belum berhasil");
                                        }

                                    }

                                });

                            });

                        }

                    })



                    $("#save").click(function() {

                        // var header_data = $("#form_transaksi").serialize();

                        var table_data = [];

                        $("#data_table tr").each(function(row, tr) {

                            if ($("#nama_customer").val() == "") {
                                alert("Data Customer Belum Di Isi")
                            } else if ($(tr).find("td:eq(0)").text() == "") {

                            } else {
                                var sub = {

                                    // "no": $(tr).find("td:eq(0)").text(),
                                    "no_faktur": $("#no_faktur").val(),
                                    "kode_obat": $(tr).find("td:eq(1)").text(),
                                    "nama_obat": $(tr).find("td:eq(2)").text(),
                                    "harga": $(tr).find("td:eq(3)").text(),
                                    "jumlah": $(tr).find("td:eq(4)").text(),
                                    "subtotal": $(tr).find("td:eq(5)").text(),

                                    // "tgl_transaksi": $("#tgl_transaksi").val(),
                                    // "kode_customer": $("#kode_customer").val(),
                                    // "keterangan": $("#keterangan").val(),
                                    // "grand_total": $("#grand_total").val(),
                                    // "pajak": $("#pajak").val(),
                                    // "total_biaya": $("#total_biaya").val(),

                                };

                                table_data.push(sub);
                            }

                        });

                        $(function() {

                            var data = {

                                // "form_transaksi": header_data,
                                "data_table": table_data,
                            };



                            // var data2 = $("#form_transaksi").serialize();
                            $.ajax({

                                data: data,
                                type: "POST",
                                url: "<?= base_url("admin/insert_transaksi_detail"); ?>",
                                crossOrigin: false,
                                dataType: "JSON",
                                success: function(result) {

                                    if (result.status == "success") {
                                        console.log("berhasil");
                                        // Jika Berhasil Pindah Ke Halaman
                                        window.location.href = "<?= base_url("admin"); ?>"
                                    } else {
                                        console.log("belum berhasil");
                                    }

                                }

                            });

                        });


                    });


                })
            </script>


        </div>
    </div>
</div>