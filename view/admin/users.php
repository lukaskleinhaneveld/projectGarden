<div class="Page">
    <h1>Users</h1>
</div>
<div id="Container">
    <form class="Search" method="GET" action="findUser">
        <input type="text" name="search" placeholder="Search..." />
        <input type="submit" value="Search" />
    </form>
    <div class="userList">
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Id</td>
                    <td>Email</td>
                    <td>Active</td>
                    <td>Admin</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td class = "content">
                            <?= $user['Id']; ?>
                        </td>
                        <td class = "content">
                            <?= $user['Email']; ?>
                        </td>
                        <td class = "content">
                            <?= $user['Active']; ?>
                        </td>
                        <td class = "content">
                            <?= $user['isAdmin']; ?>
                        </td>
                        <td class = "content"><a href="<?= URL ?>admin/editUser/<?= $user['Id'] ?>">Edit</a></td>
                        <td class = "content"><a href="<?= URL ?>admin/deleteUser/<?= $user['Id'] ?>">Delete</a></td>
                    </tr>
                    <?php } ?>
            </tbody>


        </table>
    </div>
</div>
