<h3 class="center-align">Image Upload</h5>
    <div class="add-image-container">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="custom-upload">
                <label class="custom-file-upload">
                    <p>Choose Picture...</p>

                    <input type="file" accept="image/*" onchange="previewImage(this)" name="imgUpload" id="file" class="inputfile" />
                </label>
            </div>
            <div class="selected-image-container">
                <img class="selected-image" src="">
            </div>
            <input class="imgAttr" type="text" name="imgName" placeholder="Name" required>
            <p class='imgAttr galTxt'>Gallery</p>
            <select name='galleryId'>
                <?php foreach ($gallerys as $gallery): ?>
                    <option value="<?= $gallery['id'] ?>" class='imgAttr'><?= $gallery['name']  ?></option>
                <?php endforeach; ?>
            </select>

            <textarea class="descText imgAttr" placeholder="Description" name="description" cols="40" rows="5"></textarea>
            <input class="imgAttr" type="submit" value="Upload">
        </form>
    </div>