<?php
$conn=mysqli_connect("localhost","root","","baza");
  
if (mysqli_connect_errno())
  {
  echo "Neuspelo povezivanje na MySQL: " . mysqli_connect_error();
  }
$Clan_ID=$_POST['brck'];  
$sql="SELECT Clan_ID, Clan_Ime, Clan_Prezime FROM clanovi WHERE Clan_ID='$Clan_ID'";
$query = mysql_query( $sql );

if (!mysqli_query($conn,$sql))
  {
  die('Greska: ' . mysqli_error($conn));
  }
header("location:iznajmljivanja.php");
mysqli_close($conn);

?>