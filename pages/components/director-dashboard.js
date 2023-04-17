
import {handleSearch} from "../../assets/js/handleSearch.js"
var searchDep = $("#search-department");
var depResults = $("#dep-results");
var searchUser = $("#search-user");
var userResults = $("#user-results");

// Director add department head o day, xu ly database = ajax thoi.
$('#add-dh').on("click", function(e) {
    $('#department-name').append($("<div>" + searchDep.val() + "</div>"))
    $('#department-head').append($("<div>" + searchUser.val() + "</div>"))

});
searchDep.on("input", function(e) {
    handleSearch(searchDep, depResults, "./templates/search-department.php");
});
searchUser.on("input", function(e) {
    handleSearch(searchUser, userResults, "./templates/search-user.php");
})