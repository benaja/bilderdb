<!-- <h2 class="heading_1 center">Choose your Gallery!</h2> -->
<div class="gallery-options">
   <a href="/gallery/addGallery"><img class="add-gallery" src="/images/plus.png"></a>
</div>

<div class="gallery_container row">
<?php foreach($gallerys as $gallery): ?>
        <a href="/gallery/galleryShow?id=<?= $gallery['id'] ?>" class="col s4 gallery_link"><div class='gallery'>
        <div class='gallery_image'></div>
            <h3><?= $gallery['name'] ?></h3>
        </div></a>
<?php endforeach; ?>
  
</div>