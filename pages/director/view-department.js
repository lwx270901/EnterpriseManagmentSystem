import { handleDelDep } from "../../assets/js/handleDelDep.js";

var delBtn = $('.delete-btn');
var trs = $('tr');

delBtn.each(function (index, b) {
    $(b).attr('id','del-btn-' + parseInt(index + 1));
    
});

delBtn.click(function(e){
    var index = e.currentTarget['id'].split('-')[2];
    var id = $(trs[index].children[1]).html();
    handleDelDep(id, "pages/director/delete-department.php")
});

