<?
	$xml = new SimpleXMLElement(file_get_contents("../etc/menu.xml"));

	$categories = $xml->xpath("//category");
?>

<? require_once("../etc/begin.php"); ?>
		
	<table class="imagetable">
		
		<? foreach($categories as $category) { ?>
			<tr><td> <a href="category.php?category=<? print($category['name']);?>"> 
			<?print($category["name"]);?> </a> 
			<tr></td>
						<? } ?>
		
	</table>
		
    <p>&nbsp;</p>
<? require_once("../etc/end.php"); ?>

<a href = "testing.php">TEsting</a>