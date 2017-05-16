<div id="Container">
    <div id="droppableArea">
        <div id="gardenCreation">
            <div id="remove">
            </div>
        </div>
        <div id="itemShoppingList">

            <?php
            foreach($stock as $stockItem){
            ?>

                <div id="<?= $stockItem['Id'] ?>" class="draggable ui-draggable")>
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

<script type="text/javascript">
    $(document).ready(function(){
        $( ".draggable" ).draggable({
            containment: '#droppableArea',
            cursor: 'move',
            helper: 'clone'
        });
    });
</script>
