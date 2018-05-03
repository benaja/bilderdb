<div class="container">
    <h2 class="center-align"><?= $gallery->name ?></h2>
    <h5 class="center-align"><?= $gallery->description ?></h5>
    <div class="row">
        <?php foreach($images as $image): ?>
        <div class="row col s4">
            <div class="row">
                <div class="col s10 offset-s1">
                    <div data-lightbox="roadtrip" data-title="<?= $image->description  ?>" class="image" style="background-image: url(/<?= $image->url ?>)"></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

