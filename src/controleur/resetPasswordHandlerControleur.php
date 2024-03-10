<?php

require_once __DIR__ . '/../modele/UserModel.php';


$userModel = new UserModel();





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $mail = $_POST['mail'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];


    if ($newPassword === $confirmNewPassword) {

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $result = $userModel->updateUserPassword($mail, $hashedPassword);

        if ($result) {
           
            header('Location: index.php?page=login&reset=success');
            exit();
        } else {

            echo "Erreur lors de la réinitialisation du mot de passe.";
        }
    } else {

        echo "Les mots de passe ne correspondent pas.";
    }
} 

    

require_once __DIR__ . '/../vue/resetPasswordHandlerVue.php';

?>
