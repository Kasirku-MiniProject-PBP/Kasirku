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
    <title>Pelanggan</title>
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
                document.getElementById('linkPelanggan').innerHTML = '<a href="#" class="text-start nav-link bg-info link-dark shadow rounded "><svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg> Pelanggan</a>';
            </script>
        </nav>
        <div class="card flex-grow-1" style="margin:10px">
            <div class="card-header">Data Pelanggan</div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPelangganModal">
                    + Tambah Pelanggan
                </button>
                <br><br>
                <table id="tabel_data" class="table table-hover table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Nomor Telephone</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    require_once('db_login.php');
                    $query = "SELECT * FROM pelanggan ORDER BY id_pelanggan";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $pelanggan) {
                    ?>
                            <tr>
                                <td><?= $pelanggan['id_pelanggan'] ?></td>
                                <td><?= $pelanggan['nama_depan'] ?></td>
                                <td><?= $pelanggan['nama_belakang'] ?></td>
                                <td><?= $pelanggan['no_telp'] ?></td>
                                <td>
                                    <button type="button" value="<?= $pelanggan['id_pelanggan']; ?>" class="editPelangganBtn btn btn-warning btn-sm"><i class="fa-solid fa-user-pen"></i> Edit</button>
                                    <button type="button" value="<?= $pelanggan['id_pelanggan']; ?>" class="deletePelangganBtn btn btn-danger btn-sm"><i class="fa-solid fa-user-minus"></i> Delete</button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Add pelanggan Modal -->
    <div class="modal fade" id="addPelangganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Data Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="faddPelanggan">
                        <div id="id-group" class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" name="pelanggan_id">
                        </div>
                        <div id="name-group" class="form-group">
                            <label for="name">Nama Depan:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div id="harga-group" class="form-group">
                            <label for="nami">Nama Belakang:</label>
                            <input type="text" class="form-control" name="nami">
                        </div>
                        <div id="Stok-group" class="form-group">
                            <label for="notp">Nomor Telephone:</label>
                            <input type="number" class="form-control" name="notp">
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

    <!-- Edit Pelanggan Modal -->
    <div class="modal fade" id="pelangganEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Ubah Data Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="feditPelanggan">
                        <div id="id-group" class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" id="pelanggan_id" name="pelanggan_id">
                        </div>
                        <div id="name-group" class="form-group">
                            <label for="name">Nama Depan:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div id="harga-group" class="form-group">
                            <label for="nami">Nama Belakang:</label>
                            <input type="text" class="form-control" id="nami" name="nami">
                        </div>
                        <div id="Stok-group" class="form-group">
                            <label for="notp">Nomor Telephone:</label>
                            <input type="number" class="form-control" id="notp" name="notp">
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
        $(document).on('submit', '#faddPelanggan', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("add_pelanggan", true);

            $.ajax({
                type: "POST",
                url: "CRUD_pelanggan.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        alert(res.message);
                    } else {
                        $('#errorMessage').addClass('d-none');
                        $('#addPelangganModal').modal('hide');
                        $('#faddPelanggan')[0].reset();
                        $('#tabel_data').load(location.href + " #tabel_data");
                    }
                }
            });
        });

        // Show modal Update
        $(document).on('click', '.editPelangganBtn', function() {

            var pelanggan_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "CRUD_pelanggan.php?id_pelanggan=" + pelanggan_id,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 200) {

                        $('#pelanggan_id').val(res.data.id_pelanggan);
                        $('#name').val(res.data.nama_depan);
                        $('#nami').val(res.data.nama_belakang);
                        $('#notp').val(res.data.no_telp);
                        $('#pelangganEditModal').modal('show');
                    }
                }
            });
        });

        // Update Data modal
        $(document).on('submit', '#feditPelanggan', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_pelanggan", true);

            $.ajax({
                type: "POST",
                url: "CRUD_pelanggan.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 200) {
                        $('#errorMessageUpdate').addClass('d-none');
                        $('#pelangganEditModal').modal('hide');
                        $('#feditPelanggan')[0].reset();
                        $('#tabel_data').load(location.href + " #tabel_data");
                    } else if (res.status == 422) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.deletePelangganBtn', function(e) {
            e.preventDefault();

            if (confirm('Yakin hapus data ?')) {
                var pelanggan_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "CRUD_pelanggan.php",
                    data: {
                        'delete_pelanggan': true,
                        'id_pelanggan': pelanggan_id
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