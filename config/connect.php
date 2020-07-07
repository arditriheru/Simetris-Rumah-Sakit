<?php 
$connect = mysqli_connect("192.168.1.250","root","rachm12016","dbrachmi");
if (mysqli_connect_error()){echo "Database not connected : " . mysqli_connect_error();
}

// $connect = mysqli_connect("localhost","root","","dbcoba");
// if (mysqli_connect_error()){echo "connect database gagal : " . mysqli_connect_error();
// }
?>