<?
	$xml = new SimpleXMLElement(file_get_contents("../etc/menu.xml"));

	$categories = $xml->xpath("//category");

	session_start();
	$cart = $_SESSION["cart"];
?>
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><? print($xml->name); ?></title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="bg">
		<h1 align="center" class="title"><? print($xml->name); ?></h1>
		<h2 class="title">Your order:</h2>
		
		
		<? 	
			if($cart)
			{
		?>
				<table class="imagetable">
				<th>Item</th><th>Size</th><th>Quantity</th><th>Unit Price</th><th>Item Subtotal</th>
		<?
				$keys = array_keys($cart);
				foreach($keys as $key) 
				{ 
					$array = explode(".", $key);
					$name = $array[0];
					$size = $array[1];
					$quantity = $cart["$key"];
					
					$price = $xml->xpath("//item[@name='$name']/price[@size='$size']");
					$unitPrice = (float) $price[0];
					$itemSubtotal = $unitPrice * $quantity;
					
					$total = $total + $itemSubtotal;
		?>
					<tr>
						<td><? print($name); ?></td>
						<td><? print($size); ?></td>
						<td align="right"><? print($quantity);?></td>
						<td align="right">$<? printf("%0.2f", $unitPrice); ?></td>
						<td align="right">$<? printf("%0.2f", $itemSubtotal); ?></td>
					</tr>
		<? 		
				}
		?>
				<tr><td colspan="5" align="right"><b>Total: $<? printf("%0.2f", $total); ?></b></td></tr>
				</table>
				<h2 class="title">Your order has been sent!</h2>
		<?
			}
			else
			{
		?>
				Your cart is empty!
		<?  }  ?>
		</table>
		<br/>
		<a href="index.php">Back to menu</a>

<? require_once("../etc/end.php"); 
   session_destroy();
?>

