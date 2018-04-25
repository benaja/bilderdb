<!-- <h2 class="heading_1 center">Choose your Gallery!</h2> -->
<div class="gallery-options">
   <a href="/gallery/addGallery"><img class="add-gallery" src="/images/plus.png"></a>
</div>

<div class="gallery_container">
<?php
$repository = new GalleryRepository();

$gallerys = $repository->getAllGallery();

    foreach($gallerys as $gallery){
        echo"<div class='gallery'>
        <div class='gallery_image'></div>
            <h3>". $gallery['name']. "</h3>
        </div>";
    }
?>

    <!-- <div class="gallery">
        <div class="gallery_image"></div>
         <h3>Holidays</h3>
     </div> -->

  
</div>