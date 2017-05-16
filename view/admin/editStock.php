
    <div class="Page">
    <h1>Edit stock</h1>
</div>
<div id="Container">
    <form class="adminAdminEditUserForm" method="POST" action="<?= URL ?>admin/updateUser/<?= $stock['Id'] ?>">
        <input type="hidden" name="Id" value="<?= $stock['Id'] ?>">
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?= $stock['Name']; ?>" required />
                <label for="Price">Price:</label>
        <input type="text" name="Price" value="<?= $stock['Price']; ?>" required />
                <label for="Amount">Amount:</label>
        <input type="text" name="Amount" value="<?= $stock['Amount']; ?>" required />
        <input type="submit" name="submit_update_stock" value="Update" />
    </form>

