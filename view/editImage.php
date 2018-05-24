<div class="edit-image-container">
    <form method="POST" action="#">
        <div class="input-field col s6">
            <input value="<?= $image->name?>" id="last_name" name="editName" type="text" class="validate">
            <label  for="last_name">Name</label>
        </div>
        <div class="input-field col s6">
            <input value="<?= $image->description ?>" id="desc" name="editDesc" type="text" class="validate">
            <label for="desc">Description</label>
        </div>
        <button class="btn" type="submit">Save</button>
        <a class="waves-effect waves-light btn red" onclick="deleteGallery(<?= $_GET['id'] ?>)">Delete Image</a>
    </form>
</div>