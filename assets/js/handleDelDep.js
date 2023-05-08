export function handleDelDep(department_id, url) {
    $.ajax({
        url: url,
        method: "POST",
        data: {
            department_id: department_id
        },
        success: function (response) {
            window.location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error:", errorThrown);
        }

    })
}
