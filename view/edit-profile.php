<form action="#" method="POST" class="row profile-edit" onsubmit="return validateProfileEdit()">
    <div class="row">
        <div class="input-field col s12">
            <input id="firstname" name="firstname" type="text" class="validate" value="<?= $user->firstname ?>" required>
            <label for="firstname">Firstname</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="lastname" name="lastname" type="text" class="validate" value="<?= $user->lastname ?>" required>
            <label for="lastname">Lastname</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="password1" name="password" type="password" class="validate">
            <label for="password1">Password</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="password2" name="password2" type="password" class="validate">
            <label for="password2">Repeat Password</label>
        </div>
    </div>
    <p class="row center-align">
        <button class="btn waves-effect waves-light" type="submit" name="action">Speichern
            <i class="material-icons right">send</i>
        </button>
    </p>
    <p class="row center-align">
        <a onclick="deleteProfile()" class="waves-effect waves-light btn red">Delete Profile</a>   
    </p>
</form>