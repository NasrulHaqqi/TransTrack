import * as sparepart from '../../../backend/js/ajax_sparepart.js'

const init = () => {
    console.log('ADMIN SPAREPART INIT')
    main()
}

const main = () => {
    sparepart.sparepart_view().then((response) => {
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
                    item['jenis'] +
                    '</td>' +
                    '<td >' +
                    item['nama'] +
                    '</td>' +
                    '<td>' +
                    item['jumlah'] +
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
        $('#modalFormCenterTitle').html('Add Sparepart')
        $('#jenis').val('')
        $('#nama').val('')
        $('#jumlah').val('')
        $('#modalForm').modal('toggle')
    })
    $('#modalForm').on('click', 'button[name=save]', (event) => {
        console.log('save')
        let modal = $('#modalForm')
        let data = {
            jenis: modal.find('.modal-body input#jenis').val(),
            nama: modal.find('.modal-body input#nama').val(),
            jumlah: modal.find('.modal-body input#jumlah').val()
        }
        $('#modalForm').modal('toggle')
        let id = modal.attr('data-id')
        if (id) {
            data = {
                id: id,
                ...data
            }
            sparepart.sparepart_edit(data)
        } else {
            sparepart.sparepart_add(data)
        }
    })
    $('.table').on('click', 'button[name=edit]', (event) => {
        $('#modalFormCenterTitle').html('Edit Sparepart')
        let id = $(event.target).parent().parent().parent().attr('id')
        id = id.substring(3)
        console.log('edit', id)

        $('#modalForm').modal('toggle')

        sparepart.sparepart_detil(id).then((data) => {
            data = JSON.parse(data)[0]
            console.log(data)
            let modal = $('#modalForm')

            modal.attr('data-id', data['id'])
            modal.find('.modal-body input#jenis').val(data['jenis'])
            modal.find('.modal-body input#nama').val(data['nama'])
            modal.find('.modal-body input#jumlah').val(data['jumlah'])
        })
    })
    $('.table').on('click', 'button[name=delete]', (event) => {
        let id = $(event.target).parent().parent().parent().attr('id')
        id = id.substring(3)
        sparepart.sparepart_delete(id)
        console.log('delete', id)
    })
}

export { init }
