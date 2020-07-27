<?php 
include '../../config/connect.php';
$lokasi_file 	= $_FILES['dokumen']['tmp_name'];
$nama_file   	= $_FILES['dokumen']['name'];
$folder 		= "../../../ebook-file-upload/$nama_file";
$judul 			= $_POST['judul'];
$penulis 		= $_POST['penulis'];
$penerbit 		= $_POST['penerbit'];
$tahun    		= date("Ymd");
$kategori 		= $_POST['kategori'];
if (move_uploaded_file($lokasi_file,"$folder")){
	mysqli_query($koneksi,"insert into buku
		values('','$judul','$penulis','$penerbit','$tahun','$kategori','$nama_file')");
}
else{
	echo "File gagal di upload";
}
header("location:ebook-tampil");
?>