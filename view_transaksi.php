<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/15d5872470.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="d-flex flex-row">
        <nav class="sticky">
            <?php
            include('nav/index.php');
            ?>
            <script>
                document.getElementById('linkTransaksi').innerHTML = '<a href="#" class="text-start nav-link bg-info link-dark shadow rounded"><svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg> Transaksi</a>';
            </script>
        </nav>
        <div class="card flex-grow-1" style="margin:10px">
            <div class="card-header">Data Transaksi</div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTransaksiModal">
                    + Tambah Transaksi
                </button>
                <br><br>
                <table id="tabel_data" class="table table-hover table-striped">
                    <tr>
                        <th>NO</th>
                        <th>Total</th>
                        <th>Metode Pembayaran</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    require_once('db_login.php');
                    $query = "SELECT * FROM transaksi ORDER BY id_transaksi";
                    $query_run = mysqli_query($con, $query);
                    $i = 1;
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $transaksi) {
                    ?>
                            <tr>
                                <td><?= $transaksi['id_transaksi'] ?></td>
                                <td><?= $transaksi['total'] ?></td>
                                <td><?= $transaksi['metode_pembayaran'] ?></td>
                                <td><?= $transaksi['bayar'] ?></td>
                                <td><?= $transaksi['kembalian'] ?></td>
                                <td><?= $transaksi['waktu'] ?></td>
                                <td><?= $transaksi['status'] ?></td>
                                <td>
                                    <button type="button" value="<?= $transaksi['id_transaksi']; ?>" class="editTransaksiBtn btn btn-warning btn-sm"><i class="fa-regular fa-file-plus"></i>Edit</button>
                                    <button type="button" value="<?= $transaksi['id_transaksi']; ?>" class="deleteTransaksiBtn btn btn-danger btn-sm"><i class="fa-regular fa-file-minus"></i>Delete</button>
                                    </td>
                            </tr>
                    <?php
                            $i++;
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Add transaksi Modal -->
    <div class="modal fade" id="addTransaksiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Data Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="faddTransaksi">
                        <div id="id-group" class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" name="transaksi_id">
                        </div>
                        <div class="form-group">
                            <label for="ttl">Total</label>
                            <input type="number" class="form-control" name="total">
                        </div>
                        <div class="form-group">
                            <label for="mp">Metode Pemabayaran</label>
                            <select name="mp" class="form-control">
                                <option value="">-- Pilih Metode Pemabayaran --</option>
                                <option value="lunas">Tunai</option>
                                <option value="tidak">Dompet Digital</option>
                                <option value="tidak">Kartu Kredit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="br">Bayar</label>
                            <input type="number" class="form-control" name="br">
                        </div>
                        <div class="form-group">
                            <label for="kn">Kembalian</label>
                            <input type="number" class="form-control" name="kn">
                        </div>
                        <div class="form-group">
                            <label for="wt">Waktu</label>
                            <input type="datetime-local" class="form-control" name="wt">
                        </div>
                        <div class="form-group">
                            <label for="sp">Status</label>
                            <select name="sp" class="form-control">
                                <option value="">-- Pilih Status --</option>
                                <option value="lunas">Lunas</option>
                                <option value="tidak">Belum terbayar</option>
                            </select>
                        </div>

                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add +</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Transaksi Modal -->
    <div class="modal fade" id="transaksiEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Ubah Data Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="feditTransaksi">
                        <div id="id-group" class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" id="transaksi_id" name="transaksi_id">
                        </div>
                        <div class="form-group">
                            <label for="ttl">Total</label>
                            <input type="number" class="form-control" id="total" name="total">
                        </div>
                        <div class="form-group">
                            <label for="mp">Metode Pembayaran</label>
                            <select name="mp" class="form-control">
                                <option value="">-- Pilih Metode Pemabayaran --</option>
                                <option value="lunas">Tunai</option>
                                <option value="tidak">Dompet Digital</option>
                                <option value="tidak">Kartu Kredit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="br">Bayar</label>
                            <input type="number" class="form-control" id="br" name="br">
                        </div>
                        <div class="form-group">
                            <label for="kn">Kembalian</label>
                            <input type="number" class="form-control" id="kn" name="kn">
                        </div>
                        <div class="form-group">
                            <label for="wt">Waktu</label>
                            <input type="datetime-local" class="form-control" id="wt" name="wt">
                        </div>
                        <div class="form-group">
                            <label for="sp">Status</label>
                            <select name="sp" class="form-control">
                                <option value="">-- Pilih Status --</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Belum terbayar">Belum terbayar</option>
                            </select>
                        </div>

                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        // ADD CUSTOMER
        $(document).on('submit', '#faddTransaksi', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("add_transaksi", true);

            $.ajax({
                type: "POST",
                url: "CRUD_transaksi.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        alert(res.message);
                    } else {
                        $('#errorMessage').addClass('d-none');
                        $('#addTransaksiModal').modal('hide');
                        $('#faddTransaksi')[0].reset();
                        $('#tabel_data').load(location.href + " #tabel_data");
                    }
                }
            });
        });

        // Show modal Update
        $(document).on('click', '.editTransaksiBtn', function() {

            var transaksi_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "CRUD_transaksi.php?transaksi_id=" + transaksi_id,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 200) {

                        $('#transaksi_id').val(res.data.id_transaksi);
                        $('#total').val(res.data.total);
                        $('#mp').val(res.data.metode_pembayaran);
                        $('#br').val(res.data.bayar);
                        $('#kn').val(res.data.kembalian);
                        $('#wt').val(res.data.waktu);
                        $('#st').val(res.data.status);
                        $('#transaksiEditModal').modal('show');
                    }
                }
            });
        });

        // Update Data modal
        $(document).on('submit', '#feditTransaksi', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_transaksi", true);

            $.ajax({
                type: "POST",
                url: "CRUD_transaksi.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 200) {
                        $('#errorMessageUpdate').addClass('d-none');
                        $('#transaksiEditModal').modal('hide');
                        $('#feditTransaksi')[0].reset();
                        $('#tabel_data').load(location.href + " #tabel_data");
                    } else if (res.status == 422) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.deleteTransaksiBtn', function(e) {
            e.preventDefault();

            if (confirm('Yakin hapus data ?')) {
                var transaksi_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "CRUD_transaksi.php",
                    data: {
                        'delete_transaksi': true,
                        'transaksi_id': transaksi_id
                    },
                    success: function(response) {

                        var res = jQuery.parseJSON(response);
                        if (!(res.status == 500)) {
                            $('#tabel_data').load(location.href + " #tabel_data");
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>