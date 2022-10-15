<?php

require 'db_login.php';

// Tempat pengecekan Modal Add data 
if (isset($_POST['add_barang'])) {
    $id_barang = mysqli_real_escape_string($con, $_POST['barang_id']);
    $nama_barang = mysqli_real_escape_string($con, $_POST['name']);
    $harga = mysqli_real_escape_string($con, $_POST['harga']);
    $stok = mysqli_real_escape_string($con, $_POST['stok']);

    // Query Add Data
    $query = "INSERT INTO barang (id_barang, nama_barang , harga ,stok_barang) VALUES ('$id_barang','$nama_barang','$harga','$stok')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Barang Created Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Barang Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

// Tempat pengecekan Modal Update data
if (isset($_POST['update_barang'])) {
    $id_barang = mysqli_real_escape_string($con, $_POST['barang_id']);
    $nama_barang = mysqli_real_escape_string($con, $_POST['name']);
    $harga = mysqli_real_escape_string($con, $_POST['harga']);
    $stok = mysqli_real_escape_string($con, $_POST['stok']);

    // Query Update data
    $query =  "UPDATE barang SET id_barang='$id_barang', nama_barang='$nama_barang', harga='$harga', stok_barang='$stok' 
               WHERE id_barang='$id_barang'";;
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Barang Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Barang Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

// Tempat pengecekan barang id
if (isset($_GET['barang_id'])) {
    $barang_id = mysqli_real_escape_string($con, $_GET['barang_id']);

    $query = "SELECT * FROM barang WHERE id_barang='$barang_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $barang = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Student Fetch Successfully by id',
            'data' => $barang
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
if (isset($_POST['delete_barang'])) {
    $barang_id = mysqli_real_escape_string($con, $_POST['barang_id']);

    //Query Delete data
    $query = "DELETE FROM barang WHERE id_barang='$barang_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}