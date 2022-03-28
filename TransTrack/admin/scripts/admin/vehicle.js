import * as vehicle from '../../../backend/js/ajax_vehicle.js'

const init = () => {
    console.log('ADMIN VEHICLE INIT')
    main()
}

const main = () => {
    vehicle.vehicle_view().then((response) => {
        response = JSON.parse(response)
        Object.values(response).forEach((item, index) => {
            $('.table > tbody:last-child').append(
                '<tr id="lap' +
                    item['id'] +
                    '">' +
                    '<td>' +
                    (index + 1) +
                    '</td>' +
                    '<td>' +
                    item['no'] +
                    '</td>' +
                    '<td >' +
                    item['jenis'] +
                    '</td>' +
                    '<td>' +
                    item['merek'] +
                    '</td>' +
                    '<td>' +
                    item['tahun'] +
                    '</td>' +
                    '<td>' +
                    '<div class="btn-group me-2">' +
                    '<button type="button" class="btn btn-sm btn-outline-primary" name="edit">Edit</button>' +
                    '<button type="button" class="btn btn-sm btn-outline-danger" name="delete">Delete</button>' +
                    '</div>' +
                    '</td>' +
                    '</tr>'
            )
        })
    })
    $('.btn-toolbar').on('click', 'button[name=add]', () => {
        $('#modalFormCenterTitle').html('Add Vehicle')
        $('#no').val('')
        $('#jenis').val('')
        $('#merek').val('')
        $('#tahun').val('')
        $('#modalForm').modal('toggle')
    })
    $('#modalForm').on('click', 'button[name=save]', (event) => {
        console.log('save')
        let modal = $('#modalForm')
        let data = {
            no: modal.find('.modal-body input#no').val(),
            jenis: modal.find('.modal-body input#jenis').val(),
            merek: modal.find('.modal-body input#merek').val(),
            tahun: modal.find('.modal-body input#tahun').val()
        }
        $('#modalForm').modal('toggle')
        let id = modal.attr('data-id')
        if (id) {
            data = {
                id: id,
                ...data
            }
            vehicle.vehicle_edit(data)
        } else {
            vehicle.vehicle_add(data)
        }
    })
    $('.table').on('click', 'button[name=edit]', (event) => {
        $('#modalFormCenterTitle').html('Edit Vehicle')
        let id = $(event.target).parent().parent().parent().attr('id')
        id = id.substring(3)
        console.log('edit', id)

        $('#modalForm').modal('toggle')

        vehicle.vehicle_detil(id).then((data) => {
            data = JSON.parse(data)[0]
            console.log(data)
            let modal = $('#modalForm')

            modal.attr('data-id', data['id'])
            modal.find('.modal-body input#no').val(data['no'])
            modal.find('.modal-body input#jenis').val(data['jenis'])
            modal.find('.modal-body input#merek').val(data['merek'])
            modal.find('.modal-body input#tahun').val(data['tahun'])
        })
    })
    $('.table').on('click', 'button[name=delete]', (event) => {
        let id = $(event.target).parent().parent().parent().attr('id')
        id = id.substring(3)
        vehicle.vehicle_delete(id)
        console.log('delete', id)
    })
}

export { init }
