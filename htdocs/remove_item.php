<?
	session_start();

	$x=$_GET["thekey"];
	unset($_SESSION["cart"][$x]);
	header("Location: cart.php");

?>