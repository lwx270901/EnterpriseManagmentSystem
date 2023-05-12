import { handleDelDep } from "../../assets/js/handleDelDep.js";
import { handleUpdateDep } from "../../assets/js/handleUpdateDep.js";
import { handleSearchForDirector } from "../../assets/js/handleSearch.js";

var delBtn = $('.delete-btn');
var searchDep = $("#name-department-edit");
var description = $("#department-description-edit");
var searchUserEdit = $("#search-user-edit");
var userEditResultDropdown = $("#user-edit-result-dropdown");
var selectedUserEdit = $("#selected-user-edit");
var editSubmitBtn = $('#edit-dh');
var trs = $('tr');
var dep_id;

delBtn.each(function (index, b) {
    $(b).attr('id','del-btn-' + parseInt(index + 1));
    
});

delBtn.click(function(e){
    var index = e.currentTarget['id'].split('-')[2];
    var id = $(trs[index].children[1]).html();
    handleDelDep(id, "pages/director/delete-department.php")
});


$('#editModal').on('show.bs.modal', function(e) {
    dep_id = $(e.relatedTarget).closest("tr").find(".dep_id").text();

    var dep_name = $(e.relatedTarget).closest("tr").find(".dep_name").text();
    searchDep.val(dep_name);

    var dep_desc = $(e.relatedTarget).closest("tr").find(".dep_desc").text();
    description.val(dep_desc);

    var dep_head = $(e.relatedTarget).closest("tr").find(".dep_head").text();
    $('#search-user-edit').val(dep_head);
    selectedUserEdit.text(dep_head);

});

searchUserEdit.keyup(function () {
    if (this.value == '') {
        userEditResultDropdown.hide();
    } else {
        handleSearchForDirector(searchUserEdit, userEditResultDropdown, "pages/director/search-user.php", selectedUserEdit);
    }
});


editSubmitBtn.on("click", function (e) {
    e.preventDefault();

    if (!searchDep.val().trim()) {
        alert("Please fill in the department's name");
        return;
    }
    if (!description.val().trim()) {
        alert("Please fill in the department's description");
        return;
    }
    console.log(selectedUserEdit.val());
    handleUpdateDep(dep_id, searchDep.val(), description.val(), selectedUserEdit.val(), "pages/director/edit-department.php");
});


