<?php
$conn=mysqli_connect("localhost","root","","baza");
  
if (mysqli_connect_errno())
  {
  echo "Neuspelo povezivanje na MySQL: " . mysqli_connect_error();
  }
$sql="INSERT INTO filmovi (Film_Ime, Zanr_ID, Trajanje, Vrsta_ID)
VALUES ('$_POST[film]','$_POST[zanr]','$_POST[trajanje]','$_POST[vrsta]')";

if (!mysqli_query($conn,$sql))
  {
  die('Greska: ' . mysqli_error($conn));
  }
header("location:filmovi.php");
mysqli_close($conn);

?>