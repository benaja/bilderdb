<h3 class="center-align">Image Upload</h5>
    <div class="add-image-container">
        <form method="post" action="#?gallery=<?= $_GET['gallery'] ?>" enctype="multipart/form-data">
            <div class="custom-upload">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Choose Picture ...</span>
                        <input type="file" name="imgUpload" onchange="previewImage(this)">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="image-properties row">
                <div class="selected-image-container">
                    <img class="selected-image" src="">
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="imgName" name="imgName" type="text" class="validate" required>
                        <label for="imgName">Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="description" name="description" class="materialize-textarea"></textarea>
                        <label for="description">Description</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Upload
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<a href="/gallery/show/?id=<?= $_GET['gallery'] ?>" class="btn-floating btn-large waves-effect waves-light back_to_gallery"><i class="material-icons">arrow_back</i></a>