var count = 0;
function drop(){
    $(".draggable").draggable({
        revert: "invalid",
        helper: "clone",
        containment: "#droppableArea",
        stop: function (event, ui){
            var counted = $("#gardenCreation > div[id*=" + $(this).attr("id") + "]").length;
            console.log("Amount of divs with id " + $(this).attr("id") + ": " + counted);

            $(ui.helper).addClass(" dropped");
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
            console.log("Element with id " + $(".draggable").attr("id") + " and " + $(".draggable").attr("class") + "'s " + "position-x: " + posLeft + " and position-y: " + posTop);

            var element = $(ui.draggable).clone();
            $(element).draggable({helper: 'clone'});
            // When a draggable is dropped:
            // 1: clone it's helper
            // 2: Make the helper draggable
            // 3: set containment to #container
            $(this).append($(ui.helper).clone().draggable({
                containment: "parent"
            }));
            
            if ($(this).hasClass("dropped")){
                $(this).draggable({});
            }
        }
    });


    $('.draggable').dblclick(function(event, ui) {
        if($(this).hasClass('ui-draggable-dragging')){

        console.log("Deleted item with ID: " + $(".draggable").attr("id"));
        $(this).remove();
        }
    });

}
