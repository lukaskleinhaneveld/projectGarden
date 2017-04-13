<div class="container">
<hr class="featurette-divider">
    <div align= "center" class="geluidjes">
        <h3>Edit a user</h3>
        <form action="<?php echo URL; ?>admin/updateuser" method="POST">
            <input type="text" name="email" value="<?php echo htmlspecialchars($user->Email, ENT_QUOTES, 'UTF-8'); ?>" required />
            <br>
            <input type="text" name="active" value="<?php echo htmlspecialchars($user->Active, ENT_QUOTES, 'UTF-8'); ?>" required /><br>
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user->Id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_user" value="Update" />
        </form>
    </div>
