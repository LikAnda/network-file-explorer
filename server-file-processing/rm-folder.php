<?php
if (isset($_POST["file_name"])) {
    $file_name = $_POST["file_name"];
    if (file_exists("../home/$file_name") && !empty($file_name)) {
        unlink("../home/$file_name");
        echo "Le fichier '$file_name' a été supprimé avec succès.";
    } else {
        echo "Erreur : Le dossier n'existe pas ou le nom est vide.";
    }
}
?>
