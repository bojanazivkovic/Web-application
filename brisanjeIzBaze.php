<?php

$conn=mysqli_connect("localhost","root","","baza");
if (mysqli_connect_errno())
  {
  echo "Neuspelo povezivanje na MySQL: " . mysqli_connect_error();
  }
$Clan_ID=$_POST['brck'];
$sql="DELETE FROM clanovi WHERE Clan_ID=$Clan_ID";

if (!mysqli_query($conn,$sql))
  {
  die('Greska: ' . mysqli_error($conn));
  }
header("location:clanovi.php");
mysqli_close($conn);

?>