<?php session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Video klub PROJEKAT</title>

<!--[if lt IE 7.]>
<script defer type="text/javascript" src="pngfix.js"></script>
<![endif]-->

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
.style3 {color: #F7F7F7}

table{
	color: #CC0000;
	font-size: 12px;
	width: 300px;
	margin-top: 0px;
}
td{
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
<h1>Filmovi </h1>
   <?php
$conn = mysql_connect( 'localhost', 'root', '');
$db =  mysql_select_db( 'baza' );
  
$sql = "SELECT * FROM filmovi
		INNER JOIN zanr
		ON filmovi.Zanr_ID=zanr.Zanr_ID
		INNER JOIN vrsta
		ON filmovi.Vrsta_ID=vrsta.Vrsta_ID";

$query = mysql_query( $sql );
echo "<table>";

echo "<tr style='color:black;'>";
echo "<td>Film</td>";
echo "<td>Zanr</td>";
echo "<td>Trajanje</td>";
echo "<td>Vrsta</td>";
echo "</tr>";
while( $row = mysql_fetch_assoc($query) )
{
echo "<tr>";
echo "<td>$row[Film_Ime]</td>";
echo "<td>$row[Zanr_Ime]</td>";
echo "<td>$row[Trajanje]</td>";
echo "<td>$row[Vrsta_Ime]</td>";
echo "</tr>";
}
 
 echo "</table>";
 mysql_close($conn);
?>
  </div>
  
  <div class="tekst_crta"></div>
  
<div id="levi_tekst">
<h1>Unos novog filma</h1>

<div class="forma">
 <form action="insertFilmaUBazu.php" method="post">
<label>Film:</label> <input type="text" size="20" name="film"><br>
<label>Trajanje:</label> <input type="text" size="20" name="trajanje"><br>
<select name="zanr" id="listabr">
<?php
    mysql_connect("localhost","root","") or die("Wrong username or password");
    mysql_select_db("baza") or die( "Unable to select database");
    $query = "SELECT * FROM zanr";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) 
    { 
	$ck2 = $row['Zanr_ID'];
	$ck = $row ['Zanr_Ime'];
    echo "<option>" . $ck2 . "&nbsp;" . $ck .  "</option>"; 
    } 
    ?>
    </select>
<br><br>
<select name="vrsta" id="listabr">
<?php
    mysql_connect("localhost","root","") or die("Wrong username or password");
    mysql_select_db("baza") or die( "Unable to select database");
    $query = "SELECT * FROM vrsta";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) 
    { 
	$ck3 = $row ['Vrsta_ID'];
	$ck = $row ['Vrsta_Ime'];
    echo "<option>" . $ck3 . "&nbsp;" . $ck .  "</option>"; 
    } 
    ?>
    </select>
<br><br>

<div class="posalji">
<input type="submit" value="Unesi">
</div>
</form>
</div>
<br><br>

<h1>Brisanje filmova</h1>

<h4>Izaberite film za brisanje:</h4>
<div class="forma2">
<form action="brisanjeFilmaIzListe.php" method="post">
<select name="lista" id="listabr">
<?php
    mysql_connect("localhost","root","") or die("Wrong username or password");
    mysql_select_db("baza") or die( "Unable to select database");
    $query = "SELECT filmovi.Film_ID, filmovi.Film_Ime, zanr.Zanr_Ime, filmovi.Trajanje, vrsta.Vrsta_Ime 
			  FROM filmovi, zanr, vrsta
			  WHERE filmovi.Zanr_ID=zanr.Zanr_ID AND filmovi.Vrsta_ID=vrsta.Vrsta_ID";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) 
    { 
	$fmid = $row['Film_ID'];
    $fmname = $row['Film_Ime']; 
	$fmzanr = $row['Zanr_Ime'];
	$fmvrsta = $row['Vrsta_Ime'];

	
    echo "<option>" . $fmid . "&nbsp;" . $fmname . "&nbsp;" . $fmzanr . "&nbsp;" . $fmvrsta . "</option>"; 
    } 
    ?>
    </select>
    <div class="posalji2">
    <input type="submit" value="Obrisi" name="obrisi"></div>
</form>
</div>
<br><br>



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

