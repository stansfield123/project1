<?
	$xml = new SimpleXMLElement(file_get_contents("../etc/menu.xml"));

	$category = $_GET["category"];
	$items = $xml->xpath("//category[@name='$category']/items/item");
?>
<? require_once("../etc/begin.php"); ?>

		<table class = "imagetable">
		<tr>
			<th><? print($category); ?> 
		</tr>
		<? foreach($items as $item) { ?>
			<tr>
				<td><? print($item["name"]); ?></td>
				<? foreach($item->price as $price) { ?>
					<td><a href="add2cart.php?name=<?print(htmlspecialchars($item["name"]));?>&size=<?echo $price["size"]?>"><? print($price."  /  ".$price['size']); ?></a></td>
				<? } ?>
			</tr>
		<? } ?>
		</table>
		
<? require_once("../etc/end.php"); ?>