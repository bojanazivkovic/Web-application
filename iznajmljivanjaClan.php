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
          <form action="brojClanskeKarte.php" method="post">
            Broj clanske karte:
            <input type="text" name="brck">
            <br>
            <input type="submit" value="Pronadji">
          </form>
          
        </div>



   <?php
echo "<table>";

echo "<tr style='color:black;'>";
echo "<td>Br.cl.k</td>";
echo "<td>Ime</td>";
echo "<td>Prezime</td>";
echo "</tr>";
while( $row = mysql_fetch_assoc($query) )
{
echo "<tr>";
echo "<td>$row[Clan_ID]</td>";
echo "<td>$row[Clan_Ime]</td>";
echo "<td>$row[Clan_Prezime]</td>";
echo "</tr>";
}
 
 echo "</table>";
?>




      </div>
      <div class="tekst_crta"></div>
      <div id="levi_tekst">
        <h1>Vracanje filmova</h1>
        <div class="forma">
          <form action="insertFilmaUBazu.php" method="post">
            <label>Film:</label>
            <input type="text" size="20" name="film">
            <br>
            <label>Trajanje:</label>
            <input type="text" size="20" name="trajanje">
            <br>
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
            <br>
            <br>
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
            <br>
            <br>
            <div class="posalji">
              <input type="submit" value="Unesi">
            </div>
          </form>
        </div>
        <br>
        <br>
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
              <input type="submit" value="Obrisi" name="obrisi">
            </div>
          </form>
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
