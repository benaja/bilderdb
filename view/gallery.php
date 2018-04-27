<!-- <h2 class="heading_1 center">Choose your Gallery!</h2> -->
<div class="gallery-options">
    <div class="new-gallery">
        <a class="waves-effect waves-light btn large" href="/gallery/add">
            <i class="material-icons left large">add</i>New Gallery</a>
    </div>
</div>

<div class="gallery_container row">
    <?php foreach($gallerys as $gallery): ?>
    <div class="col s4">
        <div class="row">
            <a href="/gallery/show?id=<?= $gallery['id'] ?>" class="col s10 offset-s1 gallery_link">
                <div class='gallery'>
                    <div class='gallery_image' style="background-image: url(/<?= $gallery['url'] ?>)">
                        <div class="image-foreground">
                            <h3 class="gallery-name">
                                <?= $gallery['name'] ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <?php endforeach; ?>

</div>