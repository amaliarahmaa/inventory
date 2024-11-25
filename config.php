<?php 
 
$koneksi = mysqli_connect("localhost","root","","rental_kendaraan");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

//url induk
$main_url = "http://localhost/uts/";

?>