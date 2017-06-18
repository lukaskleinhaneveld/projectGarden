var count = 0;
function drop(){
    $(".draggable").draggable({
        revert: "invalid",
        helper: "clone",
        containment: "#droppableArea",
        start: function (event, ui){
            counter = $(this).attr("class") + " " +count++;
            $(this).addClass(counter);
            console.log(counter);
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
        }
    });

    $('.draggable').dblclick(function(event, ui) {
        console.log("Deleted item with ID: " + $(".draggable").attr("id"));
        $(this).remove();
    });

}