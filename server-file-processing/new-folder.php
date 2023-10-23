<?php
if (isset($_POST["folder_name"])) {
    $folder_name = $_POST["folder_name"];
    if (!file_exists("../home/$folder_name") && !empty($folder_name)) {
        mkdir("../home/$folder_name", 0777, true);
        echo "Le dossier '$folder_name' a été créé avec succès.";
    } else {
        echo "Erreur : Le dossier existe déjà ou le nom est vide.";
    }
}
?>
