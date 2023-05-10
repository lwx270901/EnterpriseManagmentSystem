
import { handleSearchForDirector } from "../../assets/js/handleSearch.js";
import { handleAddDep } from "../../assets/js/handleAddDep.js";
import { handleDelDep } from "../../assets/js/handleDelDep.js";

var searchDep = $("#search-department");
var description = $("#department-description");
var searchUser = $("#search-user");
var userResultDropdown = $("#user-result-dropdown");
var selectedUser = $("#selected-user");

$('#add-dh').on("click", function (e) {
    e.preventDefault();

    if (!searchDep.val().trim()) {
        alert("Please fill in the department's name");
        return;
    }
    if (!description.val().trim()) {
        alert("Please fill in the department's description");
        return;
    }
    handleAddDep(searchDep.val(), description.val(), selectedUser.val(), "pages/director/add-department.php");
});

// let allButtons = document.getElementsByClassName('delete-btn');
// for (let button of allButtons) {
//     button.addEventListener('click', (e) => {
//         var clickedElement = e.target;
//         var clickedRow = clickedElement.parentNode.parentNode.parentNode.parentNode.id;
//         var data = document.getElementById(clickedRow).querySelectorAll('.dep_id');
//         var id = data[0].innerHTML;
//         e.preventDefault();
//         handleDelDep(id, "pages/director/delete-department.php");
//     });
// }

// searchDep.keyup(function () {
//     let searchText = $(this).val();
//     if (this.value == '') {
//         depResults.hide();
//     } else {
//     handleSearch(searchDep, searchText, depResults, "pages/director/search-department.php");
//     }
// });

searchUser.keyup(function () {
    if (this.value == '') {
        userResultDropdown.hide();
    } else {
        handleSearchForDirector(searchUser, userResultDropdown, "pages/director/search-user.php", selectedUser);
    }
})

