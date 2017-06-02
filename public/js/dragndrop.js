var count = 0;
function drop(){
    $( ".draggable" ).draggable({
        cursor: 'move',
        helper: 'clone',
        stack: '.draggable',
        //contain: '#gardenCreation'
    });

    $( "#gardenCreation" ).droppable({
        drop: function( event, ui ) {
            var posLeft = ui.position.left;
            var posTop = ui.position.top;

            console.log("Element with id " + $(".draggable").attr("id") + "'s  " + "position-x: " + posLeft + " and position-y: " + posTop);
            $(this).append($(ui.draggable).clone());

            $.ajax({
                method: "post",
                dataType: "json",
                url: "<?= URL ?>/garden/saveDroppablePosition",
                data: { posLeft: posLeft, posTop: posTop }
            })
            .done(function(data){

            });
        },
    });

    $( "#remove" ).droppable({
        drop: function( event, ui ) {
            ui.helper.destroy();
        }
    });
};
