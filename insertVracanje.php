<?php
session_start();
$conn=mysqli_connect("localhost","root","","baza");
  
if (mysqli_connect_errno())
  {
  echo "Neuspelo povezivanje na MySQL: " . mysqli_connect_error();
  }
  
$_POST['datumvr'] = $_SESSION['Datum_vracanja'];
$row['Clan_ID'] = $_SESSION['Clan_ID'];
$datum = $_POST['datum'];//datum
$listabr = $_POST['lista'];//lista filmova


$sql="INSERT INTO iznajmljivanja (Datum_iznaj,Datum_vracanja Clan_ID, Film_ID)
VALUES ('$_POST[datum]',now(),'{$_SESSION[Clan_ID]}','$_POST[lista]')";


if (!mysqli_query($conn,$sql))
  {
  die('Greska: ' . mysqli_error($conn));
  }
header("location:iznajmljivanja.php");

mysqli_close($conn);

?>