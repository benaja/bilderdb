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