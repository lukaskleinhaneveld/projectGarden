<div class="Page">
    <h1>Search results</h1>
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
                <?php foreach ($results as $result) { ?>
                    <tr>
                        <td style=" padding:2px 5px;">
                            <?= $result['Id']; ?>
                        </td>
                        <td style=" padding:2px 5px;">
                            <?= $result['Email']; ?>
                        </td>
                        <td style=" padding:2px 5px;">
                            <?= $result['Active']; ?>
                        </td>
                        <td style=" padding:2px 5px;">
                            <?= $result['isTeacher']; ?>
                        </td>
                        <td style=" padding:2px 5px;"><a href="<?= URL ?>admin/editUser/<?= $result['Id'] ?>">Edit</a></td>
                        <td style=" padding:2px 5px;"><a href="<?= URL ?>admin/deleteUser/<?= $result['Id'] ?>">Delete</a></td>
                    </tr>
                    <?php } ?>
            </tbody>


        </table>
    </div>
</div>