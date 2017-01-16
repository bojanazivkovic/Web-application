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
@import url("css/stilovi.css");
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
      <div class="nar_dugme">
        <div id="gtekst"><a href="clanovi.php">Clanovi</a></div>
      </div>
      <div class="slika2"></div>
      <div class="zel_dugme">
        <div id="gtekst"><a href="iznajmljivanja.php">Iznajmljivanja</a></div>
      </div>
      <div class="slika3"></div>
      <div class="roze_dugme">
        <div id="gtekst2"><a href="filmovi.php">Filmovi</a> </div>
      </div>
      <div class="slika4"></div>
      
       <?php if($_SESSION['myusername'] == 'admin'): ?>
      <div class="plavo_dugme">
        <div id="gtekst"> <a href="finansije.php">Finansije</a> </div>
      </div>
      <div class="slika5"></div>
              <?php else: ?>
        <div id="gtekst"> </div>
        <?php endif; ?>

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
