import * as admin from '../../../backend/js/ajax_admin.js'

const init = () => {
    console.log('ADMIN LOGIN INIT')
    main()
}

const main = () => {
    $('#login-form button[type=submit]').on('click', (event) => {
        $('#login-form button[type=submit]').attr('disabled', true)
        let username = $('#login-form input[name=username]').val()
        let password = $('#login-form input[name=password]').val()
        if (username && password) {
            admin.admin_login({ username, password })
            event.preventDefault()
        }
        $('#login-form button[type=submit]').attr('disabled', false)
    })
}

export { init }
