<?php
$nama = $_POST['nama'];
$email = $_POST['email'];
$notelp = $_POST['notelp'];
$tanggal = date("Y-m-d");
$buku_pilih = '';
$qty = 1;
$dataValid = "YA";

if(strlen(trim($nama))==0){
	echo "nama harus diisi.";
	$dataValid = "TIDAK";
}
if(strlen(trim($notelp))==0){
	echo "notelpon harus diisi.";
	$dataValid = "TIDAK";
}

if(isset($_COOKIE['keranjang'])){ 
	$buku_pilih = $_COOKIE['keranjang'];
}
else{
	echo "Keranjang pinjam kosong";
	$dataValid = "TIDAK";
}

if($dataValid == "TIDAK"){
	echo "Masih ada kesalahan, silahkan perbaiki! <br/>";
	echo "<input type='button' value='Kembali'
	onClick='self.history.back()'>";
	exit;
}

include "koneksi.php";
$simpan = true;
$mulai_transaksi= mysqli_begin_transaction($kon);
$sql = "insert into peminjam (tanggal, nama, email, notelp)
		values('$tanggal','$nama','$email','$notelp')";
$hasil = mysqli_query($kon, $sql);
if(!$hasil){
	echo "Data peminjam gagal disimpan <br/>";
	$simpan=false;
}

$idpeminjam = mysqli_insert_id($kon);
if($idpeminjam==0){
	echo "data customer tidak ada <br/>";
	$simpan=false;
}

$buku_array=explode(",",$buku_pilih); //fungsi built_in untuk mencacah jumlah ke array
$jumlah = count($buku_array); //fungsi count untuk menghitung array
if($jumlah <= 1){
	echo "Tidak ada barang yang dipilih <br/>";
	$simpan=false;
}
else{
	foreach($buku_array as $idbuku){
		if($idbuku==0){
			continue;
		}
		$sql="select * from buku where idbuku='$idbuku'"; //query utk memililh buku tertentu
		$hasil=mysqli_query($kon, $sql);
		if(!$hasil){
			echo "Buku tidak ada <br/>"; //adalah keadaan yg berjalan jika tidak ada buku yg dipilih
			$simpan=false;
			break;
		}
		else{
			$row=mysqli_fetch_assoc($hasil);
			$stok = $row['stok']-1;
			if($stok < 0){
				echo "stok buku ".$row['nama']." kosong ";
				$simpan=false;
				break;
			}
			$totalbuku = $totalbuku + $rowterpinjam ['totalbuku'];
		}
		$sql="insert into terpinjam (idpeminjam, idbuku, qty, totalbuku)
		values('$idpeminjam','$idbuku','$qty','$totalbuku') ";
		$hasil=mysqli_query($kon, $sql);
		if(!$hasil){
			echo "detail buku gagal disimpan <br/>";
			$simpan=false;
			break;
		}
		$sql="update buku set stok = $stok where idbuku = $idbuku";
		$hasil=mysqli_query($kon, $sql);
		if(!$hasil){
			echo "update stok barang gagal"; 
			$simpan=false;
			break;
		}
	}
}_
if($simpan){
	$commit = mysqli_commit($kon);
}
else{
	$rollback = mysqli_rollback($kon);
	echo "Peminjaman gagal <br/>
	<input type='button' value='Kembali'
	onClick='self.history.back()'>";
	exit;
}
header("Location: bukti_pinjam.php?idpeminjam=$idpeminjam");
setcookie('keranjang', $buku_pilih, time()+3600); 
?>
