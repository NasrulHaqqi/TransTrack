const sparepart_add = (data) => {
    $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php?resource=sparepart&action=add',
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
const sparepart_detil = (id) => {
    return $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php',
        type: 'GET',
        data: {
            resource: 'sparepart',
            action: 'detil',
            id: id
        }
    })
}
const sparepart_view = () => {
    return $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php',
        type: 'GET',
        data: {
            resource: 'sparepart',
            action: 'view'
        }
    })
}
const sparepart_edit = (data) => {
    $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php?resource=sparepart&action=edit',
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
const sparepart_delete = (id) => {
    $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php',
        type: 'GET',
        data: {
            resource: 'sparepart',
            action: 'delete',
            id: id
        },
        success: function (response) {
            if (response === '"delete success"') {
                $('tr#ses' + id).remove()
                // sparepart_view()
                location.reload(true)
            }
        }
    })
}

export {
    sparepart_add,
    sparepart_detil,
    sparepart_view,
    sparepart_edit,
    sparepart_delete
}
