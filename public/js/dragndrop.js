var idCounters = [];

function drop(){
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
            $(".dropped").draggable({
                containment: '#gardenCreation'
            });

            $( ".dropped" ).resizable({
                ghost: true,
                aspectRatio: true,
                helper: "resizable-helper"
            });


        }
    });


    $('.draggable').dblclick(function(event, ui) {
        // Check if the draggable item has the ui-draggable-dragging class
        if($(this).hasClass('ui-draggable-dragging')){
            // If it does, remove the item
            $(this).remove();
            console.log("Deleted item with ID: " + $(".draggable").attr("id"));
        }
    });

}
