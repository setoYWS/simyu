

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pembelian</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

   s

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
       
          <?php
    include_once "cek_login_manajer.php";
?>
<div class="right-button-margin">
    <a href="logout_manajer.php" class="btn btn-default pull-right">Logout</a>
</div>
<?php
$page_title = "Sistem Management Warehouse Pemotong Kayu";

include_once 'config/database.php';
include_once 'objects/manajer.php';
include_once 'objects/pegawai.php';
include_once 'objects/barang_rusak.php';
include_once 'objects/barang.php';
include_once 'objects/pemasok.php';
include_once 'objects/transaksi.php';
include_once 'objects/pembelian_barang.php';

include_once "header.php";

?>

					<div class="container">




<ul class="nav nav-tabs">
  <li class="active"><a href="view-pembelianbarang.php">Pembelian Barang</a></li>
  <li><a href="view-barangrusakm.php">Barang Rusak</a></li>
  <li><a href="view-pegawai.php">Pegawai</a></li>
  <li><a href="view-pemasok.php">Pemasok</a></li>
  <li><a href="view-transaksi.php">Laporan Keuangan</a></li>
</ul>
<!--Button Create Product-->
	
<div class="right-button-margin">
    <a href="tambah-pembelian.php" class="btn btn-default pull-right">Beli Barang</a>
</div>
</div>

<!--Content area-->




<?php 
// Tambahkan pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set jumlah record dalam 1 halaman
$records_per_page = 3;

// Hitung limit data dalam query
$from_record_num = ($records_per_page * $page) - $records_per_page;


$database = new Database();
$db = $database->getConnection();

$pembelian_barang = new Pembelian_Barang($db);

// Query product
$stmt = $pembelian_barang->readAll($page, $from_record_num, $records_per_page);
$num = $stmt->rowCount();

if ($num >0)
{
    $pemasok = new Pemasok($db);
    $barang = new Barang($db);
    $transaksi = new Transaksi($db);
    $manajer = new Manajer($db);

    echo '<table class="table table-bordered" id="c">';
    echo '  <tr>';
    echo '      <th>Tanggal Beli</th>';
    echo '      <th>Manajer</th>';
    echo '      <th>Pemasok</th>';
    echo '      <th>Nama Barang</th>';
    echo '      <th>Jumlah(Dalam Kardus)</th>';
    echo '      <th>Harga Beli</th>';
    echo '      <th>Harga Jual (satuan)</th>';
    echo '      <th>Actions</th>';
    echo '  </tr>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
        echo '<tr>';
        echo '  <td>';
            $barang->nib = $nib;
            $barang->readOne();
            echo $barang->tanggal_tambah;
        echo '</td>';
        echo '  <td>';
            $manajer->nim = $nim;
            $manajer->readOne();
            echo $manajer->nama;
        echo '</td>';
        echo '  <td>';
            $pemasok->nip = $nip;
            $pemasok->readOne();
            echo $pemasok->nama;
        echo '</td>';
        echo '  <td>';
            $barang->nib = $nib;
            $barang->readOne();
            echo $barang->nama;
        echo '</td>';
        echo '  <td>';
            echo $barang->jumlah;
        echo '</td>';
        echo '  <td>';
            $transaksi->id_tra = $id_tra;
            $transaksi->readOne();
            echo $transaksi->pengeluaran;
        echo '</td>';
        echo '  <td>';
            echo $barang->harga_jual;
        echo '</td>';
        echo '  <td>';
            //<!--Ubah dan Delete button-->
			echo '<a href="update-pembelian.php?id='.$id_pembelian.'" class="btn btn-default left-margin">Ubah</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';

    // paging button will be here
}
else
{
    echo '<div>Barang Kosong.</div>';
}

?>
<?php
include_once 'paging-pembelianbarang.php';
/*include_once 'paging_category.php';*/
?>




<?
include_once "footer.php";
?>





                    
</div>

</form>
</div>
					
          </div>
        </div>
      </div>
		</header>
		<section class="bg-dark text-white">
      <div class="container text-center">
	
	
	<center><h3>2019 Copyright SIMYU Coorporation</h3></center>
      </div>
    </section>
  


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>



 

