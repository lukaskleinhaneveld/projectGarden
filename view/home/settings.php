<div class="Page">
    <h1>Users</h1>
</div>
<div id="Container">
    <h2>User info</h2>
    <div class="userListUsers">
        <form class="" method="post" action="<?= URL ?>admin/updateUser">
            <input type="hidden" name="Id" value="<?= $user['Id'] ?>">
        <br/>
            <label>Firstname: </label>
            <input type="text" name="Firstname" value="<?= $user['Firstname'] ?>">
        </br>
            <label>Lastname: </label>
            <input type="text" name="Lastname" value="<?= $user['Lastname'] ?>">
        </br>
            <label>Password: </label>
            <input type="password" name="Paswword" placeholder="Not shown for security reasons">
        </br>
            <label>Email: </label>
            <input type="text" name="email" value="<?= $user['Email']; ?>">
        </br>
            <input type="submit" name="submit_update_user" value="Save" style="float:right; clear:right;">
        </form>
    </div>
</div>
