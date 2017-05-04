<div id="MessageBox">
        <?php if(!empty($_SESSION['message'])){ ?>
            <h3 class="Message"><?= $_SESSION['message']; ?></h3>
        <?php } unset($_SESSION['message']); /*highlight_string("<?php\ninput =\n" . var_export($_SESSION, true) . ";\n?>");*/ ?>
    </div>
</body>
</html>
