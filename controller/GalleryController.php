<?php

require_once '../repository/UserRepository.php';
require_once('../repository/GalleryRepository.php');
require_once('../repository/ImageRepository.php');

/**
 * Siehe Dokumentation im DefaultController.
 */
class GalleryController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $authUser = $userRepository->getAuthuser();

        
        $repository = new GalleryRepository();

        $gallerys = $repository->getAllGallery();

        $view = new View('gallery');
        $view->css("/css/gallery.css");
        $view->gallerys = $gallerys;
        $view->display();
    }

    public function add(){
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


    public function show(){
        $galleryRepository = new GalleryRepository();

        $images = $galleryRepository->pictures($_GET['id']);
        $gallery = $galleryRepository->readById($_GET['id']);

        $view = new View('galleryShow');
        $view->css("/css/galleryShow.css");
        $view->css("/css/lightbox.css");
        $view->js("/js/galleryShow.js");
        $view->js("/js/lightbox.js");
        $view->gallery = $gallery;
        $view->images = $images;
        $view->display();
    }

    public function chooseImage(){
        $galleryRepository = new GalleryRepository();

        $images = $galleryRepository->pictures($_GET['id']);
        $gallery = $galleryRepository->readById($_GET['id']);

        $view = new View('galleryEditView');
        $view->css("/css/galleryShow.css");
        $view->js("/js/galleryShow.js");
        $view->gallery = $gallery;
        $view->images = $images;
        $view->display();
    }

    public function editImage(){
        $imageRepository = new ImageRepository();

        $image = $imageRepository->readById($_GET['id']);

        $view = new View('editImage');
        $view->css("/css/editImage.css");
        $view->js("/js/editImage.js");
        $view->image = $image;
        $view->display();
    }

}
