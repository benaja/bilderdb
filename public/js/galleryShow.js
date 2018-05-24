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

function deleteGallery(galleryId){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this gallery!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        $.ajax({
            url: '/gallery/delete',
            type: 'post',
            data: {
                galleryId: galleryId
            },
            success: function( data, ){
                swal("The Gallery has been deleted!", {
                    icon: "success",
                }).then((djsfk) => {
                    window.location = "/gallery";
                });
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
        if (willDelete) {
          
        }
      });
}