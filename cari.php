<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Penjualan Voucher Game</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/jquery-ui.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>


	<style type="text/css">
	body {
	  min-height: 200px;
	  padding-top: 70px;
	}
   @media print {
	   .container {
		   margin-top: -30px;
	   }
	   #tombol,
      .noprint {
         display: none;
      }
   }
	</style>

  </head>

  <body>

    <!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href=""><span class="glyphicon glyphicon-star"></span> Aplikasi Penjualan Voucher Game</a>
	</div>
	<div class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li><a href="./admin.php">Beranda</a></li>
		<li><a href="./admin.php?hlm=transaksi">Transaksi</a></li>
        <li><a href="./admin.php?hlm=laporan">Laporan</a></li>
		<li><a href="./admin.php?hlm=cari">Cari</a></li>
		<li><a href="./admin.php?hlm=inner">Seluruh list</a></li>
   		
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master <b class="caret"></b></a>
		  <ul class="dropdown-menu">
			<li><a href="./admin.php?hlm=biaya">Data Biaya</a></li>
			<li><a href="./admin.php?hlm=user">Data User</a></li>
		  </ul>
		</li>
	  </ul>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			M Ridwan <b class="caret"></b>
		  </a>
		  <ul class="dropdown-menu">
			<li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</div>

		   <div class="col-sm-1">
		   <a href="./admin.php?hlm=cari" id="tombol" class="btn btn-info pull-left"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Kembali</a><br/><br/><br/>

		   <button id="tombol" onclick="window.print()" class="btn btn-warning">Cetak</button>

		   </div>

<!DOCTYPE html>
<html>
<head>
	<title>PENCARIAN TRANSAKSI</title>
	<style type="text/css">
		* {
			font-family: "Trebuchet MS";
		}
		h1 {
			text-transform: uppercase;
			color: navy;
		}
		table {
			border: 1px solid #ddeeee;
			border-collapse: collapse;
			border-spacing: 0;
			width: 70%;
			margin: 10px auto 10px auto;
		}
		th, td {
			border: 1px solid #ddeeee;
			padding: 20px;
			text-align: left;
		}
	</style>
</head>
<body>
	<center><h1>Pencarian Transaksi - Voucher Game</h1></center>
	<form method="GET" action="cari.php" style="text-align: center;">
		<label>Kata Pencarian : </label>
		<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
		<button type="submit">Cari</button>
	</form>
	<table>
		<thead>
			<tr>
				<th>No.Nota</th>
				<th>Nama Pelanggan</th>
				<th>Jenis</th>
				<th>Total Bayar</th>
				<th>Tanggal</th>

			</tr>
		</thead>
		<tbody>
			<?php 
			//untuk meinclude kan koneksi
			include('koneksi.php');

				//jika kita klik cari, maka yang tampil query cari ini
				if(isset($_GET['kata_cari'])) {
					//menampung variabel kata_cari dari form pencarian
					$kata_cari = $_GET['kata_cari'];

					//jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
					//jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE transaksi like '%".$kata_cari."%' 
					$query = "SELECT * FROM transaksi WHERE no_nota like '%".$kata_cari."%' OR nama like '%".$kata_cari."%' OR jenis like '%".$kata_cari."%' OR total like '%".$kata_cari."%' OR tanggal like '%".$kata_cari."%' ORDER BY id_transaksi ASC";
				} else {
					//jika tidak ada pencarian, default yang dijalankan query ini
					$query = "SELECT * FROM transaksi ORDER BY id_transaksi ASC";
				}
				

				$result = mysqli_query($koneksi, $query);

				if(!$result) {
					die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
				}
				//kalau ini melakukan foreach atau perulangan
				while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $row['no_nota']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['jenis']; ?></td>
				<td><?php echo $row['total']; ?></td>
				<td><?php echo $row['tanggal']; ?></td>
			</tr>
			<?php
			}
			?>

		</tbody>
	</table>
</body>
</html>
</body>
</html>