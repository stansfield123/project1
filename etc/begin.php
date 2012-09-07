<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><? print($xml->name); ?></title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	</head>
	<body id="bg">
		<!--Spry Menu, from Dreamweaver
		CSS and Javascript files in SpryAssets folder-->

		<h1 align="center" class="title"><? print($xml->name); ?></h1>
		<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
		<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<!-- css/style.css contains the style of the list in index.php and 
			the table in category.php -->

		<ul id="MenuBar1" class="MenuBarHorizontal">
		  <li><a href="index.php">Menu</a>  </li>
		  <li><a href="cart.php">View Cart</a></li>
		  <li><a href="clear.php">Clear Cart</a></li>
		</ul>
		<script type="text/javascript">
			var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
		</script>
		<br/><br/><br/>
		