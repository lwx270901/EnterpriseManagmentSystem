// Creating children: Query from database, create children element
// and append too appropriate column



////////////////////////////////////
// Selecting children
var actionContainer = $(".table-head.action-container");
var taskIDs = $("#task-id").children(); // used for query
var tasks = $("#task-desc").children();

$.each(tasks, function (index, task) {

    //add button for each
    var action = $(".action");
    $('<button/>', {
        text: 'Open',
        class: 'open-btn',
        id: 'open-btn-' + index
    }).wrap("<div/>").parent().appendTo(action);

});
//Handling Button
var target = "";
$(".table-header").click(function (event) {
    if ($(event.target).attr('id').includes("open-btn-")) {
        //front-end stuff
        $(".submit-card").show();
        $(".result-view").show();
        $(".open-btn").each(function (_, btn) {
            $(btn).css("background-color", "#4CAF50");
        });
        $(event.target).css("background-color", "red");
        //return target
        target = $(event.target);
    }
});

$("#close-btn").click(function (event) {
    $(".submit-card").hide();
    $(".open-btn").each(function (_, btn) {
        $(btn).css("background-color", "#4CAF50");
    });
});

//Handle back-end for submit btn with chosen target
//Check target index with target.attr('id') (open-btn-index)
//From index => get ID from index with taskIDs[index] above

//From ID => query ID employee 