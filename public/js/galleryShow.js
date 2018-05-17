$(document).ready(function () {
    $('.materialboxed').materialbox({
        onOpenStart: showDesc,
        onCloseStart: hideDesc
    });
});

function showDesc() {
    setTimeout(function () {
        $('.img-desc').show()
    }, 300);
}

function hideDesc() {
    $('.img-desc').hide();
}