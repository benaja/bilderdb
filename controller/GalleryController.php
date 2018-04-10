<?php

require_once '../repository/.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class GalleryController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('gallery');
        $view->css("/css/gallery.css");
        $view->display();
    }
}
