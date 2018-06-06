var showLogin = true;

function showRegistration() {

    if (showLogin) {
        $('#registration').show();
        $('#login').hide();
        showLogin = false;
    } else {
        $('#registration').hide();
        $('#login').show();
        showLogin = true;
    }
}

function testPW(){
    var pw1 = $("#password1").val();
    var pw2 = $("#password2").val();

    if(pw1 != pw2){
        swal('Fehler', 'Die Passwörter stimmen nicht übereing!', 'error');
        return false;
    }
    var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
    if(!pattern.test(pw1)){
        swal('Fehler', 'Password needs at least 8 Characters, 1 Number, upper an lowercase', 'error');
        return false;
    }
    return true;
}

function validateProfileEdit(){
    if($("#firstname").val() == ""){
        swal('Error', 'Firstname can not be empty!', 'error');
        return false;
    }
    if($("#lastname").val() == ""){
        swal('Error', 'Firstname can not be empty!', 'error');
        return false;
    }
    if($("#password1").val() != ""){
        return testPW();
    }
    return true;
}

function deleteProfile(){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover your Account!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if(willDelete){
            $.ajax({
                url: '/profile/delete',
                type: 'get',
                success: function (data, ) {
                    swal("Your Profile has been deleted!", {
                        icon: "success",
                    }).then((abc) => {
                        window.location = "/";
                    });
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    });
}