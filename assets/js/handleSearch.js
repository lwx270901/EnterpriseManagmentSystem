export function handleSearch(searchBox, searchResults, url) {

    var query = searchBox.val();
    searchResults.empty();
    if (query === "") {
        searchResults.empty();
        searchResults.hide();
    }
    // Them field data vao de query
    // No dang luc nao echo nen chua empty luc ko search
    $.ajax({
        url: url,
        method: "GET",
        success: function (response) {
            $.each(response, function (index, r) {
                var searchItem = $("<div>" + r.name + "</div>");
                searchItem.on("click", function (e) {
                    searchBox.val($(this).text()); // set input value to selected option
                    searchResults.hide();
                });
                searchResults.append(searchItem);
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error:", errorThrown);
        }

    })
    searchResults.show();
    query = "";

}
