<?php
date_default_timezone_set('Asia/Jakarta');

$con = mysqli_connect("localhost","root","","cmsblog");

if(mysqli_connect_errno()){
	exit('Error Koneksi Database :' . mysqli_connect_error());
}
?>