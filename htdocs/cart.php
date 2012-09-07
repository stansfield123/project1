<?
	$xml = new SimpleXMLElement(file_get_contents("../etc/menu.xml"));

	session_start();
	
	$cart = $_SESSION["cart"];
?>
<? require_once("../etc/begin.php"); ?>

		<table class="imagetable">
		<? 	
			if($cart)
			{
		?>
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
						<td align="right">
						<form action ="upd_quantity.php" method="get">
							<input type="hidden" name="thekey" value="<?print($key)?>" />
							<select name="quantity">
							<?
							for ($i=1; $i <= 10; $i++){ ?>
								<option value ="<?print($i.'"'); if ($i==$quantity) {print(' selected="selected"');}?>><?print($i)?></option>
							<?}?>
							</select>
							<input type="submit" style="background-color:black; color:white" value="Submit" />
						</form>


						</td>
						<td align="right">$<? printf("%0.2f", $unitPrice); ?></td>
						<td align="right">$<? printf("%0.2f", $itemSubtotal); ?></td>
						<td align="right">
							<form action="remove_item.php">
								<input type="hidden" name="thekey" value="<?print($key)?>" />
								<input type="submit" style="background-color:black; color:white" value="Remove Items">
							</form>
					</tr>
		<? 		
				}
		?>
				<tr><td colspan="5" align="right"><b>Total: $<? printf("%0.2f", $total); ?></b></td></tr>
		<?
			}
			else
			{
		?>
				Your cart is empty!
		<?  }  ?>
		</table>
		<br/>
		<p>
			<form action="checkout.php" method="get">
				<input type="submit" style="height:30px; width:120px; background-color:black; color:white" value="CheckOut" />
			</form>
		</p>
		
<? require_once("../etc/end.php"); ?>