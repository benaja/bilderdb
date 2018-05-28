<div class="container">
<?php if($gallery == null): ?>
<h1>Diese Gallerie existiert nicht</h1>
<?php else: ?>
<?php if($_SESSION['userId'] === $gallery->user_id): ?>
    <div class="row edit-formular">
        <div class="col s8 offset-s2">
            <form action="#" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" name="name" type="text" class="validate" value="<?= $gallery->name ?>">
                        <label for="name">Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="description" name="description" class="materialize-textarea"><?= $gallery->description ?></textarea>
                        <label for="description">Description</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4 offset-s4">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Save
                                <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <?php else: ?>
<h1>Sie haben keinen Zugriff auf diese Gallerie</h1>
<?php endif?>
<?php endif?>
</div>