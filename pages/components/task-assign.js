import {handleSearch} from "../../assets/js/handleSearch.js"
var searchEmp = $("#searchEmp");
var empResults = $("#employee-results");

searchEmp.on("input", function(e){
    handleSearch(searchEmp,empResults, "./templates/search-user.php");
});