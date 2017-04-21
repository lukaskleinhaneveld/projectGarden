<div id="Container">
    <h1>Admin page!</h1>
</div>

<div align= "center" class="admin">
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Email</td>
                <td>Active</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php if (isset($user->Id)) echo htmlspecialchars($user->Id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($user->Email)) echo htmlspecialchars($user->Email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($user->Active)) echo htmlspecialchars($user->Active, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'admin/deleteUser/' . htmlspecialchars($user->Id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a></td>
                    <td><a href="<?php echo URL . 'admin/editUser/' . htmlspecialchars($user->Id, ENT_QUOTES, 'UTF-8'); ?>">Edit</a></td>
                </tr>
            <?php } ?>
            </tbody>


        </table>
    </div>                       

<hr class="featurette-divider">

