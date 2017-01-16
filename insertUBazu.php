<?php
$conn=mysqli_connect("localhost","root","","baza");
  
if (mysqli_connect_errno())
  {
  echo "Neuspelo povezivanje na MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO clanovi (Clan_Ime, Clan_Prezime, Clan_Tel)
VALUES
('$_POST[ime]','$_POST[prezime]','$_POST[telefon]')";

if (!mysqli_query($conn,$sql))
  {
  die('Greska: ' . mysqli_error($conn));
  }
header("location:clanovi.php");
mysqli_close($conn);

?>