<div id="Container">
    <div id="droppableArea">
        <div id="gardenCreation">
            <div class="my-drawing">
                <div id="remove"></div>
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
<!-- Drawing JS -->
<script>
    LC.init(
        document.getElementsByClassName('my-drawing')[0],
        {imageURLPrefix: '<?= URL ?>/img'}
    );
</script>

<script type="text/javascript">
    function drop(){
        $( ".draggable" ).draggable({
            //greedy: true,
            //containment: '#gardenCreation',
            cursor: 'move',
            helper: 'clone',
            addClass: 'ui-draggable',
            //revert: 'invalid',
            stack: '.draggable',
        });

        $( "#gardenCreation" ).droppable({
            // drop: function( event, ui ) {
            //     accept: ".draggable",
            //     $( ".draggable" ).appendTo(this)
            // }
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

        $( "#remove" ).droppable({
            drop: function( event, ui ) {
                ui.destroy();
            }
        });
    };
</script>
