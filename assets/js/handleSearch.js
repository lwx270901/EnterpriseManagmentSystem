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
        method: "POST",
        data: {
            query: query
        },
        success: function (response) {
            var data = JSON.parse(response);

            $.each(data, function (index, r) {
                var searchItem = $("<option value='" + r.EmployeeId + "'>" + r.Username + "</option>");
                searchItem.on("click", function (e) {
                    searchBox.val($(this).text()); // set input value to selected option
                    searchResults.hide();
                });                
                searchResults.append(searchItem);
                searchBox.append(searchItem);
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error:", errorThrown);
        }

    })
    searchResults.show();
    query = "";
}
