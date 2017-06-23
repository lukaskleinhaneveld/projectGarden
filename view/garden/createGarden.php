<div id="Container">
    <div id="droppableArea">
        <div id="gardenCreation"></div>
        <div id="itemShoppingList">
            <?php
            foreach($stock as $stockItem){
            ?>
                <div id="<?= $stockItem['Id'] ?>" class="item draggable">
                    <img src="<?= $stockItem['ImgURL'] ?>" style="width: 90%; height: 90%; border-radius: 50%; margin-top: 0px;"><br/>
                    <p class="item">Item: <?= $stockItem['Name'] ?></p><br/>
                    <p class="price">Price: <?= $stockItem['Price'] ?></p><br/>

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
var idCounters = [];
var products = [];


function updateCart() {
    var output = '';
    for(var i in idCounters) {
        console.log($('.item#' + i).find('img').attr('src'));
        output = output + '<div id="output"><img src="' + $('.item#' + i).find('img').attr('src') + '" class="outputImg">' + "<p class='amount'>" + i + '=>' + idCounters[i] + "</p></div>";
    }

    console.log("Price: " + $('.item#' + i).find('p.price').text());


    console.log("Output: " + output);

    $('#totalItemsInGarden').html(output);

}


$( document ).ready( function() {
    // Initiate the draggable item and set some options
    $(".draggable").draggable({
        revert: "invalid",
        helper: "clone",
        containment: "#droppableArea",
        start: function (event, ui){
            // Get the id of the parent of the clone that you want to drag
            var id = $(this).attr('id');

            // Check if the item you want to drag already has a custom ID
            // If it doesnt, set the counter to 1
            if (idCounters[id] == null) {
                idCounters[id] = 1;
            // If so, add 1 to the counter
            } else {
                idCounters[id] = idCounters[id] + 1;
            }

            // Set the new id
            var newId = id + "_" + idCounters[id];
            ui.helper.attr("id", newId);
        },
        stop: function (event, ui){

            // Check and log the amount of items with the id of the item you last dragged in the #gardenCreation div
            var counted = $("#gardenCreation > div[id*=" + $(this).attr('id') + "]").length;
            console.log("Amount of divs with id " + $(this).attr("id") + ": " + counted);

        }
    });

    $("#gardenCreation").droppable({
        // accept draggables only from #toolbox,
        // this will prevent cloning of the draggables(inside drop event handler),
        // that already have been dropped inside #container
        accept: "#itemShoppingList .draggable",
        drop: function (event, ui){
            var posLeft = ui.position.left;
            var posTop = ui.position.top;
            console.log("Element with id " + $(".draggable").attr("id") + "'s " + "position-x: " + posLeft + " and position-y: " + posTop);

            var element = $(ui.draggable).clone();
            $(element).draggable({helper: 'clone'});
            // When a draggable is dropped:
            // 1: clone it's helper
            // 2: Make the helper draggable
            // 3: set containment to #container
            $(this).append($(ui.helper).clone().draggable({
                containment: "parent"
            }));
            $("#gardenCreation .draggable").addClass("dropped");
            $(".dropped").removeClass(" ui-draggable-dragging");

            $('.dropped').resizable({
                helper: "resizable-helper",
                ghost: true,
                aspectRatio: true,
                animate: true
            });

            $('.dropped').dblclick(function(event, ui) {
                // Check if the draggable item has the ui-draggable-dragging class
                if($(this).hasClass('dropped')){
                    // If it does, remove the item
                    $(this).remove();
                    console.log("Deleted item with ID: " + $(".draggable").attr("id"));
                }
            });


            $.ajax({
                url: "/fortifyProjects/projectGarden/home/test",
                success: function(result){
                    $("#div1").html(result);
                }
            });

            updateCart();

            console.log(idCounters);

        }
    });
});
</script>

<!-- Drag and drop script -->
<!-- <script type="text/javascript" src="<?= URL ?>/public/js/dragndrop.js"></script> -->
<!-- Google maps API -->
<script type="text/javascript" src="<?= URL ?>/public/js/googleMapsAPI.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3N_V7fK1m6ThuebPa_yH2HpWCuIPXNPs&callback=initMap">
