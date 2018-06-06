<div class="edit-image-container">
    <?php if($image == null): ?>
    <h1>Dieses Bild existiert nicht</h1>
    <?php else: ?>
    <?php if($_SESSION['userId'] === $image->user_id): ?>
        <form method="POST" action="#">
            <div class="input-field col s6">
                <input value="<?= $image->name?>" id="last_name" name="editName" type="text" class="validate">
                <label  for="last_name">Name</label>
            </div>
            <div class="input-field col s6">
                <input value="<?= $image->description ?>" id="desc" name="editDesc" type="text" class="validate">
                <label for="desc">Description</label>
            </div>
            <p class="row center-align">
                <button class="btn" type="submit">Save</button>
                <a class="waves-effect waves-light btn red" onclick="deleteGallery(<?= $_GET['id'] ?>)">Delete Image</a>
            </p>
        </form>
        <?php else: ?>
    <h1>Sie haben keinen Zugriff auf dieses Bild</h1>
    <?php endif?>
    <?php endif?>
</div>