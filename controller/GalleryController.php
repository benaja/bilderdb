<?php

require_once '../repository/UserRepository.php';

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
}
