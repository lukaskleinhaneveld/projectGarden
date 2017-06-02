<div id="Container">
    <div id="droppableArea">
        <div id="gardenCreation">
            <div id="remove">
                <h1>REMOVE</h1>
            </div>
            <div class="my-drawing">

            </div>
        </div>
        <div id="itemShoppingList">

            <?php
            foreach($stock as $stockItem){
            ?>

                <div id="<?= $stockItem['Id'] ?>" class="draggable ui-draggable" onmouseover="drop()">
                    <p>Item: <?= $stockItem['Name'] ?></p><br/>
                    <p>Price: <?= $stockItem['Price'] ?></p><br/>
                </div>

            <?php
            }
            ?>

        </div>
    </div>
    <div id="summaryArea">
        <div id="totalItemsInGarden">

        </div>
        <div id="costSummary">

        </div>
    </div>
</div>

<!-- Drawing script -->
<!-- <script type="text/javascript">
LC.init(
    document.getElementsByClassName('my-drawing')[0],{
        imageURLPrefix: '<?= URL ?>/img'
    }
);
</script> -->

<!-- Drag and drop script -->
<script type="text/javascript" src="<?= URL ?>/public/js/dragndrop.js"></script>
