<?php 
//$koneksi = mysqli_connect("localhost","root","","beework");
 
// Check connection
//if (mysqli_connect_errno()){
//	echo "connection database failed please check your connection database : " . mysqli_connect_error();
//}
 
?>

<?php 

$koneksi = mysqli_connect("192.168.10.8","rsizzadb","rsizza123!@#","sik");

 

// Check connection

if (mysqli_connect_errno()){

	echo "Koneksi database gagal : " . mysqli_connect_error();

}

 

?>