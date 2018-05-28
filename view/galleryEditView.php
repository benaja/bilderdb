<div class="container">
<?php if($gallery == null): ?>
<h1>Diese Gallerie existiert nicht</h1>
<?php else: ?>
<?php if($_SESSION['userId'] === $gallery->user_id): ?>
    <h2 class="center-align"><?= $gallery->name ?></h2>
    <h5 class="center-align">Choose the picture you wanna edit!</h5>
    <a href="/gallery?id=<?= $_GET['id'] ?>" class="waves-effect btn-edit waves-light btn-large">Cancel</a>
    <div class="row">
        <?php foreach($images as $image):  ?>
        <div class="row col s4">
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="image img-conatiner" style="background-image: url(/Uploads/<?= $image->url ?>)"><a href="/image/editImage?id=<?= $image->id ?>" class="img-link"></a></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
<h1>Sie haben keinen Zugriff auf diese Gallerie</h1>
<?php endif?>
<?php endif?>
    </div>
</div>

