$(document).ready(function () {
    $('.materialboxed').materialbox({
        onOpenStart: showDesc,
        onCloseStart: hideDesc
    });
});

function showDesc() {
    $('.img-desc').show();
}

function hideDesc() {
    $('.img-desc').hide();
}