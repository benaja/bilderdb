function deleteGallery(imageId) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this image!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            $.ajax({
                url: '/image/delete',
                type: 'post',
                data: {
                    id: imageId
                },
                success: function (data, ) {
                    swal("The image has been deleted!", {
                        icon: "success",
                    }).then((djsfk) => {
                        window.location = "/gallery";
                    });
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
            if (willDelete) {

            }
        });
}