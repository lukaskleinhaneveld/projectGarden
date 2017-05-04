<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Project Garden</title>
	<link rel="stylesheet" href="<?= URL ?>css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<script src="<?php URL ?>../public/js/dropdown.js"></script>
</head>
<body>
	<div id="MenuOuter">
		<div id="Menu">
			<nav id="MenuLeft">
		        <ul>
					<?php if(!empty($_SESSION['LoggedIn'])){ ?>
			            <li><a href="<?= URL ?>home/index">Home</a></li>
						<li><a href="<?= URL ?>home/account">Account</a></li>
					<?php } ?>
					<?php if(!empty($_SESSION['isAdmin'])){ ?>
						<li><a href="<?= URL ?>admin/index">Admin</a></li>
					<?php } ?>
		        </ul>
			</nav>
			<nav id="MenuRight">
		        <ul>
					<?php if(!empty($_SESSION['LoggedIn'])){ ?>
						<li></li>
					<?php }else{ ?>
						<li><a href="<?= URL ?>register/index">Register</a></li>
			            <li><a href="<?= URL ?>login/index">Login</a></li>
					<?php } ?>
		        </ul>
			</nav>
			<?php if(!empty($_SESSION['LoggedIn'])){ ?>
				<div class="User">
					<li>
						Hi,
					<div class="dropdown-outer">
					  <button onclick="dropdown()" class="dropbtn"><?= $_SESSION['Firstname'] ." ". $_SESSION['Lastname'] ?></button>
					  <div id="dropdown" class="dropdown-content">
					    <a href="<?php URL ?>../home/account">Account</a>
					    <a href="<?php URL ?>../home/settings">Settings</a>
					    <a href="<?php URL ?>../login/logout">Logout</a>
					  </div>
					</div>
				</li>
				</div>
			<?php } ?>
			<nav id="Clear"></nav>
		</div>
	</div>
