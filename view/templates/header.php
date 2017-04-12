<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Studenten app</title>
	<link rel="stylesheet" href="<?= URL ?>css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
	<div id="MenuOuter">
		<div id="Menu">
			<nav id="MenuLeft">
		        <ul>
		            <li><a href="<?= URL ?>garden/index">Home</a></li>
		        </ul>
			</nav>
			<nav id="MenuRight">
		        <ul>
					<?php if($_SESSION['LoggedIn'] == 1){ ?>
						<li><a href="<?= URL ?>garden/logout">Logout</a></li>
					<?php }else{ ?>
						<li><a href="<?= URL ?>garden/register">Register</a></li>
					<?php } ?>
		            <li><a href="<?= URL ?>garden/login">Login</a></li>
		        </ul>
			</nav>
			<nav id="Clear"></nav>
		</div>
	</div>

	<?php if(!empty($_SESSION['message'])){ ?>
		<h2><?= $_SESSION['message']; ?></h2>
	<?php } ?>
