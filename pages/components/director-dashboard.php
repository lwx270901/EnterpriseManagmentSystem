<style>
    .table-header {
        max-width: 1100px;
        margin: auto;
        background-color: var(--section-gray);
        font-family: var(--main-font);
    }

    .field-name {
        text-align: center;
        /* border-style: solid; */

    }
</style>

<div class="table-header row px-0 g-0">

    <div class="field-name col-6 px-0" id="department-name">Department name
        <div class="field-name"> d1</div>
        <div class="field-name"> d2</div>

    </div>
    <div class="field-name col-6 px-0" id="department-head">Deparment head
        <div class="field-name"> A</div>
        <div class="field-name"> B</div>

    </div>
    <form>
        <label for="search-department">Choose department</label>
        <input list="departments" id="search-department" name="deparment" required>

        <label for="search-user">Choose user</label>

        <input list="users" id="search-user" name="deparment" required>

        <button id="add-dh" type="button"> Add</button>


    </form>
    <div id="dep-results" style="display: none;"></div>
    <div id="user-results" style="display: none;"></div>


</div>

<script>
    var searchDep = $("#search-department")
    var depResults = $("#dep-results");
    var searchUser = $("#search-user");
    var userResults = $("#user-results");

    // Director add department head o day, xu ly database = ajax thoi.
    $('#add-dh').on("click", function (e) {
        $('#department-name').append($("<div>" + searchDep.val() + "</div>"))
        $('#department-head').append($("<div>" + searchUser.val() + "</div>"))

    });
    searchDep.on("input", function (e) {
        handleSearch(searchDep, depResults, "./templates/search-department.php");
    });
    searchUser.on("input", function (e) {
        handleSearch(searchUser, userResults, "./templates/search-user.php");
    })
    function handleSearch(searchBox, searchResults, url) {

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

</script>