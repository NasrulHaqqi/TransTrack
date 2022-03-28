const admin_login = (data) => {
    $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php?resource=admin&action=login',
        type: 'POST',
        data: {
            data: data
        },
        success: function (response) {
            console.log(response)
            if (response == '"login success"') {
                window.location.replace('dashboard.php')
            } else {
                alert('Username or Password dit not match any record')
            }
        }
    })
}
const admin_logout = () => {
    $.ajax({
        url: '/TransTrack/backend/ajax/ajax.php',
        type: 'GET',
        data: {
            resource: 'admin',
            action: 'logout'
        },
        success: function (response) {
            console.log(response)
            window.location.replace('login.php')
        }
    })
}

export { admin_login, admin_logout }
