<?php 
$host_koneksi = "localhost";
$host_username = "root";
$host_password = "";
$host_database = "angkatan1_laundry";

$conn = mysqli_connect($host_koneksi, $host_username, $host_password, $host_database);
if(!$conn) {
    echo "Connection Failed";
}
?>