<?php

require_once '../repository/UserRepository.php';
require_once('../repository/GalleryRepository.php');

/**
 * Siehe Dokumentation im DefaultController.
 */
class GalleryController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $authUser = $userRepository->getAuthuser();

        $view = new View('gallery');
        $view->css("/css/gallery.css");
        $view->authUser = $authUser;
        $view->display();
    }

    public function addGallery(){


        $view = new View('addGallery');
        $view->css("/css/gallery.css");
        $view->display();
    }

}
