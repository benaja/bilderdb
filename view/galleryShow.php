<div class="container">
    <h2 class="center-align"><?= $gallery->name ?></h2>
    <h5 class="center-align"><?= $gallery->description ?></h5>
    <div class="row">
        <div class="edit-buttons">
            <a href="/gallery/chooseImage?id=<?= $_GET['id'] ?>" class="waves-effect waves-light btn">Edit Images</a>
            <a href="/gallery/edit?id=<?= $_GET['id'] ?>" class="waves-effect waves-light btn">Edit Gallery</a>
            <a class="waves-effect waves-light btn red" onclick="deleteGallery(<?= $_GET['id'] ?>)">Delete Gallery</a>
        </div>
    </div>
    <div class="row">
        <?php foreach($images as $image): ?>
        <div class="row col s4">
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="image materialboxed" style="background-image: url(/Uploads/<?= $image->url ?>)"><p class="img-desc img-name"><?= $image->name ?></p><p class="img-desc"><?= $image->description ?></p></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

