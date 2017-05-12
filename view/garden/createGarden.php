<div id="Container">
    <div id="draggableArea">
        <div id="gardenCreation">

        </div>
        <div id="itemShoppingList">





            <h3 class="Items">Flowers</h3>
        <?php
        foreach($stock as $stockItem){
            if($stockItem['Type'] == 'Flower'){
        ?>
            <div id="<?= $stockItem['Id'] ?>" class="ui-widget-content draggable">
                <p>Item: <?= $stockItem['Name'] ?></p><br/>
                <p>Price: <?= $stockItem['Price'] ?></p><br/>
            </div>
        <?php
            } else if ($stockItem['Type'] == 'Bushe') {
        ?>
            <h3 class="Items">Bushes</h3>
            <div id="<?= $stockItem['Id'] ?>" class="ui-widget-content draggable">
                    <p>Item: <?= $stockItem['Name'] ?></p><br/>
                    <p>Price: <?= $stockItem['Price'] ?></p><br/>
                </div>
        <?php
            } else if($stockItem['Type'] == 'Plant'){
        ?>
            <h3 class="Items">Plants</h3>
            <div id="<?= $stockItem['Id'] ?>" class="ui-widget-content draggable">
                <p>Item: <?= $stockItem['Name'] ?></p><br/>
                <p>Price: <?= $stockItem['Price'] ?></p><br/>
            </div>
        <?php
            }
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
var url = '<?= URL ?>/garden/createGarden';


$( function() {
    // here we tell the "draggable" that is should have a "stop" event
    $( ".draggable" ).draggable({
        helper: 'clone',
        //containment: "#draggableArea",
        stop: function( event, ui ) {

        }
    });
    // as soon as we stop dragging, we send an AJAX POST request
    $( "#gardenCreation" ).droppable({
        accept: ".draggable",
        drop: function(e, ui) {
            dragElement = ui.helper.clone();

            dragElement.appendTo(".draggable");
            console.log("test drop!");
            $( "#gardenCreation" ).style.background-color="black";
        }
    });

});

</script>
