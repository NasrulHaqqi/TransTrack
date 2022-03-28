import * as admin from '../../../backend/js/ajax_admin.js'

$('#logout').on('click', (event) => {
    admin.admin_logout()
    event.preventDefault()
})