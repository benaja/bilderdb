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
        $view->display();
    }

    public function addGallery(){
        if(isset($_POST['name'])){
            $galleryRepository = new GalleryRepository();

            if($galleryRepository->exist($_POST['name'], 'name')){

            }else{
                $id = $galleryRepository->create($_POST['name'], $_POST['description']);
                header("Location: /gallery/show?id=$id");
            }
        }

        $view = new View('addGallery');
        $view->css("/css/gallery.css");
        $view->display();
    }

}
