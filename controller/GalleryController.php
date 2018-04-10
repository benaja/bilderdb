<?php

require_once '../repository/.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class GalleryController
{
    public function index()
    {
        $ = new ();

        $view = new View('gallery');
        $view->css("/css/gallery.css");
        $view->display();
    }
}
