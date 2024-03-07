<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



require_once __DIR__ . '/../modele/PostitModel.php';
$postitModel = new PostitModel();

if (isset($_GET['id'])) {

    $postitId = $_GET['id'];
    $postitDetails = $postitModel->getPostitsById($postitId);
    $sharedUsers = $postitModel->getSharedUsers($postitId);

    require_once __DIR__ . '/../vue/PostitDetailVue.php';
} else {

}
?>
