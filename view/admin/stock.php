<div class="Page">
    <h1>Stock</h1>
</div>
<div id="Container">
    <div class="stockList">
       <a href="<?= URL ?>admin/createStock">create</a>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td class="header">Id</td>
                    <td class="header">Name</td>
                    <td class="header">Price</td>
                    <td class="header">Amount available</td>
                    <td class="header">Edit</td>
                    <td class="header">Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stocks as $stock) { ?>
                    <tr class="stockList">
                        <td class="content"">
                            <?= $stock['Id']; ?>
                        </td>
                        <td class="content"">
                            <?= $stock['Name']; ?>
                        </td>
                        <td class="content"">
                            <?= $stock['Price']; ?>
                        </td>
                        <td class="content"">
                            <?= $stock['Amount']; ?>
                        </td>
                        <td class="content""><a href="<?= URL ?>admin/editStock/<?= $stock['Id'] ?>">Edit</a></td>
                        <td class="content""><a href="<?= URL ?>admin/deleteStock/<?= $stock['Id'] ?>">Delete</a></td>
                    </tr>
                    <?php } ?>
            </tbody>


        </table>
    </div>
</div>