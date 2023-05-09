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

export function handleSearchForDirector(searchUserBox, userResultDropdown, url, selectedUserBox) {
    var query = searchUserBox.val();

    // Always empty the userResultDropdown, otherwise it will keep appending employee results
    userResultDropdown.empty();
    if (query === "") {
        userResultDropdown.hide();
    }

    // Perform query based on query value (keyword in the "Choose department head" input box)
    $.ajax({
        url: url,
        method: "POST",
        data: {
            query: query
        },
        success: function (response) {
            var data = JSON.parse(response);

            $.each(data, function (index, r) {
                var searchItem = $("<option value='" + r.EmployeeId + "'>" + r.EmployeeName + "</option>");
                userResultDropdown.append(searchItem);

                // onclick event handler when choosing an assigned employee to be a new dephead
                searchItem.on("click", function (e) {
                    // remove the input from the input search box
                    searchUserBox.val("");

                    // fill in the selectedUserBox with the information of that employee
                    selectedUserBox[0].innerHTML = r.EmployeeName;
                    selectedUserBox[0].value = r.EmployeeId;

                    // hide the result dropdown on click
                    userResultDropdown.hide();
                });
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error:", errorThrown);
        }

    })
    userResultDropdown.show();
    query = "";
}