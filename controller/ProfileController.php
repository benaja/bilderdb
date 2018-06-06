<?php

require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class ProfileController
{
    public function edit()
    {
        $repository = new UserRepository();
        if(isset($_POST['firstname'])){
            $currentUser = $repository->getAuthUser();
            if($_POST['password'] == ""){
                $repository->updateUser($_POST['firstname'], $_POST['lastname'], $currentUser->id);
            }else{
                $repository->updateUserWidthPW($_POST['firstname'], $_POST['lastname'], $_POST['password'], $currentUser->id);
            }
            header("location: /gallery");
        }else{
            $user = $repository->getAuthUser();
            $view = new View('edit-profile');
            $view->js("/js/login.js");
            $view->user = $user;
            $view->display();

        }
    }

    public function delete(){
        $repository = new UserRepository();
        $user = $repository->getAuthUser();

        $repository->delete($user->id);

        session_destroy();
    }

}
