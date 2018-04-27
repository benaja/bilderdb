// function previewImage(input) {

//     var reader = new FileReader();

//     reader.onload = function (e) {
//         $('.selected-image').attr('src', e.target.result);
//     }

//     //$(".selected-image").attr('src', input.files[0].mozFullPath);

// }

$(document).ready(function () {
    $('select').formSelect();
});

function previewImage(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.selected-image').attr('src', e.target.result);
            $('.image-properties').show();
        }

        reader.readAsDataURL(input.files[0]);
    }
}