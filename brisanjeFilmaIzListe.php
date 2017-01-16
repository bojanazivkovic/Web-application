<?php

$conn=mysqli_connect("localhost","root","","baza");
if (mysqli_connect_errno())
  {
  echo "Neuspelo povezivanje na MySQL: " . mysqli_connect_error();
  }
$listabr = $_POST['lista'];
$sql="DELETE FROM filmovi WHERE Film_ID='$listabr'";

if (!mysqli_query($conn,$sql))
  {
  die('Greska: ' . mysqli_error($conn));
  }
  
header("location:filmovi.php");
mysqli_close($conn);

?>