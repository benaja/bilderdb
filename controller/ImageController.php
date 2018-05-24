<?php
require_once('../repository/ImageRepository.php');
require_once('../repository/GalleryRepository.php');
/**
 * Der Controller ist der Ort an dem es für jede Seite, welche der Benutzer
 * anfordern kann eine Methode gibt, welche die dazugehörende Businesslogik
 * beherbergt.
 *
 * Welche Controller und Funktionen muss ich erstellen?
 *   Es macht sinn, zusammengehörende Funktionen (z.B: User anzeigen, erstellen,
 *   bearbeiten & löschen) gemeinsam in einem passend benannten Controller (z.B:
 *   UserController) zu implementieren. Nicht zusammengehörende Features sollten
 *   jeweils auf unterschiedliche Controller aufgeteilt werden.
 *
 * Was passiert in einer Controllerfunktion?
 *   Die Anforderungen an die einzelnen Funktionen sind sehr unterschiedlich.
 *   Folgend die gängigsten:
 *     - Dafür sorgen, dass dem Benutzer eine View (HTML, CSS & JavaScript)
 *         gesendet wird.
 *     - Daten von einem Model (Verbindungsstück zur Datenbank) anfordern und
 *         der View übergeben, damit diese Daten dann für den Benutzer in HTML
 *         Code umgewandelt werden können.
 *     - Daten welche z.B. von einem Formular kommen validieren und dem Model
 *         übergeben, damit sie in der Datenbank persistiert werden können.
 */
class ImageController
{
    /**
     * Die index Funktion des DefaultControllers sollte in jedem Projekt
     * existieren, da diese ausgeführt wird, falls die URI des Requests leer
     * ist. (z.B. http://my-project.local/). Weshalb das so ist, ist und wann
     * welcher Controller und welche Methode aufgerufen wird, ist im Dispatcher
     * beschrieben.
     */
    public function index()
    {
        

        $view = new View('addImage');
        $view->title = 'Add Image';
        $view->heading = 'Add Image';
        $view->header = true;
        $view->css('/css/addimage.css');
        $view->js('/css/addimage.js');
        $view->display();
        }

    public function upload(){
        

        if(isset($_POST['imgName'])){
            $target_dir = "Uploads/";
            $filename = $_FILES["imgUpload"]["tmp_name"];
            $filenameClear = $_FILES["imgUpload"]['name'];
            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filenameClear);
            $ext = pathinfo($filenameClear, PATHINFO_EXTENSION);
            $uniquesavename = time().uniqid(rand());
            $target_file = $target_dir . $uniquesavename . "." .$ext;
            $repository = new ImageRepository();
            // Check if image can be moved to dir
                if (move_uploaded_file($filename,  $target_file)) {
                    list($width, $height) = getimagesize($target_file);
                    $r = $width / $height;

                    $factor = $width / $height;
                    $newheight = 200;
                    $newwidth = 200 * $factor;

                    if($ext == "png"){
                        $src = imagecreatefrompng($target_file);
                        $dst = imagecreatetruecolor($newwidth, $newheight);
                        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    
                        imagepng($dst, "Uploads/small-" . $uniquesavename. "." .$ext);
                    }else{
                        $src = imagecreatefromjpeg($target_file);
                        $dst = imagecreatetruecolor($newwidth, $newheight);
                        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    
                        imagejpeg($dst, "Uploads/small-" . $uniquesavename. "." .$ext);
                    }

                    $date = date('Y-m-d h:i:s');
                    // $dateFixed = date('Y-m-d', strtotime($date));
                    $dateFixed = $date;
                    $name = $_POST['imgName'];
                    $desc = $_POST['description'];
                    $galleryId = $_POST['galleryId'];
                    $uid = $_SESSION['userId'];
                    $repository->upload($dateFixed, $name, $desc, $galleryId, $uniquesavename . ".". $ext, $uid);
                }
        }

        $userRepository = new UserRepository();
        $authUser = $userRepository->getAuthuser();

        
        $repository = new GalleryRepository();

        $gallerys = $repository->getGallerysByUser($authUser->id);
    

        $view = new View('AddImage');
        $view->title = 'Add Image';
        $view->heading = 'Add Image';
        $view->header = true;
        $view->css('/css/addimage.css');
        $view->js('/js/addimage.js');
        $view->gallerys = $gallerys;
        $view->display();

    }
    public function editImage(){
        $imageRepository = new imageRepository();

        if(isset($_POST['editDesc']) ||isset($_POST['editName'])){

                $imageRepository->update($_POST['editName'], $_POST['editDesc'], $_GET['id']);
                header('Location: '. "/gallery");
        }

        $image = $imageRepository->readById($_GET['id']);

        $view = new View('editImage');
        $view->css("/css/editImage.css");
        $view->js("/js/editImage.js");
        $view->image = $image;
        $view->display();
    }

    public function delete(){
        $imageRepository = new imageRepository();

        $imageRepository->deleteById($_POST['id']);
    }
}
