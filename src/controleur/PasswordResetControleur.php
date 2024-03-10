<?php
require_once __DIR__ . '/../modele/UserModel.php';

class PasswordResetControleur
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function showResetForm()
    {
        require_once __DIR__ . '/../vue/resetPasswordQuestionVue.php';
    }

    public function verifySecretQuestion($mail, $reponseSec)
    {
        $user = $this->userModel->verifySecretQuestionAnswer($mail, $reponseSec);
        if ($user) {
            $_SESSION['reset_email'] = $mail;

            header('Location: index.php?page=handleResetPassword&mail=' . urlencode($mail));
            exit();
        } else {

            echo "Réponse incorrecte ou utilisateur non trouvé.";

            return false;
        }
    }


}
$resetController = new PasswordResetControleur();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = $_POST['mail'];
    $reponseSec = $_POST['reponseSec'];
    $resetController->verifySecretQuestion($mail, $reponseSec);
}
$resetController->showResetForm();


?>