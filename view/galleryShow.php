<div class="container">
    <h2 class="center-align"><?= $gallery->name ?></h2>
    <h5 class="center-align"><?= $gallery->description ?></h5>
    <?php if(!isset($isSharedGallery)): ?>
    <div class="row">
        <p class="center-align">
            <a href="/gallery/edit?id=<?= $_GET['id'] ?>" class="waves-effect waves-light btn">Edit Gallery</a>
            <a class="waves-effect waves-light btn" onclick="shareGallery('<?= $gallery->id ?>')">Share Gallery</a>
            <a class="waves-effect waves-light btn red" onclick="deleteGallery(<?= $_GET['id'] ?>)">Delete Gallery</a>
        </p>
    </div>
    <a href="/image/upload/?gallery=<?= $_GET['id'] ?>" class="btn-floating btn-large waves-effect waves-light add_image"><i class="material-icons">add</i></a>
    <?php endif ?>
    <div class="row">
        <?php foreach($images as $image): ?>
        <div class="row col s4">
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="image materialboxed" style="background-image: url(/Uploads/<?= $image->url ?>)">
                        <p class="img-desc img-name"><?= $image->name ?></p>
                        <p class="img-desc"><?= $image->description ?></p>
                        <a href="/image/edit?id=<?= $image->id ?>" class="btn-floating btn-small waves-effect waves-light edit-image-button"><i class="material-icons">edit</i></a>
                    </div>
  
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

