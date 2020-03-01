<style type="text/css"> 
@media print{
	#tombol{
		display: none;
	}
}
</style>
<div id="tombol">
	<input type="button" value = "Pinjam Buku" onClick = "window.location.assign('buku_tersedia.php')">
	<input type="button" value="Print" onClick="window.print()">
</div>
<?php 

	$idpeminjam = $_GET['idpeminjam'];
	include "koneksi.php";
	$sqlpeminjam = "select * from peminjam where idpeminjam = '$idpeminjam'";
	$hasilpeminjam = mysqli_query($kon,$sqlpeminjam);
	$rowpeminjam = mysqli_fetch_assoc($hasilpeminjam);

	echo "<pre>";
	echo "<h2>BUKTI PEMINJAMAN</h2>";
	echo "NO      : ".date("Ymd").$rowpeminjam['idpeminjam']."<br/>";
	echo "TANGGAL : ".$rowpeminjam['tanggal']."<br/>";
	echo "NAMA    : ".$rowpeminjam['nama']."<br/>";
	$sqlterpinjam = "select buku.judul, buku.pengarang, terpinjam.totalbuku
					from terpinjam inner join buku
					on terpinjam.idbuku = buku.idbuku
					where terpinjam.idpeminjam = '$idpeminjam'";

	$hasilterpinjam = mysqli_query($kon, $sqlterpinjam);

//pemanggilan bentuk tabel yg ditampilkan pada layar untuk buku terpinjam yg dipinjam oleh konsumen
	echo "<table border='1' cellpadding='10' cellspacing='0'>";
	echo "<tr>";
	echo "<th> Judul Buku </th>";
	echo "<th> Pengarang </th>";
	echo "</tr>";

	$totalbuku = 0;
	while($rowterpinjam = mysqli_fetch_assoc($hasilterpinjam)){
		echo "<tr>";
		echo "<td>".$rowterpinjam['judul']."</td>";
		echo "<td align='right'>".$rowterpinjam['pengarang']."</td>";
		echo "</tr>";
		$totalbuku = $totalbuku + $rowterpinjam['totalbuku'];
	}
	echo "<tr>";
	echo "<td align='left'>";
	echo "<strong> Total Buku </strong> </td>";
	echo "<td align ='left'><strong>$totalbuku</strong></td>";
	echo "</tr>";
	echo "</table>";
	echo "</pre>";
 ?>
