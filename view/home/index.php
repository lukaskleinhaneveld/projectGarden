<div id="Container">
    <h1 class="Welcome">Welcome, <br>
    <?php if(!empty($_SESSION['isAdmin'])){ ?> Admin
	<?php } ?><?= $_SESSION['Firstname'].' '.$_SESSION['Lastname'] ?></h1>
    <br/>
</div>