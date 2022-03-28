import * as admin from '../../backend/js/ajax_admin.js'

import * as login from './admin/login.js'
import * as vehicle from './admin/vehicle.js'
import * as sparepart from './admin/sparepart.js'

$(() => {
    let fullPath = window.location.pathname.split('/')
    let currentPath = fullPath[3].slice(0, -4)
    if (fullPath.length === 4) {
        $('#logout').on('click', (event) => {
            admin.admin_logout()
            event.preventDefault()
        })

        if (currentPath === 'login') {
            login.init()
        } else if (currentPath === 'vehicle') {
            vehicle.init()
        } else if (currentPath === 'sparepart') {
            sparepart.init()
        } 
    }
})
