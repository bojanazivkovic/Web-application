<?php session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Video klub PROJEKAT</title>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/style.css">

<script>
  $(function() {
		$( "#datepicker" ).datepicker();
	});
  </script>
<style type="text/css">
<!--
@import url("css/stilovi2.css");
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
h1 {
	font-size: 20px;
}
.style1 {
	color: #CC0000;
	font-weight: bold;
}
.style2 {
	color: #CC0000;
	font-size: 12px;
}
.style3 {
	color: #F7F7F7
}
table {
	color: #CC0000;
	font-size: 12px;
	width: 300px;
	margin-top: 0px;
}
td {
	text-align: left;
	padding-top: 2px;
	padding-right: 7px;
	border: 1px solid #000;
}
-->
</style>
</head>
<body>
<div id="wrapper">
  <div id="okvir">
    <div class="gornja_crvena"> </div>
    <!--HEADER-->
    <div id="header">
      <div class="heder_slika1"></div>
    </div>
    <div class="heder_slika2">
      <div class="hed_tekst"> Zdravo , <?php echo $_SESSION['myusername']; ?> <br>
        <a href="logout.php">LOGOUT</a> </div>
    </div>
    <!--kraj HEADERA-->
    <!--SREDINA-->
    <div id="sredina">
      <div id="levo">
        <div class="levo_tekst"><a href="prva.php">home</a></div>
      </div>
      <div class="nar_dugme">
        <div id="gtekst"><a href="clanovi.php">Clanovi</a></div>
      </div>
      <div class="zel_dugme">
        <div id="gtekst"><a href="filmovi.php">Filmovi</a></div>
      </div>
      <div class="roze_dugme">
        <div id="gtekst2"><a href="iznajmljivanja.php">Iznajmljivanja</a> </div>
      </div>
      <div class="plavo_dugme">
        <?php if($_SESSION['myusername'] == 'admin'): ?>
        <div id="gtekst"> <a href="finansije.php">Finansije</a> </div>
        <?php else: ?>
        <div id="gtekst"> </div>
        <?php endif; ?>
      </div>
      <div id="desni_tekst">
        <h1>Iznajmljivanja</h1>
        <div class="forma_sredina">
          <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            Broj clanske karte:
            <input type="text" name="brck">
            <br>
            <input type="submit" name="pronadji" value="Pronadji">
          </form>
        </div>
        <br>
        <br>
        <?php mysql_connect("localhost","root","") or die("Wrong username or password");
mysql_select_db("baza") or die( "Unable to select database");



if ( isset( $_POST['pronadji'] ) ) {

$idclan=$_POST['brck'];  
$sql="SELECT Clan_ID, Clan_Ime, Clan_Prezime FROM clanovi WHERE Clan_ID='$idclan'";
$query = mysql_query( $sql );

if( $row = mysql_fetch_assoc($query) )
{
	$_SESSION['Clan_ID'] = $row['Clan_ID'];

	$brclk=$row['Clan_ID'];
	$ime = $row['Clan_Ime'];
	$prez = $row['Clan_Prezime'];
echo "<table>";
echo "<tr style='color:black;'>";
echo "<td>Br.cl.k</td>";
echo "<td>Ime</td>";
echo "<td>Prezime</td>";
echo "</tr>";
echo "<tr>";
echo "<td>" . $brclk . "</td>";
echo "<td>" . $ime . "</td>";
echo "<td>" . $prez . "</td>";
echo "</tr>";
echo "</table>";
echo "<br><br>";



echo "Datum iznajmljivanja: ";
echo '<input type="text" name="datum" value="'. date("d.m.Y") .'" readonly/>';

echo "<br><br>";

echo "<label>Izaberi film:</label>";
echo '<div class="forma_sredina2">';
echo '<form action="insertIznajUBazu.php" method="post">';
echo '<select name="lista" id="listabr">';
$query2 = "SELECT filmovi.Film_ID, filmovi.Film_Ime, zanr.Zanr_Ime, filmovi.Trajanje, vrsta.Vrsta_Ime 
			  FROM filmovi, zanr, vrsta
			  WHERE filmovi.Zanr_ID=zanr.Zanr_ID AND filmovi.Vrsta_ID=vrsta.Vrsta_ID";
    $result2 = mysql_query($query2);
    while ($row = mysql_fetch_array($result2)) 
    { 
	$fmid = $row['Film_ID'];
    $fmname = $row['Film_Ime']; 
	$fmzanr = $row['Zanr_Ime'];
	$fmvrsta = $row['Vrsta_Ime'];

	
    echo "<option>" . $fmid . "&nbsp;" . $fmname . "&nbsp;" . $fmzanr . "&nbsp;" . $fmvrsta . "</option>"; 
    } 
echo "</select>";
echo '<div class="posalji">';
echo '<input type="submit" value="Unesi" name="unesiIznaj">';
echo "</div>";
echo "</form>";
echo "</div>";


}
else{
	print("Ne postoji clan sa tim brojem!");
	}
}
?>
      </div>
      
      
      
      
      
      
      
      
      
      
      <div class="tekst_crta5"></div>
      <div id="levi_tekst5">
        <h1>Vracanje filmova</h1>
        
        <div class="forma_sredina">
          <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            Broj clanske karte:
            <input type="text" name="brck">
            <br>
            <input type="submit" name="pronadji2" value="Pronadji">
          </form>
        </div>
        <br>
        <br>
        <?php mysql_connect("localhost","root","") or die("Wrong username or password");
mysql_select_db("baza") or die( "Unable to select database");

if ( isset( $_POST['pronadji2'] ) ) {
	
$idclan=$_POST['brck'];  
$sql="SELECT clanovi.Clan_ID, clanovi.Clan_Ime, clanovi.Clan_Prezime, iznajmljivanja.Datum_iznaj, filmovi.Film_Ime, vrsta.Vrsta_Ime
	FROM clanovi
    INNER JOIN iznajmljivanja 
        ON (clanovi.Clan_ID = iznajmljivanja.Clan_ID)
    INNER JOIN filmovi 
        ON (filmovi.Film_ID = iznajmljivanja.Film_ID)
    INNER JOIN zanr 
        ON (zanr.Zanr_ID = filmovi.Zanr_ID)
    INNER JOIN vrsta 
        ON (vrsta.Vrsta_ID = filmovi.Vrsta_ID)
	WHERE iznajmljivanja.Clan_ID = '$idclan'";
$query = mysql_query( $sql );

$row['Clan_ID'] = $_SESSION['Clan_ID'];
	
echo "<table>";
echo "<tr style='color:black;'>";
echo "<td>Datum</td>";
echo "<td>Ime</td>";
echo "<td>Prezime</td>";
echo "<td>Film</td>";
echo "<td>Vrsta</td>";
echo "</tr>";



while ($row = mysql_fetch_array($query)) 
{
	$brclk=$row['Clan_ID'];
	$ime = $row['Clan_Ime'];
	$prez = $row['Clan_Prezime'];
	$datiz = $row['Datum_iznaj'];
	$film = $row['Film_Ime'];
	$vrsta = $row['Vrsta_Ime'];
	
echo "<tr>";
echo "<td>" . $datiz . "</td>";
echo "<td>" . $ime . "</td>";
echo "<td>" . $prez . "</td>";

echo "<td>" . $film . "</td>";
echo "<td>" . $vrsta . "</td>";
echo "</tr>";
}

echo "</table>";
echo "<br>";



echo "Datum vracanja: ";
echo '<p><input type="text" id="datepicker" name="datumvr"/></p>';
echo "<br><br>";

echo '<div class="posalji">';
echo '<input type="submit" value="Unesi" name="unesiIznaj">';
echo "</form>";
echo "</div>";

}
?>
      </div>
      
        <br>
        <br>
      </div>
    </div>
    <!--kraj SREDINE-->
    <!--FOOTER-->
    <div id="footer"><a href="#" target="_blank">Bojana Zivkovic</a></div>
    <!--kraj FOOTERA-->
    <div class="donja_crvena"></div>
  </div>
</div>
</body>
</html>
