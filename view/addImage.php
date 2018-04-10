<h5>Image Upload</h5>
<div class="add-image-container">
    <div class="custom-upload">
        <label class="custom-file-upload">
            <p>Choose Picture...</p>
            <form method="post" action="#" enctype="multipart/form-data">
                <input type="file" onchange="previewImage(this)" name="imgUpload" id="file" class="inputfile" />
        </label>
    </div>
    <div class="selected-image-container">
        <img class="selected-image" src="">
    </div>
    <input class="imgAttr" type="text" name="imgName" placeholder="Name" required>
    <p  class='imgAttr galTxt'>Gallery</p>
    <?php
    $repository = new GalleryRepository();

    $gallerys = $repository->getAllGallery();
    echo "<select name='galleryId'>"; 
    foreach ($gallerys as $gallery){ 
    echo "<option value=". $gallery['id']. " class='imgAttr'>" . $gallery['name'] . "</option>";
    } 
    echo "</select>";
    ?>

    <textarea class="descText imgAttr" placeholder="Description" name="description" cols="40" rows="5"></textarea>
    <input class="imgAttr" type="submit" value="Upload">
    </form>
</div>