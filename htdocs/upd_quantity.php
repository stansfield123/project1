<?
	session_start();

	$new_quantity=$_GET["quantity"];
	$x=$_GET["thekey"];
	$_SESSION["cart"][$x]=$new_quantity;
	header("Location: cart.php");

?>