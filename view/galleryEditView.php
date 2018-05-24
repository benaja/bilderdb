<div class="container">
    <h2 class="center-align"><?= $gallery->name ?></h2>
    <h5 class="center-align">Choose the picture you wanna edit!</h5>
    <a href="/gallery/chooseImage?id=<?= $_GET['id'] ?>" class="waves-effect btn-edit waves-light btn-large">Cancel</a>
    <div class="row">
        <?php foreach($images as $image):  ?>
        <div class="row col s4">
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="image img-conatiner" style="background-image: url(/Uploads/<?= $image->url ?>)"><a href="/gallery/editImage?id=<?= $image->id ?>" class="img-link"></a></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

