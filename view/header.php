<!DOCTYPE html>
<html lang="en">

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Import jQuery before materialize.js-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta charset="UTF-8">
    <title>Bilder DB</title>

    <?php
        foreach($css as $currentCSS):
    ?>
        <link rel="stylesheet" href="<?= $currentCSS ?>">
        <?php
        endforeach;
    ?>
            <?php
        foreach($js as $currentJS):
    ?>
                <script src="<?= $currentJS ?>"></script>
                <?php
        endforeach;
    ?>
</head>

<body>
    <?php
  if($this->header):
?>
        <nav>
            <div class="nav-wrapper">
                <a href="/gallery" class="brand-logo">PictureCloud</a>
                <a class='dropdown-trigger right profil-button' href='#' data-target='profil-dropdown'>
                    <i class="material-icons right whtie-text">account_circle</i><?= $authUser->firstname ?></a>
                <ul id='profil-dropdown' class='dropdown-content'>
                    <li>
                        <a><?= "$authUser->firstname $authUser->lastname" ?></a>
                    </li>
                    <li>
                        <a href="/profile/edit">Edit Profile</a>
                    </li>
                    <li>
                        <a href="/login/logout">Logout</a>
                    </li>
                </ul>
                <!-- <img src="/images/user.png" class="profile_image">
            <a href="/home/logout" class="logout_container">
                <p>Logout</p>
            </a> -->
                <div class="nav">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li>
                            <a href="/gallery">Gallery</a>
                        </li>
                        <li>
                            <a href="/search">Search</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
    endif;
  ?>