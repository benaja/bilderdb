// function previewImage(input) {

//     var reader = new FileReader();

//     reader.onload = function (e) {
//         $('.selected-image').attr('src', e.target.result);
//     }

//     //$(".selected-image").attr('src', input.files[0].mozFullPath);

// }

function previewImage(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.selected-image').attr('src', e.target.result);
            $('.imgAttr').css('display', 'block');
            $('select').css('display', 'block');
            $('.selected-image-container').css('display', 'block');
        }

        reader.readAsDataURL(input.files[0]);
    }
}