
import {handleSearch} from "../../assets/js/handleSearch.js";
import {handleAddDep} from "../../assets/js/handleAddDep.js";
import {handleDelDep} from "../../assets/js/handleDelDep.js";

var searchDep = $("#search-department");
var description = $("#department-description");
var depResults = $("#dep-results");
var searchUser = $("#search-user");
var userResults = $("#user-results");

$('#add-dh').on("click", function(e) {
    e.preventDefault();
    handleAddDep(searchDep.val(), description.val(), searchUser.val(), "pages/director/add-department.php");
});

let allButtons = document.getElementsByClassName('delete-btn');
for (let button of allButtons) {
         button.addEventListener('click', (e) => {
            var clickedElement = e.target;
            var clickedRow = clickedElement.parentNode.parentNode.parentNode.parentNode.id;
            var data = document.getElementById(clickedRow).querySelectorAll('.dep_id');
            var id = data[0].innerHTML;
            e.preventDefault();
            handleDelDep(id, "pages/director/delete-department.php");
});
}

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

