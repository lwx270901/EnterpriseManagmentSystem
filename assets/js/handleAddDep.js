export function handleAddDep(department, description, employee, url) {
    $.ajax({
        url: url,
        method: "POST",
        data: {
            department: department,
            description: description,
            employee: employee
        },
        success: function (response) {
            window.location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error:", errorThrown);
        }

    })
}
