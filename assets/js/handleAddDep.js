export function handleAddDep(department_name, description, dep_head_id, url) {
    $.ajax({
        url: url,
        method: "POST",
        data: {
            dep_name: department_name,
            dep_desc: description,
            dep_head_id: dep_head_id
        },
        success: function (response) {
            alert(response);
            window.location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error:", errorThrown);
        }

    })
}
