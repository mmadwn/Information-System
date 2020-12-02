<div class="col-sm-1">
		   <a href="./admin.php?hlm=right" id="tombol" class="btn btn-info pull-left"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Berdasarkan Daftar Biaya</a><br/><br/><br/>
		   <a href="./admin.php?hlm=left" id="tombol" class="btn btn-info pull-left"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Berdasarkan Transaksi</a><br/><br/><br/>

		   <button id="tombol" onclick="window.print()" class="btn btn-warning">Cetak</button>

		   </div>

<!DOCTYPE html>
<html>
<head>
	<title>SELURUH LIST</title>
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
	<center><h1>SELURUH LIST</h1></center>
    <form method="GET" action="inner_join.php" style="text-align: center;"></form>
    <table>
		<thead>
			<tr>
				<th>No.Nota</th>
				<th>Nama Pelanggan</th>
				<th>Total Bayar</th>
				<th>Tanggal</th>
                <th>Jenis</th>
                <th>Biaya</th>

			</tr>
		</thead>
        <?php
        include('koneksi.php');

        $sql=mysqli_query($koneksi, "SELECT transaksi.no_nota, transaksi.nama, transaksi.tanggal, transaksi.total, biaya.biaya, biaya.jenis
        FROM transaksi INNER JOIN biaya ON
        transaksi.id_biaya = biaya.id_biaya");
        
        if($sql === FALSE){
          die(mysqli_error($koneksi));
        }

      while ($row = mysqli_fetch_assoc($sql)){?>
        <tr>
          <td><?php echo $row['no_nota']; ?></td>
          <td><?php echo $row['nama']; ?></td>
          <td><?php echo $row['total']; ?></td>
          <td><?php echo $row['tanggal']; ?></td>
          <td><?php echo $row['jenis']; ?></td>
          <td><?php echo $row['biaya'];?></td>
          
        </tr>
      <?php
      }
      ?> 
	</table>
</body>
</html>
