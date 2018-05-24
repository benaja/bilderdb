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
        <button class="btn-large" type="submit">Save</button>
    </form>
</div>