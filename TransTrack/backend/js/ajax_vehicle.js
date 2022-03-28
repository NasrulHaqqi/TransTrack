const vehicle_add = (data) => {
    $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php?resource=vehicle&action=add',
        type: 'POST',
        data: {
            data: data
        },
        success: function (response) {
            console.log(response)
            location.reload(true)
        }
    })
}
const vehicle_detil = (id) => {
    return $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php',
        type: 'GET',
        data: {
            resource: 'vehicle',
            action: 'detil',
            id: id
        }
    })
}
const vehicle_view = () => {
    return $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php',
        type: 'GET',
        data: {
            resource: 'vehicle',
            action: 'view'
        }
    })
}
const vehicle_edit = (data) => {
    $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php?resource=vehicle&action=edit',
        type: 'POST',
        data: {
            data: data
        },
        success: function (response) {
            console.log(response)
            location.reload(true)
        }
    })
}
const vehicle_delete = (id) => {
    $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php',
        type: 'GET',
        data: {
            resource: 'vehicle',
            action: 'delete',
            id: id
        },
        success: function (response) {
            if (response === '"delete success"') {
                $('tr#lap' + id).remove()
                // vehicle_view()
                location.reload(true)
            }
        }
    })
}

export {
    vehicle_add,
    vehicle_detil,
    vehicle_view,
    vehicle_edit,
    vehicle_delete
}
