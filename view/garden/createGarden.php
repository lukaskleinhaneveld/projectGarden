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

                <div id="<?= $stockItem['Id'] ?>" class="draggable ui-draggable">
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
//Run this script as soon as the page is loadded
$(document).ready(
    $( function () {

        //Setting the options for the draggable objects
        $( ".draggable" ).draggable({
            //helper: "clone",
            addClass: "ui-draggable",
            appendTo: "#gardenCreation",
            stack: ".draggable",
            containment: "#draggableArea",
        });

        //Setting the options for the droppable object
        $( "#gardenCreation" ).droppable({
            greedy: true,
            drop: function( event, ui ) {
                var posLeft = ui.position.left;
                var posTop = ui.position.top;

                var drag_id = $(ui.draggable).attr("id");
                var targetElem = $(this).attr("id");

                console.log( "Element with id " + $(".draggable").attr("id") + "'s  " + "position-x: " + posLeft + " and position-y: " + posTop );

                $("#gardenCreation").find('#gardenCreation').append(ui.draggable);

                $.ajax({
                    method: "post",
                    dataType: "json",
                    url: "<?= URL ?>/garden/saveDroppablePosition",
                    data: { posLeft: posLeft, posTop: posTop }
                })
                .done(function(data){

                    $("#costSummary").html(data);
                    console.log("Data: " + data);
                });
            },
        });

        $('#remove').droppable({
            over: function(event, ui) {
                ui.helper.remove();

                $(".droppable").addClass('ui-draggable');
            }
        });

    //End of the function that's ran on loading the page
    })
);

</script>
