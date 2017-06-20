<div class="Page">
    <h1>create stock</h1>
</div>
<div id="Container">
<h1>New stock</h1>
<form method="post" action="<?= URL ?>admin/createStock">
    <div>
        <label for="name">Name:</label>
        <input type="text" id="Name" name="Name">
    </div>
    <div>
        <label for="Price">Price:</label>
        <input type="text" id="Price" name="Price">
    </div>
    <div>
        <label for="Amount">Amount:</label>
        <input id="Amount" name="Amount">
    </div>
    <div>
        <label for="ImgURL">ImgURL:</label>
        <input id="ImgURL" name="ImgURL">
    </div>
    <div>
        <label></label>
        <input type="submit" value="Save">
    </div>
</form>
