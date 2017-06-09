function drop(){
    $(".draggable").draggable({
        revert: "invalid",
        helper: "clone"
    });

    $("#gardenCreation").droppable({
        // accept draggables only from #toolbox,
        // this will prevent cloning of the draggables(inside drop event handler),
        //  that already have been dropped inside #container
        accept: "#itemShoppingList .draggable",
        drop: function (event, ui) {
            var element = $(ui.draggable).clone();
            $(this).append(element);
            $(element).draggable({helper: 'clone'});
            // when a draggable is dropped:
            // 1: clone it's helper
            // 2: Make the helper draggable
            // 3: set containment to #container
            $(this).append($(ui.helper).clone().draggable({
                containment: "parent"
            }));
        }
    });
}