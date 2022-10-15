<?php

require 'db_login.php';

// Tempat pengecekan Modal Add data 
if (isset($_POST['add_pelanggan'])) {
    $id_pelanggan = mysqli_real_escape_string($con, $_POST['pelanggan_id']);
    $nama_depan = mysqli_real_escape_string($con, $_POST['name']);
    $nama_belakang = mysqli_real_escape_string($con, $_POST['nami']);
    $no_telp = mysqli_real_escape_string($con, $_POST['notp']);


    // Query Add Data
    $query = "INSERT INTO pelanggan (id_pelanggan, nama_depan , nama_belakang , no_telp) VALUES ('$id_pelanggan','$nama_depan','$nama_belakang','$no_telp')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Pelanggan Created Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Pelanggan Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

// Tempat pengecekan Modal Update data
if (isset($_POST['update_pelanggan'])) {
    $id_pelanggan = mysqli_real_escape_string($con, $_POST['pelanggan_id']);
    $nama_depan = mysqli_real_escape_string($con, $_POST['name']);
    $nama_belakang = mysqli_real_escape_string($con, $_POST['nami']);
    $no_telp = mysqli_real_escape_string($con, $_POST['notp']);

    // Query Update data
    $query =  "UPDATE pelanggan SET id_pelanggan='$id_pelanggan', nama_depan='$nama_depan', nama_belakang='$nama_belakang', no_telp='$no_telp' 
                WHERE id_pelanggan='$id_pelanggan'";;
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Pelanggan Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Pelanggan Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

// Tempat pengecekan pelanggan id
if (isset($_GET['id_pelanggan'])) {
    $pelanggan_id = mysqli_real_escape_string($con, $_GET['id_pelanggan']);

    $query = "SELECT * FROM pelanggan WHERE id_pelanggan='$pelanggan_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $pelanggan = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Student Fetch Successfully by id',
            'data' => $pelanggan
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
if (isset($_POST['delete_pelanggan'])) {
    $pelanggan_id = mysqli_real_escape_string($con, $_POST['id_pelanggan']);

    //Query Delete data
    $query = "DELETE FROM pelanggan WHERE id_pelanggan='$pelanggan_id'";
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