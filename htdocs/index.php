<?
	$xml = new SimpleXMLElement(file_get_contents("../etc/menu.xml"));

	$categories = $xml->xpath("//category");
?>

<? require_once("../etc/begin.php"); ?>
		
	<div id="list3">
		<ul>
		<? foreach($categories as $category) { ?>
			<li> <a class="title" href="category.php?category=<? print($category['name']);?>"> 
			<?print($category["name"]);?> </a> 
			</li>
						<? } ?>
		</ul>
	</div>
		
    <p>&nbsp;</p>
<? require_once("../etc/end.php"); ?>

<a href = "testing.php">New location!!!</a>