<?
	// check for the existence of $name as a GET parameter
	if(!isset($_GET["name"]))
	{
		/* Redirect to a different page in the current directory that was requested */
		header("Location: index.php");
		exit;
	}
	$name = $_GET["name"];
	// then check for the validity of the name using XPath query
	$xml = new SimpleXMLElement(file_get_contents("../etc/menu.xml"));
	$realname = $xml->xpath("//item[@name='$name']");
	if (!isset($realname[0]))
	{
		header("Location: index.php");
		exit;
	}
	

	// check for the existence of $size as a GET parameter
	if(!isset($_GET["name"]))
	{
		header("Location: index.php");
		exit;
	}
	$size = $_GET["size"];
	// then check for the validity of the size using XPath query
	$realsize = $realname[0]->xpath("//price[@size='$size']");
	if (!isset($realsize[0]))
	{
		header("Location: index.php");
		exit;
	}

	session_start();
	
	// add to cart using a key of the format ["cart"]["Onions.small"]
	$key = $name . "." . $size;
	if($_SESSION["cart"][$key] >= 10) 
	{
		header("Location: error.php");
		exit;
	}
	else 
	{
		$_SESSION["cart"][$key] = $_SESSION["cart"][$key] + 1;
		header("Location: cart.php");
	}
	
	
?>