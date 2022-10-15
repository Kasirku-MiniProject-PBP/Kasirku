<?php
require 'db_login.php';

// function get sum data barang
function getSumDataBarang()
{
    global $con;
    $query = "SELECT COUNT(*) AS total FROM barang";
    $query_run = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($query_run);
    return $row['total'];
}

// function get sum stok barang
function getSumStokBarang()
{
    global $con;
    $query = "SELECT SUM(stok_barang) AS total FROM barang";
    $query_run = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($query_run);
    return $row['total'];
}

// function get sum transaksi
function getSumTransaksi()
{
    global $con;
    $query = "SELECT COUNT(*) AS total FROM transaksi";
    $query_run = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($query_run);
    return $row['total'];
}

function getSumKategoriBarang(){
    global $con;
    $query = "SELECT COUNT(*) AS total FROM jenis_barang";
    $query_run = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($query_run);
    return $row['total'];
}
?>