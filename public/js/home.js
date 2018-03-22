var showLogin = true;

function showRegistration() {

    if (showLogin) {
        $('#registration').show();
        $('#registration-button').html("Sign in");
        $('#login').hide();
        $('.login-title').html("Registration");
        showLogin = false;
    } else {
        $('#registration').hide();
        $('#registration-button').html("Sign up");
        $('#login').show();
        $('.login-title').html("Login");
        showLogin = true;
    }
}