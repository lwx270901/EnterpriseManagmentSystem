export function handleSearch(searchBox, searchText, searchResults, url) {

    searchResults.empty();
    if (searchText === "") {
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
                    searchBox.val($(this).text());
                    searchResults.empty();
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
