<?php
session_start(); 
$host="localhost";
$username="root";
$password="";
$db_name="baza";
$tbl_name="zaposleni";


mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

// obezbediti MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($myusername == 'admin' && $mypassword == 'admin'){
	header("location:prva.php");
	$_SESSION['myusername'] = $myusername;
	$_SESSION['mypassword'] = $mypassword;

	}
else if($count==1){
$_SESSION['myusername'] = $myusername;
$_SESSION['mypassword'] = $mypassword;

$inTwoMonths = 60 * 60 * 24 * 1 + time(); 
setcookie('user', md5($myusername), $inTwoMonths); 
	
header("location:prva.php");
}
else {
echo "Pogresan Username ili Password";

}
?>