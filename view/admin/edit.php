<div class="Page">
    <h1>Edit user</h1>
</div>
<div id="Container">
    <form class="adminAdminEditUserForm" method="POST" action="<?= URL ?>admin/editStock/<?= $user['Id'] ?>">
        <input type="hidden" name="Id" value="<?= $user['Id'] ?>">
        <label for="email">User email:</label>
        <input type="text" name="email" value="<?= $user['Email']; ?>" required />
        <br>
        <label for="active">User active state:</label>
            <select name="Active">
                <option value="" disabled selected>Selcect a value</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        <br>
        <label for="active">User is admin:</label>
            <select name="isAdmin">
                <option value="" disabled selected>Selcect a value</option>
                <option value="1">Admin</option>
                <option value="0">No Admin</option>
            </select>
        <input type="submit" name="submit_update_user" value="Update" />
    </form>