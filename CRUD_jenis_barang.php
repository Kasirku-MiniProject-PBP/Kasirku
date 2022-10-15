<?php

require 'db_login.php';

// Tempat pengecekan Modal Add data 
if (isset($_POST['add_jenisbarang'])) {
    $id_jenis = mysqli_real_escape_string($con, $_POST['jenisbarang_id']);
    $nama_jenis = mysqli_real_escape_string($con, $_POST['name']);

    // Query Add Data
    $query = "INSERT INTO jenis_barang (id_jenis, nama_jenis) VALUES ('$id_jenis','$nama_jenis')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Jenis Barang Created Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Jenis Barang Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

// Tempat pengecekan Modal Update data
if (isset($_POST['update_jenisbarang'])) {
    $id_jenis = mysqli_real_escape_string($con, $_POST['jenisbarang_id']);
    $nama_jenis = mysqli_real_escape_string($con, $_POST['name']);

    // Query Update data
    $query =  "UPDATE jenis_barang SET id_jenis='$id_jenis', nama_jenis='$nama_jenis' 
               WHERE id_jenis='$id_jenis'";;
    $query_run = mysqli_query($con, $query);
    
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Jenis Barang Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Jenis Barang Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

// Tempat pengecekan jenis barang id
if (isset($_GET['jenisbarang_id'])) {
    $jenisbarang_id = mysqli_real_escape_string($con, $_GET['jenisbarang_id']);

    $query = "SELECT * FROM jenis_barang WHERE id_jenis='$jenisbarang_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $jenisbarang = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Student Fetch Successfully by id',
            'data' => $jenisbarang
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
if (isset($_POST['delete_jenisbarang'])) {
    $jenisbarang_id = mysqli_real_escape_string($con, $_POST['jenisbarang_id']);

    //Query Delete data
    $query = "DELETE FROM jenis_barang WHERE id_jenis='$jenisbarang_id'";
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