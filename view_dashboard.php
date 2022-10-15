<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}
require_once("function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
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
        document.getElementById('linkDashboard').innerHTML = '<a href="#" class="text-start nav-link bg-info link-dark shadow rounded"><svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> Dashboard</a>';
      </script>
    </nav>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../library/css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      /* Float four columns side by side */

      .column {
        float: left;
        padding: 0 10px;
        margin-right: 10px;
      }

      .column2 {
        float: left;
        padding: 0 10px;
        margin-top: 60px;
        margin-right: 10px;
      }

      /* Remove extra left and right margins, due to padding */
      .row {
        margin: 0 150px;
        display: flex;
      }


      /* Clear floats after the columns */
      .row:after {
        content: "";
        display: table;
        clear: both;
      }


      /* Responsive columns */
      @media screen and (max-width: 600px) {
        .column {
          width: 100%;
          display: flex;
          margin-bottom: 20px;
        }
      }

      /* Style the counter cards */
      .card {
        box-shadow: 1px 6px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 24px;
        text-align: center;
        height: 290px;
        width: 290px;
        padding: 20px;
        text-align: center;
        background-color: #f1f1f1;
        align-content: center;
        cursor: pointer;
        display: flexbox;
        margin-right: 90px;
        transition: all ease 0.3s;
        font-family: "Poppins", sans-serif;
      }

      .card:hover {
        background-color: #8974FF;
        color: white;
        transition: all ease 0.3s;
      }

      .card h3 {
        font-size: 80px;
        text-align: center;
        align-content: center;
      }

      a {
        text-decoration: none;
        color: black;
      }

      canvas {
        margin: 150px;
        margin-left: 350px;
        text-align: center;
        width: 100%;
      }
    </style>

    </head>

    <body>

      <section class="home-section mt-4">
        <div class="vstack gap-4">
          <div class="row">
            <div class="col-4">
              <a href="view_barang.php">
                <div class="card">
                  <br>
                  <p>Jumlah Stok Barang</p><br>
                  <h3><?php echo getSumStokBarang() ?></h3>
                </div>
              </a>
            </div>

            <div class="col-4">
              <a href="view_transaksi.php">
                <div class="card">
                  <br>
                  <p>Jumlah Transaksi</p><br>
                  <h3><?php echo getSumTransaksi() ?></h3>
                </div>
              </a>
            </div>

            <div class="col-3">
              <a href="view_jenis_barang.php">
                <div class="card">
                  <br>
                  <p>Kategori Barang</p><br>
                  <h3><?php echo getSumKategoriBarang() ?></h3>
                </div>
              </a>
            </div>

          </div>

          <div class="row2">
            <div class="chart-container">
              <div id="chartContainer">
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                <script type="text/javascript">
                  const chart = Highcharts.chart('chartContainer', {
                    title: {
                      text: 'Grafik Transasksi Toko Per Hari'
                    },
                    subtitle: {
                      text:
                        '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"'
                    },
                    xAxis: {
                      categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']
                    },
                    series: [{
                      type: 'column',
                      name: 'Transaksi Per Hari',
                      colorByPoint: true,
                      data: [5412, 4977, 4730, 4437, 3947, 3707, 4143
                      ],
                      showInLegend: false
                    }]
                  });

                  document.getElementById('plain').addEventListener('click', () => {
                    chart.update({
                      chart: {
                        inverted: false,
                        polar: false
                      },
                      subtitle: {
                        text:
                        '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"'
                      }
                    });
                  });

                  document.getElementById('inverted').addEventListener('click', () => {
                    chart.update({
                      chart: {
                        inverted: true,
                        polar: false
                      },
                      subtitle: {
                        text:
                        '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"'
                      }
                    });
                  });

                  document.getElementById('polar').addEventListener('click', () => {
                    chart.update({
                      chart: {
                        inverted: false,
                        polar: true
                      },
                      subtitle: {
                        text:
                        '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"'
                      }
                    });
                  });
                </script>
              </div>
            </div>
          </div>
    </body>

</html>
