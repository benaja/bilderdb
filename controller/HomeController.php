<?php
require_once('../repository/UserRepository.php');
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
class HomeController
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

        //var_dump($_POST);
        if(isset($_POST['firstname']))
        {
            $repository = new UserRepository();
            $userId = $repository->create($_POST['firstname'], $_POST['lastname'],$_POST['email'], $_POST['password']);
            $_SESSION['userId'] = $userId;
            header('Location: /Gallery');
        }
        else if(isset($_POST['password'])){
            $repository = new UserRepository();
            $user = $repository->login($_POST['email']);
            
            $pwd = sha1($_POST['password']);

            if($user->password == $pwd){
                $_SESSION['userId'] = $user->id;
                header('Location: /Gallery');
            }else{
                echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            swal('Error', 'Wrong Password or E-Mail', 'error');
                        });
                    </script>";
            }
        }
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        $view = new View('home');
        $view->title = 'Startseite';
        $view->heading = 'Startseite';
        $view->header = false;
        $view->css('/css/home.css');
        $view->js('/js/home.js');
        $view->display();
    }

    public function logout(){
        session_destroy();
        header("Location: /");
    }
}
