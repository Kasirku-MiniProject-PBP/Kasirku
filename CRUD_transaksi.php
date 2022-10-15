<?php

require 'db_login.php';

// Tempat pengecekan Modal Add data 
if (isset($_POST['add_transaksi'])) {
    $id_transaksi = mysqli_real_escape_string($con, $_POST['transaksi_id']);
    $total = mysqli_real_escape_string($con, $_POST['total']);
    $metode = mysqli_real_escape_string($con, $_POST['mp']);
    $bayar = mysqli_real_escape_string($con, $_POST['br']);
    $kembalian = mysqli_real_escape_string($con, $_POST['kn']);
    $waktu = mysqli_real_escape_string($con, $_POST['wt']);
    $status = mysqli_real_escape_string($con, $_POST['sp']);

    // Query Add Data
    $query = "INSERT INTO transaksi (id_transaksi, total, metode_pembayaran, bayar, kembalian, waktu, status_pembayaran)
              VALUES ('$id_transaksi', '$total', '$metode', '$bayar', '$kembalian', '$waktu', '$status')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Transaksi Created Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Transaksi Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

// Tempat pengecekan Modal Update data
if (isset($_POST['update_transaksi'])) {
    $id_transaksi = mysqli_real_escape_string($con, $_POST['transaksi_id']);
    $total = mysqli_real_escape_string($con, $_POST['total']);
    $metode = mysqli_real_escape_string($con, $_POST['mp']);
    $bayar = mysqli_real_escape_string($con, $_POST['br']);
    $kembalian = mysqli_real_escape_string($con, $_POST['kn']);
    $waktu = mysqli_real_escape_string($con, $_POST['wt']);
    $status = mysqli_real_escape_string($con, $_POST['sp']);

    // Query Update data
    $query =  "UPDATE transaksi SET id_transaksi='$id_transaksi', total='$total', metode_pembayaran='$metode', bayar='$bayar', kembalian='$kembalian', waktu='$waktu', status_pembayaran='$status'
               WHERE id_transaksi='$id_transaksi'";;
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Transaksi Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Transaksi Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

// Tempat pengecekan transaksi id
if (isset($_GET['transaksi_id'])) {
    $transaksi_id = mysqli_real_escape_string($con, $_GET['transaksi_id']);

    $query = "SELECT * FROM transaksi WHERE id_transaksi='$transaksi_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $transaksi = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Student Fetch Successfully by id',
            'data' => $transaksi
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Student Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

//Tempat pengecekan Modal Delete data
if (isset($_POST['delete_transaksi'])) {
    $transaksi_id = mysqli_real_escape_string($con, $_POST['transaksi_id']);

    //Query Delete data
    $query = "DELETE FROM transaksi WHERE id_transaksi='$transaksi_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Transaksi Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Transaksi Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}