
import {handleSearch} from "../../assets/js/handleSearch.js";
import {handleAddDep} from "../../assets/js/handleAddDep.js";

var searchDep = $("#search-department");
var description = $("#department-description");
var depResults = $("#dep-results");
var searchUser = $("#search-user");
var userResults = $("#user-results");

$('#add-dh').on("click", function(e) {
    e.preventDefault();
    // $('#department-name').append($("<div>" + searchDep.val() + "</div>"))
    // $('#department-head').append($("<div>" + searchUser.val() + "</div>"))
    handleAddDep(searchDep.val(), description.val(), searchUser.val(), "pages/director/add-department.php");
});

// searchDep.keyup(function () {
//     let searchText = $(this).val();
//     if (this.value == '') {
//         depResults.hide();
//     } else {
//     handleSearch(searchDep, searchText, depResults, "pages/director/search-department.php");
//     }
// });

searchUser.keyup(function () {
    let searchText = $(this).val();
    if (this.value == '') {
        userResults.hide();
    } else {
        handleSearch(searchUser, searchText, userResults, "pages/director/search-user.php");
        console.log(searchDep.val()+" "+ searchUser.val());
    }
})

