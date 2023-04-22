export function handleSearch(searchBox, searchText, searchResults, url) {

    searchResults.empty();
    if (searchText === "") {
        searchResults.empty();
        searchResults.hide();
    }
    $.ajax({
        url: url,
        method: "POST",
        data: {
            query: searchText,
        },
        success: function (response) {
            $.each(response, function (index, r) {
                var searchItem = $("<div>" + r.name + "</div>");
                console.log(searchItem);
                searchItem.on("click", function (e) {
                    searchBox.val($(this).text());
                    searchResults.empty();
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
}
