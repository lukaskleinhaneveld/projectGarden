<div id="Container">
    <div id="droppableArea">
        <div id="gardenCreation">
            <div id="remove">
            </div>
        </div>
        <div id="itemShoppingList">

            <?php
            foreach($stocks as $stockItem){
            ?>

                <div id="<?= $stockItem['Id'] ?>" class="draggable ui-draggable" onmouseover="drag()">
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
function drag () {

        //Setting the options for the draggable objects
        $( ".draggable" ).draggable({
            helper: "clone"
        });

        //Setting the options for the droppable object
        $( "#gardenCreation" ).droppable({
            //greedy: true,
            containment: "#draggableArea",
            stack: ".draggable",
            drop: function( event, ui ) {
                var posLeft = ui.position.left;
                var posTop = ui.position.top;

                var drag_id = $(ui.draggable).attr("id");
                var targetElem = $(this).attr("id");

                $(this).append($(ui.helper).clone());

                $.ajax({
                    method: "post",
                    dataType: "json",
                    url: "<?= URL ?>/garden/saveDroppablePosition",
                    data: { posLeft: posLeft, posTop: posTop }
                })
                .done(function(data){
                    $("#costSummary") += innerHTML( "Element with id " + $(".draggable").attr("id") + "'s  " + "position-x: " + posLeft + " and position-y: " + posTop );
                });
                //ui.draggable.detach().css({top: 0,left: 0}).appendTo($(this));
            },
        });

        $('#remove').droppable({
            hover: function(event, ui) {
                ui.helper.remove();
            }
        });

    //End of the function that's ran on loading the page
    }

);

</script>
